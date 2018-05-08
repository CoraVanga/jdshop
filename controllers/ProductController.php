<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;
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
 
class ProductController extends Controller
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

    public function actionIndex()
    {
        
        $this->layout = 'jdshop-user';
        $searchModel = new SearchProduct();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
        	'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        //return $this->render('index');
    }
    public function actionView($id)
    {
        $this->layout = 'jdshop-user';
        $detail = ProductDetail::find()->where(['id_product' => $id])->all();
        $flag=0;// Không tạo thông báo
        if($_POST){
            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";
            if(!isset($_SESSION['ID_USER']))
            {
                $flag=1; //Bạn cần phải đăng nhập để thực hiện thao tác này
            }
            else
            {
                //Lấy thông tin sản phẩm, chi tiết sp, người dùng, đơn hàng 
                $product = Product::findOne($_POST['id']);
                $user = Users::findOne($_SESSION['ID_USER']);
                $productdetail = ProductDetail::find()->where(['id_product'=>$product->id, 'size'=>$_POST['size']])->one();
                $saleorder = SaleOrder::find()->where(['id_user'=>$user->id, 'status'=>'1'])->one();
                if(!isset($saleorder))
                {
                    //Chưa có giỏ hàng nào trong hệ thống
                    //Tạo đơn hàng mới
                    $saleorder = new SaleOrder();
                    $saleorder->id_user = $user->id;
                    $saleorder->total_price = $productdetail->price;
                    $saleorder->bill_code = 'SO'.$user->id.$product->id;
                    $saleorder->status = 1;
                    $saleorder->save();
                    //Tạo chi tiết đơn hàng mới
                    $orderline = new OrderLine();
                    $orderline->size_product = $productdetail->size;
                    $orderline->sum_price = $productdetail->price;
                    $orderline->amount = 1;
                    $orderline->id_product = $productdetail->id_product;

                }
                else
                {
                    //Đã có giỏ hàng trong hệ thống
                    $orderline = OrderLine::find()->where(['id_bill'=>$saleorder->id])->all();
                }
                echo "<pre>";
                print_r($user->name);
                print_r($product->name);
                print_r($saleorder->total_price);
                print_r($productdetail->amount);
                echo "</pre>";
                $flag=3;
            }
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
            'detail' => $detail,
            'flag' => $flag,
        ]);
    }



    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}