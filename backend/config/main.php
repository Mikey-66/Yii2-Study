<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    # 配置应用属性
    
    /*-------------------------------------------------------------------------------
     * 必要属性 这两个属性必须配置
     * ------------------------------------------------------------------------------
     */
    
    'id' => 'app-backend',
    
    'basePath' => dirname(__DIR__),
    
    /*-------------------------------------------------------------------------------
     * 重要属性 
     * ------------------------------------------------------------------------------
     */
    # 这个属性可以代替Yii::setAlias()来设置别名
    'aliases' => [
//        '@name1' => 'path/to/path1',
//        '@name2' => 'path/to/path2',
    ],
    
    # 定义控制器类默认的命名空间
    'controllerNamespace' => 'backend\controllers',
    
    # 引导启动组件 指定启动阶段需要允许的组件，启动太多会影响性能
    'bootstrap' => ['log'],
    
    # 指定应用所包含的模块
    'modules' => [
        'rbac' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'left-menu'
        ]
    ],
    
    # 重要 配置应用主键 使用时才会实例化
    'components' => [
        
        /*   配置方法
         * 
         *   使用类名注册 "cache" 组件
         *   'cache' => 'yii\caching\ApcCache',
         *
         *   使用配置数组注册 "db" 组件
         *   'db' => [
         *       'class' => 'yii\db\Connection',
         *       'dsn' => 'mysql:host=localhost;dbname=demo',
         *       'username' => 'root',
         *       'password' => '',
         *   ],
         *
         *   使用函数注册"search" 组件
         *   'search' => function () {
         *       return new app\components\SolrService;
         *   },
         * 
         *   没有指定类名的是系统核心应用组件，例如
         *   yii\web\Application::request
         *   yii\base\Application::db 
         *   这些组件系统有预定义的类
         */
        
        # 请求主键
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        
        # 用户组件
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        
        # session组件
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        
        # 日志组件
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        
        # 错误处理组件
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
        # 下面这项配置 只需要也只能在common/config/main.php 中配置一次就行了
//        'authManager' => [
//            'class' => 'yii\rbac\DbManager'
//        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        
    ],
    
    # 指定应用展示给终端用户的语言， 默认为 en 标识英文。
//    'language' => 'en',
    
    # 指定你可能想展示给终端用户的应用名称， 不同于需要唯一性的 yii\base\Application::id 属性， 该属性可以不唯一，该属性用于显示应用的用途
//    'name' => 'my app',
    
    # 提供一种方式修改PHP运行环境中的默认时区，配置该属性本质上就是调用PHP函数 date_default_timezone_set()
//    'timeZone' => 'America/Los_Angeles',
    
    # 权限管理
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [ //允许访问的节点，可自行添加
            # controller/action  添加默认可以访问的节点
            'rbac/*',//允许所有人访问admin节点及其子节点
            'debug/*'
        ]
    ],
    
    # 应用全局参数
    'params' => $params,
    
    /*-------------------------------------------------------------------------------
     * 实用属性 
     * ------------------------------------------------------------------------------
     */
    
    # 字符集
//    'charset' => 'UTF-8',
    
    # 默认路由  不带路由访问时的路由
//    'defaultRoute' => 'site'
    
    # 指定应该安装和使用的扩展, 默认使用@vendor/yiisoft/extensions.php文件返回的数组。 
    # 当你使用 Composer 安装扩展，extensions.php 会被自动生成和维护更新。 大多数情况下，不需要配置该属性。
    
//    'extensions' => [
//        [
//            'name' => 'extension name',
//            'version' => 'version number',
//            'bootstrap' => 'BootstrapClassName',  // 可选配，可为配置数组
//            'alias' => [  // 可选配
//                '@alias1' => 'to/path1',
//                '@alias2' => 'to/path2',
//            ],
//        ]    
//    ]
    
    # 渲染 视图 默认使用的布局名字
//    'layout' => 'main',
    
    # 指定查找布局文件的路径， 默认值为 视图路径 下的 layouts 子目录
//    'layoutPath' => '@app/views/layouts',
    
    # 指定临时文件如日志文件、缓存文件等保存路径， 默认值为带别名的 @app/runtime,为了简化访问该路径，Yii预定义别名 @runtime 代表该路径。
//    'runtimePath' => '@app/runtime',
    
    # 指定视图文件的根目录，默认值为带别名的 @app/views
//    'viewPath' => '@app/views',
    
    # 指定 Composer 管理的供应商路径， 该路径包含应用使用的包括 Yii 框架在内的所有第三方库。 
    # 默认值为带别名的 @app/vendor,Yii预定义别名 @vendor 代表该路径
//    'vendorPath' => '@app/vendor',
    
];
