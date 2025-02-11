<?php

namespace backend\controllers;

use Yii;
use common\models\Product;
use common\models\ProductSearch;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class ProductController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $productsSearchModel = new ProductSearch();
        $dataProvider = $productsSearchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $productsSearchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $product = Product::findOne($id);
        if ($product->id === null) {
            throw new NotFoundHttpException("Product not found");
        }
        return $this->render('view', ['product' => $product]);
    }



    public function actionCreate()
{
    $model = new Product();

    if ($model->load(Yii::$app->request->post())) { 
        $model->imageFile = UploadedFile::getInstance($model, 'imageFile'); 

        if ($model->imageFile) {
            if ($model->upload()) { 
                if ($model->save(false)) { 
                    Yii::$app->session->setFlash('success', 'Product created successfully!');
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }

        // If no file was uploaded, show an error
        $model->addError('imageFile', 'Product image is required.');
    }

    return $this->render('create', [
        'model' => $model,
    ]);
}



    public function actionUpdate($id)
    {

        $product = Product::findOne($id);

        if ($product === null) {
            throw new NotFoundHttpException('Product not found.');
        }


        if (Yii::$app->request->isPost) {

            if ($product->load(Yii::$app->request->post()) && $product->validate()) {

                if ($product->save()) {
                    Yii::$app->session->setFlash('success', 'Product updated successfully!');
                    return $this->redirect(['view', 'id' => $product->id]);
                }
            }
        }


        return $this->render('update', ['product' => $product]);
    }
}
