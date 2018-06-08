<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SysEngine */

$this->title = '新增农机机具';
$this->params['breadcrumbs'][] = ['label' => '系统管理', 'url' => ['department/index'],'template'=>'<li><i class="fa fa-home"></i> {link} <span></span></li>'];
$this->params['breadcrumbs'][] = ['label' => '农机机具列表', 'url' => ['index']];
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
        <?= $form->field($model, 'tool_num')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'format')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'factor')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'housemaster')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'ability')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'created_at')->textInput() ?>
        <?= $form->field($model, 'updated_at')->textInput() ?>
        <div class="form-group">
            <?= Html::submitButton('新增', ['class' =>'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
