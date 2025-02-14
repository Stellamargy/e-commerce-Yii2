<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->product_name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">
    <div class="container mt-5">
        <div class="row">
            <!-- Product Image Column -->
            <div class="col-md-6">
                <div class="card">
                    <img src="<?= Yii::$app->urlManager->createUrl(['site/image', 'filename' => $model->product_image_url]) ?>"
                        class="card-img-top object-fit-cover"
                        style="height: 200px;"
                        alt="<?= Html::encode($model->product_name) ?>">
                </div>
            </div>

            <!-- Product Details Column -->
            <div class="col-md-6">
                <h1><?= Html::encode($this->title) ?></h1>
                
                <div class="product-category mb-3">
                    <span class="badge bg-secondary">
                        <?= Html::encode($model->productCategory->category_name) ?>
                    </span>
                </div>

                <div class="product-price mb-4">
                    <h2 class="text-primary">
                        $<?= number_format($model->product_price, 2) ?>
                    </h2>
                </div>

                <div class="product-description mb-4">
                    <h5>Description</h5>
                    <p><?= Html::encode($model->product_description) ?></p>
                </div>

                <!-- Stock Status -->
                <div class="stock-status mb-4">
                    <?php if ($model->product_quantity > 0): ?>
                        <span class="badge bg-success">In Stock (<?= $model->product_quantity ?> available)</span>
                    <?php else: ?>
                        <span class="badge bg-danger">Out of Stock</span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>