<!-- Main layout.php -->
<?php
/** @var \yii\web\View $this */
/** @var string $content */

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
<meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <script src="https://kit.fontawesome.com/f51a93e227.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Delicious+Handrawn&display=swap" rel="stylesheet">
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php $this->beginBody() ?>
    
    <?= $this->render('_header') ?>

    <div class="d-flex flex-grow-1 overflow-hidden"> <!-- Added overflow-hidden here -->
        <!-- Sidebar -->
        <aside class="sidebar bg-secondary-subtle border-end">
            <?= $this->render('_sidebar') ?>
        </aside>

        <!-- Main Content Wrapper -->
        <main role="main" class="flex-grow-1 overflow-auto"> <!-- Added overflow-auto here -->
            <div class="container py-4">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </main>
    </div>

    <?= $this->render('_footer') ?>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>