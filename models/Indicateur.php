<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "indicateur".
 *
 * @property int $id_indicateur
 * @property float|null $valeur_indicateur
 * @property string|null $libelle_indicateur
 *
 * @property Condition[] $conditions
 */
class Indicateur extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'indicateur';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_indicateur'], 'required'],
            [['id_indicateur'], 'default', 'value' => null],
            [['id_indicateur'], 'integer'],
            [['valeur_indicateur'], 'number'],
            [['libelle_indicateur'], 'string'],
            [['id_indicateur'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_indicateur' => Yii::t('app', 'Id Indicateur'),
            'valeur_indicateur' => Yii::t('app', 'Valeur Indicateur'),
            'libelle_indicateur' => Yii::t('app', 'Libelle Indicateur'),
        ];
    }

    /**
     * Gets query for [[Conditions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getConditions()
    {
        return $this->hasMany(Condition::className(), ['indicateur_id' => 'id_indicateur']);
    }
}
