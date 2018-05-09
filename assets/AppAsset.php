<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        //'assets-admin/css/lib/bootstrap/bootstrap.min.css',
        'assets-admin/css/lib/calendar2/semantic.ui.min.css',
        'assets-admin/css/lib/calendar2/pignose.calendar.min.css',
        'assets-admin/css/lib/owl.carousel.min.css',
        'assets-admin/css/lib/owl.theme.default.min.css',
        'assets-admin/css/helper.css',
        'assets-admin/css/style.css',
    ];
    public $js = [
        'assets-admin/js/lib/bootstrap/js/popper.min.js',
        'assets-admin/js/jquery.slimscroll.js',
        'assets-admin/js/sidebarmenu.js',
        // 'assets-admin/js/lib/sticky-kit-master/dist/sticky-kit.min.js', // làm cột bị lăng
        'assets-admin/js/lib/morris-chart/raphael-min.js',
        'assets-admin/js/lib/morris-chart/morris.js',
        'assets-admin/js/lib/morris-chart/dashboard1-init.js',
        'assets-admin/js/lib/calendar-2/moment.latest.min.js',
        'assets-admin/js/lib/calendar-2/semantic.ui.min.js',
        'assets-admin/js/lib/calendar-2/prism.min.js',
        'assets-admin/js/lib/calendar-2/pignose.calendar.min.js',
        'assets-admin/js/lib/calendar-2/pignose.init.js',
        'assets-admin/js/lib/owl-carousel/owl.carousel.min.js',
        'assets-admin/js/lib/owl-carousel/owl.carousel-init.js',
        'assets-admin/js/scripts.js',
        'assets-admin/js/custom.min.js',
        //'assets-admin/js/lib/jquery/jquery.min.js',
        //'assets-admin/js/lib/bootstrap/js/bootstrap.min.js',

    ];
    public $depends = [
         'yii\web\YiiAsset',
         'yii\bootstrap\BootstrapAsset',
    ];
}
