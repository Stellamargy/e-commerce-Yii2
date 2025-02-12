<?php
/** @var yii\web\View $this */
use yii\helpers\Html ;
$this->title = $product->product_name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="product-view">
<p>
        <?= Html::a('Update', ['update', 'id' => $product->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $product->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this product?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

<div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?= Html::encode($product->product_name) ?></h5>
    <p class="card-text"><?= Html::encode($product->product_description) ?></p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

</div>


