<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "discount_product".
 *
 * @property int $id
 * @property string $info
 * @property int $type
 * @property int $discount
 * @property int $status
 * @property string $created_date
 * @property string $begin_date
 * @property string $end_date
 * @property int $created_uid
 *
 * @property DiscountDetail[] $discountDetails
 * @property Users $createdU
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
            'info' => 'Thông tin',
            'discount' => 'Khuyến mãi',
            'created_date' => 'Ngày tạo',
            'begin_date' => 'Ngày bắt đầu',
            'end_date' => 'Ngày kết thúc',
            'created_uid' => 'Người tạo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiscountDetails()
    {
        return $this->hasMany(DiscountDetail::className(), ['id_discount' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedU()
    {
        return $this->hasOne(Users::className(), ['id' => 'created_uid']);
    }
}
