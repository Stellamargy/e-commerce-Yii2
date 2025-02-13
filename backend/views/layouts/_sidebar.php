<?php
use yii\bootstrap5\Nav;
?>



<div class="sidebar bg-secondary-subtle p-3 mt-5 " >
    <?php
    $menuItems = [
        ['label' => '<i class="fa-solid fa-cart-shopping fa-md"></i> <span class="ms-2">Products</span>', 'url' => ['product/index'], 'linkOptions' => ['class' => 'text-secondary-emphasis d-flex justify-content-center align-items-center'],],
        ['label' => '<i class="fa-solid fa-truck fa-md"></i> <span class="ms-2">Orders</span>', 'url' => ['order/index'],'linkOptions' => ['class' => 'text-secondary-emphasis '] ],
        ['label' => '<i class="fa-solid fa-truck fa-md"></i> <span class="ms-2">Orders</span>', 'url' => ['order/index'],'linkOptions' => ['class' => 'text-secondary-emphasis'] ],
       

    ];
    
    echo Nav::widget([
        'options' => ['class' => 'nav flex-column'], // Fix alignment for sidebar
        'encodeLabels' => false, // Allow HTML icons
        'items' => $menuItems,
    ]);
    ?>
</div>
