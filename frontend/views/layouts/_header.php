<?php
use yii\bootstrap5\NavBar;
use yii\bootstrap5\Nav;
use yii\bootstrap5\Html;
?>
<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'brandOptions' => ['class' => 'fw-bold text-white fs-4 brand-name'],
        'options' => [
            'class' => 'navbar navbar-expand-md custom-navbar fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index'],'linkOptions'=>['class'=>'text-white']],
        ['label' => 'Products', 'url' => ['/product/index'],'linkOptions'=>['class'=>'text-white']],
        ['label' => 'About Us', 'url' => ['/site/contact'],'linkOptions'=>['class'=>'text-white']],
        ['label' => 'Contact Us', 'url' => ['/site/contact'],'linkOptions'=>['class'=>'text-white']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup'],'linkOptions'=>['class'=>'text-white']];
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav me-auto mb-2 mb-md-0'],
        'items' => $menuItems,
    ]);
    if (Yii::$app->user->isGuest) {
        echo Html::tag('div',Html::a('Login',['/site/login'],['class' => ['btn btn-link login text-decoration-none text-white']]),['class' => ['d-flex']]);
    } else {
        echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout text-decoration-none']
            )
            . Html::endForm();
    }
    NavBar::end();
    ?>
</header>