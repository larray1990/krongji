<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SysDepartment */

$this->title = '更新 部门:'.$model->dname;
$this->params['breadcrumbs'][] = ['label' => '系统管理', 'url' => ['department/index'],'template'=>'<li><i class="fa fa-home"></i> {link} <span></span></li>'];
$this->params['breadcrumbs'][] = ['label' => '农机部门列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
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
        <?= $this->render('_form', [
            'model' => $model,
            'list' => $list,
        ]) ?>
    </div>
</div>
