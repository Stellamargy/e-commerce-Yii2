<?php
/** @var yii\web\View $this */
use yii\helpers\Html;
use yii\grid\GridView;
$this->title ="Products";
$this->params['breadcrumbs'][] = $this->title; 
?>

<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $products,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'], 
            'product_name',
            'product_price',
            'product_quantity',
            'product_description', 
            [
                'attribute'=>'product_category_id',
                'label'=>'Category',
                'value'=>function($model){
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

