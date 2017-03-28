<?php
namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;
use app\models\Reklama;




class MyWidget extends Widget
{
    
    public function init()
    {
        parent::init();
       
    }
   
   
    public function run()
    
    
       {
        $model = Reklama::find() -> limit(5) -> all();
        return $this -> render('my', ['model' => $model]);
    }
       
       
      
      
    
    
    
    
    
}