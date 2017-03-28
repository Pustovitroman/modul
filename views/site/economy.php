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


 

?>




  

  <div class="post" id='news' >
        <?php foreach ($post as $row){ ?>
		<a id="<?=$row['id']?>" href="/pages?id=<?=$row['id']?>"><?=$row['title']?></a><br><br>
           


        <?php } ?>

        <?= LinkPager::widget(['pagination' => $pagination]) ?>
    </div>
    

