<?php

use Yii;
use yii\helpers\Html;
use yii\db\ActiveRecord;
use yii\widgets\ActiveForm;
use app\models\Subscrib;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\controllers\SubscribController;
use app\models\User;
use app\models\Reklama;
use app\components\MyWidget;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    




    <div class="wrap">



        <nav class="navbar  navbar-fixed-top navbar-custom navbar-default " >
            <div class="container-fluid" style="color:#000000;font-size: 1.2em;">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">Сайт новин</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/">Головна</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" >Економіка </a>
                            <ul class="dropdown-menu">
                                <li><a href="/economy">Економіка</a></li>
                                
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Політика</a>
                            <ul class="dropdown-menu">
                                <li><a href="/politics">Новини Політики</a></li>
                                
                                
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Спорт</a>
                            <ul class="dropdown-menu">
                                <li><a href="/sport">Новини Спорту</a></li>
                               
                            </ul>
                        </li>
                        <li class="dropdown">
                                        <a tabindex="-1" class="dropdown-toggle" data-toggle="dropdown" href="#">Аналітика
                                        </a>
                                        <ul class="dropdown-menu">
                                            
                                            <li class="dropdown-submenu">
                                                <a tabindex="-1" href="/myanalitic">Аналітика</a>
                                                <ul class="dropdown-menu">
                                                    <li><a tabindex="-1" href="#">Second level</a></li>
                                                    <li><a tabindex="-1" href="#">Second level</a></li>
                                                    
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                        
                    </ul>
                    <form class="navbar-form navbar-left">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Пошук">
                        </div>
                        <button type="submit" class="btn btn-default">Пошук</button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                   <?php if(Yii::$app->user->isGuest):?>
                   <li><a href="http://study.zabiznes.com/registry"><span class="glyphicon glyphicon-user"></span>&nbspРеєстрація</a></li>
                   <li><a href="http://study.zabiznes.com/login"><span class="glyphicon glyphicon-log-in"></span>&nbsp Вхід</a></li>
                   <?php else: ?>
                   
	              <?= Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Вихід (' . Yii::$app->user->identity->name . ')',
                    ['class' => 'btn btn-success logout']
                )
                . Html::endForm()?>    
                   
                   <?php endif; ?>
                    
                    </ul>
                </div>
            </div>
        </nav>

			
			
			
			




<div id="form" class="mypanel">
<button style="float: right;" type="button" id="close" class="glyphicon glyphicon-remove"></button>
<h1>Підписатись на новини</h1>
<?php 
$model = new Subscrib();
$form = ActiveForm::begin([
            'method' => 'post',
            'action' => ['subscrib/create'],
        ]) ?>
        

            <?= $form->field($model, 'name' )->label ('Як Вас звати?')?>
            <?= $form->field($model, 'email')->label ('Куди присилать') ?>
             <?= Html::submitButton ('Підписатись на новини',['class'=>'btn btn-success'])?> 

      
<?php ActiveForm::end() ?>

</div>
        
    
        <div class="container" >
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            
            
            <div class="wrap">
                <div class="col-md-3">                
<?= MyWidget::widget() ?>
                </div>
                <div class="col-md-6">
                    <?= $content ?>
                </div>
                <div class="col-md-3">
                
               <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="http://lorempixel.com/output/business-q-c-260-150-9.jpg" >
    <div class="carousel-caption">
        <br>
        <a href="/pages?id=19"><h3>Як зміняться комунальні платежі</h3></a>
      </div>
    </div>

    <div class="item">
      <img src="http://lorempixel.com/output/animals-q-c-260-150-7.jpg" >
    <div class="carousel-caption">
        <br>
       <a href="/pages?id=19"><h3>Як зміняться комунальні платежі</h3></a>
      </div>
    </div>

    <div class="item">
      <img src="http://lorempixel.com/output/nature-q-c-260-150-6.jpg" >
    <div class="carousel-caption">
        <br>
        <a href="/pages?id=19"><h3>Як зміняться комунальні платежі</h3></a>
      </div>
    </div>

    <div class="item">
      <a href="/pages/?id=12"><img src="http://lorempixel.com/output/transport-q-c-260-150-1.jpg" alt="Flower"></a>
    <div class="carousel-caption">
       <br>
        <a href="/pages?id=19"><h3>Як зміняться комунальні платежі</h3></a>
      </div>
    
    
    </div>
  </div>

  
</div>
<br>   

</div>
                
               
                
                
                
                  <?= MyWidget::widget() ?>
                </div>
            </div>
        </div>
    </div>


    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; News Maker <?= date('Y') ?></p>


        </div>
        
        
        
        
        
    </footer>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>