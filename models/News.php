<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\base\Model;
use app\models\NewsForm;
use yii\web\IdentityInterface;


class News extends ActiveRecord
{
    
    public $upload_image;
    
    		
    	
    	
   
	public static function tableName()
	{
        	return 'News';
        }
	
 public function rules()
    {
    return [
        
        [['title', 'text',  ], 'required'],
         [['title', 'text',  ], 'string'],
         [['image'], 'file', 'extensions' => ['jpg','png'],'checkExtensionByMimeType'=>false], 
         [['upload_image'], 'file', 'extensions' => 'png, jpg', 'skipOnEmpty' => true],
         [['categorys_id'], 'default', 'value' => '0'],
         [['data' ], 'date','format'=>'php:Y-m-d'],
         [['data' ], 'default','value'=>date('Y-m-d')],
        
    ];
    }

	public function createNews()
    {
      	
        $news = new News();
        $news->title=$this->title;
        $news->text=$this->text;
        $news->data=$this->data;
        $news->image=$this->image;
        $news->tag=$this->tag;
        $news->categorys_id=$this->categorys_id;
        
        return $news->save()? $news : null;
    }


}
  
  	
    

