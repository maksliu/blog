<?php
use backend\assets\LoginAsset;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Url;
LoginAsset::register($this);

$css = <<<CSS
    #AdminForm .form-group{
        margin-top:0px;
        margin-bottom:0px;
    }
    #AdminForm .col-md-5,.col-md-7,.col-md-12{
        padding-left:0;
        padding-right:0;
    }

    #adminloginform-verifycode-image{
        margin-left:0px;
        margin-top:15px;
    }
CSS;

$js = <<<JS
var c = jQuery.cookie('change-skin');
if (c && c == 'greyjoy') {
    jQuery('.btn-success').addClass('btn-orange').removeClass('btn-success');
} else if(c && c == 'dodgerblue') {
    jQuery('.btn-success').addClass('btn-primary').removeClass('btn-success');
} else if (c && c == 'katniss') {
    jQuery('.btn-success').addClass('btn-primary').removeClass('btn-success');
}
JS;
$this->registerCss($css);
$this->registerJs($js);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <meta name="description" content="">
  <meta name="author" content="">
  <?= Html::csrfMetaTags() ?>
  <link rel="shortcut icon" href="/images/favicon.png" type="image/png">

  <title>博客 manarch's blog login page<?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="/js/html5shiv.js"></script>
  <script src="/js/respond.min.js"></script>
  <![endif]-->
</head>

<body class="signin">
    <?php $this->beginBody() ?>
<section>

    <div class="signinpanel">

        <div class="row">

            <div class="col-md-3"></div><!-- col-sm-7 -->

            <div class="col-md-6">

                <?php $form = ActiveForm::begin([
                    'id'=>'AdminForm',
                    'fieldConfig'=>[
                        'template'=>'<div class="col-md-12">{input}{error}</div>'
                    ]
                ]); ?>
                    <h4 class="nomargin">登录ha ha</h4>
                    <p class="mt5 mb20">请正确输入您的账号和密码</p>
                        <?= $form->field($model,'user_name')->textInput(['class'=>'form-control uname','placeholder'=>'Username'])?>
                        <?= $form->field($model,'pwd')->passwordInput(['class'=>'form-control pword','placeholder'=>'Password'])?>
                        <?= $form->field($model, 'verifyCode',['template'=>'{input}'])->widget(Captcha::className(), [
                            'captchaAction' => Url::to(['login/captcha']),
                            'template' => '<div class="col-md-5">{input}</div><div class="col-md-2"></div><div class="col-md-5">{image}</div>',
                        ]) ?>

                    <?= Html::submitButton( '登录', ['class'=>'btn btn-success btn-block'])?>


                <?php ActiveForm::end(); ?>
            </div><!-- col-sm-5 -->
            <div class="col-md-3"></div><!-- col-sm-7 -->
        </div><!-- row -->

        <div class="signup-footer">
            <div class="pull-left">
                &copy; 2014. All Rights Reserved. Bracket manarch
            </div>
            <div class="pull-right">
                Created By: manarch
            </div>
        </div>

    </div><!-- signin -->

</section>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
