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

    public function actionView($id)
    {
        if(!isset($_SESSION['ID_USER']) && !isset($_SESSION['ID_CUS']))
            return $this->redirect(['../main']);
        else if (isset($_SESSION['ID_USER']))
        {
            $user = Users::findOne($_SESSION['ID_USER']);
        }
        else
        {
            $user = Users::findOne($_SESSION['ID_CUS']);
        }
        $this->layout = 'jdshop-user';
        
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
        return $this->render('view', [
            'saleorder'=>$saleorder,
            'orderline'=>$orderline,
        ]);    

    }
}