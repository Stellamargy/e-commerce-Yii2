<?php
use yii\bootstrap5\ActiveForm;
use  yii\helpers\Html;
use yii\helpers\ArrayHelper;
use common\models\ProductCategory;
?>
<div class="product-form">
        <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data'], // Needed for file upload
        ]); ?>

        <?= $form->field($model, 'product_name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'product_price')->textInput(['type' => 'number']) ?>
        <?= $form->field($model, 'product_quantity')->textInput(['type' => 'number']) ?>
        <?= $form->field($model, 'product_description')->textarea(['rows' => 4]) ?>
        <?= $form->field($model, 'product_category_id')->dropDownList(
            ArrayHelper::map(ProductCategory::find()->all(), 'id', 'category_name'),
            ['prompt' => 'Select Product  Category']
        ) ?>
        
        <!-- File Upload Field -->
        <?= $form->field($model, 'productImageFile')->fileInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>