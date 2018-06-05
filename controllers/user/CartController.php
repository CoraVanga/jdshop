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

    public function actionDel()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $orderline = OrderLine::findOne($_POST['id']);
            $orderline->delete();
            $saleorder = SaleOrder::findOne($orderline->id_bill);
            $orderlineList = OrderLine::find()->where(['id_bill'=>$saleorder->id])->one();
            if(!isset($orderlineList))
            {
                $saleorder->delete();
            }
            return [
                'success' => '1',
            ];
        }
    }
    public function actionOld($id)
    {
        $this->layout = 'jdshop-user';

        //get feature product
        $query = new \yii\db\Query;
        $query->select('order_line.id_product,type.gender,product.name, sum(amount)  as amount')
            ->from('order_line')
            ->innerJoin('product',$on = 'product.id = order_line.id_product')
            ->innerJoin('type',$on = 'product.id_type = type.id')
            ->addGroupBy('order_line.id_product,product.name,type.gender')
            ->addOrderBy(['sum(amount)'=>SORT_DESC])
            ->limit(4);
        $featureProduct = $query->all();

        //get new product
        $query = new \yii\db\Query;
        $query->select('*')
            ->from('product')
            ->addOrderBy(['created_date'=>SORT_DESC])
            ->limit(4);
        $newProduct = $query->all();

        $soList = SaleOrder::find()->where(['id_user'=>$id])->all();
        $user = Users::find()->where(['id'=>$id])->one();
        return $this->render('viewold', [
                'soList'=> $soList,
                'user'=>$user,
                'newProduct'=>$newProduct,
                'featureProduct'=>$featureProduct,
            ]);
    }
    public function actionView()
    {   
        //get feature product
        $query = new \yii\db\Query;
        $query->select('order_line.id_product,type.gender,product.name, sum(amount)  as amount')
            ->from('order_line')
            ->innerJoin('product',$on = 'product.id = order_line.id_product')
            ->innerJoin('type',$on = 'product.id_type = type.id')
            ->addGroupBy('order_line.id_product,product.name,type.gender')
            ->addOrderBy(['sum(amount)'=>SORT_DESC])
            ->limit(4);
        $featureProduct = $query->all();

        //get new product
        $query = new \yii\db\Query;
        $query->select('*')
            ->from('product')
            ->addOrderBy(['created_date'=>SORT_DESC])
            ->limit(4);
        $newProduct = $query->all();

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
            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";
            if($_POST['status']==0)
            {
                $status=1;
            }
            if($_POST['status']==1)
            {
                $status=2;
                if($user->name==null)
                {
                    $user->name = $_POST['name'];
                    $user->dob = $_POST['dob'];
                    $user->phone = $_POST['sdt'];
                    $user->address = $_POST['address'];
                    $user->save();
                    $status=1;
                }
                else
                {
                    // echo "<pre>";
                    // print_r($_POST);
                    // echo "</pre>";
                    $new_saleorder = SaleOrder::find()->where(['id'=>$_POST['soid']])->one();
                    $new_saleorder->status=3;
                    $new_saleorder->save();
                    $new_orderline = OrderLine::find()->where(['id_bill'=>$new_saleorder->id])->all();
                    return $this->render('view', [
                        'saleorder'=>$new_saleorder,
                        'orderline'=>$new_orderline,
                        'user'=>$user,
                        'status'=>$status,
                        'newProduct' => $newProduct,
                        'featureProduct' =>$featureProduct,
                    ]);
                }
            }
            return $this->render('view', [
                'saleorder'=>$saleorder,
                'orderline'=>$orderline,
                'user'=>$user,
                'status'=>$status,
                'newProduct' => $newProduct,
                'featureProduct' =>$featureProduct,
            ]);

        }
        // if(!isset($orderline))
        // {
        //     return $this->redirect(['../main']);
        // }
        else {
            return $this->render('view', [
                'saleorder'=>$saleorder,
                'orderline'=>$orderline,
                'user'=>$user,
                'status'=>$status,
                'newProduct' => $newProduct,
                'featureProduct' =>$featureProduct,
            ]);    
        }
    }
}