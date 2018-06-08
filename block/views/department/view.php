<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\SysDepartment */

$this->title = $model->dname;
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
                    <div class="col-md-2">
                        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('删除', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => '您确定要删除此项吗？',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="panel-body">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'dname',
                [
                    'label'=>'部门层级',
                    'attribute'=>'level',
                    'value' => function ($model) {
                        $level = ['9'=>'省级账户','8'=>'市级账户','7'=>'区级账户','3'=>'合作社账户','2'=>'大户账户'];
                        return $level[$model->level];
                    },
                    'headerOptions'=> ['width'=> '200'],
                ],
                [
                    'label'=>'部门简介',
                    'attribute'=>'info',
                ],
                'map_key',
                [
                    'label'=>'上级分类',
                    'attribute'=>'cid',
                    'value'=>$model->getName($model->cid),
                ],
//                'did',
//                'eid',
                [
                    'label'=>'省',
                    'attribute'=>'province',
                    'value'=>\common\models\Region::getName($model->province),
                    'headerOptions'=> ['width'=> '200']
                ],
                [
                    'label'=>'市',
                    'attribute'=>'city',
                    'value'=>\common\models\Region::getName($model->city),
                ],
                [
                    'label'=>'区',
                    'attribute'=>'district',
                    'value'=>\common\models\Region::getName($model->district),
                ],
                [
                    'label'=>'创建时间',
                    'attribute'=>'created_at',
                    'value'=>function($model){
                        return date('Y-m-d H:i:s',$model->created_at);
                    },
                ],
                [
                    'label'=>'更新时间',
                    'attribute'=>'updated_at',
                    'value'=>function($model){
                        return date('Y-m-d H:i:s',$model->updated_at);
                    },
                ],
            ],
        ]) ?>
    </div>

