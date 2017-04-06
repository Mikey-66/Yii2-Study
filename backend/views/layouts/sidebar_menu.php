<?php 
use yii\helpers\Url;
use mdm\admin\components\MenuHelper;
$controller = $this->context;

$callback = function($menu){
    
    $item = [
        'label' => $menu['name'],
        'url' => MenuHelper::parseRoute($menu['route']),
//        'order' => $menu['order']
    ];
    
    if ($menu['children'] != []) {
        $item['items'] = $menu['children'];
    }
    
    if ($menu['data']){
        $extraParam = explode('|', $menu['data']);
        
        if (isset($extraParam[0])){
            $item['controller'] = $extraParam[0];
        }
        if (isset($extraParam[1])){
            $item['icon'] = $extraParam[1];
        }
        if (isset($extraParam[2])){
            $item['action'] = $extraParam[2];
        }
    }
    
    return $item;
};

$items = MenuHelper::getAssignedMenu(Yii::$app->user->id, null, $callback);
//show($items);exit;
?>

<ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    
    <?php foreach ($items as $firstNav):?>
        <li class="treeview <?= $controller->id == $firstNav['controller'] ? 'active' : '' ?>">
            <a href="<?= is_array($firstNav['url']) ? Url::to([ $firstNav['url'][0] ]) : Url::to([ $firstNav['url'] ])?>">
                <?= $firstNav['icon'] ? "<i class='fa {$firstNav['icon']}'></i>" : ''?> <span><?= $firstNav['label'] ?></span>
                <span class="pull-right-container">
                    <?php if ( isset($firstNav['items']) && count($firstNav['items'])>0 ):?>
                    <i class="fa fa-angle-left pull-right"></i>
                    <?php endif;?>
                </span>
            </a>

            <?php if ( isset($firstNav['items']) && count($firstNav['items'])>0 ):?>
            <ul class="treeview-menu">
                <?php foreach ( $firstNav['items'] as $secondNav):?>
                <li <?= isset($secondNav['action']) && $controller->action->id == $secondNav['action'] ? 'class="active"' : '' ?> >
                    <a href="<?= Url::to([ $secondNav['url'][0] ])?>"><i class="fa fa-circle-o"></i> <?= $secondNav['label'] ?></a>
                </li>
<!--                    <li <?= $controller->action->id=='create' ? 'class="active"' : '' ?> >
                    <a href="<?= Url::to(['goods/create'])?>"><i class="fa fa-circle-o"></i> 商品添加</a>
                </li>-->
                <?php endforeach;?>
            </ul>
            <?php endif;?>
        </li>
    <?php endforeach;?>
    
    <!-- 开发环境路由 gii rbac-->
    <li class="header">DEV ROUTE</li>
    <?php if (YII_ENV_DEV):?>
        <li <?= $controller->id=='admeta' ? 'class="active"' : '' ?> >
            <a href="<?= Url::to(['/gii'])?>" target="_blank">
            <i class="fa fa-magic"></i> <span>Gii</span>
          </a>
        </li>

        <li <?= $controller->id=='admeta' ? 'class="active"' : '' ?> >
          <a href="<?= Url::to(['/rbac'])?>" target="_blank">
            <i class="fa fa-ban"></i> <span>RBAC</span>
          </a>
        </li>
    <?php endif;?>    
</ul>