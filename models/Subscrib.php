<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\base\Model;
use app\models\NewsForm;
use yii\web\IdentityInterface;


class Subscrib extends ActiveRecord
{
    
    	
    	
    	
   
	public static function tableName()
	{
        	return 'Subscrib';
        }
	
 public function rules()
    {
    return [
        
       [['name', 'email' ], 'required'],
        ['email', 'email'],
        
    ];
    }

	

}
  
  	
    

