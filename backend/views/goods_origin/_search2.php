<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\search\GoodsSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-md-8">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">查询</h3>
        </div>

        <div class="box-body">
            <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
                'options' => [
                    'class' => 'form-inline',
                ],
                'fieldClass' => 'backend\components\subclass\CustomActiveField',   //  活跃字段使用的类
            ])?>

            <?= $form->field($model, 'id')->textInput( ['placeholder' => '主键'] )?>

            <?= $form->field($model, 'goods_name')->textInput( ['placeholder' => '商品名称'] )?>&nbsp;

            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?> &nbsp;

            <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>

            <?php ActiveForm::end()?>
        </div>
    </div>
</div>