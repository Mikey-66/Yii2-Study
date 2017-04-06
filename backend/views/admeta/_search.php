<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\AdMetaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-md-8">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">查询</h3>
        </div>
        <div class="box-body">
            <div class="ad-meta-search">

                <?php $form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
                    'options' => [
                        'class' => 'form-inline'
                    ],
                    'fieldClass' => 'backend\components\subclass\CustomActiveField',

                ]); ?>

                <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'pos_id') ?>

    <?php // echo $form->field($model, 'store_id') ?>

    <?php // echo $form->field($model, 'begin_time') ?>

    <?php // echo $form->field($model, 'end_time') ?>

    <?php // echo $form->field($model, 'url') ?>

    <?php // echo $form->field($model, 'is_show') ?>

    <?php // echo $form->field($model, 'sort') ?>

    <?php // echo $form->field($model, 'img') ?>

    <?php // echo $form->field($model, 'img_url') ?>

    <?php // echo $form->field($model, 'flash') ?>

    <?php // echo $form->field($model, 'flash_url') ?>

    <?php // echo $form->field($model, 'code') ?>

    <?php // echo $form->field($model, 'text') ?>

    <?php // echo $form->field($model, 'contactor') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'site_id') ?>

    <?php // echo $form->field($model, 'relation_pos_id') ?>

    <?php // echo $form->field($model, 'add_time') ?>

                &nbsp;
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>&nbsp;
                <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>


