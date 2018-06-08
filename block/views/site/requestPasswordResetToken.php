<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = '重置账户密码';
?>
<div class="col-md-6">
    <div class="signin-info">
        <div class="klogo"></div>
        <ul style="margin-left: 10px;">
            <li><i class="fa fa-arrow-circle-o-right mr5"></i> 请验证身份</li>
            <li><i class="fa fa-arrow-circle-o-right mr5"></i> 无法获取验证邮件，请联系系统管理员</li>
        </ul>
    </div><!-- signin0-info -->
</div><!-- col-sm-7 -->
<div class="col-md-6">
    <?php $form = ActiveForm::begin(['id' => 'request-password-reset']); ?>  <!---->

                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'verifyCode')->widget(\yii\captcha\Captcha::className(),['options'=>['placeholder' => '验证码', 'class' => 'form-control']]) ?>
                <div class="form-group">
                    <?= Html::submitButton('发送', ['class' => 'btn btn-primary']) ?>
                </div>

    <?php ActiveForm::end(); ?>
</div><!-- col-sm-5 -->
