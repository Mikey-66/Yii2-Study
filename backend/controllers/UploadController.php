<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\controllers;

use Yii;
use yii\web\UploadedFile;

class UploadController extends BaseController{

    protected $imageSize = 3145728;  // 1024 * 1024 * 3 = 3M
    
    protected $allowedImgType = [
        'jpg', 'jpeg', 'png', 'gif'
    ];

    protected function getUniqueFileName(){
        return md5(uniqid(microtime(true), true));
    }

    protected function imgMsg($error=null, $initialPreview=[], $initialPreviewConfig=[], $initialPreviewThumbTags=[], $append = true){
        
        $res = [
            'append' => $append
        ];
        
        if ($error) $res['error'] = $error;
        
        if ($initialPreview) $res['initialPreview'] = $initialPreview;
        
        if ($initialPreviewConfig) $res['initialPreviewConfig'] = $initialPreviewConfig;
        
        header('Content-type:application/json; charset=utf-8');
        
        exit(json_encode($res));
    }
    
    /**
     * fileupload 异步图片上传   每次上传一个图片
     */
    public function actionUploadImage(){
        
        if (!Yii::$app->request->isAjax){
            throw new Exception('method not allowed', 403);
        }
        
        $file = Yii::$app->request->post('fileName');
        
        if (!$file){
            $this->imgMsg('未知的上传图片名');
        }
        
        $file = UploadedFile::getInstanceByName( $file );
        
        if (!$file ){
            $this->imgMsg('未找到带上传的图片');
        }
        
        if ($file->getHasError()){
            $this->imgMsg('文件上传出错，错误代码:' . $file->error);
        }
        
        // 检查文件 以及 文件扩展名
        if ($file->size > $this->imageSize){
            $this->imgMsg('图片过大');
        }
        
        $extType = $file->getExtension();
        
        if (!in_array($extType, $this->allowedImgType)){
            $this->imgMsg('禁止的图片类型');
        }
        
        if (!$imageInfo = getimagesize($file->tempName)){
            $this->imgMsg('不是真实的图片');
        }
        
        $uploadsDir = Yii::$app->params['uploads_dir'];
        
        if (!file_exists($uploadsDir)){
            $this->imgMsg('临时目录不存在');
        }
        
        $tempDir = $uploadsDir . '/temp';
        
        if (!file_exists($tempDir)){
            mkdir($tempDir);
        }
        
        $fileName = $this->getUniqueFileName() . '.' . $extType;
        
        $savePath = $tempDir . '/' . date('Y');
        
        if (!file_exists($savePath)){
            mkdir($savePath);
        }
        
        $savePath .= '/' . date('m');
        
        if (!file_exists($savePath)){
            mkdir($savePath);
        }
        
        $savePath .= '/' . date('d');
        
        if (!file_exists($savePath)){
            mkdir($savePath);
        }
        
        $fullName = $savePath . '/' . $fileName;
        
        if (!$file->saveAs($fullName)){
            $this->imgMsg('图片上传失败');
        }
        
        $this->imgMsg();
    }
    
}