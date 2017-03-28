<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;




?>


<div class="article-create">
<?php if(Yii::$app->session->hasFlash('key')): ?>

  	<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <?php  echo Yii::$app->session->getFlash('key'); ?>
</div> 
<?php endif;?>  
<?php if(Yii::$app->session->hasFlash('key2')): ?>

  	<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <?php  echo Yii::$app->session->getFlash('key2'); ?>
</div> 
<?php endif;?>
    <h1>Створити новину</h1>

    <div class="article-form">

    <?php $form = ActiveForm::begin((['options' => ['enctype' => 'multipart/form-data']])); ?>

    <?= $form->field($model,'title') ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'data'); ?>
    
    <?= $form->field($model, 'image')->fileInput();?>
    
    <?= $form->field($model, 'tag')->textInput() ?>
    
    <?=
   $form->field($model, 'categorys_id')
    ->dropDownList([
        '1' => 'Економіка',
        '2' => 'Політика',
        '3' => 'Спорт',
        '4' => 'Аналітика',
    ],
    [
        'prompt' => 'Выберите один вариант'
    ]);
   
   ?>
    
     <?= Html::submitButton ('Відправити',['class'=>'btn btn-success'])?>
    <?php ActiveForm::end(); ?>

<?php print_r($_POST) ?>

</div>

</div>
