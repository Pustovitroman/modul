<?php
namespace app\controllers\SiteControlLers;


use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\base\Model;

use yii\helpers\Html;
use yii\db\ActiveRecord;
use yii\widgets\ActiveForm;
use app\models\News;
use yii\widgets\LinkPager;
use app\components\MyWidget;

?>



<div id='news'>
  <h3>Економіка</h3>
   <?php foreach ($economy_news as $row){ ?>
		<a style="color: #337ab7;font-size: 1 em;" id="<?=$row['id']?>" href="/pages?id=<?=$row['id']?>"><?=$row['title']?></a><br><br>
           
   <?php } ?>
   
   <h3>Політика</h3>
   <?php foreach ($politics_news as $row){ ?>
		<a style="color: #337ab7;font-size: 1  em;" id="<?=$row['id']?>" href="/pages?id=<?=$row['id']?>"><?=$row['title']?></a><br><br>
           
   <?php } ?>
   
   <h3>Спорт</h3>
   <?php foreach ($sport_news as $row){ ?>
		<a style="color: #337ab7;font-size: 1  em;" id="<?=$row['id']?>" href="/pages?id=<?=$row['id']?>"><?=$row['title']?></a><br><br>
           
   <?php } ?>







</div>   


