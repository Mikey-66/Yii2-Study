<?php
namespace backend\assets;

use yii\web\AssetBundle;

class SummernoteAsset extends AssetBundle{
    
    public $sourcePath = "@backend/web/static/summernote-0.8.2-dist";
    
    public $js=[
        'dist/summernote.js',
        'dist/lang/summernote-zh-CN.js'
    ];
    
    public $css=[
        'dist/summernote.css'
    ];
    
    public $depends = [
        'yii\web\YiiAsset',
        'backend\assets\BootstrapChildAsset', // 依赖的类完整命名   及  命名空间+类名         
    ];
   
}

