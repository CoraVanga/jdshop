<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Users;
use app\controllers\user\SiteController;
use  yii\web\View;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
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

    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo Yii::$app->homeUrl.'../assets-admin/images/favicon.png'?>">
    <link href="<?php echo Yii::$app->homeUrl.'../assets-admin/jdadmin/jd_custom_css.css'?>" rel="stylesheet"/>
    <link href="<?php echo Yii::$app->homeUrl.'../assets-admin/css/lib/dropzone/dropzone.css'?>" rel="stylesheet"/>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- Bootstrap Core CSS -->
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.assets-admin/js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body class="fix-header fix-sidebar">
    <?php $this->beginBody() ?>
    <?= Html::csrfMetaTags() ?>
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b><img src="<?php echo Yii::$app->homeUrl.'../assets-admin/images/logo.png'?>" alt="homepage" class="dark-logo" /></b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span><img src="<?php echo Yii::$app->homeUrl.'../assets-admin/images/logo-text.png'?>" alt="homepage" class="dark-logo" /></span>
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <?php include "jdshop-admin-left-sidebar.php";?>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->

        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                   <img src="<?php echo Yii::$app->homeUrl.'../assets-shopper/imageweb/logo.png'?>" width="100", height="50" class="site_logo" alt=""> </div>
                <div class="col-md-7 align-self-center">
                    
                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]) ?>
                    <?= Alert::widget() ?>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <?php
                $user = new Users();
                if($user->idLogged() ){
                    echo $content;
                }
                else{
                    header('Location: /user/site/login');
                    exit;
                }
                
                ?>

               





                    

                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <footer class="footer"> </footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->

    
<?php $this->endBody() ?>
</body>
<script src="<?php echo Yii::$app->homeUrl.'../assets-admin/jdadmin/jd_custom_js.js'?>"></script>
<!-- <link href="<?php echo Yii::$app->homeUrl.'../assets-admin/css/dist/basic.css'?>" rel="stylesheet"/>
<link href="<?php echo Yii::$app->homeUrl.'../assets-admin/css/dist/dropzone.css'?>" rel="stylesheet"/>
<link href="<?php echo Yii::$app->homeUrl.'../assets-admin/css/dist/min/basic.min.css'?>" rel="stylesheet"/>
<link href="<?php echo Yii::$app->homeUrl.'../assets-admin/css/dist/min/dropzone.min.css'?>" rel="stylesheet"/>
<script src="<?php echo Yii::$app->homeUrl.'../assets-admin/css/dist/dropzone.js'?>"></script>
<script src="<?php echo Yii::$app->homeUrl.'../assets-admin/css/dist/dropzone-amd-module.js'?>"></script>
<script src="<?php echo Yii::$app->homeUrl.'../assets-admin/css/dist/min/dropzone.min.js'?>"></script>
<script src="<?php echo Yii::$app->homeUrl.'../assets-admin/css/dist/min/dropzone-amd-module.min.js'?>"></script> -->
</html>
<?php $this->endPage() ?>