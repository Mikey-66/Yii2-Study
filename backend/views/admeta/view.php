<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AdMeta */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Ad Metas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ad-meta-view">
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
            'type',
            'pos_id',
            'store_id',
            'begin_time',
            'end_time',
            'url:url',
            'is_show',
            'sort',
            'img',
            'img_url:url',
            'flash',
            'flash_url:url',
            'code',
            'text',
            'contactor',
            'email:email',
            'phone',
            'site_id',
            'relation_pos_id',
            'add_time',
        ],
    ]) ?>
        </div>
    </section>
</div>
