<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\base\Model;
use app\models\News;
use yii\validators;
use yii\web\UploadedFile;


    class NewsForm extends Model
{
    public $title;
    public $text;
    public $data;
    public $image;
    public $tag;
    public $categorys_id;
   
    
  
    public function rules()
    {
    return [
        
        [['title', 'text',  ], 'required'],
         [['title', 'text',  ], 'string'],
         [['image'], 'file', 'extensions' => ['jpg','png'],'checkExtensionByMimeType'=>false], 
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
