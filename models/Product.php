<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $created_date
 * @property int $status
 * @property string $code
 * @property string $info
 * @property int $id_type
 * @property int $created_uid
 * @property int $id_discount
 *
 * @property ImageProduct[] $imageProducts
 * @property OrderLine[] $orderLines
 * @property Users $createdU
 * @property Type $type
 * @property DiscountProduct $discount
 * @property ProductDetail[] $productDetails
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'code', 'info'], 'string'],
            [['created_date'], 'safe'],
            [['status', 'id_type', 'created_uid', 'id_discount'], 'integer'],
            [['created_uid'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['created_uid' => 'id']],
            [['id_type'], 'exist', 'skipOnError' => true, 'targetClass' => Type::className(), 'targetAttribute' => ['id_type' => 'id']],
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
            'name' => 'Tên sản phẩm',
            'created_date' => 'Ngày tạo',
            'status' => 'Trạng thái',
            'code' => 'Mã',
            'info' => 'Mô tả',
            'id_type' => 'Loại sản phẩm',
            'created_uid' => 'Người tạo',
            'id_discount' => 'Khuyến mãi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImageProducts()
    {
        return $this->hasMany(ImageProduct::className(), ['id_product' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderLines()
    {
        return $this->hasMany(OrderLine::className(), ['id_product' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedU()
    {
        return $this->hasOne(Users::className(), ['id' => 'created_uid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Type::className(), ['id' => 'id_type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiscount()
    {
        return $this->hasOne(DiscountProduct::className(), ['id' => 'id_discount']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductDetails()
    {
        return $this->hasMany(ProductDetail::className(), ['id_product' => 'id']);
    }
}
