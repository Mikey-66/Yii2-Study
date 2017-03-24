<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Goods;

/**
 * GoodsSearch represents the model behind the search form about `backend\models\Goods`.
 */
class GoodsSearch extends Goods
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cate_id', 'brand_id', 'type', 'stock', 'warn_number', 'free_maill', 'is_add', 'is_cash', 'is_alone_sale', 'is_coupon', 'is_refund', 'is_exchange', 'is_hot', 'sort', 'factory_id', 'is_del'], 'integer'],
            [['cate_path', 'goods_name', 'sub_name', 'event_start_date', 'event_end_date', 'img_home', 'img_thumb', 'reason', 'spec_name_one', 'spec_name_two', 'last_modify', 'add_time'], 'safe'],
            [['market_price', 'price', 'event_price', 'earn'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Goods::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'cate_id' => $this->cate_id,
            'brand_id' => $this->brand_id,
            'type' => $this->type,
            'market_price' => $this->market_price,
            'price' => $this->price,
            'event_price' => $this->event_price,
            'event_start_date' => $this->event_start_date,
            'event_end_date' => $this->event_end_date,
            'stock' => $this->stock,
            'warn_number' => $this->warn_number,
            'free_maill' => $this->free_maill,
            'earn' => $this->earn,
            'is_add' => $this->is_add,
            'is_cash' => $this->is_cash,
            'is_alone_sale' => $this->is_alone_sale,
            'is_coupon' => $this->is_coupon,
            'is_refund' => $this->is_refund,
            'is_exchange' => $this->is_exchange,
            'is_hot' => $this->is_hot,
            'sort' => $this->sort,
            'factory_id' => $this->factory_id,
            'is_del' => $this->is_del,
            'last_modify' => $this->last_modify,
            'add_time' => $this->add_time,
        ]);

        $query->andFilterWhere(['like', 'cate_path', $this->cate_path])
            ->andFilterWhere(['like', 'goods_name', $this->goods_name])
            ->andFilterWhere(['like', 'sub_name', $this->sub_name])
            ->andFilterWhere(['like', 'img_home', $this->img_home])
            ->andFilterWhere(['like', 'img_thumb', $this->img_thumb])
            ->andFilterWhere(['like', 'reason', $this->reason])
            ->andFilterWhere(['like', 'spec_name_one', $this->spec_name_one])
            ->andFilterWhere(['like', 'spec_name_two', $this->spec_name_two]);

        return $dataProvider;
    }
}
