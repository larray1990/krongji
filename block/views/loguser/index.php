<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SysLoguserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '查看日志';
$this->params['breadcrumbs'][] = ['label' => '系统日志', 'url' => ['index'],'template'=>'<li><i class="fa fa-home"></i> {link} <span></span></li>'];
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
<!--                        <?//= Html::a('新增日志', ['create'], ['class' => 'btn btn-success']) ?>-->
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
                'username',
                'level',
                'logdata',
                'logip',
                //'errortext',
                //'uid',
//                ['label'=>'创建时间','attribute' => 'created_at','value'=>function($m){
//                    return date("Y-m-d H:i:s",$m->created_at);
//                }],
                ['class' => 'yii\grid\ActionColumn',
                    'header' => '操作',
                    'headerOptions' => ['width' => '130'],
                    'template'=>'{view} ',
//                    'template'=>'{view} {update} {delete} {resetpwd} {privilege}',
                ],
            ],
        ]); ?>
    </div>
</div>

