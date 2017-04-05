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
    
    // String icon图标
    public $icon;
    
    public function render($content = null)
    {
        if ($content === null) {
            if (!isset($this->parts['{input}'])) {
                $this->textInput();
            }
            
            if ($this->icon){
                $this->parts['{icon}'] = $this->icon;
            }else{
                $this->parts['{icon}'] = '';
            }
            
            if (!isset($this->parts['{label}'])) {
                $this->label();
            }
            if (!isset($this->parts['{error}'])) {
                $this->error();
            }
            if (!isset($this->parts['{hint}'])) {
                $this->hint(null);
            }
            $content = strtr($this->template, $this->parts);
        } elseif (!is_string($content)) {
            $content = call_user_func($content, $this);
        }
        
        return $this->begin() . "\n" . $content . "\n" . $this->end();
    }
    
}

