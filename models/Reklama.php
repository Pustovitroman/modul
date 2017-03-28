<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\base\Model;
use app\models\NewsForm;
use yii\web\IdentityInterface;


class Reklama extends ActiveRecord
{
    
    
	public static function tableName()
	{
        	return 'Reklama';
        }
	
 	public function rules()
  	  {
   	 return [
        
        [['name', 'price', 'url' ], 'required'],
         [['name', 'price', 'url'], 'string'],
        
        
    ];
    }

	


}
  
  	
    

