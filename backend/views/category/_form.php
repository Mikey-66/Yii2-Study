<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'logo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pinyin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_show')->dropDownList(['1' => '显示', '0' => '不显示'], [
//        'prompt' => '请选择',
        'prompt' => ['text' => '请选择', 'options' => ['value' => '-1', 'class' => 'prompt']],
        'options' => [
            '0' => [
                'disabled' => false
            ],
            '1' => [
                'class' => 'sdsd'
            ]
        ],
        
    ]) ?>

    <?= $form->field($model, 'is_recom')->dropDownList([1 => '是',0 => '否'], [
        'prompt' => ['text' => '请选择', 'options' => ['value' => '-1', 'class' => 'prompt']],
    ]) ?>

    <?= $form->field($model, 'parent_id')->textInput() ?>

    <?= $form->field($model, 'sort')->textInput([
        'type' => 'number'
    ]) ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
