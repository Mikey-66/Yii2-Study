<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Brand;

/**
 * BrandSearch represents the model behind the search form about `backend\models\Brand`.
 */
class BrandSearch extends Brand
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sort_order', 'is_show', 'is_hot'], 'integer'],
            [['brand_name', 'capital', 'brand_logo', 'site_url', 'shop_pc', 'shop_wap', 'brand_desc', 'brand_detail'], 'safe'],
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
        $query = Brand::find();

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
            'sort_order' => $this->sort_order,
            'is_show' => $this->is_show,
            'is_hot' => $this->is_hot,
        ]);

        $query->andFilterWhere(['like', 'brand_name', $this->brand_name])
            ->andFilterWhere(['like', 'capital', $this->capital])
            ->andFilterWhere(['like', 'brand_logo', $this->brand_logo])
            ->andFilterWhere(['like', 'site_url', $this->site_url])
            ->andFilterWhere(['like', 'shop_pc', $this->shop_pc])
            ->andFilterWhere(['like', 'shop_wap', $this->shop_wap])
            ->andFilterWhere(['like', 'brand_desc', $this->brand_desc])
            ->andFilterWhere(['like', 'brand_detail', $this->brand_detail]);

        return $dataProvider;
    }
}
