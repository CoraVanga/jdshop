<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers\user;
use Yii;
use app\models\OrderLine;
use app\models\SaleOrder;
use app\models\Users;
use app\models\ProductDetail;
use app\models\Product;
use app\models\SearchProduct;
use app\models\ImageProduct;
use app\models\SearchImageProduct;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\bootstrap\Alert;
 
class CartController extends Controller
{
 
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index'  => ['GET'],
                    'view'   => ['GET','POST'],
                    'create' => ['GET', 'POST'],
                    'update' => ['GET', 'PUT', 'POST'],
                    'delete' => ['POST', 'DELETE'],
                ],
            ],
        ];
    }

    public function actionView()
    {   
        if (isset($_SESSION['ID_USER']))
        {
            $user = Users::findOne($_SESSION['ID_USER']);
        }
        else if(isset($_SESSION['ID_CUS']))
        {
            $user = Users::findOne($_SESSION['ID_CUS']);
        }
        else
        {
            return $this->redirect(['../main']);
        }
        $this->layout = 'jdshop-user';
        $status = 0;//Xem đơn hàng
        $saleorder = SaleOrder::find()->where(['id_user'=>$user->id,'status'=>'1'])->one();
        $flag=0;
        if(isset($saleorder))
        {
            $orderline = OrderLine::find()->where(['id_bill'=>$saleorder->id])->all();
        }
        else
        {
            $orderline = null;

        }
        if($_POST){
            echo "<pre>";
            print_r($_POST);
            echo "</pre>";
            if($_POST['status']==0)
            {
                $status=1;
            }
        }
        return $this->render('view', [
            'saleorder'=>$saleorder,
            'orderline'=>$orderline,
            'user'=>$user,
            'status'=>$status,
        ]);    

    }
}