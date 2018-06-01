<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_line".
 *
 * @property int $id
 * @property int $amount
 * @property int $size_product
 * @property int $sum_price
 * @property int $code_color
 * @property int $id_product
 * @property int $id_bill
 *
 * @property Product $product
 * @property SaleOrder $bill
 */
class OrderLine extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_line';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['amount', 'size_product', 'sum_price', 'id_product', 'id_bill'], 'integer'],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['id_product' => 'id']],
            [['id_bill'], 'exist', 'skipOnError' => true, 'targetClass' => SaleOrder::className(), 'targetAttribute' => ['id_bill' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'amount' => 'Số lượng',
            'size_product' => 'Kích thước',
            'sum_price' => 'Tổng giá',
            'id_product' => 'Sản phẩm',
            'id_bill' => 'Mã hóa đơn',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'id_product']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBill()
    {
        return $this->hasOne(SaleOrder::className(), ['id' => 'id_bill']);
    }
}
