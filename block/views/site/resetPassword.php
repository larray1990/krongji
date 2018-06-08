<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = '重置密码！';
?>
<div class="col-md-6">
    <div class="signin-info">
        <div class="klogo"></div>
        <ul style="margin-left: 10px;">
            <li><i class="fa fa-arrow-circle-o-right mr5"></i> 请重置你的密码！</li>
            <li><i class="fa fa-arrow-circle-o-right mr5"></i> 请认真保管好密码！</li>
        </ul>
    </div><!-- signin0-info -->
</div><!-- col-sm-7 -->
<div class="col-md-6">
        <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

            <?= $form->field($model, 'password')->passwordInput(['autofocus' => true,'placeholder'=>"请输入新密码！",'class'=>'form-control pword'])->label(false); ?>

            <div class="form-group">
                <?= Html::submitButton('重置', ['class' => 'btn btn-primary']) ?>
            </div>

        <?php ActiveForm::end(); ?>
</div><!-- col-sm-5 -->
