<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_detail".
 *
 * @property int $id
 * @property double $size
 * @property int $price
 * @property int $amount
 * @property int $id_product
 *
 * @property Product $product
 */
class ProductDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['size'], 'number'],
            [['price', 'amount', 'id_product'], 'integer'],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['id_product' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'size' => 'Kích cỡ',
            'price' => 'Giá',
            'amount' => 'Số lượng tồn',
            'id_product' => 'Sản phẩm',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'id_product']);
    }
}
