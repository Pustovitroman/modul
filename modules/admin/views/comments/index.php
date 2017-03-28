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
use app\models\Comments;
use yii\widgets\LinkPager;


?>
<style>
table,td,tr,th {     
        padding: 7px;
        border: 1px solid #888;}
   
table {width: 100%;}
    
</style>

<h3>Список опублікованих коментарів</h3>
<div class="table">
  <a href="<? echo Url::to(['comments/create', ]) ?>"><button type="button" class="btn btn-primary">Додати додати коментар</button></a><br>
 <br>
  
<table>
    <tr>
        <th>ID</th>
        <th>Користувач</th>
        <th>Текст</th>
        
        <th>Рейтинг</th>
        <th></th>
    </tr>
    <?php foreach ($post as $row) {  ?>
        <tr>
            <td><?=$row['id']?></td>
             <td><?=$row['Users_name']?></td>
            <td><?=$row['comments_text']?></td>
           
          
            
            <td><?=$row['rating']?></td>
           
            
        <td>  <a href="<? echo Url::to(['comments/update', 'id' => $row['id']]) ?>"> <button type="button" class="glyphicon glyphicon-pencil"></button></a>  <a href="<? echo Url::to(['comments/delete', 'id' => $row['id']]) ?>" data-method="post" onclick="return confirm('Ви дійсно хочете видалити?')" ><button type="button" class="glyphicon glyphicon-trash"></button></a></td>
        
       
        
        
        
        </tr>
    <?php } ?>
    
    
</table>
    <?= LinkPager::widget(['pagination' => $pagination]) ?>
</div>



<div class="table">
  <h3>Список не активних коментарів (категорія "Політика") </h3><br>
 <br>
  
<table>
    <tr>
        <th>ID</th>
        <th>Користувач</th>
        <th>Текст</th>
        <th>Опублікувати</th>
        <th>Рейтинг</th>
        <th></th>
        <th></th>
    </tr>
    <?php foreach ($post2 as $row) {  ?>
        <tr>
            <td><?=$row['id']?></td>
             <td><?=$row['Users_name']?></td>
            <td><?=$row['comments_text']?></td>
           
          
            <td>
             <center><a href="<? echo Url::to(['comments/ok', 'id' => $row['id']]) ?>" data-method="post"  ><button type="button" class="glyphicon glyphicon-off"></button></a></center>
            
            
            </td>
            <td><?=$row['rating']?></td>
           
            
        <td>  <a href="<? echo Url::to(['news/update', 'id' => $row['id']]) ?>"> <button type="button" class="glyphicon glyphicon-pencil"></button></a> </td>
        
        <td>
                <a href="<? echo Url::to(['news/delete', 'id' => $row['id']]) ?>" data-method="post" onclick="return confirm('Ви дійсно хочете видалити?')" ><button type="button" class="glyphicon glyphicon-trash"></button></a>
            </td> 
        
        
        
        </tr>
    <?php } ?>
    
    
</table>
    
</div>



