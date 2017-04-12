<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
    'uploads_dir' => Yii::getAlias('@frontend/web/uploads'), // 上传文件临时保存目录
    'frontendUrl' => 'http://www.yii2.com',
    'backendUrl' => 'http://www.yii2admin.com',
    'thumb_config' => [
        'logo' => [
            'width' => 200,
            'height' => 200
        ]
    ],
];
