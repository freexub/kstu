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
        'css/animsition.min.css',
//        'css/bootstrap.min.css',
//        'css/unicons.css',
        'css/lighbox.min.css',
        'css/swiper.min.css',
        'css/style.css',
    ];
    public $js = [
        'js/jquery.min.js',
        'js/popper.min.js',
//        'js/bootstrap.min.js',
        'js/plugins.js',
        'js/custom.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
