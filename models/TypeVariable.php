<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "type_variable".
 *
 * @property int $id_type_variable
 * @property string|null $libelle_type_variable
 *
 * @property Variable[] $variables
 */
class TypeVariable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'type_variable';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_type_variable'], 'required'],
            [['id_type_variable'], 'default', 'value' => null],
            [['id_type_variable'], 'integer'],
            [['libelle_type_variable'], 'string'],
            [['id_type_variable'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_type_variable' => Yii::t('app', 'Id Type Variable'),
            'libelle_type_variable' => Yii::t('app', 'Libelle Type Variable'),
        ];
    }

    /**
     * Gets query for [[Variables]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVariables()
    {
        return $this->hasMany(Variable::className(), ['type_variable_id' => 'id_type_variable']);
    }
}
