<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Adminuser */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => '系统管理', 'url' => ['department/index'],'template'=>'<li><i class="fa fa-home"></i> {link} <span></span></li>'];
$this->params['breadcrumbs'][] = ['label' => '管理员列表', 'url' => ['index']];
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
                                'pjax'=>'0',
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
                'username',
                'nickname',
                'email:email',
                'status',
                'level',
                'province',
                'city',
                'district',
//                'profile:ntext',
//            'auth_key',
//            'password_hash',
//            'password_reset_token',
                ['attribute'=>'created_at',             // 格式化时间
                    'value'=>date('Y-m-d H:i:s',$model->created_at),
                ],
                ['attribute'=>'updated_at',             // 格式化时间
                    'value'=>date('Y-m-d H:i:s',$model->updated_at),
                ],
            ],
        ]) ?>
    </div>
</div>