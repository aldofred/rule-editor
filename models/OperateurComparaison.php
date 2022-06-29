<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "operateur_comparaison".
 *
 * @property int $id_operateur
 * @property string|null $libelle_operateur
 * @property string|null $signe_operateur
 *
 * @property Condition[] $conditions
 */
class OperateurComparaison extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'operateur_comparaison';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_operateur'], 'required'],
            [['id_operateur'], 'default', 'value' => null],
            [['id_operateur'], 'integer'],
            [['libelle_operateur'], 'string', 'max' => 45],
            [['signe_operateur'], 'string', 'max' => 5],
            [['id_operateur'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_operateur' => Yii::t('app', 'Id Operateur'),
            'libelle_operateur' => Yii::t('app', 'Libelle Operateur'),
            'signe_operateur' => Yii::t('app', 'Signe Operateur'),
        ];
    }

    /**
     * Gets query for [[Conditions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getConditions()
    {
        return $this->hasMany(Condition::className(), ['operateur_id' => 'id_operateur']);
    }
}
