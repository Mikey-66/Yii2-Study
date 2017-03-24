<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "csc_attr_type".
 *
 * @property string $id
 * @property string $name
 * @property integer $enabled
 */
class AttrType extends \backend\models\Base
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'csc_attr_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['enabled'], 'integer'],
            [['name'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '类型名称',
            'enabled' => '是否启用默认1',
        ];
    }
}
