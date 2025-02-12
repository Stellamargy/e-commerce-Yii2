<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm ;

/** @var yii\web\View $this */
/** @var common\models\ProductCategory $model */
/** @var yii\bootstrap5\ActiveForm $form */
?>

<div class="product-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
