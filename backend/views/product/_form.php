<?php
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use common\models\ProductCategory;
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"> <!-- This constrains the form width -->
            <div class="product-form">
                <?php $form = ActiveForm::begin([
                    'options' => ['enctype' => 'multipart/form-data'],
                ]); ?>

                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'product_name')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'product_category_id')->dropDownList(
                            ArrayHelper::map(ProductCategory::find()->all(), 'id', 'category_name'),
                            ['prompt' => 'Select Product Category']
                        ) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'product_price')->textInput(['type' => 'number']) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'product_quantity')->textInput(['type' => 'number']) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <?= $form->field($model, 'product_description')->textarea(['rows' => 4]) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <?= $form->field($model, 'productImageFile')->fileInput() ?>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-primary btn-lg']) ?>
                    </div>
                </div>
                

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>