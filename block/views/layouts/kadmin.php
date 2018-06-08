<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Alert;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language ?>">
<head>
    <meta charset="<?=Yii::$app->charset ?>">
    <?= Html::csrfMetaTags() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title><?= Html::encode($this->title) ?></title>
    <link href="<?=\yii\helpers\Url::base(true).Url::to('/static/admin/css/style.default.css');?>" rel="stylesheet">
    <link href="<?=\yii\helpers\Url::base(true).Url::to('/static/admin/css/custom.css');?>" rel="stylesheet">
    <link href="<?=\yii\helpers\Url::base(true).Url::to('/static/admin/css/jquery.alerts.css');?>" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?=\yii\helpers\Url::base(true).Url::to('/static/admin/js/html5shiv.js');?>"></script>
    <script src="<?=\yii\helpers\Url::base(true).Url::to('/static/admin/js/respond.min.js');?>"></script>
    <![endif]-->
    <?php if (isset($this->blocks['header'])): ?>
        <?= $this->blocks['header'] ?>
    <?php endif; ?>
    <?php $this->head() ?>
</head>

<body style="overflow: visible;">
<?php $this->beginBody() ?>
<!-- Preloader -->
<div id="preloader" style="opacity:0.7;">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>
<section>

    <div class="leftpanel">

        <div class="logopanel">
            <div id="klogomin" style="height: 30px;margin-left: 5px;"></div>
        </div><!-- LOGO -->
        <div class="leftpanelinner">
            <h5 class="sidebartitle">导航</h5>
            <ul class="nav nav-pills nav-stacked nav-bracket" id="sidemenus">
                <li><a href="<?=Url::toRoute('/site/index');?>">
                  <i class="fa fa-home"></i><span>后台首页</span></a>
                </li>
                <li class="nav-parent"><a href=""><i class="fa fa-edit"></i> <span>系统管理</span></a>
                    <ul class="children">
                        <li><a href="<?=Url::to(['/department/index']);?>"><i class="fa fa-caret-right"></i>农机部门列表</a></li>
                        <li><a href="<?=Url::to(['/manager/index']);?>"><i class="fa fa-caret-right"></i>管理员列表</a></li>
<!--                        <li><a href="--><?//=Url::to(['/manageuser/create']);?><!--"><i class="fa fa-caret-right"></i>添加管理员</a></li>-->
<!--                        <li><a href="--><?//=Url::to(['/department/index']);?><!--"><i class="fa fa-caret-right"></i>农机部门列表</a></li>-->
                        <li><a href="<?=Url::to(['/machineclass/index']);?>"><i class="fa fa-caret-right"></i>农机设备列表</a></li>
                        <li><a href="<?=Url::to(['/engine/index']);?>"><i class="fa fa-caret-right"></i>农机机具列表</a></li>
                        <li><a href="<?=Url::to(['/engineperson/index']);?>"><i class="fa fa-caret-right"></i>机手信息列表</a></li>
<!--                        <li><a href="--><?//=Url::to(['/manageuser/create']);?><!--"><i class="fa fa-caret-right"></i>添加部门</a></li>-->
                   </ul>
                </li>
               
                <li class="nav-parent"><a href=""><i class="fa fa-edit"></i> <span>系统日记</span></a>
                    <ul class="children">
<!--                        <li><a  href="--><?//=Url::to(['site/klog']);?><!--"><i class="fa fa-caret-right"></i>查看日记</a></li>-->
                        <li><a  href="<?=Url::to(['/loguser/index']);?>"><i class="fa fa-caret-right"></i>查看日记</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- 左侧菜单 -->
    </div><!-- 左侧panel -->

    <div class="mainpanel">
        <div class="headerbar">
            <a class="menutoggle"><i class="fa fa-bars"></i></a>
            <div class="header-right">
                <ul class="headermenu">
                    <li>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="padding:14px 10px;">
                              <?php if (!Yii::$app->user->isGuest) { 
                                  echo Yii::$app->user->identity->username; 
                              } ?>
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                                <li><a href=""><i class="glyphicon glyphicon-cog"></i> 帐号设置</a></li>
                                <li>
                                    <a href="<?=Url::to(['site/logout'])?>"><i class="glyphicon glyphicon-log-out"></i> 注销</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div><!-- 头部右侧 -->

        </div><!-- 头部 -->

        <?php if (isset($this->blocks['breadcrumb'])): ?>
            <?= $this->blocks['breadcrumb'] ?>
        <?php endif; ?>

         <?php 
            if( Yii::$app->getSession()->hasFlash('success') ){
                echo Alert::widget([
                    'options' => [
                        'class' => 'alert-success', 
                    ],
                    'body' => Yii::$app->getSession()->getFlash('success'), 
                ]);
            }
            if( Yii::$app->getSession()->hasFlash('danger') ) {
                echo Alert::widget([
                    'options' => [
                        'class' => 'alert-danger',
                    ],
                    'body' => Yii::$app->getSession()->getFlash('danger'),
                ]);
            }
            
            if( Yii::$app->getSession()->hasFlash('info') ) {
                echo Alert::widget([
                    'options' => [
                        'class' => 'alert-info',
                    ],
                    'body' => Yii::$app->getSession()->getFlash('info'),
                ]);
            }
            
            if( Yii::$app->getSession()->hasFlash('warning') ) {
                echo Alert::widget([
                    'options' => [
                        'class' => 'alert-warning',
                    ],
                    'body' => Yii::$app->getSession()->getFlash('warning'),
                ]);
            }
        ?>
        
        <div class="contentpanel">
            <?= \yii\widgets\Breadcrumbs::widget([
                'homeLink'=>false,
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
        <div class="signup-footer">
            <div class="pull-left">
                &copy; 2018. All Rights Reserved.
            </div>
            <div class="pull-right">
                Created By: <a href="http://www.sdssdc.com/" target="_blank">K183农机监管平台</a>
            </div>
        </div>
    </div><!-- 主面板 -->
</section>

<script src="<?=\yii\helpers\Url::base(true).Url::to('/static/admin/js/jquery-1.10.2.min.js');?>"></script>
<script src="<?=\yii\helpers\Url::base(true).Url::to('/static/admin/js/jquery-migrate-1.2.1.min.js');?>"></script>
<script src="<?=\yii\helpers\Url::base(true).Url::to('/static/admin/js/bootstrap.min.js');?>"></script>
<script src="<?=\yii\helpers\Url::base(true).Url::to('/static/admin/js/modernizr.min.js');?>"></script>
<script src="<?=\yii\helpers\Url::base(true).Url::to('/static/admin/js/jquery.sparkline.min.js');?>"></script>
<script src="<?=\yii\helpers\Url::base(true).Url::to('/static/admin/js/toggles.min.js');?>"></script>
<script src="<?=\yii\helpers\Url::base(true).Url::to('/static/admin/js/retina.min.js');?>"></script>
<script src="<?=\yii\helpers\Url::base(true).Url::to('/static/admin/js/jquery.cookies.js');?>"></script>
<script src="<?=\yii\helpers\Url::base(true).Url::to('/static/jquery-form/jquery.form.min.js');?>"></script>
<script src="<?=\yii\helpers\Url::base(true).Url::to('/static/admin/js/custom.js');?>"></script>
<script src="<?=\yii\helpers\Url::base(true).Url::to('/static/admin/js/jquery.alerts.js');?>"></script>
<script src="<?=\yii\helpers\Url::base(true).Url::to('/static/admin/jsmaster/Tonyjs.js');?>"></script>
<script>
    //菜单状态管理
    function menuActive(pid){
        var sessId = pid+'_sess_href';
        var sidebar = $(pid);
        if (sessionStorage[sessId]) {
            var anchor = sidebar.find("a[href='"+sessionStorage[sessId]+"']");
            anchor.parent().addClass('active');
            if (anchor.parent().parent().hasClass('nav') == false) {
                anchor.parent().parent().css('display','block');
                anchor.parent().parent().parent().addClass("active nav-active");
            }
        } else {
            sidebar.find("ul").eq(0).addClass('in');
        }
        //检测session
        sidebar.find("li a").click(function(){
            var href = $(this).attr('href');
            sessionStorage[sessId] = href;
        });
    }
    menuActive('#sidemenus');
</script>
<?php if (isset($this->blocks['footer'])): ?>
    <?= $this->blocks['footer'] ?>
<?php endif; ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>