<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SysDepartmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '农机部门列表';
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
                        <?= Html::a('新增部门', ['create'], ['class' => 'btn btn-success']) ?>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="panel-body">
            <!--<div id="w0" class="grid-view"><div class="summary">第<b>1-4</b>条，共<b>4</b>条数据.</div>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th><a href="/index.php?r=department%2Findex&amp;sort=id" data-sort="id">ID</a></th>
                        <th><a href="/index.php?r=department%2Findex&amp;sort=dname" data-sort="dname">部门名称</a>
                        </th><th width="200"><a href="/index.php?r=department%2Findex&amp;sort=cid" data-sort="cid">上级分类</a></th>
                        <th width="200"><a href="/index.php?r=department%2Findex&amp;sort=level" data-sort="level">部门层级</a></th>
                        <th><a href="/index.php?r=department%2Findex&amp;sort=info" data-sort="info">部门简介</a></th>
                        <th width="130">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php /*foreach($cates as $cate): */?>
                        <tr data-key="{$cate['id']}">
                            <td>{$cate['id']}</td>
                            <td>{$cate['dname']}</td>
                            <td>顶级分类</td>
                            <td>省级账户</td>
                            <td>11</td>
                            <td>
                                <a href="/index.php?r=department%2Fview&amp;id=1" title="查看" aria-label="查看" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a>
                                <a href="/index.php?r=department%2Fupdate&amp;id=1" title="更新" aria-label="更新" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="/index.php?r=department%2Fdelete&amp;id=1" title="删除" aria-label="删除" data-pjax="0" data-confirm="您确定要删除此项吗？" data-method="post"><span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                        </tr>
                        <?php /*endforeach; */?>
                    </tbody>
                </table>
            </div>-->
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //每列都有搜索框 控制器传过来$searchModel = new ArticleSearch();
            'filterModel' => $searchModel,
            'columns' => [
//                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'dname',
                [
                    'label'=>'上级分类',
                    'attribute'=>'cid',
//                    'value' =>$searchModel->dname,
                    'value' => function ($model) {
                        return $model->getName($model->cid);
                    },
                    'headerOptions'=> ['width'=> '200'],
                ],
                [
                    'label'=>'部门层级',
                    'attribute'=>'level',
                    'value' => function ($model) {
                        $level = ['9'=>'省级账户','8'=>'市级账户','7'=>'区级账户','3'=>'合作社账户','2'=>'大户账户'];
                        return $level[$model->level];
                    },
                    'headerOptions'=> ['width'=> '200'],
                ],
                'info',
//                'map_key',
                //'created_at',
                //'updated_at',
                //'cid',
                //'did',
                //'eid',
                //'province',
                //'city',
                //'district',
                ['class' => 'yii\grid\ActionColumn',
                    'header' => '操作',
                    'headerOptions' => ['width' => '130'],
//                    'template'=>'{view} {update} {delete} {resetpwd} {privilege}',
                ],
            ],
        ]); ?>
    </div>
</div>
