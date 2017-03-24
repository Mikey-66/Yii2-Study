<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use Symfony\Component\VarDumper\Dumper\HtmlDumper;
use common\components\Image;
use yii\helpers\Url;

class StartController extends Controller{
    
    /**
     * 一些基础的信息
     */
    public function actionIndex(){
        
        show(Yii::$app->request->baseUrl);
        exit;
        echo Yii::getAlias('@root'). '<br/>';
        echo Yii::getAlias('@root/resources/adminLTE/'). '<br/>';
        
        
        echo Yii::getAlias('@root/resources/giitemplate/crud/default'). '<br/>';
        
        // 目录信息
        echo Yii::getAlias('@common'). '<br/>';
        echo Yii::getAlias('@frontend'). '<br/>';
        echo Yii::getAlias('@backend'). '<br/>';
        echo Yii::getAlias('@console'). '<br/>';
        
        
        echo Yii::getAlias('@yii/assets'). '<br/>';
        echo Yii::getAlias('@bower/jquery/dist'). '<br/>';
        echo Yii::getAlias('@web'). '<br/>';
        echo Yii::getAlias('@webroot'). '<br/>';
        exit;
        
        
        echo "<hr/>";
        
        echo Yii::$app->basePath . '<br/>';
        
        echo "<hr/>";
        
        echo Yii::$app->request->baseUrl . '<br/>';
        
        echo "<hr/>";
        
        echo Yii::$app->request->getHostInfo() . '<br/>';
        echo Yii::$app->request->getHostName() . '<br/>';
        echo Yii::$app->request->getAbsoluteUrl() . '<br/>';
        echo Yii::$app->request->getUrl() . '<br/>';
        echo Yii::$app->request->getUserAgent() . '<br/>';
        echo Yii::$app->request->getUserHost() . '<br/>';
        echo Yii::$app->request->getUserIP() . '<br/>';
        echo Yii::$app->request->getBaseUrl(). '<br/>';
        
        exit;
        
        
    }
    
    public function actionTest(){
        
        Image::move();
        
    }
    
}

