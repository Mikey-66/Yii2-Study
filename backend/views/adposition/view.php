<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Adposition */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Adpositions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adposition-view">
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
            'width',
            'height',
            'is_system',
            'description',
            'add_time',
        ],
    ]) ?>
        </div>
    </section>
</div>
