<?php

namespace app\models\Search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Items;

/**
 * ItemsSearch represents the model behind the search form of `app\models\Items`.
 */
class ItemsSearch extends Items
{
    public $category_name;
    public $price;
    public $quantity;
    public $supplier_info;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'status', 'created_at', 'updated_at','category_id', 'category_name', 'price', 'quantity', 'supplier_info'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Items::find()
        ->select ([
            'items.*',
            'categories.name as category_name',
            'item_details.price as price',
            'item_details.quantity as quantity',
            'item_details.supplier_info as supplier_info' 
        ])
        ->leftJoin('categories', 'categories.id = items.category_id' )
        ->leftJoin('item_details', 'items.id = item_details.item_id' );

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
            'items.id' => $this->id,
            'item_details.quantity' => $this->quantity,
            'item_details.price' => $this->price,
            'catgeories.name' => $this->category_id,
            'items.created_at' => $this->created_at,
            'items.updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'items.name', $this->name])
            ->andFilterWhere(['like', 'item_details.supplier_info', $this->supplier_info])
            ->andFilterWhere(['like', 'items.status', $this->status]);

        return $dataProvider;
    }
}
