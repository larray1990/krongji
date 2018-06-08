<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Region;

/* @var $this yii\web\View */
/* @var $model common\models\Adminuser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sysuser-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    <?//= $form->field($model, 'id')->textInput() ?>-->
    <?= $form->field($model, 'username')->textInput(['maxlength' => true])->label('用户名') ?>
    <?= $form->field($model, 'nickname')->textInput(['maxlength' => true])->label('昵称') ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true])->label('邮箱') ?>
    <?= $form->field($model, 'level')->dropDownList(['9'=>'省级账户','8'=>'市级账户','7'=>'区级账户','3'=>'合作社账户','2'=>'大户账户'], ['prompt'=>'请选择类型...','class'=>'form-control','style'=>'height:40px']); ?>
    <?= $form->field($model,'province')->dropDownList(Region::getRegion(),
        [
            'prompt'=>'--请选择省--',
            'onchange'=>'
            $(".form-group.field-sysuser-district").hide();
            $.post("'.\yii\helpers\Url::toRoute(['get-region']).'&level=0&parent_id="+$(this).val(),function(data){
                $("select#sysuser-city").html(data);
            });',
        ]) ?>

    <?= $form->field($model, 'city')->dropDownList(Region::getRegion($model->province),
        [
            'prompt'=>'--请选择市--',
            'onchange'=>'
                $(".form-group.field-sysuser-district").show();
                $.post("'.\yii\helpers\Url::toRoute(['get-region']).'&level=1&parent_id="+$(this).val(),function(data){
                    $("select#sysuser-district").html(data);
                });',
        ]) ?>
    <?= $form->field($model, 'district')->dropDownList(Region::getRegion($model->city),
        [
            'prompt'=>'--请选择区--',
        ]) ?>
<!--    <?//= $form->field($model, 'profile')->textarea(['rows' => 6]) ?>-->

   <!-- <?/*= $form->field($model, 'auth_key')->textInput(['maxlength' => true])->label('权密钥') */?>

    <?/*= $form->field($model, 'password_hash')->passwordInput(['maxlength' => true])->label('密码') */?>

    <?/*= $form->field($model, 'password_reset_token')->passwordInput(['maxlength' => true])->label('重置密码') */?>-->


    <!--    <?//= $form->field($model, 'password')->passwordInput(['maxlength' => true])->label('密码') ?>-->
<!--    <?//= $form->field($model, 'created_at')->textInput()->label('创建时间') ?>-->

<!--   <?//= $form->field($model, 'updated_at')->textInput()->label('更新时间') ?> -->

    <div class="form-group">
        <?= Html::submitButton('更新', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
