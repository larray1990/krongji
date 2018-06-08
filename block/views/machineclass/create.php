<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SysMachineclass */

$this->title = '新增农机设备';
$this->params['breadcrumbs'][] = ['label' => '系统管理', 'url' => ['machineclass/index'],'template'=>'<li><i class="fa fa-home"></i> {link} <span></span></li>'];
$this->params['breadcrumbs'][] = ['label' => '农机设备列表', 'url' => ['index']];
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
        <?= $form->field($model, 'mc_num')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'dname')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'parent_id')->textInput() ?>

        <?= $form->field($model, 'parent_id_path')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'version')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'householder')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'year')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'fault')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'level')->textInput() ?>

        <?= $form->field($model, 'info')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'sort_order')->textInput() ?>

        <?= $form->field($model, 'cat_group')->textInput() ?>

        <?= $form->field($model, 'created_at')->textInput() ?>

        <?= $form->field($model, 'updated_at')->textInput() ?>
        <div class="form-group">
            <?= Html::submitButton('新增', ['class' =>'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>