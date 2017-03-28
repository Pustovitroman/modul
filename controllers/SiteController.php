<?php

namespace app\controllers;


use Yii;
use yii\base\Model;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Login;
use app\models\ContactForm;
use app\models\Registry;
use app\models\User;
use app\models\Reklama;
use app\models\News;
use app\models\CommentForm;
use app\models\Comments;
use yii\data\Pagination;


class SiteController extends Controller
{

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    
    
    public function actionIndex(){
    $economy=News::find()->where('categorys_id=1');
    $economy_news = $economy->orderBy('data')->limit('5')->all();
    $politics=News::find()->where('categorys_id=2');
    $politics_news = $politics->orderBy('data')->limit('5')->all();   
    $sport=News::find()->where('categorys_id=3');
    $sport_news = $sport->orderBy('data')->limit('5')->all();
    
    
    return $this->render('index', [
	    'economy_news' => $economy_news,
	    'politics_news' => $politics_news,
	    'sport_news' => $sport_news,
    
    ]);
    }

	
	
	
	
	public function actionLogout(){
        if(!Yii::$app->user->isGuest) {
        Yii::$app->user->logout();
        return $this->goHome();
        }
    }


    public function actionLogin()
    {
	if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
	
	$model = new Login();
	if (Yii::$app->request->post()) {
		$model->attributes=Yii::$app->request->post('Login');
		
		if($model->validate())
		{
		Yii::$app->user->login($model->getUser());
		return $this->goHome();
		}
	}
	return $this->render('login', ['model' => $model,]);
    }




    public function actionRegistry(){
    $model = new Registry();
    if( $model->Load(Yii::$app->request->post()) ) {
       if($model->validate()&&$model->registry() ){
        Yii::$app->session->setFlash('key','Дані переданні');
        return $this->refresh ();
    } else {
         Yii::$app->session->setFlash('key2','Помилка');
    }}
       return $this->render('registry',['model'=>$model]);
    }


    public function actionPolitics(){
    $news=News::find()->where('categorys_id=2');
    $pagination = new Pagination([
    'defaultPageSize' => 5,
    'totalCount' => $news->count(),
    ]);
    $post = $news->orderBy('view')
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();
    return $this->render('politics', [
        'post' => $post,
        'pagination' => $pagination,

    ]);
    }




	public function actionEconomy(){
    $news=News::find()->where('categorys_id=1');
    $pagination = new Pagination([
    'defaultPageSize' => 5,
    'totalCount' => $news->count(),
    ]);
    $post = $news->orderBy('view')
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();
   
    return $this->render('economy', [
        'post' => $post,
        'pagination' => $pagination,
   
    ]);
    }

	
	
	public function actionSport(){
    $news=News::find()->where('categorys_id=3');
    $pagination = new Pagination([
    'defaultPageSize' => 5,
    'totalCount' => $news->count(),
    ]);
    $post = $news->orderBy('view')
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();
    return $this->render('sport', [
        'post' => $post,
        'pagination' => $pagination,

    ]);
    }
    
    public function actionMyanalitic(){
    $news=News::find()->where('categorys_id=4');
    $pagination = new Pagination([
    'defaultPageSize' => 5,
    'totalCount' => $news->count(),
    ]);
    $post = $news->orderBy('view')
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();
       return $this->render('myanalitic', [
        'post' => $post,
        'pagination' => $pagination,

    ]);
    }
    
     public function actionSitebar1(){
    $news=Reklama::find()->where('id=1');;
    $pagination = new Pagination([
    'defaultPageSize' => 5,
    'totalCount' => $news->count(),
    ]);
    $sitebar1 = $news->orderBy('id')
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();
       return $this->render('sitebar1', [
        'sitebar1' => $sitebar1,
        'pagination' => $pagination,
        ]);
    }
    
    


	public function actionPages($id){
    	$id=Yii::$app->request->get();
    	$post = News::findOne($id);
    	
    	$comment = Comments::find()->where(['News_id' => $id,'status' =>0])->orderBy('rating')->limit(5) ->all();
   	$commentForm = new CommentForm();
   	
   	 return $this->render('pages', [
        'comment' => $comment,
        'post' => $post,
        'commentForm' => $commentForm,

    ]);
    }
	
	
	
	public function actionComment($id){
    
   	  	$model = new CommentForm();
   	
   		if(Yii::$app->request->isPost)
   		{
   		$model->load(Yii::$app->request->post());
   		if($model->saveComment($id))
   		{
   		 return $this->redirect(['site/pages','id'=>$id]);
   		}
   	
   	}
   	
   	
    }
	
	public function actionClick($id)
   	 {
     
		if (isset($id)) {
		$model=News::findOne($id);
		$model->updateCounters(['view' => 1]);
		return $this->redirect(['site/pages','id'=>$id]);
           
        } 
	}
	
	public function actionRating($id)
   	 {
     
		if (isset($id)) {
		$model=Comments::findOne($id);
		$model->updateCounters(['rating' => 1]);
		return true;
           
        } 
	}
	
	
	
	
	
	
	
}
