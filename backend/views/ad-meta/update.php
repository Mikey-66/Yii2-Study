<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\AdMeta */

$this->title = 'Update Ad Meta: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Ad Metas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ad-meta-update">

    <section class="content">
        
        <div class="bg_box" style="background:#fff;width: 100%;min-height: 935px;padding:10px 30px;">

            <h3>
                <?= Html::encode($this->title) ?>
                <a class="btn btn-primary pull-right" href="<?= Url::to([$this->context->id.'/index'])?>">返回列表</a>
            </h3>
            
            <br/>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
                
        </div>
    </section>
</div>
