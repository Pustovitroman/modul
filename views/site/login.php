<?php
namespace app\controllers\SiteControlLers;
namespace app\models\RegistryForm;



use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

use yii\helpers\Html;
use yii\db\ActiveRecord;
use yii\widgets\ActiveForm;
use yii\base\login;
use app\models\User;
use yii\validators;





?>




  
<div class="post">
<h1>Вхід в акаунт</h1>
<?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

       
        <div class="form-group">
            
                <?= Html::submitButton('Login', ['class' => 'btn btn-success', 'name' => 'login-button']) ?>
           
        </div>

    <?php ActiveForm::end(); ?><br>



    
</div>
