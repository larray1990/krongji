<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SysLoguser */

$this->title = '新增日志';
$this->params['breadcrumbs'][] = ['label' => '系统日志', 'url' => ['index'],'template'=>'<li><i class="fa fa-home"></i> {link} <span></span></li>'];
$this->params['breadcrumbs'][] = ['label' => '系统日志', 'url' => ['index']];
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
        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'level')->textInput() ?>
        <?= $form->field($model, 'logdata')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'logip')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'errortext')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'uid')->textInput() ?>
        <div class="form-group">
            <?= Html::submitButton('新增', ['class' =>'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
