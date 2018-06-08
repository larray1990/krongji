<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SysEngineSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sys-engine-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'dname') ?>

    <?= $form->field($model, 'tool_num') ?>

    <?= $form->field($model, 'format') ?>

    <?= $form->field($model, 'factor') ?>

    <?php // echo $form->field($model, 'housemaster') ?>

    <?php // echo $form->field($model, 'ability') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
