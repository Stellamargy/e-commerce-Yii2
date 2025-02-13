<?php

/** @var yii\web\View $this */
/** @var common\models\Product[] $products */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="products-index">
    <h1 class="mb-4"><?= Html::encode($this->title) ?></h1>

    <div class="row g-4">
        <?php foreach ($products as $product): ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100 shadow-sm">
                    <img src="<?= Yii::$app->urlManager->createUrl(['site/image', 'filename' => $product->product_image_url]) ?>"
                        class="card-img-top object-fit-cover"
                        style="height: 200px;"
                        alt="<?= Html::encode($product->product_name) ?>">

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-truncate mb-2">
                            <?= Html::encode($product->product_name) ?>
                        </h5>

                        <p class="card-text text-muted small mb-3" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                            <?= Html::encode($product->product_description) ?>
                        </p>

                        <div class="mt-auto">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="fw-bold fs-5">$<?= number_format($product->product_price, 2) ?></span>
                                <span class="badge bg-<?= $product->product_quantity > 0 ? 'success' : 'danger' ?>">
                                    <?= $product->product_quantity > 0 ? 'In Stock' : 'Out of Stock' ?>
                                </span>
                            </div>

                            <?= Html::a('View Details', ['view', 'id' => $product->id], [
                                'class' => 'btn btn-outline-primary w-100'
                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<style>
    .card {
        transition: transform 0.2s;
        border: none;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .object-fit-cover {
        object-fit: cover;
    }

    .btn-outline-primary {
        border-width: 2px;
    }

    /* For Firefox */
    * {
        scrollbar-width: thin;
        scrollbar-color: #888 #f1f1f1;
    }

    /* For Webkit browsers */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    ::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
</style>