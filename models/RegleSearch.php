<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Regle;

/**
 * RegleSearch represents the model behind the search form of `app\models\Regle`.
 */
class RegleSearch extends Regle
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_regle', 'type_regle_id'], 'integer'],
            [['nom_regle', 'description_regle'], 'safe'],
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
        $query = Regle::find();

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
            'id_regle' => $this->id_regle,
            'type_regle_id' => $this->type_regle_id,
        ]);

        $query->andFilterWhere(['ilike', 'nom_regle', $this->nom_regle])
            ->andFilterWhere(['ilike', 'description_regle', $this->description_regle]);

        return $dataProvider;
    }
}
