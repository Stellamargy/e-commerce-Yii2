<?php
/** @var yii\web\View $this */
use yii\helpers\Html ;
$this->title = 'Update Product: ' . $model->product_name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->product_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="update-form">
<h1><?= Html::encode($this->title) ?></h1>
   <?php
   echo $this->render('_form' , ['model' => $model]) ;
   ?>

</div>

