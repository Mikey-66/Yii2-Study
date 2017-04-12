<?php

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => '211.149.250.162',
            'port' => 6379,
            'password'=>'123456',
            'database' => 0,
        ],
        
        # 下面这个配置只能配置在这里
        'authManager' => [
            'class' => 'yii\rbac\DbManager'
        ],
        
        # 图片处理组件
//        'imageManager' => [
//            'class' => 'Intervention\Image\ImageManager',
//        ],
        
        'imageManager' => function(){
            return new \Intervention\Image\ImageManager();
        }
    ],
];
