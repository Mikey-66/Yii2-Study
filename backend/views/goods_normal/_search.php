<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\GoodsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-md-8">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">查询</h3>
        </div>
        <div class="box-body">
            <div class="goods-search">

                <?php $form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
                    'options' => [
                        'class' => 'form-inline'
                    ],
                    'fieldClass' => 'backend\components\subclass\CustomActiveField',

                ]); ?>

                <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cate_id') ?>

    <?php // echo $form->field($model, 'cate_path') ?>

    <?php // echo $form->field($model, 'brand_id') ?>

    <?php // echo $form->field($model, 'goods_name') ?>

    <?php // echo $form->field($model, 'sub_name') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'market_price') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'event_price') ?>

    <?php // echo $form->field($model, 'event_start_date') ?>

    <?php // echo $form->field($model, 'event_end_date') ?>

    <?php // echo $form->field($model, 'stock') ?>

    <?php // echo $form->field($model, 'warn_number') ?>

    <?php // echo $form->field($model, 'free_maill') ?>

    <?php // echo $form->field($model, 'img_home') ?>

    <?php // echo $form->field($model, 'img_thumb') ?>

    <?php // echo $form->field($model, 'earn') ?>

    <?php // echo $form->field($model, 'is_add') ?>

    <?php // echo $form->field($model, 'reason') ?>

    <?php // echo $form->field($model, 'is_cash') ?>

    <?php // echo $form->field($model, 'is_alone_sale') ?>

    <?php // echo $form->field($model, 'is_coupon') ?>

    <?php // echo $form->field($model, 'is_refund') ?>

    <?php // echo $form->field($model, 'is_exchange') ?>

    <?php // echo $form->field($model, 'is_hot') ?>

    <?php // echo $form->field($model, 'spec_name_one') ?>

    <?php // echo $form->field($model, 'spec_name_two') ?>

    <?php // echo $form->field($model, 'sort') ?>

    <?php // echo $form->field($model, 'factory_id') ?>

    <?php // echo $form->field($model, 'is_del') ?>

    <?php // echo $form->field($model, 'last_modify') ?>

    <?php // echo $form->field($model, 'add_time') ?>

                &nbsp;
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>&nbsp;
                <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>


