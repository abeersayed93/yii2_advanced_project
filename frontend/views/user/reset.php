<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm ;
?>
<div class="reset">
   

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login']); ?>

                <?= $form->field($model, 'token')->textInput(['autofocus' => true]) ?>

            <div class="form-group">
                    <?= Html::submitButton('reset', ['class' => 'btn btn-primary', 'name' => 'check-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

