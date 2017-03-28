<?php


use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\base\Model;

use yii\helpers\Html;
use yii\db\ActiveRecord;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\News;
use yii\widgets\LinkPager;


?>
<style>
table,td,tr,th {     
        padding: 7px;
        border: 1px solid #888;}
   
table {width: 100%;}
    
</style>

<h3>Список новин</h3>
<div class="table">
  <a href="<? echo Url::to(['news/create', ]) ?>"><button type="button" class="btn btn-primary">Додати новину</button></a><br>
  <br>
  
<table>
    <tr>
        <th>ID</th>
        <th>Дата</th>
        <th>Назва</th>
        
      
        <th>Теги</th>
        
        <th></th>
        <th></th>
    </tr>
    <?php foreach ($post as $row) {  ?>
        <tr>
            <td><?=$row['id']?></td>
             <td><?=$row['data']?></td>
            <td><?=$row['title']?></td>
           
          
            <td><?=$row['tag']?></td>
           
            
        <td>  <a href="<? echo Url::to(['news/update', 'id' => $row['id']]) ?>"> <button type="button" class="glyphicon glyphicon-pencil"></button></a> </td>
        
        <td>
                <a href="<? echo Url::to(['news/delete', 'id' => $row['id']]) ?>" data-method="post" onclick="return confirm('Ви дійсно хочете видалити?')" ><button type="button" class="glyphicon glyphicon-trash"></button></a>
            </td> 
        
        
        
        </tr>
    <?php } ?>
    
    
</table>
    <?= LinkPager::widget(['pagination' => $pagination]) ?>
</div>



