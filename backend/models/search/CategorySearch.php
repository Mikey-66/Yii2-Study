<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Category;

/**
 * CategorySearch represents the model behind the search form about `backend\models\Category`.
 */
class CategorySearch extends Category
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'is_show', 'is_recom', 'parent_id', 'sort', 'created_at', 'updated_at'], 'integer'],
            [['name', 'logo', 'pinyin', 'link', 'cate_path', 'parent.name'], 'safe'],  // 关联列 使用关联名称
            
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
     * 自定义添加的 增加搜索模型字段
     * 
     */
    public function attributes() {
        // 添加关联字段到可搜索属性集合
        return array_merge(parent::attributes(), [
            'parent.name' // 使用关联名称
        ]);
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
        $query = Category::find();
        
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
        
        $query->alias('t');

        // grid filtering conditions
        $query->andFilterWhere([
            't.id' => $this->id,
            't.is_show' => $this->is_show,
            't.is_recom' => $this->is_recom,
            't.parent_id' => $this->parent_id,
            't.sort' => $this->sort,
            't.created_at' => $this->created_at,
            't.updated_at' => $this->updated_at,
        ]);
        
        
        $query->andFilterWhere(['like', 't.name', $this->name])
            ->andFilterWhere(['like', 't.logo', $this->logo])
            ->andFilterWhere(['like', 't.pinyin', $this->pinyin])
            ->andFilterWhere(['like', 't.link', $this->link])
            ->andFilterWhere(['like', 't.cate_path', $this->cate_path]);
        
        // 添加的  使用别名
        $query->andFilterWhere(['like', 'parent.name', $this->getAttribute('parent.name')]); 
        
        # 自定义添加的 为了实现关联表列排序 使用别名
        # Pay attendtion : 这里第一个parent是Category模型中定义的关联关联名称 第二parent是别名!!!
        $query->joinWith('parent as parent');
        
        $dataProvider->sort->attributes['parent.name'] = [
            'asc' => ['parent.name' => SORT_ASC],
            'desc' => ['parent.name' => SORT_DESC]
        ];
        
//        show($dataProvider->getModels());exit;
        return $dataProvider;
    }
}
