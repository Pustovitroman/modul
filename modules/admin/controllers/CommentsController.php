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
use app\models\Comments;
use yii\data\Pagination;



class CommentsController extends Controller
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
        
    $news=Comments::find()->where('status=0');
    $pagination = new Pagination([
    'defaultPageSize' => 5,
    'totalCount' => $news->count(),
    ]);
    $post = $news->orderBy('id')
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();
        
     $com=Comments::find()->where('status=1');
    $pag = new Pagination([
    'defaultPageSize' => 5,
    'totalCount' => $com->count(),
    ]);
    $post2 = $com->orderBy('id')
        ->offset($pag->offset)
        ->limit($pag->limit)
        ->all();    
     
        
    return $this->render('index', [
        'post' => $post,
        'pagination' => $pagination,
        'post2' => $post2,
        'pag' => $pag,


    ]);
    }
	
	
	
	 public function actionOk($id)
    {
     
        if (isset($id)) {
        $model=Comments::findOne($id);
        $model->updateCounters(['status' => - 1]);
            
                return $this->redirect('index');
           
        } else {
            return $this->refresh ();
        }
     	
    
    
    }






    
       public function actionCreate()
    {
         $model = new Comments();
    
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
    $model = Comments::findOne($id);
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
        $model = Comments::findOne($id);
        
            if ($model->delete()) {
                return $this->redirect('index');
            }
        } else {
            return $this->refresh ();
        }
     	}
    
  

        
        
        
}
    
    
