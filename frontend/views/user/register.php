<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm ;
?>

<div class="signup">

    <p>Register</p>

    <div class="row">
        <div class="col-lg-5">
        
            <?php $form = ActiveForm::begin(['id' => 'form-register']); ?>

               <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
                
                <?= $form->field($model, 'repassword')->passwordInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'gender')->radioList(array('1'=>'Male', '0'=>'Female')) ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

