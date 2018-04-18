<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
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
                            <div class="login-form">
                                <h4>Đăng ký thông tin khách hàng</h4>
                                
                                <?php $form = ActiveForm::begin([
                                    'id' => 'login-form',
                                ]); ?>
                                    <div class="form-group">
                                        <label>User Name</label>
                                        <input type="text" id="users-username" class="form-control" name="Users[username]" placeholder="User Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" id="users-username" class="form-control" name="Users[password]" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" id="users-username" class="form-control" name="Users[name]" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" id="users-username" class="form-control" name="Users[email]" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label>Địa chỉ</label>
                                        <input type="text" id="users-username" class="form-control" name="Users[address]" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label>Ngày sinh</label>
                                        <input type="date" id="users-username" class="form-control" name="Users[dob]">
                                    </div>
                                    <div class="form-group">
                                        <label>Điện thoại</label>
                                        <input type="text" id="users-username" class="form-control" name="Users[phone]">
                                    </div>
                                    <input type="text" id="users-username" class="form-control" name="Users[role]" value="4" hidden="1">
                                    <input type="text" id="users-username" class="form-control" name="Users[status]" value="1" hidden="1">
                                    <input type="text" id="users-username" class="form-control" name="register" value="1" hidden="1">
                                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Đăng ký</button>
                                    <div class="register-link m-t-15 text-center">
                                        <p>Có tài khoản ? <a href="login">Đăng nhập</a></p>
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