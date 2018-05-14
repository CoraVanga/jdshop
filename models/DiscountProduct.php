<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "discount_product".
 *
 * @property int $id
 * @property string $info
 * @property int $discount
 * @property string $created_date
 * @property string $begin_date
 * @property string $end_date
 * @property int $created_uid
 *
 * @property Users $createdU
 * @property Product[] $products
 */
class DiscountProduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'discount_product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['info'], 'string'],
            [['discount', 'created_uid'], 'integer'],
            [['created_date', 'begin_date', 'end_date'], 'safe'],
            [['created_uid'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['created_uid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'info' => 'Info',
            'discount' => 'Discount',
            'created_date' => 'Created Date',
            'begin_date' => 'Begin Date',
            'end_date' => 'End Date',
            'created_uid' => 'Created Uid',
        ];
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
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['id_discount' => 'id']);
    }
}
