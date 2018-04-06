<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $auth_key
 * @property string $name
 * @property string $dob
 * @property string $phone
 * @property int $role
 * @property string $address
 * @property string $email
 * @property int $status
 *
 * @property DiscountProduct[] $discountProducts
 * @property Product[] $products
 * @property SaleOrder[] $saleOrders
 */
class Users extends ActiveRecord implements IdentityInterface
{

    //public $id;
//    public $username;
//    public $password;
//    public $authKey;
//    public $accessToken;

    const ADMIN = 1;
    const QUANLY = 2;
    const NHANVIEN = 3;
    const KHACH = 4;
    
    const CO = 1;
    const KHONG = 0;
    
    private static $users = [
//        '100' => [
//            'id' => '100',
//            'username' => 'admin',
//            'password' => 'admin',
//            'authKey' => 'test100key',
//            'accessToken' => '100-token',
//        ],
//        '101' => [
//            'id' => '101',
//            'username' => 'demo',
//            'password' => 'demo',
//            'authKey' => 'test101key',
//            'accessToken' => '101-token',
//        ],
    ];

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
            [['username', 'password', 'auth_key', 'name', 'phone', 'address', 'email'], 'string'],
            [['dob'], 'safe'],
            [['role', 'status'], 'integer'],
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
            'auth_key' => 'Auth Key',
            'name' => 'Name',
            'dob' => 'Dob',
            'phone' => 'Phone',
            'role' => 'Role',
            'address' => 'Address',
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

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
    
    public function formatForSaveUsers($post){
        
        $this->username = ($post['username']) ? $post['username'] : '';
        $this->password = ($post['password']) ? $post['password'] : '';
        $this->auth_key = Yii::$app->security->generateRandomString();
        $this->name = ($post['name']) ? $post['name'] : '';
        $this->dob = ($post['dob']) ? ($post['dob']) : '';
        $this->phone = ($post['phone']) ? $post['phone'] : '';
        $this->role = ($post['role']) ? $post['role'] : '1';
        $this->address = ($post['address']) ? $post['address'] : '';
        $this->email = ($post['email']) ? $post['email'] : '';
        $this->status = ($post['status']) ? $post['status'] : '1';
    }
    
    public static function findUsers($username,$password){
        $let = Users::findOne(['username' => $username],['password' == $password]);
        if($let == ""){
            return false;
        }
        return $let;
    }
    public static function findUsersById($id){
        $let = Users::findOne(['id' => $id]);
        if($let == ""){
            return false;
        }
        return $let;
    }
    
    public function getArrayRole(){
        return $arrayName = array(
            Users::ADMIN => 'admin',
            Users::QUANLY => 'Quản lý',
            Users::NHANVIEN => 'Nhân viên',
            Users::KHACH => 'Khách hàng',
        );
    }
    public function getArrayStatus(){
        return $arrayName = array(
            Users::CO => 'Còn hoạt động',
            Users::KHONG => 'Không hoạt động',
        );
    }
    public function getRole(){
        $user = new Users();
        $aRole = $user->getArrayRole();
        return ($aRole[$this->role]) ? $aRole[$this->role] : '';
    }
    public function getStatus(){
        $user = new Users();
        $aStatus = $user->getArrayStatus();
        return ($aStatus[$this->status]) ? $aStatus[$this->status] : '';
    }
    public static function idLogged(){
        if(isset($_SESSION['ID_USER'])){
            return $_SESSION['ID_USER'];
        }
        return false;
    }
}
