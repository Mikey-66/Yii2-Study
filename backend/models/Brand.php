<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "csc_brand".
 *
 * @property string $id
 * @property string $brand_name
 * @property string $capital
 * @property string $brand_logo
 * @property string $site_url
 * @property integer $sort_order
 * @property integer $is_show
 * @property integer $is_hot
 * @property string $shop_pc
 * @property string $shop_wap
 * @property string $brand_desc
 * @property string $brand_detail
 */
class Brand extends \backend\models\Base
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'csc_brand';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sort_order', 'is_show', 'is_hot'], 'integer'],
            [['brand_detail'], 'string'],
            [['brand_name'], 'string', 'max' => 60],
            [['capital'], 'string', 'max' => 1],
            [['brand_logo', 'shop_pc', 'shop_wap'], 'string', 'max' => 80],
            [['site_url'], 'string', 'max' => 255],
            [['brand_desc'], 'string', 'max' => 800],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brand_name' => '名称',
            'capital' => '首字母',
            'brand_logo' => 'logo',
            'site_url' => '品牌外链',
            'sort_order' => '排序数字',
            'is_show' => '是否显示，默认1',
            'is_hot' => '推荐',
            'shop_pc' => '店铺展示 pc端',
            'shop_wap' => '店铺展示 wap端',
            'brand_desc' => '描述',
            'brand_detail' => '品牌详细介绍',
        ];
    }
}
