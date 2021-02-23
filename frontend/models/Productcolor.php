<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "productcolor".
 *
 * @property int $colorId
 * @property string $colorDesc
 * @property int $colorCode
 *
 * @property Product[] $products
 */
class Productcolor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productcolor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['colorDesc', 'colorCode'], 'required'],
            [['colorCode'], 'integer'],
            [['colorDesc'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'colorId' => 'Color ID',
            'colorDesc' => 'Color Desc',
            'colorCode' => 'Color Code',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['colorId' => 'colorId']);
    }
}
