<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\widgets\ActiveForm;
use kartik\widgets\FileInput;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use backend\models\Category;
use common\components\CSXCore;
/* @var $this yii\web\View */
/* @var $model backend\models\Category */
/* @var $form kartik\widgets\ActiveForm */
?>

<?php 
$cates = Category::find()->select('id, name, parent_id')->asArray()->where(['is_show' => 1])->orderBy('cate_path')->all();
$tree = CSXCore::list_to_tree($cates);

foreach ($tree as $key => $item){
    $tree[$key]['name'] = $item['tree_html'] . ' ' .  $item['name'];
}
//show($tree);exit;
?>
<div class="category-form">

    <?php $form = ActiveForm::begin([
//        'options'=>['enctype'=>'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    
    <?= Html::activeHiddenInput($model, 'logo', ['id' => 'category-logo'])?>
    
    <?= $form->field($model, 'img_logo')->widget(FileInput::className(), [
        'options' => ['accpet' => 'image/*'],
        'pluginOptions' => [
            'layoutTemplates'=> [
                'progress' => '',
//                   # the template for rendering the widget with caption
//                  'main1' => '{preview}               
//                            <div class="kv-upload-progress hide"></div>
//                            <div class="input-group {class}">
//                                {caption}
//                                <div class="input-group-btn">
//                                    {remove}
//                                    {cancel}
//                                    {upload}
//                                    {browse}
//                                </div>
//                            </div>',
//                  'main2' => "{preview}\n{remove}\n{cancel}\n{upload}\n{browse}\n",  //the template for rendering the widget without caption
            ],
            'uploadUrl' => Url::to(['upload/upload-image']),
            'uploadExtraData' => [
                'fileName' => 'Category[img_logo]'
            ],
            //'allowedFileTypes' => ['image'],                // 这个和下面一项配置是冲突的，选其一配置
            'allowedFileExtensions' => ['jpg', 'gif', 'png'],
            'maxFilePreviewSize' => 3072, // 3M
            'maxFileCount' => 1,
            'autoReplace' => true,
            'dropZoneEnabled' => false,
            'showPreview' => true,
            'showUploadedThumbs' => false,
            'browseClass' => "btn btn-primary btn-block",
            'browseLabel' => '请选择图片',
            'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
            'showCaption' => false,
            'showRemove' => false,
            'showUpload' => false,
            'msgUploadEnd' => '上传成功',
            'initialPreview'=> $model->logo ? [Yii::$app->params['frontendUrl'] . $model->logo] : [],
            'initialPreviewAsData' => true,
            'initialCaption'=>"The Moon and the Earth",
            'initialPreviewConfig' => [
                ['caption' => basename($model->logo), 'size' => '873727', 'url'=>Url::to(['upload/upload-delete'])],
            ],
//            'initialPreviewShowDelete' => false,
            
        ],
        
        
        'pluginEvents' => [
            
            // 文件选择后立即异步上传
//            'fileselect' => 'function() { $(this).fileinput("upload") }',
            
            // 单击预览中上传按钮
            'fileuploaded' => 'function(event, data, previewId, index) {
                                    var obj = document.getElementById(previewId);
                                    $(obj).attr("path", data.response.path);
                                    $("#category-logo").val(data.response.path);
                                }',
            // 单击预览中删除按钮
            'filesuccessremove' => 'function(event, id){
                                    var obj = document.getElementById(id);
                                    var path = $(obj).attr("path");
                                    console.log(obj, path);
                                    $("#category-logo").val("");
                                }',
            // 预删除  必须设置删除的url才会触发
//            'filepredelete' => 'function(event, key){
//                alert("pre-delete");
//                }',
            // 删除后  必须设置删除的url才会触发
            'filedeleted' => 'function(event, key){
                $("#category-logo").val("");
                }',
        ]
    ])->label('LOGO图片')?>
    
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

    <?= $form->field($model, 'parent_id')->dropDownList(
        ArrayHelper::map($tree, 'id', 'name'), [
                'prompt' => ['text' => '请选择', 'options' => ['value' => '0', 'class' => 'prompt']],
            ]
    )?>

    <?= $form->field($model, 'sort')->textInput([
        'type' => 'number'
    ]) ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
