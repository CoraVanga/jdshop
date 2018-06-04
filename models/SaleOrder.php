<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sale_order".
 *
 * @property int $total_price
 * @property int $id
 * @property string $bill_code
 * @property int $status
 * @property string $created_date
 * @property int $id_user
 *
 * @property OrderLine[] $orderLines
 * @property Users $user
 */
class SaleOrder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sale_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['total_price', 'status', 'id_user'], 'integer'],
            [['created_date'], 'safe'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'total_price' => 'Thành tiền ',
            'id' => 'ID',
            'status' => 'Trạng thái',
            'created_date' => 'Ngày tạo',
            'id_user' => 'Khách hàng',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderLines()
    {
        return $this->hasMany(OrderLine::className(), ['id_bill' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'id_user']);
    }
}
