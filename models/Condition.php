<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "condition".
 *
 * @property int $id_condition
 * @property string|null $libelle_condition
 * @property int|null $operateur_id
 * @property int|null $indicateur_id
 *
 * @property Indicateur $indicateur
 * @property OperateurComparaison $operateur
 * @property RegleCondition[] $regleConditions
 */
class Condition extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'condition';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_condition'], 'required'],
            [['id_condition', 'operateur_id', 'indicateur_id'], 'default', 'value' => null],
            [['id_condition', 'operateur_id', 'indicateur_id'], 'integer'],
            [['libelle_condition'], 'string'],
            [['id_condition'], 'unique'],
            [['indicateur_id'], 'exist', 'skipOnError' => true, 'targetClass' => Indicateur::className(), 'targetAttribute' => ['indicateur_id' => 'id_indicateur']],
            [['operateur_id'], 'exist', 'skipOnError' => true, 'targetClass' => OperateurComparaison::className(), 'targetAttribute' => ['operateur_id' => 'id_operateur']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_condition' => Yii::t('app', 'Id Condition'),
            'libelle_condition' => Yii::t('app', 'Libelle Condition'),
            'operateur_id' => Yii::t('app', 'Operateur ID'),
            'indicateur_id' => Yii::t('app', 'Indicateur ID'),
        ];
    }

    /**
     * Gets query for [[Indicateur]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIndicateur()
    {
        return $this->hasOne(Indicateur::className(), ['id_indicateur' => 'indicateur_id']);
    }

    /**
     * Gets query for [[Operateur]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOperateur()
    {
        return $this->hasOne(OperateurComparaison::className(), ['id_operateur' => 'operateur_id']);
    }

    /**
     * Gets query for [[RegleConditions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegleConditions()
    {
        return $this->hasMany(RegleCondition::className(), ['condition_id' => 'id_condition']);
    }
}
