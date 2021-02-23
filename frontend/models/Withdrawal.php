<?php

namespace frontend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "withdrawal".
 *
 * @property int $transId
 * @property int $originatorConversionId
 * @property int $walletId
 * @property float $transAmount
 * @property string $details
 * @property int $currencyId
 * @property string|null $receipt
 * @property string $transDate
 * @property int $createdBy
 * @property int|null $status
 *
 * @property Wallet $wallet
 * @property Currency $currency
 * @property User $createdBy0
 */
class Withdrawal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'withdrawal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['originatorConversionId', 'walletId', 'transAmount', 'details', 'currencyId', 'transDate', 'createdBy'], 'required'],
            [['originatorConversionId', 'walletId', 'currencyId', 'createdBy', 'status'], 'integer'],
            [['transAmount'], 'number'],
            [['details'], 'string'],
            [['transDate'], 'safe'],
            [['receipt'], 'string', 'max' => 255],
            [['walletId'], 'exist', 'skipOnError' => true, 'targetClass' => Wallet::className(), 'targetAttribute' => ['walletId' => 'walletId']],
            [['currencyId'], 'exist', 'skipOnError' => true, 'targetClass' => Currency::className(), 'targetAttribute' => ['currencyId' => 'currencyId']],
            [['createdBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['createdBy' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'transId' => 'Trans ID',
            'originatorConversionId' => 'Originator Conversion ID',
            'walletId' => 'Wallet ID',
            'transAmount' => 'Trans Amount',
            'details' => 'Details',
            'currencyId' => 'Currency ID',
            'receipt' => 'Receipt',
            'transDate' => 'Trans Date',
            'createdBy' => 'Created By',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Wallet]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWallet()
    {
        return $this->hasOne(Wallet::className(), ['walletId' => 'walletId']);
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
}
