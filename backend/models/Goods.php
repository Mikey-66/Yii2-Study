<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "csc_goods".
 *
 * @property integer $id
 * @property integer $cate_id
 * @property string $cate_path
 * @property integer $brand_id
 * @property string $goods_name
 * @property string $sub_name
 * @property integer $type
 * @property double $market_price
 * @property double $price
 * @property double $event_price
 * @property string $event_start_date
 * @property string $event_end_date
 * @property string $stock
 * @property string $warn_number
 * @property integer $free_maill
 * @property string $img_home
 * @property string $img_thumb
 * @property string $earn
 * @property integer $is_add
 * @property string $reason
 * @property integer $is_cash
 * @property integer $is_alone_sale
 * @property integer $is_coupon
 * @property integer $is_refund
 * @property integer $is_exchange
 * @property integer $is_hot
 * @property string $spec_name_one
 * @property string $spec_name_two
 * @property integer $sort
 * @property integer $factory_id
 * @property integer $is_del
 * @property string $last_modify
 * @property string $add_time
 */
class Goods extends \backend\models\Base
{
    
    public $img_home_file;
    
    public $img_thumb_file;
    
    public $album_file;
    
    public $album_string;
    
    public $content;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'csc_goods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cate_id', 'cate_path', 'goods_name', 'price', 'add_time'], 'required'],
            [['cate_id', 'brand_id', 'type', 'stock', 'warn_number', 'free_maill', 'is_add', 'is_cash', 'is_alone_sale', 'is_coupon', 'is_refund', 'is_exchange', 'is_hot', 'sort', 'factory_id', 'is_del'], 'integer'],
            [['type'], 'in', 'range' => [0, 1], 'message' => '请选择{attribute}'],
            [['market_price', 'price', 'event_price', 'earn'], 'number'],
            [['event_start_date', 'event_end_date', 'last_modify', 'add_time'], 'safe'],
            [['cate_path', 'sub_name', 'img_home', 'img_thumb', 'reason'], 'string', 'max' => 200],
            [['goods_name'], 'string', 'max' => 100],
            [['spec_name_one', 'spec_name_two'], 'string', 'max' => 20],
            ['album_string', 'required', 'message' => '请上传商品图册']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '商品ID 主键',
            'cate_id' => '分类ID',
            'cate_path' => '分类路径',
            'brand_id' => '品牌编号',
            'goods_name' => '名称',
            'sub_name' => '副标题',
            'type' => '商品类型', // 默认0 0普通商品 1工厂直购
            'market_price' => '市场价',
            'price' => '购买价',
            'event_price' => '活动价 默认0',
            'event_start_date' => '活动开始日期',
            'event_end_date' => '活动结束日期',
            'stock' => '库存 默认0',
            'warn_number' => '库存警告数',
            'free_maill' => '是否包邮', // 默认0
            'img_home' => '首页展示图片',
            'img_thumb' => '中等缩略图片路径',
            'earn' => '赚多少钱',
            'is_add' => '是否上架 默认1  -1 禁售 0已下架 1 已上架',
            'reason' => '下架/禁售原因',
            'is_cash' => '是否支持货到付款 1支持 0不支持',
            'is_alone_sale' => '是否允许单独销售',
            'is_coupon' => '是否可以使用优惠券，0：不能使用；1：可以使用',
            'is_refund' => '是否可以退货，0：不可以；1可以',
            'is_exchange' => '是否可以换货，0：不可以；1：可以',
            'is_hot' => '是否推荐',
            'spec_name_one' => '规格一名称',
            'spec_name_two' => '规格二名称',
            'sort' => '排序数字 默认为0',
            'factory_id' => '工厂编号',
            'is_del' => '是否删除',
            'last_modify' => '最后修改时间',
            'add_time' => '发布日期',
            'album_string' => '商品相册'
        ];
    }
}
