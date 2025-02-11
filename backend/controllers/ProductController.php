<?php

namespace backend\controllers;

use Yii;
use common\models\Product;
use common\models\ProductSearch;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class ProductController extends \yii\web\Controller
{
    public function actionCreate()
    {

        return $this->render('create');
    }

    public function actionIndex()
    {
        $productsSearchModel = new ProductSearch();
        $dataProvider = $productsSearchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $productsSearchModel,
            'dataProvider' => $dataProvider,
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

    public function actionView($id)
    {
        $product = Product::findOne($id);
        if ($product->id === null) {
            throw new NotFoundHttpException("Product not found");
        }
        return $this->render('view', ['product' => $product]);
    }
}
