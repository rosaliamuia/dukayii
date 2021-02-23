<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "checkout".
 *
 * @property int $checkoutId
 * @property int $paymentmethodsId
 *
 * @property Paymentmethods $paymentmethods
 */
class Checkout extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'checkout';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['paymentmethodsId'], 'required'],
            [['paymentmethodsId'], 'integer'],
            [['paymentmethodsId'], 'exist', 'skipOnError' => true, 'targetClass' => Paymentmethods::className(), 'targetAttribute' => ['paymentmethodsId' => 'paymentmethodId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'checkoutId' => 'Checkout ID',
            'paymentmethodsId' => 'Paymentmethods ID',
        ];
    }

    /**
     * Gets query for [[Paymentmethods]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentmethods()
    {
        return $this->hasOne(Paymentmethods::className(), ['paymentmethodId' => 'paymentmethodsId']);
    }
}
