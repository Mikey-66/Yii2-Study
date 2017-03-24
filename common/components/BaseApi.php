<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace common\components;

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
    
    
}
