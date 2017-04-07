<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */

$this->title = 'Create Category';
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-create">

    <section class="content">
        
        <div class="bg_box" style="background:#fff;width: 100%;min-height: 935px;padding:10px 30px;">

            <h3>
                <?= Html::encode($this->title) ?>
                <a class="btn btn-primary pull-right" href="<?= Url::to([$this->context->id.'/index'])?>">返回列表</a>
            </h3>
            
            <br/>
            
            <?php if ( count( $flashes = Yii::$app->session->getAllFlashes() ) ){
//                show($flashes);
//                exit;
            }
            ?>
            
            <?php //echo Alert::widget() ?>
            
            <?php if (Yii::$app->session->has('model-error')):?>
            <div class="alert alert-warning alert-dismissible" style="background-color: #f78052 !important;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> 数据录入错误!</h4>
                <ul>
                    <?php foreach (Yii::$app->session->get('model-error') as $error):?>
                    <li><?= $error ?></li>
                    <?php endforeach;?>
                </ul>
            </div>
            <?php endif;?>
            
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
                
        </div>
    </section>
</div>
