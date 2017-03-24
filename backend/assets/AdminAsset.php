<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\assets;

use yii\web\AssetBundle;

class AdminAsset extends AssetBundle{
    
    public $basePath = "@webroot";
    
    public $js=[
        
    ];
    
    public $css=[
        
    ];
    
    public $depends = [
        'yii\web\YiiAsset',
        'backend\assets\BootstrapChildAsset', // 依赖的类完整命名   及  命名空间+类名       
        'backend\assets\LteAsset'
    ];
    
}
