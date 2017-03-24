<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->searchModelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-md-8">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">查询</h3>
        </div>
        <div class="box-body">
            <div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-search">

                <?= "<?php " ?>$form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
                    'options' => [
                        'class' => 'form-inline'
                    ],
                    'fieldClass' => 'backend\components\subclass\CustomActiveField',

                ]); ?>

            <?php
            $count = 0;
            foreach ($generator->getColumnNames() as $attribute) {
                if (++$count < 3) {
                    echo "    <?= " . $generator->generateActiveSearchField($attribute) . " ?>\n\n";
                } else {
                    echo "    <?php // echo " . $generator->generateActiveSearchField($attribute) . " ?>\n\n";
                }
            }
            ?>
                &nbsp;
                <?= "<?= " ?>Html::submitButton(<?= $generator->generateString('Search') ?>, ['class' => 'btn btn-primary']) ?>&nbsp;
                <?= "<?= " ?>Html::resetButton(<?= $generator->generateString('Reset') ?>, ['class' => 'btn btn-default']) ?>

                <?= "<?php " ?>ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>


