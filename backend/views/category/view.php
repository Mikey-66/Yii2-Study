<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">
    <section class="content">
        <div class="bg_box" style="background:#fff;width: 100%;min-height: 935px;padding:10px 30px;">
            <h1><?= Html::encode($this->title) ?></h1>

            <p>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            # 可以不用设置attribute， 此时label 和 value 必须设置
            [
                'label' => 'label1',
                'value' => 100 
            ],
            # 下面是一个完整的例子
            [
                'attribute' => 'logo',
                'format' => 'html',
                'label' => '分类Logo',
                'value' => function($model, $wdiget){
                    return Html::img(Yii::$app->params['frontendUrl'] . $model->logo, ['class' => 'custom']);
                },
                'visible' => true,
//                'contentOptions' => ['class' => 'bg-red'],
                'captionOptions' => ['width' => '200'],
            ],
            # 以上可以简写如下
//            'logo:text:分类Logo',
            
            'pinyin',
            'link',
            'is_show',
            'is_recom',
            'parent_id',
            'cate_path',
            'sort',
            'created_at',
            'updated_at',
        ],
    ]) ?>
        </div>
    </section>
</div>
