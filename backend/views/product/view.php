<?php
/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = $product->product_name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="product-view">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm">
                <!-- Product Image Container -->
                <div class="position-relative">
                    <img src="<?= Yii::$app->urlManager->createUrl(['site/image', 'filename' => $product->product_image_url]) ?>"
                         class="card-img-top object-fit-cover"
                         style="height: 300px;"
                         alt="<?= Html::encode($product->product_name) ?>">
                </div>

                <!-- Product Details -->
                <div class="card-body">
                    <h4 class="card-title mb-4 fw-bold"><?= Html::encode($product->product_name) ?></h4>
                    
                    <div class="mb-4">
                        <p class="card-text text-muted"><?= Html::encode($product->product_description) ?></p>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-6">
                            <div class="p-3 bg-light rounded">
                                <div class="text-muted small mb-1">Quantity</div>
                                <div class="fw-bold"><?= Html::encode($product->product_quantity) ?></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 bg-light rounded">
                                <div class="text-muted small mb-1">Price</div>
                                <div class="fw-bold">$<?= Html::encode(number_format($product->product_price, 2)) ?></div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-end gap-2">
                        <?= Html::a('<i class="fa-solid fa-pen-to-square me-2"></i>Update', 
                            ['update', 'id' => $product->id], 
                            ['class' => 'btn btn-primary']
                        ) ?>
                        <?= Html::a('<i class="fa-solid fa-trash me-2"></i>Delete', 
                            ['delete', 'id' => $product->id], 
                            [
                                'class' => 'btn btn-outline-danger',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this product?',
                                    'method' => 'post',
                                ],
                            ]
                        ) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add this CSS to your stylesheet -->
<style>
.card {
    border: none;
    transition: transform 0.2s;
}

.card:hover {
    transform: translateY(-2px);
}

.object-fit-cover {
    object-fit: cover;
}

.bg-light {
    background-color: #f8f9fa !important;
}

.btn {
    padding: 0.5rem 1.5rem;
    font-weight: 500;
}

.btn-outline-danger {
    border-width: 2px;
}

.btn-outline-danger:hover {
    background-color: #dc3545;
    color: white;
}
</style>