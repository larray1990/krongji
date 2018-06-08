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
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= Html::encode($this->title) ?></title>
    <link href="<?=\yii\helpers\Url::base(true).Url::to('/static/admin/css/style.default.css');?>" rel="stylesheet">
    <?php if (isset($this->blocks['header'])): ?>
        <?= $this->blocks['header'] ?>
    <?php endif; ?>
    <?php $this->head() ?>
</head>
<body class="signin"  id="particles">
<?php $this->beginBody() ?>
<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>
<section>
    <div class="signinpanel">
        <div class="row" id="intro">
             <?php 
                if( Yii::$app->getSession()->hasFlash('success') ){
                    echo Alert::widget([
                        'options' => [
                            'class' => 'alert-success', 
                        ],
                        'body' => Yii::$app->getSession()->getFlash('success'), 
                    ]);
                }
                if( Yii::$app->getSession()->hasFlash('error') ) {
                    echo Alert::widget([
                        'options' => [
                            'class' => 'alert-warning',
                        ],
                        'body' => Yii::$app->getSession()->getFlash('error'),
                    ]);
                }
              ?>
           <?= $content ?>
        </div><!-- row -->
        <div class="signup-footer">
            <div class="pull-left">
                &copy; 2016. All Rights Reserved.
            </div>
            <div class="pull-right">
                Created By: <a href="http://www.sdssdc.com/" target="_blank">山东省社会科学数据中心</a>
            </div>
        </div>

    </div><!-- signin -->
</section>
<script src="<?=\yii\helpers\Url::base(true).Url::to('/static/admin/js/jquery-1.10.2.min.js');?>"></script>
<script src="<?=\yii\helpers\Url::base(true).Url::to('/static/admin/js/jquery-migrate-1.2.1.min.js');?>"></script>
<script src="<?=\yii\helpers\Url::base(true).Url::to('/static/admin/js/bootstrap.min.js');?>"></script>
<script src="<?=\yii\helpers\Url::base(true).Url::to('/static/admin/js/modernizr.min.js');?>"></script>
<script src="<?=\yii\helpers\Url::base(true).Url::to('/static/admin/js/retina.min.js');?>"></script>
<script src="<?=\yii\helpers\Url::base(true).Url::to('/static/admin/js/jquery.particleground.js');?>"></script>
<script src="<?=\yii\helpers\Url::base(true).Url::to('/static/admin/jsmaster/particlejs.js');?>"></script>

<script>
    jQuery(window).load(function() 
    {
        // Page Preloader
       jQuery('#status').fadeOut();
       jQuery('#preloader').delay(350).fadeOut(function()
       {
          jQuery('body').delay(350).css({'overflow':'visible'});
       });
    });
</script>

<?php if (isset($this->blocks['footer'])): ?>
    <?= $this->blocks['footer'] ?>
<?php endif; ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
