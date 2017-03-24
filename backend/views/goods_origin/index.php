<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\GoodsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Goods';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goods-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Goods', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'cate_id',
            'cate_path',
            'brand_id',
            'goods_name',
            // 'sub_name',
            // 'type',
            // 'market_price',
            // 'price',
            // 'event_price',
            // 'event_start_date',
            // 'event_end_date',
            // 'stock',
            // 'warn_number',
            // 'free_maill',
            // 'img_home',
            // 'img_thumb',
            // 'earn',
            // 'is_add',
            // 'reason',
            // 'is_cash',
            // 'is_alone_sale',
            // 'is_coupon',
            // 'is_refund',
            // 'is_exchange',
            // 'is_hot',
            // 'spec_name_one',
            // 'spec_name_two',
            // 'sort',
            // 'factory_id',
            // 'is_del',
            // 'last_modify',
            // 'add_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
