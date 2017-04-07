<?php

namespace backend\models;
use yii\db\ActiveRecord;

class Base extends ActiveRecord
{
    /**
     * 取出模型验证错误信息
     * 返回一维数组
     * @return type
     */
    public function fetchErrors(){
        $errors = [];
        
        if ( count( $modelErrors = $this->getErrors()) ){
            foreach ($modelErrors as $attributeErrors){
                $errors = array_merge($errors, $attributeErrors);
            }
        }
        
        return $errors;
    }
}