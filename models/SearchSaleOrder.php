<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SaleOrder;

/**
 * SearchSaleOrder represents the model behind the search form of `app\models\SaleOrder`.
 */
class SearchSaleOrder extends SaleOrder
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['total_price', 'id', 'status'], 'integer'],
            [['created_date','id_user'], 'safe'],
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
        $query = SaleOrder::find();

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
        $query->joinWith('user');
        // grid filtering conditions
        $query->andFilterWhere([
            'total_price' => $this->total_price,
            'id' => $this->id,
            'status' => $this->status,
            'created_date' => $this->created_date,
            //'id_user' => $this->id_user,
        ]);
        $query->andFilterWhere(['like','users.name',$this->id_user]);

        return $dataProvider;
    }
}
