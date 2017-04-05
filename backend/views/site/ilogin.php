<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="adminLTE/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminLTE/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="adminLTE/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <?php $form = ActiveForm::begin(['id' => 'login-form']);?>
        
        <!-- 注意：这里使用了echo 对象的方法通过类中__toString 魔术方法隐式调用了类中render方法 -->
        <?php //echo $form->field($model, 'username')->textInput(['placeholder'=>'Username']);?>
        
        <!-- 注意：可以如下显式调用render方法 -->
        <?php
            //echo $form->field($model, 'username')->textInput(['placeholder'=>'Username'])->render();
        ?>
        
        <?= $form->field($model, 'username', [
            'icon' => '<span class="glyphicon glyphicon-envelope form-control-feedback"></span>',
            'class' => 'backend\components\subclass\CustomActiveField',
            'options' => ['class' => 'form-group has-feedback'],
            'template' => "{label}\n{input}\n{icon}\n{hint}\n{error}"
            ])->passwordInput(['placeholder'=>'Username'])?>
        
        
        <?= $form->field($model, 'password', [
            'icon' => '<span class="glyphicon glyphicon-lock form-control-feedback"></span>',
            'class' => 'backend\components\subclass\CustomActiveField',
            'options' => ['class' => 'form-group has-feedback'],
            'template' => "{label}\n{input}\n{icon}\n{hint}\n{error}"
            ])->passwordInput(['placeholder'=>'Password'])?>
    
        <div class="row">
            <div class="col-xs-8">
<!--                <div class="checkbox icheck">
                  <label>
                      <input type="checkbox" name="LoginForm[rememberMe]"> Remember Me
                  </label>
                </div>-->
                
                <?php echo $form->field($model, 'rememberMe')->checkbox() ?>
            </div>

            <div class="col-xs-4">
                <?= Html::submitButton('Sign in', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']);?>
            </div>

        </div>
    <?php ActiveForm::end();?>

    <div class="social-auth-links text-center" style="display: none;">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
    
    <!-- /.social-auth-links -->
    <!--<a href="#">I forgot my password</a><br>-->
    <!--<a href="#">忘记密码?</a><br>-->
    <!--<a href="register.html" class="text-center">Register a new membership</a>-->
    <!--<a href="register.html" class="text-center"></a>-->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="adminLTE/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="adminLTE/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="adminLTE/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
