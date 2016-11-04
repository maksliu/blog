<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/style.default.css',
    ];
    public $js = [
        //'js/jquery-1.11.1.min.js',
        //'js/jquery-migrate-1.2.1.min.js',
        //'js/modernizr.min.js',
        //'js/jquery.sparkline.min.js',
        'js/jquery.cookies.js',
        //'js/toggles.min.js',
        //'js/retina.min.js',
        //'js/custom.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
