<?php
use yii\bootstrap5\NavBar;
use yii\bootstrap5\Nav;
use yii\helpers\Html;
?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'brandOptions' => ['class' => 'fw-bold text-white fs-3 brand-name'],
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-bg shadow-sm fixed-top',
        ],
        'togglerOptions' => [
            'class' => 'custom-toggler border-0',
        ],
    ]);

    $menuItems = [
        // [
        //     'label' => '<i class="fa-regular fa-user fa-lg"></i>', 
        //     'url' => ['profile/view'],
        //     'linkOptions' => ['class' => 'nav-link text-white']
        // ],
        [
            'label' => 'Log Out <i class="fa-solid fa-arrow-right-from-bracket fa-lg"></i> ', 
            'url' => ['user-management/auth/logout'],
            'linkOptions' => ['class' => 'nav-link text-white']
        ],
    ];
    
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ms-auto'],
        'encodeLabels' => false,
        'items' => $menuItems,
    ]);

    NavBar::end();
    ?>
</header>
