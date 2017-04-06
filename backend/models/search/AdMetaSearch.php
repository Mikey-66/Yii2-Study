<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AdMeta;

/**
 * AdMetaSearch represents the model behind the search form about `backend\models\AdMeta`.
 */
class AdMetaSearch extends AdMeta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sort', 'site_id'], 'integer'],
            [['name', 'type', 'pos_id', 'store_id', 'begin_time', 'end_time', 'url', 'is_show', 'img', 'img_url', 'flash', 'flash_url', 'code', 'text', 'contactor', 'email', 'phone', 'relation_pos_id', 'add_time'], 'safe'],
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
        $query = AdMeta::find();

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
            'begin_time' => $this->begin_time,
            'end_time' => $this->end_time,
            'sort' => $this->sort,
            'site_id' => $this->site_id,
            'add_time' => $this->add_time,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'pos_id', $this->pos_id])
            ->andFilterWhere(['like', 'store_id', $this->store_id])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'is_show', $this->is_show])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'img_url', $this->img_url])
            ->andFilterWhere(['like', 'flash', $this->flash])
            ->andFilterWhere(['like', 'flash_url', $this->flash_url])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'contactor', $this->contactor])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'relation_pos_id', $this->relation_pos_id]);

        return $dataProvider;
    }
}
