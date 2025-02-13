<?php
/** @var yii\web\View $this */
use yii\helpers\Html;
$this->title = 'Create Product';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="container">
  
   <?php
   echo $this->render('_form' , ['model' => $model]) ;
   ?>
</div>

