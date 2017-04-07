<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\CategorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-md-8">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">查询</h3>
        </div>
        <div class="box-body">
            <div class="category-search">

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

    <?php // echo $form->field($model, 'logo') ?>

    <?php // echo $form->field($model, 'pinyin') ?>

    <?php // echo $form->field($model, 'link') ?>

    <?php // echo $form->field($model, 'is_show') ?>

    <?php // echo $form->field($model, 'is_recom') ?>

    <?php // echo $form->field($model, 'parent_id') ?>

    <?php // echo $form->field($model, 'cate_path') ?>

    <?php // echo $form->field($model, 'sort') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

                &nbsp;
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>&nbsp;
                <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>


