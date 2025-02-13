<?php

/** @var yii\web\View $this */

use common\models\ProductSearch;
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = "Products";
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="product-index container">

    <div class="d-flex justify-content-between">
        <h1 class="fs-2"><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Add Product', ['create'], ['class' => 'btn btn-primary']) ?>
        </p>
    </div>


    <?= GridView::widget([
        'filterModel' => $searchModel,
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'product_name',
            'product_price',
            'product_quantity',
            'product_description',
            [
                'attribute' => 'product_category_id',
                'label' => 'Category',
                'value' => function ($model) {
                    return $model->productCategory->category_name ?? '(Not Set)';
                }

            ],

            [
                'class' => 'yii\grid\ActionColumn', // Default edit/view/delete buttons
                // 'template' => '{view} {update} {delete}', // Customize buttons
            ],
        ],
    ]); ?>
</div>