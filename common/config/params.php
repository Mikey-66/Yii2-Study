<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
    'uploads_dir' => Yii::getAlias('@backend/web/uploads'), // 上传文件临时保存目录
    'frontendUrl' => 'http://www.yii2.com',
    'backendUrl' => 'http://www.yii2admin.com',
    
    // 缩略图配置
    'thumb_config' => [
        # 分类logo
        'logo' => [
            'width' => 200,
            'height' => 200
        ],
        
        # 商品首页展示图
        'cover' => array(
            'tips'=>'700x340',
            'thumb' => array('width' => 700, 'height' => 340),
        ),
        
        # 商品相册
        'album' => array(
            'tips'=>'750x750',
            'small' => array('width' => 200, 'height' => 200),
            'thumb' => array('width' => 750, 'height' => 750),
        ),
    ],
];
