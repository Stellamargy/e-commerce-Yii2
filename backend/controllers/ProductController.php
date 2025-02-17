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
            $model->productImageFile = UploadedFile::getInstance($model, 'productImageFile');



            if ($model->productImageFile && $model->upload()) {
                if ($model->save(false)) {
                    Yii::$app->session->setFlash('success', 'Product created successfully!');
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }

            // If no file was uploaded, show an error
            $model->addError('productImageFile', 'Product image is required.');
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }



    public function actionUpdate($id)
    {
        $model = Product::findOne($id);

        if ($model === null) {
            throw new NotFoundHttpException('Product not found.');
        }

        $oldImagePath = $model->product_image_url; // Store the old image path

        if ($model->load(Yii::$app->request->post())) {
            $model->productImageFile = UploadedFile::getInstance($model, 'productImageFile');

            if ($model->productImageFile) { // If a new image is uploaded
                if ($model->upload()) { // Upload and update image path
                    if ($model->save(false)) {
                        Yii::$app->session->setFlash('success', 'Product updated successfully!');
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                }
            } else {
                // If no new image is uploaded, keep the old image
                $model->product_image_url = $oldImagePath;
                if ($model->save()) {
                    Yii::$app->session->setFlash('success', 'Product updated successfully!');
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }

        return $this->render('update', ['model' => $model]);
    }
    public function actionDeleteProduct($id)
    {
        $model = Product::findOne($id);

        if (!$model) {
            throw new NotFoundHttpException('Product not found.');
        }

        // Delete the image file if it exists
        $filePath = Yii::getAlias('@common/uploads/') . $model->product_image_url;
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Delete product from the database
        if ($model->delete()) {
            Yii::$app->session->setFlash('success', 'Product deleted successfully.');
        } else {
            Yii::$app->session->setFlash('error', 'Failed to delete product.');
        }

        return $this->redirect(['index']); // Redirect to product list
    }
}
