<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800',
        '//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700',
        '//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700',
//        'css/bootstrap.min.css',
        'css/font-awesome.css',
        'css/ionicons.min.css',
        'css/slick.css',
        'css/slick-theme.css',
        'css/owl.carousel.min.css',
        'css/style.css',
    ];
    public $js = [
        'js/owl.carousel.min.js',
        'js/slick.min.js',
        '//maps.googleapis.com/maps/api/js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
