<?php

namespace app\modules\admin\controllers;
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
use app\models\Categorys;
use yii\data\Pagination;



class CategorysController extends Controller
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

    
    public function actionIndex()
    {
        
    $news=Categorys::find();
    $pagination = new Pagination([
    'defaultPageSize' => 5,
    'totalCount' => $news->count(),
    ]);
    $post = $news->orderBy('id')
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();
    return $this->render('index', [
        'post' => $post,
        'pagination' => $pagination,

    ]);
    }

    
       public function actionCreate()
    {
         $model = new Categorys();
    
    if( $model->Load(Yii::$app->request->post()) ) {
       
       if($model->validate()&&$model->save() ){
        Yii::$app->session->setFlash('key','Дані переданні');
        return $this->refresh ();
    } else {
         Yii::$app->session->setFlash('key2','Помилка');
    }}
       return $this->render('create',['model'=>$model]);
       
    }

 	
   
        public function actionUpdate($id)
{
    $model = Categorys::findOne($id);
    $model->load(Yii::$app->request->post());

    if(Yii::$app->request->isPost){
        
        if ($model->validate() && $model->save()) {

            return $this->redirect('index');
        }
    }
    return $this->render('update', [
        'model' => $model,
    ]);
}
    
    public function actionDelete($id = false)
     	{
        if (isset($id)) {
        $model = Categorys::findOne($id);
        
            if ($model->delete()) {
                return $this->redirect('index');
            }
        } else {
            return $this->refresh ();
        }
     	}
    
  

        
        
        
}
    
    
