<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "discount_detail".
 *
 * @property int $id
 * @property int $id_discount
 * @property int $id_product
 *
 * @property Product $product
 * @property DiscountProduct $discount
 */
class DiscountDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'discount_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_discount', 'id_product'], 'integer'],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['id_product' => 'id']],
            [['id_discount'], 'exist', 'skipOnError' => true, 'targetClass' => DiscountProduct::className(), 'targetAttribute' => ['id_discount' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_discount' => 'Id Discount',
            'id_product' => 'Id Product',
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
    public function getDiscount()
    {
        return $this->hasOne(DiscountProduct::className(), ['id' => 'id_discount']);
    }
}
