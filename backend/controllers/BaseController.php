<?php

/* 
 * 后台所有控制器的基类
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


class BaseController extends Controller{

    public $layout = "admin";
    
    public function behaviors() {
        
        return [
            'access' => [
                'class' => AccessControl::className(),  # 使用的类
                //'only' => ['login', 'logout', 'index'], # 指明ACF對哪些方法有效，不设置表示对所有方法有效
                'rules' => [
                    # 后台通用设置 针对所有方法， 只有登录用户允许访问 例外情况请在子控制器另行设置
                    [
                        'allow' => true, # 满足本条规则，是允许还是拒绝访问
                        'roles' => ['@'], # 针对的用户类型 @=>登录用户 ?=>游客
                        //'actions' => ['login', 'signup'] # 本条规则适用于哪些方法， 不设置表示适用于所有方法
                    ],
                ],
            ],
            
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }
    
    public function jsonMsg($code, $msg, $data=false, $url='', $transaction = null){
        
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        
        if ($code == 200 && $transaction){
            $transaction->commit();
        }elseif ($code != 200 && $transaction){
            $transaction->rollback();
        }
        
        $json = [
            'code' => (int) $code,
            'msg' => $msg,
        ];
        
        if ($data){
            $json['data'] = $data;
        }
        
        if ($url){
            $json['url'] = $url;
        }
        
        exit($json);
    }
}
