<?php
namespace backend\controllers;
use webvimark\modules\UserManagement\controllers\AuthItemGroupController as BaseController;

class AuthItemGroupController extends BaseController
{
    public function init()
    {
        parent::init();
        $this->viewPath = '@backend/views/user-management/auth-item-group';
    }

    
}