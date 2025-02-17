<?php


use webvimark\modules\UserManagement\components\GhostMenu;
use webvimark\modules\UserManagement\UserManagementModule;
?>

<div class="sidebar-content p-3">
    <?php
    echo GhostMenu::widget([
        'encodeLabels' => false,
        'activateParents' => true,
        'options' => ['class' => 'nav flex-column nav-pills gap-2'], // Added gap between items
        'items' => [
            [
                'label' => '<i class="fa-solid fa-cart-shopping fa-md"></i> <span class="ms-2">Products</span>',
                'url' => ['product/index'],
                'linkOptions' => [
                    'class' => 'nav-link text-secondary-emphasis d-flex align-items-center py-3 rounded-3 hover-shadow'
                ],
                'options' => ['class' => 'nav-item']
            ],
            [
                'label' => '<i class="fa-solid fa-tag"></i> <span class="ms-2">Categories</span>',
                'url' => ['product-category/index'],
                'linkOptions' => [
                    'class' => 'nav-link text-secondary-emphasis d-flex align-items-center py-3 rounded-3 hover-shadow'
                ],
                'options' => ['class' => 'nav-item']
            ],
            [
                'label' => '<i class="fa-solid fa-truck fa-md"></i> <span class="ms-2">Orders</span>',
                'url' => ['order/index'],
                'linkOptions' => [
                    'class' => 'nav-link text-secondary-emphasis d-flex align-items-center py-3 rounded-3 hover-shadow'
                ],
                'options' => ['class' => 'nav-item']
            ],

            // User Management Section
            [
                'label' => '<div class="border-top my-3"></div><small class="text-uppercase fw-bold text-muted mb-2 d-block">User Management</small>',
                'url' => null,
                'options' => ['class' => 'nav-item']
            ],
            [
                'label' => '<i class="fa fa-users"></i> <span class="ms-2">' . UserManagementModule::t('back', 'Users') . '</span>',
                'url' => ['/user-management/user/index'],
                'linkOptions' => [
                    'class' => 'nav-link text-secondary-emphasis d-flex align-items-center py-3 rounded-3 hover-shadow'
                ],
                'options' => ['class' => 'nav-item']
            ],
            [
                'label' => '<i class="fa fa-user-shield"></i> <span class="ms-2">' . UserManagementModule::t('back', 'Roles') . '</span>',
                'url' => ['/user-management/role/index'],
                'linkOptions' => [
                    'class' => 'nav-link text-secondary-emphasis d-flex align-items-center py-3 rounded-3 hover-shadow'
                ],
                'options' => ['class' => 'nav-item']
            ],
            [
                'label' => '<i class="fa fa-lock"></i> <span class="ms-2">' . UserManagementModule::t('back', 'Permissions') . '</span>',
                'url' => ['/user-management/permission/index'],
                'linkOptions' => [
                    'class' => 'nav-link text-secondary-emphasis d-flex align-items-center py-3 rounded-3 hover-shadow text-decoration-none'
                ],
                'options' => ['class' => 'nav-item text-decoration-none']
            ],
            [
                'label' => '<i class="fa fa-layer-group"></i> <span class="ms-2">' . UserManagementModule::t('back', 'Permission groups') . '</span>',
                'url' => ['/user-management/auth-item-group/index'],
                'linkOptions' => [
                    'class' => 'nav-link text-secondary-emphasis d-flex align-items-center py-3 rounded-3 hover-shadow'
                ],
                'options' => ['class' => 'nav-item']
            ],
        ],
    ]);
    ?>
</div>

<style>
.hover-shadow {
    transition: all 0.3s ease;
}
.hover-shadow:hover {
    background-color: rgba(var(--bs-secondary-rgb), 0.1);
    transform: translateX(5px);
}
.nav-link.active {
    background-color: var(--bs-primary);
    color: white !important;
}
</style>