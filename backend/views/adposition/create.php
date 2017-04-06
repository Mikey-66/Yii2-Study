<?php

use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model backend\models\Adposition */

$this->title = 'Create Adposition';
$this->params['breadcrumbs'][] = ['label' => 'Adpositions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adposition-create">

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
