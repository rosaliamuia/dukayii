<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "paymentmethods".
 *
 * @property int $paymentmethodId
 * @property string $paymentmethodDesc
 */
class Paymentmethods extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paymentmethods';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['paymentmethodDesc'], 'required'],
            [['paymentmethodDesc'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'paymentmethodId' => 'Paymentmethod ID',
            'paymentmethodDesc' => 'Paymentmethod Desc',
        ];
    }
}
