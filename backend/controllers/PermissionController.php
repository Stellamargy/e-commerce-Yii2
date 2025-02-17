<?php
namespace backend\controllers;
use webvimark\modules\UserManagement\controllers\PermissionController as BaseController;

class PermissionController extends BaseController
{
    public function init()
    {
        parent::init();
        $this->viewPath = '@backend/views/user-management/permission';
    }

    
}