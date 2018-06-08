<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SysEngine */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sys-engine-form">

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
        <?= Html::submitButton('更新', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
