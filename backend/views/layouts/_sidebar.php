<?php
use yii\bootstrap5\Nav;
?>

<div class="sidebar-content p-3">
    <?php
    $menuItems = [
        [
            'label' => '<i class="fa-solid fa-cart-shopping fa-md"></i> <span class="ms-2">Products</span>', 
            'url' => ['product/index'],
            'linkOptions' => ['class' => 'nav-link py-2 text-secondary-emphasis']
        ],
        [
            'label' => '<i class="fa-solid fa-tag"></i> <span class="ms-2">Categories</span>', 
            'url' => ['product-category/index'],
            'linkOptions' => ['class' => 'nav-link py-2 text-secondary-emphasis']
        ],
        [
            'label' => '<i class="fa-solid fa-truck fa-md"></i> <span class="ms-2">Orders</span>', 
            'url' => ['order/index'],
            'linkOptions' => ['class' => 'nav-link py-2 text-secondary-emphasis']
        ],
        // Add more menu items here
    ];
    
    echo Nav::widget([
        'options' => ['class' => 'nav flex-column gap-1'],
        'encodeLabels' => false,
        'items' => $menuItems,
    ]);
    ?>
</div>
