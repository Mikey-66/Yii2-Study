<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\AdpositionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-md-8">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">查询</h3>
        </div>
        <div class="box-body">
            <div class="adposition-search">

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

    <?php // echo $form->field($model, 'width') ?>

    <?php // echo $form->field($model, 'height') ?>

    <?php // echo $form->field($model, 'is_system') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'add_time') ?>

                &nbsp;
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>&nbsp;
                <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>


