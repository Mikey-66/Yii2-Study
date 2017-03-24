<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Goods */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Goods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goods-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'cate_id',
            'cate_path',
            'brand_id',
            'goods_name',
            'sub_name',
            'type',
            'market_price',
            'price',
            'event_price',
            'event_start_date',
            'event_end_date',
            'stock',
            'warn_number',
            'free_maill',
            'img_home',
            'img_thumb',
            'earn',
            'is_add',
            'reason',
            'is_cash',
            'is_alone_sale',
            'is_coupon',
            'is_refund',
            'is_exchange',
            'is_hot',
            'spec_name_one',
            'spec_name_two',
            'sort',
            'factory_id',
            'is_del',
            'last_modify',
            'add_time',
        ],
    ]) ?>

</div>
