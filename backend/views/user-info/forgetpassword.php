<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'updatePassword';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'forgetpassword']); ?>

                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>
            
                <?= $form->field($model, 'repassword')->passwordInput() ?>

               

                <div class="form-group">
                    <?= Html::submitButton('update', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>


