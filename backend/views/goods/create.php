<?php

use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model backend\models\Goods */

// 标题显示
$this->title = '新增商品';
$this->params['main-title'] = '商品管理';

// 面包屑参数
$this->params['breadcrumbs'][] = ['label' => 'Goods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="goods-create">

    <section class="content">
        
        <div class="bg_box" style="background:#fff;width: 100%;min-height: 935px;padding:10px 30px;">

            <h3>
                <?= Html::encode($this->title) ?>
                <a class="btn btn-primary pull-right" href="<?= Url::to([$this->context->id.'/index'])?>">返回列表</a>
            </h3>
            
            <br/>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
                
        </div>
    </section>
</div>
