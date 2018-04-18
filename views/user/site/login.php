<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Ela - Bootstrap Admin Dashboard Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo Yii::$app->homeUrl.'assets-admin/css/lib/bootstrap/bootstrap.min.css'?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo Yii::$app->homeUrl.'assets-admin/css/helper.css'?>" rel="stylesheet">
    <link href="<?php echo Yii::$app->homeUrl.'assets-admin/css/style.css'?>" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">

        <div class="unix-login">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="login-content card">
                            <div class="login-form" method="post">
                                <h4>Login</h4>
                                
                                
                                <?php $form = ActiveForm::begin([
                                    'id' => 'login-form',
                                ]); ?>

                                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->input('text', ['placeholder' => "Enter Your Username"])->label(false); ?>

                                <?= $form->field($model, 'password')->passwordInput()->input('password', ['placeholder' => "Password"])->label(false) ?>

                                <?= $form->field($model, 'rememberMe')->checkbox([]) ?>
                                
                                <div class="form-group">
                                    
                                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                                </div>
                                <div class="register-link m-t-15 text-center">
                                        <p>Don't have account ? <a href="register"> Sign Up Here</a></p>
                                </div>

                                <?php ActiveForm::end(); ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="<?php echo Yii::$app->homeUrl.'assets-admin/js/lib/jquery/jquery.min.js'?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo Yii::$app->homeUrl.'assets-admin/js/lib/bootstrap/js/popper.min.js'?>"></script>
    <script src="<?php echo Yii::$app->homeUrl.'assets-admin/js/lib/bootstrap/js/bootstrap.min.js'?>"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo Yii::$app->homeUrl.'assets-admin/js/jquery.slimscroll.js'?>"></script>
    <!--Menu sidebar -->
    <script src="<?php echo Yii::$app->homeUrl.'assets-admin/js/sidebarmenu.js'?>"></script>
    <!--stickey kit -->
    <script src="<?php echo Yii::$app->homeUrl.'assets-admin/js/lib/sticky-kit-master/dist/sticky-kit.min.js'?>"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo Yii::$app->homeUrl.'assets-admin/js/custom.min.js'?>"></script>

</body>

</html>