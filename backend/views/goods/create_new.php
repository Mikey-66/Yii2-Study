<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Goods */
$this->title = 'Create Goods';
$this->params['breadcrumbs'][] = ['label' => 'Goods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<section class="content">
    
    <div style="background:#fff;width: 100%;min-height: 935px;padding:20px 30px;">
        
        <h3>添加商品</h3>
        
        <div class="nav-tabs-custom" style="box-shadow: none;margin-top: 20px;">
            
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">基本信息</a></li>
                <li><a href="#tab_2" data-toggle="tab">图片信息</a></li>
                <li><a href="#tab_3" data-toggle="tab">扩展信息</a></li>
            </ul>
            
            <from role="form">
                <div class="tab-content">
                
                    <div class="tab-pane active" id="tab_1">
                        <br/>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <input type="file" id="exampleInputFile">

                            <p class="help-block">Example block-level help text here.</p>
                        </div>
                            
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </div>

                    <div class="tab-pane" id="tab_2">
                        <br/>
                        
                        <div class="form-group">
                            <label for="name">商品名称</label>
                            <input type="text" class="form-control" placeholder="请输入名称" id="name"/>
                        </div>

                    </div>

                    <div class="tab-pane" id="tab_3">

                    </div>
                </div>
            </from>
        </div>
    </div>
</section>
