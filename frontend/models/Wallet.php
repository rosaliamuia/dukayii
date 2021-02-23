<?php

namespace frontend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "wallet".
 *
 * @property int $walletId
 * @property int $userId
 * @property int $currencyId
 * @property int $paymentId
 * @property string $walletName
 * @property float $balance
 * @property int $createdBy
 * @property string $createdAt
 *
 * @property Deposit[] $deposits
 * @property Mpesastkrequests[] $mpesastkrequests
 * @property Currency $currency
 * @property User $createdBy0
 * @property Payments $payment
 * @property User $user
 * @property Withdrawal[] $withdrawals
 */
class Wallet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wallet';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userId', 'currencyId', 'paymentId', 'walletName', 'createdBy'], 'required'],
            [['userId', 'currencyId', 'paymentId', 'createdBy'], 'integer'],
            [['balance'], 'number'],
            [['createdAt'], 'safe'],
            [['walletName'], 'string', 'max' => 255],
            [['currencyId'], 'exist', 'skipOnError' => true, 'targetClass' => Currency::className(), 'targetAttribute' => ['currencyId' => 'currencyId']],
            [['createdBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['createdBy' => 'id']],
            [['paymentId'], 'exist', 'skipOnError' => true, 'targetClass' => Payments::className(), 'targetAttribute' => ['paymentId' => 'paymentId']],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'walletId' => 'Wallet ID',
            'userId' => 'User ID',
            'currencyId' => 'Currency ID',
            'paymentId' => 'Payment ID',
            'walletName' => 'Wallet Name',
            'balance' => 'Balance',
            'createdBy' => 'Created By',
            'createdAt' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Deposits]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeposits()
    {
        return $this->hasMany(Deposit::className(), ['walletId' => 'walletId']);
    }

    /**
     * Gets query for [[Mpesastkrequests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMpesastkrequests()
    {
        return $this->hasMany(Mpesastkrequests::className(), ['walletId' => 'walletId']);
    }

    /**
     * Gets query for [[Currency]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCurrency()
    {
        return $this->hasOne(Currency::className(), ['currencyId' => 'currencyId']);
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
     * Gets query for [[Payment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayment()
    {
        return $this->hasOne(Payments::className(), ['paymentId' => 'paymentId']);
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
     * Gets query for [[Withdrawals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWithdrawals()
    {
        return $this->hasMany(Withdrawal::className(), ['walletId' => 'walletId']);
    }
}
