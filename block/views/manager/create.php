<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Region;

/* @var $this yii\web\View */
/* @var $model common\models\Adminuser */

$this->title = '新增管理员';
$this->params['breadcrumbs'][] = ['label' => '系统管理', 'url' => ['department/index'],'template'=>'<li><i class="fa fa-home"></i> {link} <span></span></li>'];
$this->params['breadcrumbs'][] = ['label' => '管理员列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <nav class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-md-10">
                        <h4><?= Html::encode($this->title) ?></h4>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <?php global  $levelData; ?>
    <div class="panel-body">
        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'username')->textInput(['maxlength' => true])->label('用户名') ?>
        <?= $form->field($model, 'nickname')->textInput(['maxlength' => true])->label('昵称') ?>
        <?= $form->field($model, 'email')->textInput(['maxlength' => true])->label('邮箱') ?>
        <?= $form->field($model, 'password_hash')->passwordInput(['maxlength' => true])->label('密码') ?>
        <?= $form->field($model, 'password_reset_token')->passwordInput(['maxlength' => true])->label('重置密码') ?>
        <?= $form->field($model, 'level')->dropDownList(['9'=>'省级账户','8'=>'市级账户','7'=>'区级账户','3'=>'合作社账户','2'=>'大户账户'], ['prompt'=>'请选择类型...','class'=>'form-control','style'=>'height:40px']); ?>
        <?//= $form->field($model, 'bid')->dropDownList(\common\models\SysDepartment::, ['prompt'=>'请选择类型...','class'=>'form-control','style'=>'height:40px']); ?>
        <?= $form->field($model,'province')->dropDownList(Region::getRegion(),
            [
                'prompt'=>'--请选择省--',
                'onchange'=>'
            $(".form-group.field-signupform-district").hide();
            $.post("'.\yii\helpers\Url::toRoute(['get-region']).'&level=0&parent_id="+$(this).val(),function(data){
                $("select#signupform-city").html(data);
            });',
            ]) ?>

        <?= $form->field($model, 'city')->dropDownList(Region::getRegion($model->province),
            [
                'prompt'=>'--请选择市--',
                'onchange'=>'
                $(".form-group.field-signupform-district").show();
                $.post("'.\yii\helpers\Url::toRoute(['get-region']).'&level=1&parent_id="+$(this).val(),function(data){
                    $("select#signupform-district").html(data);
                });',
            ]) ?>
        <?= $form->field($model, 'district')->dropDownList(Region::getRegion($model->city),
            [
                'prompt'=>'--请选择区--',
            ]) ?>
        <div class="form-group">
            <?= Html::submitButton('新增', ['class' =>'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
