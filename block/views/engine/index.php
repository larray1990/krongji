<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SysEngineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '农机机具列表';
$this->params['breadcrumbs'][] = ['label' => '系统管理', 'url' => ['department/index'],'template'=>'<li><i class="fa fa-home"></i> {link} <span></span></li>'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <nav class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-md-10">
                        <h4><?= Html::encode($this->title) ?></h4>
                        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                    </div>
                    <div class="col-md-2">
                        <?= Html::a('新增农机机具', ['create'], ['class' => 'btn btn-success']) ?>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="panel-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
//                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'dname',
                'tool_num',
                'format',
                'factor',
                //'housemaster',
                //'ability',
                //'created_at',
                //'updated_at',

                ['class' => 'yii\grid\ActionColumn',
                    'header' => '操作',
                    'headerOptions' => ['width' => '130'],
//                    'template'=>'{view} {update} {delete} {resetpwd} {privilege}',
                ]
            ],
        ]); ?>
    </div>
</div>