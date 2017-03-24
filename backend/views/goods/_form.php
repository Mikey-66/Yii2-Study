<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Goods */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="goods-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cate_id')->textInput() ?>

    <?= $form->field($model, 'cate_path')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brand_id')->textInput() ?>

    <?= $form->field($model, 'goods_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sub_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput() ?>

    <?= $form->field($model, 'market_price')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'event_price')->textInput() ?>

    <?= $form->field($model, 'event_start_date')->textInput() ?>

    <?= $form->field($model, 'event_end_date')->textInput() ?>

    <?= $form->field($model, 'stock')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'warn_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'free_maill')->textInput() ?>

    <?= $form->field($model, 'img_home')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'img_thumb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'earn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_add')->textInput() ?>

    <?= $form->field($model, 'reason')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_cash')->textInput() ?>

    <?= $form->field($model, 'is_alone_sale')->textInput() ?>

    <?= $form->field($model, 'is_coupon')->textInput() ?>

    <?= $form->field($model, 'is_refund')->textInput() ?>

    <?= $form->field($model, 'is_exchange')->textInput() ?>

    <?= $form->field($model, 'is_hot')->textInput() ?>

    <?= $form->field($model, 'spec_name_one')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'spec_name_two')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <?= $form->field($model, 'factory_id')->textInput() ?>

    <?= $form->field($model, 'is_del')->textInput() ?>

    <?= $form->field($model, 'last_modify')->textInput() ?>

    <?= $form->field($model, 'add_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
