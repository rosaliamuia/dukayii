<?php

namespace frontend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "profile".
 *
 * @property int $profileId
 * @property int $userId
 * @property string $fullName
 * @property int $countryId
 * @property int $idNumber
 * @property int $currencyId
 * @property int $phoneCode
 * @property string $createdAt
 * @property int $createdBy
 *
 * @property Currency $currency
 * @property User $createdBy0
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userId', 'fullName', 'countryId', 'idNumber', 'currencyId', 'phoneCode', 'createdBy'], 'required'],
            [['userId', 'countryId', 'idNumber', 'currencyId', 'phoneCode', 'createdBy'], 'integer'],
            [['createdAt'], 'safe'],
            [['fullName'], 'string', 'max' => 255],
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
            'profileId' => 'Profile ID',
            'userId' => 'User ID',
            'fullName' => 'Full Name',
            'countryId' => 'Country ID',
            'idNumber' => 'Id Number',
            'currencyId' => 'Currency ID',
            'phoneCode' => 'Phone Code',
            'createdAt' => 'Created At',
            'createdBy' => 'Created By',
        ];
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
