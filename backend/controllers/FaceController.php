<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace backend\controllers;

use backend\controllers\BaseController;

use common\components\BaseApi;

class FaceController extends BaseController{
    
    public $layout = "admin";


    public function actionIndex(){

        return $this->render('index');
    }
    
    
}

