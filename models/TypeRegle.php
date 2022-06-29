<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "type_regle".
 *
 * @property int $id_type_regle
 * @property string $libelle_type_regle
 * @property string|null $description_type_fait
 *
 * @property Regle[] $regles
 */
class TypeRegle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'type_regle';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_type_regle', 'libelle_type_regle'], 'required'],
            [['id_type_regle'], 'default', 'value' => null],
            [['id_type_regle'], 'integer'],
            [['libelle_type_regle'], 'string', 'max' => 45],
            [['description_type_fait'], 'string', 'max' => 100],
            [['id_type_regle'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_type_regle' => 'Id Type Regle',
            'libelle_type_regle' => 'Libelle Type Regle',
            'description_type_fait' => 'Description Type Règle',
        ];
    }

    /**
     * Gets query for [[Regles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegles()
    {
        return $this->hasMany(Regle::className(), ['type_regle_id' => 'id_type_regle']);
    }
}
