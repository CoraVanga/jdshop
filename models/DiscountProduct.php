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
            [['info','discount','begin_date','end_date'], 'required', 'message' => 'Thông tin này là bắt buộc'],
            [['info'], 'string'],
            [['discount', 'created_uid'], 'integer', 'message' => 'Bạn chỉ có thể nhập số'],
            ['discount', 'integer', 'min' => 5, 'max' => 100, 'message' => 'Khuyến mãi phải từ 10% tới 100%'],
            [['created_date', 'begin_date', 'end_date'], 'safe'],
            [['created_uid'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['created_uid' => 'id']],
            [
              'end_date',
              'compare',
              'compareAttribute'=>'begin_date',
              'operator'=>'>', 
              'message'=>'{attribute} phải lớn hơn "{compareValue}".'
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'info' => 'Mô tả',
            'discount' => '% Khuyến mãi',
            'created_date' => 'Ngày tạo',
            'begin_date' => 'Ngày bắt đầu',
            'end_date' => 'Ngày kết thúc',
            'created_uid' => 'Người tạo',
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
