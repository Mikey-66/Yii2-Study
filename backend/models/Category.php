<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "csc_category".
 *
 * @property integer $id
 * @property string $name
 * @property string $logo
 * @property string $pinyin
 * @property string $link
 * @property integer $is_show
 * @property integer $is_recom
 * @property integer $parent_id
 * @property string $cate_path
 * @property integer $sort
 * @property string $created_at
 * @property string $updated_at
 */
class Category extends \backend\models\Base
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'csc_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'parent_id', 'cate_path'], 'required'],
            [['id', 'is_show', 'is_recom', 'parent_id', 'sort', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['logo', 'link', 'cate_path'], 'string', 'max' => 200],
            [['pinyin'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名称',
            'logo' => '分类logo',
            'pinyin' => '英文描述',
            'link' => '绑定链接',
            'is_show' => '是否显示',
            'is_recom' => '是否推荐',
            'parent_id' => '父级分类ID',
            'cate_path' => '分类路径',
            'sort' => '排序数字',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * 定义关联关系
     * @return type
     */
    public function getParent(){
        return $this->hasOne(self::className(), ['id' => 'parent_id']);
    }
    
    public function getChildren(){
        return $this->hasMany(self::className(), ['parent_id' => 'id']);
    }
    
    public function save($runValidation = true, $attributeNames = null) {
        
        if ($this->getIsNewRecord()){
            $this->created_at = $this->updated_at = time();
        }else{
            $this->updated_at = time();
        }
        
        parent::save($runValidation, $attributeNames);
    }
}
