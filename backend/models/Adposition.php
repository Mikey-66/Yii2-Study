<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "csc_adposition".
 *
 * @property string $id
 * @property string $name
 * @property integer $width
 * @property integer $height
 * @property integer $is_system
 * @property string $description
 * @property string $add_time
 */
class Adposition extends \backend\models\Base
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'csc_adposition';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'width', 'height', 'add_time'], 'required'],
            [['width', 'height', 'is_system'], 'integer'],
            [['add_time'], 'safe'],
            [['id'], 'string', 'max' => 32],
            [['name'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '主键',
            'name' => '广告位名称',
            'width' => '广告位宽度',
            'height' => '广告位高度',
            'is_system' => '是否系统定义 0否 1是  系统定义广告位不允许删除',
            'description' => '广告位描述',
            'add_time' => '发布日期',
        ];
    }
}
