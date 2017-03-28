<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\base\Model;

use app\models\Comments;
use yii\validators;


    class CommentForm extends Model
{
    
  
  public $comments_text;
    
   public function rules()
    {
    return [
        
        [['comments_text' ], 'required']
         
    ];
    }
   
   
   
     public function saveComment($id)
    {
      	
        $Comments = new Comments;
   
        $Comments->Users_name=Yii::$app->user->identity->name;
        $Comments->comments_text=$this->comments_text;
        $Comments->News_id = $id;
        $Comments->status = 0;
        $Comments->rating = 0;
        return $Comments->save();
    }
   
   
	
 
    
}
