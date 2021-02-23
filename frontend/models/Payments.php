<?php

namespace frontend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "payments".
 *
 * @property int $paymentId
 * @property int $orderId
 * @property float $amount
 * @property int $userId
 * @property int $paymentmethodId
 * @property string $status
 * @property string $createdAt
 * @property int $createdBy
 *
 * @property User $createdBy0
 * @property Orders $order
 * @property Paymentmethods $paymentmethod
 * @property User $user
 * @property Wallet[] $wallets
 */
class Payments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['orderId', 'amount', 'userId', 'paymentmethodId', 'status', 'createdBy'], 'required'],
            [['orderId', 'userId', 'paymentmethodId', 'createdBy'], 'integer'],
            [['amount'], 'number'],
            [['status'], 'string'],
            [['createdAt'], 'safe'],
            [['createdBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['createdBy' => 'id']],
            [['orderId'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['orderId' => 'orderId']],
            [['paymentmethodId'], 'exist', 'skipOnError' => true, 'targetClass' => Paymentmethods::className(), 'targetAttribute' => ['paymentmethodId' => 'paymentmethodId']],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'paymentId' => 'Payment ID',
            'orderId' => 'Order ID',
            'amount' => 'Amount',
            'userId' => 'User ID',
            'paymentmethodId' => 'Paymentmethod ID',
            'status' => 'Status',
            'createdAt' => 'Created At',
            'createdBy' => 'Created By',
        ];
    }

    /**
     * Gets query for [[CreatedBy0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy0()
    {
        return $this->hasOne(User::className(), ['id' => 'createdBy']);
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Orders::className(), ['orderId' => 'orderId']);
    }

    /**
     * Gets query for [[Paymentmethod]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentmethod()
    {
        return $this->hasOne(Paymentmethods::className(), ['paymentmethodId' => 'paymentmethodId']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userId']);
    }

    /**
     * Gets query for [[Wallets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWallets()
    {
        return $this->hasMany(Wallet::className(), ['paymentId' => 'paymentId']);
    }
}
