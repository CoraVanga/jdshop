<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $name
 * @property int $price
 * @property int $created_date
 * @property int $status
 * @property string $code
 * @property int $size
 * @property int $amount
 * @property string $info
 * @property int $id_type
 * @property int $created_uid
 *
 * @property DiscountDetail[] $discountDetails
 * @property ImageProduct[] $imageProducts
 * @property OrderLine[] $orderLines
 * @property Users $createdU
 * @property Type $type
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
            [['name', 'price', 'created_date', 'status', 'size', 'amount', 'id_type', 'created_uid'], 'integer'],
            [['code', 'info'], 'string'],
            [['created_uid'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['created_uid' => 'id']],
            [['id_type'], 'exist', 'skipOnError' => true, 'targetClass' => Type::className(), 'targetAttribute' => ['id_type' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'price' => 'Price',
            'created_date' => 'Created Date',
            'status' => 'Status',
            'code' => 'Code',
            'size' => 'Size',
            'amount' => 'Amount',
            'info' => 'Info',
            'id_type' => 'Id Type',
            'created_uid' => 'Created Uid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiscountDetails()
    {
        return $this->hasMany(DiscountDetail::className(), ['id_product' => 'id']);
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
}
