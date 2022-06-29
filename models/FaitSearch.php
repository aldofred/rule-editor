<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Fait;

/**
 * FaitSearch represents the model behind the search form of `app\models\Fait`.
 */
class FaitSearch extends Fait
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_fait', 'variable_id', 'patient_id'], 'integer'],
            [['description_fait'], 'safe'],
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
        $query = Fait::find();

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
            'id_fait' => $this->id_fait,
            'variable_id' => $this->variable_id,
            'patient_id' => $this->patient_id,
        ]);

        $query->andFilterWhere(['ilike', 'description_fait', $this->description_fait]);

        return $dataProvider;
    }
}
