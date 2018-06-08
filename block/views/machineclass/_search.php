<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SysMachineclassSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sys-machineclass-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'mc_num') ?>

    <?= $form->field($model, 'dname') ?>

    <?= $form->field($model, 'parent_id') ?>

    <?= $form->field($model, 'parent_id_path') ?>

    <?php // echo $form->field($model, 'version') ?>

    <?php // echo $form->field($model, 'householder') ?>

    <?php // echo $form->field($model, 'year') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'fault') ?>

    <?php // echo $form->field($model, 'level') ?>

    <?php // echo $form->field($model, 'info') ?>

    <?php // echo $form->field($model, 'sort_order') ?>

    <?php // echo $form->field($model, 'cat_group') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
