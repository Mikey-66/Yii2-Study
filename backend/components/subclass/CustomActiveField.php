<?php

namespace backend\components\subclass;

use yii\widgets\ActiveField;


class CustomActiveField extends ActiveField {
    
    public $template = "{label}\n{input}";
    
    public $labelOptions = [
        'class' => 'control-label',
    ];
    
    // input 标签的html属性
    public $inputOptions = [
        'class' => 'form-control'
    ];
    
}

