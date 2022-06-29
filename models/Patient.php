<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "patient".
 *
 * @property int $id_patient
 * @property string $nom_patient
 * @property string $prenom_patient
 * @property string $date_naissance
 * @property string $sexe_patient
 *
 * @property Fait[] $faits
 */
class Patient extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'patient';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_patient', 'nom_patient', 'prenom_patient', 'date_naissance', 'sexe_patient'], 'required'],
            [['id_patient'], 'default', 'value' => null],
            [['id_patient'], 'integer'],
            [['nom_patient', 'prenom_patient', 'sexe_patient'], 'string'],
            [['date_naissance'], 'safe'],
            [['id_patient'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_patient' => Yii::t('app', 'Id Patient'),
            'nom_patient' => Yii::t('app', 'Nom Patient'),
            'prenom_patient' => Yii::t('app', 'Prenom Patient'),
            'date_naissance' => Yii::t('app', 'Date Naissance'),
            'sexe_patient' => Yii::t('app', 'Sexe Patient'),
        ];
    }

    /**
     * Gets query for [[Faits]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFaits()
    {
        return $this->hasMany(Fait::className(), ['patient_id' => 'id_patient']);
    }
}
