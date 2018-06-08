<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Region;

/* @var $this yii\web\View */
/* @var $model common\models\SysDepartment */

$this->title = '新增部门';
$this->params['breadcrumbs'][] = ['label' => '系统管理', 'url' => ['department/index'],'template'=>'<li><i class="fa fa-home"></i> {link} <span></span></li>'];
$this->params['breadcrumbs'][] = ['label' => '农机部门列表', 'url' => ['index']];
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
    <div class="panel-body">
        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'dname')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'info')->textarea() ?>
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
        <!--<?/*= $form->field($model, 'created_at')->textInput() */?>
        <?/*= $form->field($model, 'updated_at')->textInput() */?>-->
        <div class="form-group">
            <?= Html::submitButton('新增', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
