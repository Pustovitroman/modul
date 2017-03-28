<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\base\Model;
use app\models\CommentForm;
use yii\web\IdentityInterface;


class Comments extends ActiveRecord
{
    	
   
	public static function tableName()
	{
        	return 'Comments';
        }
	
	public function rules()
    {
    return [
        
        [['Users_name', 'comments_text' ], 'required'],
         [['Users_name', 'comments_text'  ], 'string'],
        
        
    ];
    }
    	
    	
}
  
  	
    

