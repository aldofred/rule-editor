<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "type_fait".
 *
 * @property int $id_type_fait
 * @property string|null $libelle_type_fait
 *
 * @property Fait[] $faits
 */
class TypeFait extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'type_fait';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_type_fait'], 'required'],
            [['id_type_fait'], 'default', 'value' => null],
            [['id_type_fait'], 'integer'],
            [['libelle_type_fait'], 'string', 'max' => 45],
            [['id_type_fait'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_type_fait' => Yii::t('app', 'Id Type Fait'),
            'libelle_type_fait' => Yii::t('app', 'Libelle Type Fait'),
        ];
    }

    /**
     * Gets query for [[Faits]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFaits()
    {
        return $this->hasMany(Fait::className(), ['type_fait_id' => 'id_type_fait']);
    }
}
