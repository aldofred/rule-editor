<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TypeRegle;

/**
 * TypeRegleSearch represents the model behind the search form of `app\models\TypeRegle`.
 */
class TypeRegleSearch extends TypeRegle
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_type_regle'], 'integer'],
            [['libelle_type_regle', 'description_type_fait'], 'safe'],
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
        $query = TypeRegle::find();

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
            'id_type_regle' => $this->id_type_regle,
        ]);

        $query->andFilterWhere(['ilike', 'libelle_type_regle', $this->libelle_type_regle])
            ->andFilterWhere(['ilike', 'description_type_fait', $this->description_type_fait]);

        return $dataProvider;
    }
}
