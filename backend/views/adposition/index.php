<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\AdpositionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Adpositions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adposition-index">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
            <div class="row">
                
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                
                <div class="col-md-4">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">操作</h3>
                        </div>

                        <div class="box-body">
<?= Html::a('Create Adposition', ['create'], ['class' => 'btn btn-primary']) ?>&nbsp;&nbsp;
                            
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
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'width',
            'height',
            'is_system',
            // 'description',
            // 'add_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
                </div>
            </div>
        </div>
        </div>
    </section>
</div>
