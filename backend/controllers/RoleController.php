<?php
namespace backend\controllers;
use webvimark\modules\UserManagement\controllers\RoleController as BaseController;

class RoleController extends BaseController
{
    public function init()
    {
        parent::init();
        $this->viewPath = '@backend/views/user-management/role';
    }

    

}