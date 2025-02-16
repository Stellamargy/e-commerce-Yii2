<?php
namespace common\models; 

use webvimark\modules\UserManagement\models\User as BaseUser;

class User extends BaseUser
{
    public function attributeLabels()
{
    return array_merge(parent::attributeLabels(), [
        'username' => 'username',
        
    ]);
}

}
