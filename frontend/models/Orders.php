<?php

namespace frontend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "orders".
 *
 * @property int $orderId
 * @property int $userId
 * @property float $total
 * @property string $orderStatus
 * @property string $createdAt
 * @property int $createdBy
 *
 * @property Deposit[] $deposits
 * @property Mpesastkrequests[] $mpesastkrequests
 * @property Orderitems[] $orderitems
 * @property User $user
 * @property User $createdBy0
 * @property Payments[] $payments
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userId', 'total', 'orderStatus', 'createdBy'], 'required'],
            [['userId', 'createdBy'], 'integer'],
            [['total'], 'number'],
            [['orderStatus'], 'string'],
            [['createdAt'], 'safe'],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userId' => 'id']],
            [['createdBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['createdBy' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'orderId' => 'Order ID',
            'userId' => 'User ID',
            'total' => 'Total',
            'orderStatus' => 'Order Status',
            'createdAt' => 'Created At',
            'createdBy' => 'Created By',
        ];
    }

    /**
     * Gets query for [[Deposits]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeposits()
    {
        return $this->hasMany(Deposit::className(), ['orderId' => 'orderId']);
    }

    /**
     * Gets query for [[Mpesastkrequests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMpesastkrequests()
    {
        return $this->hasMany(Mpesastkrequests::className(), ['orderId' => 'orderId']);
    }

    /**
     * Gets query for [[Orderitems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderitems()
    {
        return $this->hasMany(Orderitems::className(), ['orderId' => 'orderId']);
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
     * Gets query for [[CreatedBy0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy0()
    {
        return $this->hasOne(User::className(), ['id' => 'createdBy']);
    }

    /**
     * Gets query for [[Payments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payments::className(), ['orderId' => 'orderId']);
    }
}
