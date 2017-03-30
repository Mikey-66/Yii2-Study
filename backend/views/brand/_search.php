<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\BrandSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-md-8">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">查询</h3>
        </div>
        <div class="box-body">
            <div class="brand-search">

                <?php $form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
                    'options' => [
                        'class' => 'form-inline'
                    ],
                    'fieldClass' => 'backend\components\subclass\CustomActiveField',

                ]); ?>

                <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'brand_name') ?>

    <?php // echo $form->field($model, 'capital') ?>

    <?php // echo $form->field($model, 'brand_logo') ?>

    <?php // echo $form->field($model, 'site_url') ?>

    <?php // echo $form->field($model, 'sort_order') ?>

    <?php // echo $form->field($model, 'is_show') ?>

    <?php // echo $form->field($model, 'is_hot') ?>

    <?php // echo $form->field($model, 'shop_pc') ?>

    <?php // echo $form->field($model, 'shop_wap') ?>

    <?php // echo $form->field($model, 'brand_desc') ?>

    <?php // echo $form->field($model, 'brand_detail') ?>

                &nbsp;
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>&nbsp;
                <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>


