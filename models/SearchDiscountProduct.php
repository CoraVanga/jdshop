<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DiscountProduct;

/**
 * SearchDiscountProduct represents the model behind the search form of `app\models\DiscountProduct`.
 */
class SearchDiscountProduct extends DiscountProduct
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'info', 'type', 'discount', 'status', 'created_date', 'created_uid'], 'integer'],
            [['begin_date', 'end_date'], 'safe'],
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
        $query = DiscountProduct::find();

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
            'info' => $this->info,
            'type' => $this->type,
            'discount' => $this->discount,
            'status' => $this->status,
            'created_date' => $this->created_date,
            'begin_date' => $this->begin_date,
            'end_date' => $this->end_date,
            'created_uid' => $this->created_uid,
        ]);

        return $dataProvider;
    }
}
