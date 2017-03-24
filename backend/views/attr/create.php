<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\AttrType */

$this->title = 'Create Attr Type';
$this->params['breadcrumbs'][] = ['label' => 'Attr Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attr-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
