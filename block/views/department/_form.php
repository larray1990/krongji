<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Region;

/* @var $this yii\web\View */
/* @var $model common\models\SysDepartment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sys-department-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'dname')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'info')->textarea(['maxlength' => true]) ?>
    <?= $form->field($model, 'map_key')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'cid')->dropDownList($list) ?>
    <!--<?/*= $form->field($model, 'did')->textInput() */?>
        <?/*= $form->field($model, 'eid')->textInput() */?>-->
    <?= $form->field($model, 'level')->dropDownList(['9'=>'省级账户','8'=>'市级账户','7'=>'区级账户','3'=>'合作社账户','2'=>'大户账户'], ['prompt'=>'请选择类型...','class'=>'form-control','style'=>'height:40px']); ?>
    <?= $form->field($model,'province')->dropDownList(Region::getRegion(),
        [
            'prompt'=>'--请选择省--',
            'onchange'=>'
            $(".form-group.field-sysdepartment-district").hide();
            $.post("'.\yii\helpers\Url::toRoute(['get-region']).'&level=0&parent_id="+$(this).val(),function(data){
                $("select#sysdepartment-city").html(data);
            });',
        ]) ?>

    <?= $form->field($model, 'city')->dropDownList(Region::getRegion($model->province),
        [
            'prompt'=>'--请选择市--',
            'onchange'=>'
                $(".form-group.field-sysdepartment-district").show();
                $.post("'.\yii\helpers\Url::toRoute(['get-region']).'&level=1&parent_id="+$(this).val(),function(data){
                    $("select#sysdepartment-district").html(data);
                });',
        ]) ?>
    <?= $form->field($model, 'district')->dropDownList(Region::getRegion($model->city),
        [
            'prompt'=>'--请选择区--',
        ]) ?>
    <div class="form-group">
        <?= Html::submitButton('更新', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
