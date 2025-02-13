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
            'class' => 'navbar navbar-expand-md navbar-bg fixed-top',
        ],
        'togglerOptions' => [
            'class' => 'custom-toggler border-0', // Custom class & remove border
        ],
    ]);
    $menuItems = [
       ['label'=>'<i class="fa-regular fa-user fa-lg"></i>', 'url'=>['profile/view'],'linkOptions' => ['class' => 'text-white']] ,
       ['label'=>'<i class="fa-solid fa-arrow-right-from-bracket fa-lg"></i> Log Out ', 'url'=>['profile/view'],'linkOptions' => ['class' => 'text-white']],
    
    ];
    
    echo '<div class="collapse navbar-collapse justify-content-end">';
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav  mb-2 mb-lg-0'], // Aligns items to the right
        'encodeLabels' => false,
        'items' => $menuItems,
    ]);
    echo '</div>';
    // if (Yii::$app->user->isGuest) {
    //     $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    // }     
    // 
    // if (Yii::$app->user->isGuest) {
    //     echo Html::tag('div',Html::a('Login',['/site/login'],['class' => ['btn btn-link login text-decoration-none']]),['class' => ['d-flex']]);
    // } else {
    //     echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
    //         . Html::submitButton(
    //             'Logout (' . Yii::$app->user->identity->username . ')',
    //             ['class' => 'btn btn-link logout text-decoration-none']
    //         )
    //         . Html::endForm();
    // }
    NavBar::end();
    ?>
</header>
