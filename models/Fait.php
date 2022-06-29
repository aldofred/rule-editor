<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fait".
 *
 * @property int $id_fait
 * @property string|null $description_fait
 * @property int|null $variable_id
 * @property int|null $patient_id
 * @property string|null $valeur
 * @property int|null $type_fait_id
 *
 * @property FaitRegle[] $faitRegles
 * @property Patient $patient
 * @property TypeFait $typeFait
 * @property Variable $variable
 */
class Fait extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fait';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_fait'], 'required'],
            [['id_fait', 'variable_id', 'patient_id', 'type_fait_id', 'valeur'], 'default', 'value' => null],
            [['id_fait', 'variable_id', 'patient_id', 'type_fait_id'], 'integer'],
            [['description_fait', 'valeur'], 'string'],
            [['id_fait'], 'unique'],
            [['patient_id'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['patient_id' => 'id_patient']],
            [['type_fait_id'], 'exist', 'skipOnError' => true, 'targetClass' => TypeFait::className(), 'targetAttribute' => ['type_fait_id' => 'id_type_fait']],
            [['variable_id'], 'exist', 'skipOnError' => true, 'targetClass' => Variable::className(), 'targetAttribute' => ['variable_id' => 'id_variable']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_fait' => Yii::t('app', 'Id Fait'),
            'description_fait' => Yii::t('app', 'Description Fait'),
            'variable_id' => Yii::t('app', 'Variable ID'),
            'valeur' => Yii::t('app', 'Valeur'),
            'patient_id' => Yii::t('app', 'Patient ID'),
            'type_fait_id' => Yii::t('app', 'Type Fait ID'),
        ];
    }

    /**
     * Gets query for [[FaitRegles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFaitRegles()
    {
        return $this->hasMany(FaitRegle::className(), ['fait_id' => 'id_fait']);
    }

    /**
     * Gets query for [[Patient]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPatient()
    {
        return $this->hasOne(Patient::className(), ['id_patient' => 'patient_id']);
    }

    /**
     * Gets query for [[TypeFait]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTypeFait()
    {
        return $this->hasOne(TypeFait::className(), ['id_type_fait' => 'type_fait_id']);
    }

    /**
     * Gets query for [[Variable]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVariable()
    {
        return $this->hasOne(Variable::className(), ['id_variable' => 'variable_id']);
    }
}
