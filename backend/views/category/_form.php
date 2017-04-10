<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\widgets\ActiveForm;
use kartik\widgets\FileInput;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\models\Category */
/* @var $form kartik\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    
    <?php echo $form->field($model, 'logo')->widget(FileInput::className(), [
//        'options' => ['accpet' => 'image/*'],
        'options' => ['accpet' => 'image/*'],
        'pluginOptions' => [
            'uploadUrl' => Url::to(['upload/upload-image']),
            'uploadExtraData' => [
                'fileName' => 'Category[logo]'
            ],
            //'allowedFileTypes' => ['image'],                // 这个和下面一项配置是冲突的，选其一配置
            'allowedFileExtensions' => ['jpg', 'gif', 'png'],
            'maxFilePreviewSize' => 3072, // 3M
//            'maxFileCount' => 1,
            'dropZoneEnabled' => false,
            'showPreview' => true,
            'browseClass' => "btn btn-primary btn-block",
            'browseLabel' => '请选择图片',
            'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
            'showCaption' => false,
            'showRemove' => false,
            'showUpload' => false,
        ]
    ])?>
    
    <?php 
    /*
    $form->field($model, 'file')->widget(FileInput::classname(), [
         'pluginOptions' => [
             'showCaption' => false,
             'showRemove' => false,
             'showUpload' => false,
             'browseClass' => 'btn btn-primary btn-block',
             'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
             'browseLabel' =>  '请选择图片',
             'initialPreview'=>[
                 $model->isNewRecord ? null : Html::img(Yii::$app->params['frontend_img'] . $model->img_larger, ['class'=>'file-preview-image', 'width'=>'340']),
             ],
         ],
         'options' => ['accept' => 'image/*',]
     
     ])->label('商品封面图');
    */
    ?>

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
