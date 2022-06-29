<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\OperateurComparaison;

/**
 * OperateurComparaisonSearch represents the model behind the search form of `app\models\OperateurComparaison`.
 */
class OperateurComparaisonSearch extends OperateurComparaison
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_operateur'], 'integer'],
            [['libelle_operateur', 'signe_operateur'], 'safe'],
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
        $query = OperateurComparaison::find();

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
            'id_operateur' => $this->id_operateur,
        ]);

        $query->andFilterWhere(['ilike', 'libelle_operateur', $this->libelle_operateur])
            ->andFilterWhere(['ilike', 'signe_operateur', $this->signe_operateur]);

        return $dataProvider;
    }
}
