<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;


class Login extends Model
{
    public $email;
    public $password;
 
    
    public function rules()
    {
        return [
    
            [['email', 'password'], 'required'],
            ['password', 'validatePassword'],
        ];
    }

    
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Пароль чи email не знайденно !');
            }
        }
    }
    
    
    public function getUser()
    {
     return User::findOne(['email'=>$this->email]);
    }




   
}


  
     
   
    
