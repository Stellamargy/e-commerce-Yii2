<?php
namespace backend\controllers;
use webvimark\modules\UserManagement\controllers\UserController as BaseController;

class UserManagementController extends BaseController
{
    public function init()
    {
        parent::init();
        $this->viewPath = '@backend/views/user-management/user';
    }

    

}