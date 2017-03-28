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
use app\components\MyWidget;

 

?>




  

  <div class="post" id='news'>
        <?php foreach ($model as $row){ ?>
		<div id="top_reklama" ><center><img  width="255"  src="<?=$row['images']?>" />
		<div id="reklama" style="color:#010101"><?=$row['name']?></div>
                <div style="color:#428bca" id="price"><?=$row['price']?></div>
 		<div style="color:#5cb85c"><?=$row['url']?></div></center></div

        <?php } ?>

       
    </div>
    

