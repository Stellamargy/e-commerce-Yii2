<?php

use common\models\ProductCategory;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var common\models\ProductCategorySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Product Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-category-index">

    <div class="d-flex justify-content-between">
        <h1 class="fs-3"><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Add Category', ['create'], ['class' => 'btn btn-primary']) ?>
        </p>
    </div>

    <?php Pjax::begin(); ?>
    <!-- <?php echo $this->render('_search', ['model' => $searchModel]);
            ?> -->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'category_name',
            'category_description:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ProductCategory $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>