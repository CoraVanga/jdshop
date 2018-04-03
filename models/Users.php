<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property int $username
 * @property int $password
 * @property int $name
 * @property int $dob
 * @property int $phone
 * @property int $role
 * @property int $addpress
 * @property int $email
 * @property int $status
 *
 * @property DiscountProduct[] $discountProducts
 * @property Product[] $products
 * @property SaleOrder[] $saleOrders
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //[['username', 'password', 'name', 'dob', 'phone', 'role', 'addpress', 'email', 'status'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'name' => 'Name',
            'dob' => 'Dob',
            'phone' => 'Phone',
            'role' => 'Role',
            'addpress' => 'Addpress',
            'email' => 'Email',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiscountProducts()
    {
        return $this->hasMany(DiscountProduct::className(), ['created_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['created_uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaleOrders()
    {
        return $this->hasMany(SaleOrder::className(), ['id_user' => 'id']);
    }
}
