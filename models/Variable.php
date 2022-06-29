<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "variable".
 *
 * @property int $id_variable
 * @property string|null $nom_variable
 * @property string|null $description_variable
 * @property int|null $type_variable_id
 *
 * @property Fait[] $faits
 * @property TypeVariable $typeVariable
 */
class Variable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'variable';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_variable'], 'required'],
            [['id_variable', 'type_variable_id'], 'default', 'value' => null],
            [['id_variable', 'type_variable_id'], 'integer'],
            [['nom_variable', 'description_variable'], 'string'],
            [['id_variable'], 'unique'],
            [['type_variable_id'], 'exist', 'skipOnError' => true, 'targetClass' => TypeVariable::className(), 'targetAttribute' => ['type_variable_id' => 'id_type_variable']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_variable' => Yii::t('app', 'Id Variable'),
            'nom_variable' => Yii::t('app', 'Nom Variable'),
            'description_variable' => Yii::t('app', 'Description Variable'),
            'type_variable_id' => Yii::t('app', 'Type Variable ID'),
        ];
    }

    /**
     * Gets query for [[Faits]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFaits()
    {
        return $this->hasMany(Fait::className(), ['variable_id' => 'id_variable']);
    }

    /**
     * Gets query for [[TypeVariable]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTypeVariable()
    {
        return $this->hasOne(TypeVariable::className(), ['id_type_variable' => 'type_variable_id']);
    }
}
