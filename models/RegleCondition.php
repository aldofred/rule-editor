<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "regle_condition".
 *
 * @property int $id_regle_condition
 * @property int|null $regle_id
 * @property int|null $condition_id
 *
 * @property Condition $condition
 * @property Regle $regle
 */
class RegleCondition extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'regle_condition';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['regle_id', 'condition_id'], 'default', 'value' => null],
            [['regle_id', 'condition_id'], 'integer'],
            [['condition_id'], 'exist', 'skipOnError' => true, 'targetClass' => Condition::className(), 'targetAttribute' => ['condition_id' => 'id_condition']],
            [['regle_id'], 'exist', 'skipOnError' => true, 'targetClass' => Regle::className(), 'targetAttribute' => ['regle_id' => 'id_regle']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_regle_condition' => Yii::t('app', 'Id Regle Condition'),
            'regle_id' => Yii::t('app', 'Regle ID'),
            'condition_id' => Yii::t('app', 'Condition ID'),
        ];
    }

    /**
     * Gets query for [[Condition]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCondition()
    {
        return $this->hasOne(Condition::className(), ['id_condition' => 'condition_id']);
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
