<?php

namespace app\controllers;

use yii\db\ActiveRecord;
use app\models\Category;
use app\models\ImageUpload;
use app\models\Tag;
use Yii;
use app\models\Article;
use app\models\ArticleSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\NewsForm;
use app\models\Subscrib;
use yii\data\Pagination;



class SubscribController extends Controller
{
    
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    
    
       public function actionCreate()
    {
         $model = new Subscrib();
    
    if( $model->Load(Yii::$app->request->post()) ) {
        
       if($model->validate()&&$model->save() ){
        
       return $this->redirect(['site/index']);
    } else {
         return $this->redirect(['site/index']);
    }}
      
      
       
    }

 	
   
        
}
    
    

    
    

    
   

