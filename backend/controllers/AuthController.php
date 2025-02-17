<?php
namespace backend\controllers;
use Yii;
use webvimark\modules\UserManagement\controllers\AuthController as BaseController;

class AuthController extends BaseController
{
    public function init()
    {
        parent::init();
        $this->viewPath = '@backend/views/user-management/auth';
    }


    public function actionLogout()
	{
		Yii::$app->user->logout();

		return $this->redirect('login');
	}
    
}