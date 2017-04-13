<?php
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\DateTimePicker;
use backend\models\Category;
use common\components\CSXCore;
use yii\helpers\ArrayHelper;
use backend\models\Brand;
use kartik\widgets\FileInput;
use yii\helpers\Url;
use kartik\tabs\TabsX;
use backend\assets\SummernoteAsset;

SummernoteAsset::register($this);

/* @var $this yii\web\View */
/* @var $model backend\models\Goods */
/* @var $form yii\widgets\ActiveForm */

$cates = Category::find()->select('id, name, parent_id')->asArray()->where(['is_show' => 1])->orderBy('cate_path')->all();
$tree = CSXCore::list_to_tree($cates);
$brands = Brand::find()->asArray()->select(['id', 'brand_name'])->where(['is_show'=>1])->all();

foreach ($tree as $key => $item){
    $tree[$key]['name'] = $item['tree_html'] . ' ' .  $item['name'];
}

?>



<div class="goods-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?php 
    $content1 =
            $form->field($model, 'cate_id')->dropDownList(ArrayHelper::map($tree, 'id', 'name'), [
                'prompt' => ['text' => '请选择', 'options' => ['value' => '0', 'class' => 'prompt']],
            ])->label('商品分类') . 

            $form->field($model, 'brand_id')->dropDownList(ArrayHelper::map($brands, 'id', 'brand_name'), [
                'prompt' => ['text' => '请选择', 'options' => ['value' => '0', 'class' => 'prompt']],
            ])->label('品牌') .

            $form->field($model, 'goods_name')->textInput(['maxlength' => true]) .

            $form->field($model, 'sub_name')->textInput(['maxlength' => true]) .

            $form->field($model, 'type')->dropDownList([
                '0' => '普通商品',
                '1' => '直购商品'
            ], [
                'prompt' => ['text' => '请选择', 'options' => ['value' => '-1', 'class' => 'prompt']],
            ]) .

            $form->field($model, 'market_price', [
                'addon' => [ 
                    'append' => [
                        'content' => '<i class="glyphicon glyphicon-yen"></i>', 
                        'options' => ['style' => 'border-top-right-radius: 4px;border-bottom-right-radius: 4px;']
                    ],
                ]
            ])->textInput() . 

            $form->field($model, 'price', [
                'addon' => [ 
                    'append' => [
                        'content' => '<i class="glyphicon glyphicon-yen"></i>', 
                        'options' => ['style' => 'border-top-right-radius: 4px;border-bottom-right-radius: 4px;']
                    ],
                ]
            ])->textInput() . 

            $form->field($model, 'stock')->textInput([
                'min' => 0,
                'type' => 'number',
                'maxlength' => true,
                'value' => $model->stock ? $model->stock : 0
            ]) . 

            $form->field($model, 'warn_number')->textInput([
                'min' => 0,
                'type' => 'number',
                'maxlength' => true,
                'value' => $model->warn_number ?: 50 
            ]) . 

            $form->field($model, 'earn', [
                'addon' => [
                    'append' => [
                        'content' => '<i class="glyphicon glyphicon-yen"></i>', 
                        'options' => ['style' => 'border-top-right-radius: 4px;border-bottom-right-radius: 4px;']
                    ],
                ]
            ])->textInput(['maxlength' => true, 'value' => $model->earn ? $model->earn : 0]) . 

            $form->field($model, 'spec_name_one')->textInput(['maxlength' => true]) . 

            $form->field($model, 'spec_name_two')->textInput(['maxlength' => true]) . 

            $form->field($model, 'sort')->textInput(['value' => $model->sort ? $model->sort : 100, 'type' => 'number'])->label('排序');

    $content2 = 
            $form->field($model, 'content')->textarea()->label('商品详情');
    
    $content3 =
            
            Html::activeHiddenInput($model, 'img_home', ['id' => 'goods-img_home']) . 
            
            $form->field($model, 'img_home_file')->widget(FileInput::className(), [
                'options' => ['accpet' => 'image/*'],
                'pluginOptions' => [
                    'layoutTemplates'=> [
                        'progress' => '',
                    ],
                    'uploadUrl' => Url::to(['upload/upload-image']),
                    'uploadExtraData' => [
                        'fileName' => 'Goods[img_home_file]'
                    ],
                    'allowedFileExtensions' => ['jpg', 'gif', 'png'],
                    'maxFilePreviewSize' => 3072, // 3M
                    'maxFileCount' => 1,
                    'autoReplace' => true,
                    'dropZoneEnabled' => false,
                    'showPreview' => true,
                    'showUploadedThumbs' => false,
//                    'browseClass' => "btn btn-primary btn-block",
                    'browseLabel' => '请选择图片',
                    'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                    'showCaption' => true,
                    'showRemove' => false,
                    'showUpload' => false,
                    'msgUploadEnd' => '上传成功',
                    'initialPreview'=> $model->img_home ? [Yii::$app->params['frontendUrl'] . $model->img_home] : [],
                    'initialPreviewAsData' => true,
                    'initialPreviewConfig' => [
                        ['caption' => basename($model->img_home), 'size' => '873727', 'url'=>Url::to(['upload/upload-delete'])],
                    ],

                ],


                'pluginEvents' => [
                    // 文件选择后立即异步上传
        //            'fileselect' => 'function() { $(this).fileinput("upload") }',

                    // 单击预览中上传按钮
                    'fileuploaded' => 'function(event, data, previewId, index) {
                                            var obj = document.getElementById(previewId);
                                            $(obj).attr("path", data.response.path);
                                            $("#goods-img_home").val(data.response.path);
                                        }',
                    // 单击预览中删除按钮
                    'filesuccessremove' => 'function(event, id){
                                            var obj = document.getElementById(id);
                                            var path = $(obj).attr("path");
                                            console.log(obj, path);
                                            $("#goods-img_home").val("");
                                        }',
                    // 删除后  必须设置删除的url才会触发
                    'filedeleted' => 'function(event, key){
                        $("#goods-img_home").val("");
                        }',
                ]
            ])->label('首页展示图') . 

            Html::activeHiddenInput($model, 'img_thumb_file', ['id' => 'goods-img_thumb']) . 
            
            $form->field($model, 'img_thumb_file')->widget(FileInput::className(), [
                'options' => ['accpet' => 'image/*'],
                'pluginOptions' => [
                    'layoutTemplates'=> [
                        'progress' => '',
                    ],
                    'uploadUrl' => Url::to(['upload/upload-image']),
                    'uploadExtraData' => [
                        'fileName' => 'Goods[img_home_file]'
                    ],
                    'allowedFileExtensions' => ['jpg', 'gif', 'png'],
                    'maxFilePreviewSize' => 3072, // 3M
                    'maxFileCount' => 1,
                    'autoReplace' => true,
                    'dropZoneEnabled' => false,
                    'showPreview' => true,
                    'showUploadedThumbs' => false,
//                    'browseClass' => "btn btn-primary btn-block",
                    'browseLabel' => '请选择图片',
                    'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                    'showCaption' => true,
                    'showRemove' => false,
                    'showUpload' => false,
                    'msgUploadEnd' => '上传成功',
                    'initialPreview'=> $model->img_home ? [Yii::$app->params['frontendUrl'] . $model->img_home] : [],
                    'initialPreviewAsData' => true,
                    'initialPreviewConfig' => [
                        ['caption' => basename($model->img_home), 'size' => '873727', 'url'=>Url::to(['upload/upload-delete'])],
                    ],

                ],

                'pluginEvents' => [
                    // 文件选择后立即异步上传
        //            'fileselect' => 'function() { $(this).fileinput("upload") }',

                    // 单击预览中上传按钮
                    'fileuploaded' => 'function(event, data, previewId, index) {
                                            var obj = document.getElementById(previewId);
                                            $(obj).attr("path", data.response.path);
                                            $("#goods-img_home").val(data.response.path);
                                        }',
                    // 单击预览中删除按钮
                    'filesuccessremove' => 'function(event, id){
                                            var obj = document.getElementById(id);
                                            var path = $(obj).attr("path");
                                            console.log(obj, path);
                                            $("#goods-img_home").val("");
                                        }',
                    // 删除后  必须设置删除的url才会触发
                    'filedeleted' => 'function(event, key){
                        $("#goods-img_home").val("");
                        }',
                ]
            ])->label('商品缩略图(中)') . 
            
            //Html::activeHiddenInput($model, 'album_string', ['id' => 'goods-album_string']) . 
            
            $form->field($model, 'album_string', [
                'options' => [
                    'style' => 'display:none;'
                ],
//                'selectors' => [
//                    'container' => '.field-goods-album_file',
//                ]
            ])->hiddenInput() . 
            
            $form->field($model, 'album_file')->widget(FileInput::className(), [
                'options' => ['accpet' => 'image/*', 'multiple' => true],
                'pluginOptions' => [
                    'layoutTemplates'=> [
                        'progress' => '',
                    ],
                    'uploadUrl' => Url::to(['upload/upload-image']),
                    'uploadExtraData' => [
                        'fileName' => 'Goods[album_file]'
                    ],
                    'allowedFileExtensions' => ['jpg', 'gif', 'png'],
                    'maxFilePreviewSize' => 3072, // 3M
                    'maxFileCount' => 4,   // 图册最多4张
                    'autoReplace' => true,
                    'dropZoneEnabled' => true,
                    'showPreview' => true,
                    'showUploadedThumbs' => false,
                    'showBrowse' => false,
                    'browseOnZoneClick' => true,
//                    'dropZoneTitle' => '将图片拖动到此处上传...',
//                    'dropZoneClickTitle' => '<br/>(或单击选择图片)',
                    'browseClass' => "btn btn-primary",
                    'browseLabel' => '请选择图片',
                    'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                    'showCaption' => false,
                    'showRemove' => false,
                    'showUpload' => false,
                    'msgUploadEnd' => '上传成功',
                    'initialPreview'=> $model->img_home ? [Yii::$app->params['frontendUrl'] . $model->img_home] : [],
                    'initialPreviewAsData' => true,
                    'initialPreviewConfig' => [
                        ['caption' => basename($model->img_home), 'size' => '873727', 'url'=>Url::to(['upload/upload-delete'])],
                    ],

                ],

                'pluginEvents' => [
                    // 文件选择后立即异步上传
        //            'fileselect' => 'function() { $(this).fileinput("upload") }',

                    // 单击预览中上传按钮
                    'fileuploaded' => 'function(event, data, previewId, index) {
                                            var obj = document.getElementById(previewId);
                                            $(obj).attr("path", data.response.path);
                                            var album_string = $("#goods-album_string").val();
                                            if (album_string.length >0){
                                                album_arr = album_string.split(",");
                                            }else{
                                                var album_arr = [];
                                            }
                                            album_arr.push(data.response.path);
                                            $("#goods-album_string").val(album_arr.join(","));
                                        }',
                    // 单击预览中删除按钮
                    'filesuccessremove' => 'function(event, id){
                                            var obj = document.getElementById(id);
                                            var path = $(obj).attr("path");
                                            var album_string = $("#goods-album_string").val();
                                            if (album_string.length > 0){
                                                album_arr = album_string.split(",");
                                                str_index = album_arr.indexOf(path);
                                                if (str_index !== -1){
                                                    album_arr.splice(str_index, 1);
                                                }
                                            }
                                            
                                            if (album_arr.length >0){
                                                $("#goods-album_string").val(album_arr.join(","));
                                            }else{
                                                $("#goods-album_string").val("");
                                            }
                                        }',
                    // 删除后  必须设置删除的url才会触发
                    'filedeleted' => 'function(event, key){
                        alert(key);
                        console.log(key);
                        $("#goods-album_string").val("");
                        }',
                ]
            ])->label('商品图册'); 
            
    $content4 =
            $form->field($model, 'event_price', [
                'addon' => [
                    'append' => [
                        'content' => '<i class="glyphicon glyphicon-yen"></i>', 
                        'options' => ['style' => 'border-top-right-radius: 4px;border-bottom-right-radius: 4px;']
                    ],
                ]
            ])->textInput() . 

            $form->field($model, 'event_start_date')->widget(DateTimePicker::className(), [
                'options' => ['placeholder' => '请选择开始时间'],
                'removeButton' => false,
                'pickerButton' => ['icon' => 'time'],
                'pluginOptions' => [
                    'autoclose' => true,
                ]
            ]) . 

            $form->field($model, 'event_end_date')->widget(DateTimePicker::className(), [
                'options' => ['placeholder' => '请选择结束时间'],
                'removeButton' => false,
                'pickerButton' => ['icon' => 'time'],
                'pluginOptions' => [
                    'autoclose' => true,
                ]
            ]);
    
    $content5 =
            $form->field($model, 'is_add')->dropDownList(['1'=>'是', '0' => '否'], [
            ])->label('是否上架') . 

            $form->field($model, 'reason')->textInput(['maxlength' => true]) . 

            $form->field($model, 'is_cash')->dropDownList(['0' => '否', '1' =>'是'])->label('是否支持货到付款') . 
            
            $form->field($model, 'free_maill')->dropDownList(['0' => '否', '1' => '是']) . 

            $form->field($model, 'is_alone_sale')->dropDownList(['1' => '是', '0'=>'否'])->label('是否允许单独销售') . 

            $form->field($model, 'is_coupon')->dropDownList(['1' => '是', '0'=>'否'])->label('是否支持优惠券') . 

            $form->field($model, 'is_refund')->dropDownList(['1' => '是', '0'=>'否'])->label('是否可以退货') . 

            $form->field($model, 'is_exchange')->dropDownList(['1' => '是', '0'=>'否'])->label('是否可以换货') . 

            $form->field($model, 'is_hot')->dropDownList(['0'=>'否', '1' => '是'])->label('是否推荐') . 
            
            $form->field($model, 'is_del')->dropDownList(['0'=>'否', '1' => '是'])->label('是否删除');
    
    $content6 ="";
    ?>
    
    <?php 
    
        $items = [
            [
                'label'=>'<i class="glyphicon glyphicon-home"></i> 基本信息',
                'content'=>$content1,
                'active'=>true
            ],
            
            [
                'label'=>'<i class="glyphicon glyphicon-edit"></i> 详情信息',
                'content'=>$content2,
            ],
            
            [
                'label'=>'<i class="glyphicon glyphicon-picture"></i> 图片信息',
                'content'=>$content3,
            ],
            [
                'label'=>'<i class="glyphicon glyphicon-gift"></i> 促销活动',
                'content'=>$content4,
            ],
            [
                'label'=>'<i class="glyphicon glyphicon-retweet"></i> 销售控制',
                'content'=>$content5,
            ],
            [
                'label'=>'<i class="glyphicon glyphicon-link"></i> 扩展信息',
                'content'=>$content6,
            ],
        ];
    
        echo TabsX::widget([
            'items'=>$items,
            'position'=>TabsX::POS_ABOVE,
            'encodeLabels'=>false
        ]);
    ?>
    
    <div class="form-group" style="clear:both;">
        &nbsp;
        <?= Html::submitButton($model->isNewRecord ? '新增' : '更新', [
            'class' => $model->isNewRecord ? 'btn btn-success pull-right' : 'btn btn-primary pull-right',
            'style' => 'margin-right:30px;'
        ]) ?>
        
        <p id="sdff"></p>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$js = <<<EOT
$(document).ready(function(){
        $('#goods-content').summernote({
            height: 300,              // set editor height
            minHeight: null,          // set minimum height of editor
            maxHeight: null,          // set maximum height of editor
            focus: false,          // set focus to editable area after initializing summernote
            lang: 'zh-CN',
//            toolbar: [
//                        // [groupName, [list of button]]
//                        ['style', ['bold', 'italic', 'underline', 'clear']],
//                        ['font', ['strikethrough', 'superscript', 'subscript']],
//                        ['fontsize', ['fontsize']],
//                        ['color', ['color']],
//                        ['para', ['ul', 'ol', 'paragraph']],
//                        ['height', ['height']]
//                      ],
            callbacks: {
                onImageUpload: function(files) {
                    return;
                    for (var i=0; i<files.length; i++){
                        send(files[i]);
                    }
                }
            },
//            placeholder: 'write something here...'
            
            
        });
        
//        $('#summernote').summernote('disable');

        function send(file){
            if (file.type.includes('image')) {
                var name = file.name.split(".");
                name = name[0];
                var data = new FormData();
                data.append('file', file);
                $.ajax({
                    url: "{{route('upload')}}",
                    type: 'POST',
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: 'JSON',
                    data: data,
                    success: function (json) {
                        console.log(json);
                        $('#summernote').summernote('insertImage', json.data.url, name);
                    }
                });
            }
        }
        
    });
EOT;
$this->registerJs($js, $this::POS_END);

$css = <<<EOT
.note-btn-group .btn-default {background-color:#FFF;}        
EOT;
$this->registerCss($css);

?>
