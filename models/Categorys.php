<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\base\Model;
use app\models\NewsForm;
use yii\web\IdentityInterface;


class Categorys extends ActiveRecord
{
    
    
    
    		
    	
    	
   
	public static function tableName()
	{
        	return 'Categorys';
        }
	
 	public function rules()
  	  {
   	 return
   	  [
        
        [['name'], 'required'],
         [['name'], 'string'],
       
    	];
   	 
   	 
   	 }

	

}
  
  	
    

