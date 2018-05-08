<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;
use Yii;
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
                $flag=1; //Bạn cần phải đăng nhập để thực hiện thao tác này
            else
            {
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