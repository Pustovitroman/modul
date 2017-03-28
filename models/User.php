<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\base\Model;
use app\models\Registry;
use yii\web\IdentityInterface;


class User extends ActiveRecord implements IdentityInterface
{
    	
   
	public static function tableName()
	{
        	return 'Users';
        }
	
	public function hasPassword($password)
	{
        	$this->password =sha1($password);
        }
    	
    	public function validatePassword($password)
	{
        	return $this->password === sha1($password);
        }
	
	 
	
	


   
    public static function findIdentityByAccessToken($token, $type = null)
    {
        
    }

	 public function rules()
    {
        return [
            [['isAdmin'], 'integer'],
            [['name', 'email', 'password', ], 'string', 'max' => 255],
        ];
    }


 public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'isAdmin' => 'Is Admin',
           
        ];
    }




        public static function findIdentity($id)
    {
        return self::findOne($id);
    }
    
    
    
    public function getId()
    {
        return $this->id;
    }

    

    
    
    public function getAuthKey()
    {
        
    }

    
    
    public function validateAuthKey($authKey)
    {
       
    }
    
    public function getIsAdmin()
    {
         return $this->identity->isAdmin(); 
       
    }
    
    
    
    
}
  
  	
    

