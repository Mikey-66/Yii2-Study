<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\DataColumn;
use yii\grid\CheckboxColumn;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '分类列表';
$this->params['main-title'] = '分类管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
            <div class="row">
                
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
                
                <div class="col-md-4">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">操作</h3>
                        </div>

                        <div class="box-body">
<?= Html::a('Create Category', ['create'], ['class' => 'btn btn-primary']) ?>&nbsp;&nbsp;
                            
                            <div class="btn-group">
                                <button type="button" class="btn  btn-default ">其他</button>
                                <button type="button" class="btn  btn-default dropdown-toggle" data-toggle="dropdown">
                                  <span class="caret"></span>
                                  <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="#">Another action</a></li>
                                  <li><a href="#">Something else here</a></li>
                                  <li class="divider"></li>
                                  <li><a href="#">Separated link</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">
                        列表
                    </h3>
                </div>

                <div class="box-body">
                    
    <?php
//    Pjax::begin();
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'filterPosition' => GridView::FILTER_POS_BODY,
        'columns' => [
            
            # 没有类名的列  默认类是 DataColumn
            ['class' => CheckboxColumn::className()],
            ['class' => 'yii\grid\SerialColumn'],
            [
                'class' => DataColumn::className(), // this line is optional
                'attribute' => 'name',
                'format' => 'text',
                'label' => '分类名称',
            ],
            
            # 上面这一列可以简写为：
//            'name:text:名称',
            
            # dataProvider 使用了ar，可以使用关联对象语法
            [ 
                'attribute' => 'parent.name',
                'label' => '父级分类',
                'format' => 'text',
                'enableSorting' => false // 指定本列是否允许排序
            ],
            
            // 或者使用如下shortcut写法
//            'parent.name:text:父级分类',
            
//            'id',
//            'name',
//            'logo',
//            'pinyin',
//            'link',
            [
                'attribute' => 'is_show',
                'value' => function($row){
                   return $row['is_show'] ? '显示' : '不显示';
                }
            ],
            
            // 'is_recom',
//             'parent_id',
            // 'cate_path',
            [
                'attribute' => 'sort',
                'value' => function($row, $key, $index, $column){  // 这里值必须是一个有效的回调函数,可以接受4个参数
//                    return $row['sort'] + 10;
                      return $row['sort'];
                }
            ],
//             'sort',
//             'created_at',
//             'updated_at:datetime',
//            [
//                'attribute' => 'updated_at',
//                'format' => ['datetime', 'php:Y-m-d H:i:s']
//            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作',
                'headerOptions' => ['class' => 'action-column text-left', 'style'=>'color:#337ab7;'],
                'template' => "{view} {update} {delete} &nbsp;{service}",
                'buttons' => [
                    'service' => function($url, $model, $key){
                        return Html::a( Html::tag('span', '', ['class' => 'glyphicon glyphicon-zoom-in']) , Url::to(['category/index']));
                    }
                ]
            ],
        ],
    ]); 
//    Pjax::end();
    ?>
                </div>
            </div>
        </div>
        </div>
    </section>
</div>
