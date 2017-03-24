<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\AttrTypeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-md-8">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">查询</h3>
        </div>
        <div class="box-body">
            <div class="attr-type-search">

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

    <?php // echo $form->field($model, 'enabled') ?>

                &nbsp;
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>&nbsp;
                <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>


