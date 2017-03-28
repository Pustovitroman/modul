<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\base\Model;
use app\models\User;
use yii\validators;


    class Registry extends Model
{
    public $name;
    public $email;
    public $password;
  
    public function rules()
    {
    return [
         
        [['name', 'email', 'password', ], 'required'],
        ['email', 'email'],
        ['email', 'unique','targetClass'=>'app\models\User'],
        [['password'], 'string', 'max' => 10],
        
        
    ];
    }
     public function registry()
    {
      	
        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->hasPassword($this->password);
        
        return $user->save() ? $user : null;
    }
   
   
	
 
    
}
