<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = '账户登入';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-6">
    <div class="signin-info">
        <div class="klogo"></div>
        <ul style="margin-left: 10px;">
            <li><i class="fa fa-arrow-circle-o-right mr5"></i> 欢迎使用K183农机监控平台v1.0系统</li>
            <li><i class="fa fa-arrow-circle-o-right mr5"></i> 本系统为数据管理系统</li>
            <li><i class="fa fa-arrow-circle-o-right mr5"></i> 登入前请咨询系统管理员相关要求</li>
        </ul>
    </div><!-- signin0-info -->
</div><!-- col-sm-7 -->
<div class="col-md-6">
    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
    <h4 class="nomargin">用户登录</h4>
    <?= $form->field($model, 'username')->textInput(['autofocus' => true,'placeholder'=>"用户名",'class'=>'form-control uname'])->label(false); ?>
    <?= $form->field($model, 'password')->passwordInput(['placeholder'=>"密码",'class'=>'form-control pword'])->label(false); ?>
    <?= $form->field($model, 'rememberMe')->checkbox()->label('记住我') ?>
    <?= $form->field($model, 'verifyCode')->widget(\yii\captcha\Captcha::className(),['options'=>['placeholder' => '验证码', 'class' => 'form-control']])->label(false) ?>
    <button type="submit" class="btn btn-success btn-block">登 录</button>
    <div style="color:#999;margin:1em 0">
        <?= Html::a('忘记密码', ['site/request-password-reset']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div><!-- col-sm-5 -->

