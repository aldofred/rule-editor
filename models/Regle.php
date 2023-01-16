<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "regle".
 *
 * @property int $id_regle
 * @property string|null $nom_regle
 * @property string|null $description_regle
 * @property int|null $type_regle_id
 *
 * @property FaitRegle[] $faitRegles
 * @property RegleCondition[] $regleConditions
 * @property TypeRegle $typeRegle
 */
class Regle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'regle';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //[['id_regle'], 'required'],
            [['type_regle_id'], 'default', 'value' => null],
            [['id_regle', 'type_regle_id'], 'integer'],
            [['nom_regle', 'description_regle'], 'string'],
            [['id_regle'], 'unique'],
            [['type_regle_id'], 'exist', 'skipOnError' => true, 'targetClass' => TypeRegle::className(), 'targetAttribute' => ['type_regle_id' => 'id_type_regle']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_regle' => Yii::t('app', 'Id Regle'),
            'nom_regle' => Yii::t('app', 'Nom Regle'),
            'description_regle' => Yii::t('app', 'Description Regle'),
            'type_regle_id' => Yii::t('app', 'Type Regle ID'),
        ];
    }

    /**
     * Gets query for [[FaitRegles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFaitRegles()
    {
        return $this->hasMany(FaitRegle::className(), ['regle_id' => 'id_regle']);
    }

    /**
     * Gets query for [[RegleConditions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegleConditions()
    {
        return $this->hasMany(RegleCondition::className(), ['regle_id' => 'id_regle']);
    }

    /**
     * Gets query for [[TypeRegle]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTypeRegle()
    {
        return $this->hasOne(TypeRegle::className(), ['id_type_regle' => 'type_regle_id']);
    }
}
