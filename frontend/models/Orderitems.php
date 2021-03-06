<?php

namespace frontend\models;

use Yii;
use frontend\models\Productimages;

/**
 * This is the model class for table "orderitems".
 *
 * @property int $orderitemId
 * @property int $orderId
 * @property int $productId
 *
 * @property Orders $order
 * @property Product $product
 */
class Orderitems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orderitems';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['orderId', 'productId'], 'required'],
            [['orderId', 'productId'], 'integer'],
            [['orderId'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['orderId' => 'orderId']],
            [['productId'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['productId' => 'productId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'orderitemId' => 'Orderitem ID',
            'orderId' => 'Order ID',
            'productId' => 'Product ID',
        ];
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
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['productId' => 'productId']);
    }

    public function getProductimages()
    {
        return $this->hasMany(Productimages::className(), ['productId' => 'productId']);
    }
}
