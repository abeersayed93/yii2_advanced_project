<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm ;
?>
 <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login']); ?>

                <?= $form->field($model, 'password')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'repassword')->textInput(['autofocus' => true]) ?>

            <div class="form-group">
                    <?= Html::submitButton('Check', ['class' => 'btn btn-primary', 'name' => 'check-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>


