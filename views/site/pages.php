<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="site-about">
    <h1><?=$post['title']?></h1>
	<p><span class="glyphicon glyphicon-calendar"></span> <?=$post['data']?>&nbsp; <span class="glyphicon glyphicon-eye-open"></span> <?=$post['view']?> </p>
        <p>
       <img width="100%" height="auto" src="web/uploads/<?=$post['image']?>" 
    </p>
    
    <p>
        <?=$post['text']?>
    </p>


	


   <p>
        <?=$post['tag']?>
    </p>
   <br><br>
   <span style="font-size:25px;color:#337ab7">Коментарі:</span>
   <br><br>
     <div class="post" id='news' >
        <?php foreach ($comment as $row){ ?>
		
		
		<b><?=$row['Users_name']?></b>:<?=$row['comments_text']?>
		Рейтинг: <?=$row['rating']?>
		<button type="button" id="<?=$row['id']?>" class="glyphicon glyphicon-thumbs-up"></button>
           
<hr>

        <?php } ?>
     
     
   </div>
  
  
  
   <?php if (!Yii::$app->user->isGuest):?>
   <div>
   <?php $form = ActiveForm::begin (
   		['action'=>['site/comment','id'=>$post->id],
   		'options'=>['role'=>'form'],
   
   					]); ?> 			
   			
   
   				

        <?= $form->field($commentForm, 'comments_text')->textarea(['rows' => '6'])->label('Додати коментар')?>
        
        <?= Html::submitButton ('Додати коментар',['class'=>'btn btn-success'])?>
    <?php ActiveForm::end(); ?>
   
   </div>
   <?php endif;?>
    
   
    
</div>
