<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\GoodsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <?php  echo $this->render('_search2', ['model' => $searchModel])?>
                <div class="col-md-4">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">操作</h3>
                        </div>

                        <div class="box-body">
                            <a class="btn btn-primary">添加商品</a>&nbsp;&nbsp;
                            <div class="btn-group">
                                <button type="button" class="btn  btn-default ">其他</button>
                                <button type="button" class="btn  btn-default dropdown-toggle" data-toggle="dropdown">
                                  <span class="caret"></span>
                                  <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="#">Another action</a></li>
                                  <li><a href="#">Something else here</a></li>
                                  <li class="divider"></li>
                                  <li><a href="#">Separated link</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">
                        列表
                    </h3>
                </div>

                <div class="box-body">
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
            </div>
        </div>
    </div>
</section>
