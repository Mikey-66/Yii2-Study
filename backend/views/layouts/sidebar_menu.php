<?php 
use yii\helpers\Url;
$controller = $this->context;
?>
<ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    
    <li class="treeview <?= $controller->id=='goods' ? 'active' : '' ?>">
        <a href="#">
            <i class="fa fa-cubes"></i> <span>商品管理</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            
            <li <?= $controller->action->id=='index' ? 'class="active"' : '' ?> >
                <a href="<?= Url::to(['goods/index'])?>"><i class="fa fa-circle-o"></i> 商品列表</a>
            </li>
            
            <li <?= $controller->action->id=='create' ? 'class="active"' : '' ?> >
                <a href="<?= Url::to(['goods/create'])?>"><i class="fa fa-circle-o"></i> 商品添加</a>
            </li>
        </ul>
    </li>
    
    <li <?= $controller->id=='attr' ? 'class="active"' : '' ?> >
      <a href="<?= Url::to(['attr/index'])?>">
        <i class="fa fa-th"></i> <span>属性管理</span>
        <span class="pull-right-container">
          <!--<small class="label pull-right bg-green">new</small>-->
        </span>
      </a>
    </li>
    
    <li <?= $controller->id=='brand' ? 'class="active"' : '' ?> >
      <a href="<?= Url::to(['brand/index'])?>">
        <i class="fa fa-diamond"></i> <span>品牌管理</span>
        <span class="pull-right-container">
          <!--<small class="label pull-right bg-green">new</small>-->
        </span>
      </a>
    </li>
</ul>