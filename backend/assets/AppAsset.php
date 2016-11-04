<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/style.default.css',
        //'http://cdn.bootcss.com/chosen/1.4.2/chosen.min.css'
    ];
    public $js = [
        'js/jquery-migrate-1.2.1.min.js',
        'js/jquery-ui-1.10.3.min.js',
        'js/bootstrap.min.js',
        'js/modernizr.min.js',
        'js/jquery.sparkline.min.js',
        'js/toggles.min.js',
        'js/retina.min.js',
        'js/jquery.cookies.js',
        //'http://cdn.bootcss.com/chosen/1.4.2/chosen.jquery.min.js',
        //'http://cdn.bootcss.com/chosen/1.4.2/chosen.proto.min.js',
        'js/custom.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
