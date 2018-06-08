<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '管理员列表';
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
                        <?= Html::a('新增管理员', ['create'], ['class' => 'btn btn-success']) ?>
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
                'nickname',
                'email:email',
//                'password',
                //'profile:ntext',
                //'auth_key',
                //'password_hash',
                //'password_reset_token',
                //'created_at',
                //'updated_at',
                ['label'=>'创建时间','attribute' => 'created_at','value'=>function($m){
                    return date("Y-m-d H:i:s",$m->created_at);
                }],
                ['class' => 'yii\grid\ActionColumn',
                    'header' => '操作',
                    'headerOptions' => ['width' => '130'],
                    'template'=>'{view} {update} {delete} {resetpwd} {privilege}',
                    'buttons'=>[
                        'resetpwd'=>function($url,$model,$key)
                        {
                            $options=[
                                'title'=>Yii::t('yii','重置密码'),
                                'aria-label'=>Yii::t('yii','重置密码'),
                                'data-pjax'=>'0',
                            ];
                            return Html::a('<span class="glyphicon glyphicon-lock"></span>',$url,$options);
                        },

                        'privilege'=>function($url,$model,$key)
                        {
                            $options=[
                                'title'=>Yii::t('yii','权限'),
                                'aria-label'=>Yii::t('yii','权限'),
                                'data-pjax'=>'0',
                            ];
                            return Html::a('<span class="glyphicon glyphicon-user"></span>',$url,$options);
                        },

                    ],
                ],
            ],
        ]); ?>
    </div>
</div>
