<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = $product->product_name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class=" container ">
  <div class="product-view">


    <div class="card h-100" style="width: 28rem;">
      <img src="<?= Yii::$app->urlManager->createUrl(['site/image', 'filename' => $product->product_image_url]) ?>"
        class="card-img-top product-image"
        alt="Product Image">
      <div class="card-body">
        <h5 class="card-title"><?= Html::encode($product->product_name) ?></h5>
        <p class="card-text"><?= Html::encode($product->product_description) ?></p>
        <p class="card-text"><span>Quantity:</span> <?= Html::encode($product->product_quantity) ?></p>
        <p class="card-text"><span>Price:</span> <?= Html::encode($product->product_price) ?></p>
        <div>
          <p class="d-flex justify-content-end  ">
            <?= Html::a('Update', ['update', 'id' => $product->id], ['class' => 'btn btn-primary me-2']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $product->id], [
              'class' => 'btn btn-danger',
              'data' => [
                'confirm' => 'Are you sure you want to delete this product?',
                'method' => 'post',
              ],
            ]) ?>
          </p>
        </div>

      </div>
    </div>

  </div>
</div>