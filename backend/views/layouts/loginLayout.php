<?php
use backend\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="login-body">
<?php $this->beginBody() ?>

<div class="login-container">
    <div class="login-box">
        <div class="login-logo">
            <h1>Admin Panel</h1>
        </div>
        
        <?= $content ?>
        
        <div class="login-footer">
            <p>&copy; <?= date('Y') ?> Your Company Name</p>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>