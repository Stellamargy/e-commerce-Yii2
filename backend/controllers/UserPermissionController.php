<?php
namespace backend\controllers;
use webvimark\modules\UserManagement\controllers\UserPermissionController as BaseController;

class UserPermissionController extends BaseController
{
    public function init()
    {
        parent::init();
        $this->viewPath = '@backend/views/user-management/user-permission';
    }

    

}