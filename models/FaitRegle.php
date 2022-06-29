<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fait_regle".
 *
 * @property int $fait_id
 * @property int $regle_id
 *
 * @property Fait $fait
 * @property Regle $regle
 */
class FaitRegle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fait_regle';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fait_id', 'regle_id'], 'required'],
            [['fait_id', 'regle_id'], 'default', 'value' => null],
            [['fait_id', 'regle_id'], 'integer'],
            [['fait_id'], 'exist', 'skipOnError' => true, 'targetClass' => Fait::className(), 'targetAttribute' => ['fait_id' => 'id_fait']],
            [['regle_id'], 'exist', 'skipOnError' => true, 'targetClass' => Regle::className(), 'targetAttribute' => ['regle_id' => 'id_regle']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fait_id' => Yii::t('app', 'Fait ID'),
            'regle_id' => Yii::t('app', 'Regle ID'),
        ];
    }

    /**
     * Gets query for [[Fait]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFait()
    {
        return $this->hasOne(Fait::className(), ['id_fait' => 'fait_id']);
    }

    /**
     * Gets query for [[Regle]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegle()
    {
        return $this->hasOne(Regle::className(), ['id_regle' => 'regle_id']);
    }
}
