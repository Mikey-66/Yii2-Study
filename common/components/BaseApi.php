<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace common\components;
use Yii;

class BaseApi{
    
    static function getContentImg($content){
        
        $arr = array();
        
//        $tps = basename(Yii::app()->params['img_upload_dir']);

        $content = str_replace(array('&quot;', '&lt;', '&gt;'), array('"', '<', '>'), $content);
        $pat = '/<img.+src=[\'\"]?.+[\'\"]?.*>/SU';
        preg_match_all($pat, $content, $matches);

        if( isset($matches[0]) && is_array($matches[0]) ){

            $pat = '/src=[\'\"](.*)[\'\"]/SiU';
            foreach ($matches[0] as $v){
                preg_match($pat, $v, $src);
                show($src);exit;
                $src = trim($src[1]);

//                if(strstr($src, '/'.$tps.'/')){
                        $arr[] = $src;
//                }
            }
        }
        
        return $arr;
    }
    
    /**
     * 依次建立路径目录
     * $dirNameArr 
     * [
     *      'goods',
     *      'cover'
     * ]
     */
    static function makePathDir( array $dirNameArr){
        
        $uploads_dir = Yii::$app->params['uploads_dir'];
        
        $path = rtrim($uploads_dir, '/');
        
        foreach ($dirNameArr as $dirName){
            $path .= '/' . $dirName;
            
            if (!file_exists($path)){
                if ( !@mkdir($path) ){
                    die('directory not writable');
                }
            }
        }
        
        return $path;
    }
    
    static function createDir($path, $mode = 0777){
        
        if (!file_exists($path)){
            if (!@mkdir($path, $mode)){
                die('directory not writable');
            }
        }
    }

    static function getUniuqueStr(){
        return md5(uniqid(microtime(true), true));
    }

    /**
     *  临时文件上传到正式目录
     *  @var src 图片源路径
     *  @var dir 目标路径
     *  @var size [optional] 是否按给出的大小进行缩略， 适用于不需要保留原图的情况 
     */
    static function moveTempImg($src, $dir, array $size = []){
        
        $uploads_dir = dirname( Yii::$app->params['uploads_dir'] );
        $source = $uploads_dir . $src;
        
        if (file_exists($source)){
            $dir = explode('/', $dir);
            
            if (count($dir) <=0) exit('目录路径有误');
            
            $path = self::makePathDir($dir);
            
            $path .= date('/Y');
            self::createDir($path);
            
            $path .= date('/m');
            self::createDir($path);
            
            $path .= date('/d');
            self::createDir($path);
            
            $uniqueStr = self::getUniuqueStr();
            
            $ext = pathinfo($src, PATHINFO_EXTENSION);
            
            $fileName = $uniqueStr . '.' . $ext;
            
            $fullPath = $path . '/' . $fileName;
            
            // 如果指定了尺寸
            if (!empty($size)){
                Yii::$app->imageManager->make($source)->resize($size[0], $size[1])->save($fullPath);
                # 删除原临时文件
                @unlink($source);
                
                return [
                    'status' => 1,
                    'msg' => 'ok',
                    'path' => str_replace($uploads_dir, '', $fullPath)
                ];
            }
            
            if (!rename($source, $fullPath)){
                return [
                    'status' => 0,
                    'msg' => '文件移动失败'
                ];
            }
            
            return [
                'status' => 1,
                'msg' => 'ok',
                'path' => str_replace($uploads_dir, '', $fullPath)
            ];
            
        }else{
            return [
                'status' => 0,
                'msg' => '未找到临时图片'
            ];
        }
        
        
        
    }
    
    
}
