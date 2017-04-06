<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "csc_ad_meta".
 *
 * @property string $id
 * @property string $name
 * @property string $type
 * @property string $pos_id
 * @property string $store_id
 * @property string $begin_time
 * @property string $end_time
 * @property string $url
 * @property string $is_show
 * @property integer $sort
 * @property string $img
 * @property string $img_url
 * @property string $flash
 * @property string $flash_url
 * @property string $code
 * @property string $text
 * @property string $contactor
 * @property string $email
 * @property string $phone
 * @property integer $site_id
 * @property string $relation_pos_id
 * @property string $add_time
 */
class AdMeta extends \backend\models\Base
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'csc_ad_meta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type', 'pos_id', 'begin_time', 'url', 'is_show', 'add_time'], 'required'],
            [['begin_time', 'end_time', 'add_time'], 'safe'],
            ['type', 'checkType'],
            [['sort', 'site_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['type', 'is_show'], 'string', 'max' => 1],
            [['pos_id', 'store_id', 'relation_pos_id'], 'string', 'max' => 32],
            [['url', 'img', 'flash', 'email'], 'string', 'max' => 200],
            [['img_url', 'flash_url'], 'string', 'max' => 1024],
            [['code', 'text'], 'string', 'max' => 500],
            [['contactor'], 'string', 'max' => 20],
            [['phone'], 'string', 'max' => 13],
        ];
    }
    
    public function checkType(){
        if (!$this->hasErrors()){
            
            $this->addError('type', 'error');
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '主键',
            'name' => '广告名称',
            'type' => '类型',
            'pos_id' => '广告位ID',
            'store_id' => '店铺ID',
            'begin_time' => '生效日期',
            'end_time' => '结束日期',
            'url' => '广告链接',
            'is_show' => '是否显示',
            'sort' => '排序数字 默认0',
            'img' => '图片文件路径',
            'img_url' => '图片URL链接',
            'flash' => 'FLASH文件路径',
            'flash_url' => 'FLASHURL链接',
            'code' => '代码广告内容',
            'text' => '文字广告内容',
            'contactor' => '广告联系人',
            'email' => '联系人Email',
            'phone' => '联系电话',
            'site_id' => '站点编号',
            'relation_pos_id' => '关联广告位',
            'add_time' => '发布日期',
        ];
    }
    
    public function save($runValidation = true, $attributeNames = null)
    {
        if($this->getIsNewRecord()){
            
        }else{
            
        }
        
        parent::save($runValidation, $attributeNames);
    }
}
