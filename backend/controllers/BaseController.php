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


class BaseController extends Controller{
    
    public $layout = "admin";
}
