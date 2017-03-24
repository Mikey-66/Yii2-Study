<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\assets;

use yii\web\AssetBundle;

class LteAsset extends AssetBundle{
    
    public $sourcePath = "@webroot/adminLTE";
    
    public $js=[
        'plugins/datatables/jquery.dataTables.min.js',
        'plugins/datatables/dataTables.bootstrap.min.js',
        'plugins/slimScroll/jquery.slimscroll.min.js',
        'plugins/fastclick/fastclick.js',
        'dist/js/app.min.js',
        'dist/js/demo.js'
    ];
    
    public $css=[
        'https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css',
        'plugins/datatables/dataTables.bootstrap.css',
        'dist/css/AdminLTE.css',
        'dist/css/skins/_all-skins.min.css',
    ];
    
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset', // 依赖的类完整命名   及  命名空间+类名       
    ];
    
}
