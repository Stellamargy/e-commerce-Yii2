<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
?>

<div class="login-form">
    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

    <?= $form->field($model, 'username')->textInput(['placeholder' => 'Username']) ?>
    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password']) ?>
    <?= $form->field($model, 'rememberMe')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>