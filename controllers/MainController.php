<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;
 use Yii;
use app\models\Product;
use app\models\SearchProduct;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
 
class MainController extends Controller
{
    public $defaultAction = 'home';
 
    public function actionHome()
    {
        
        $this->layout = 'jdshop-user';
        //$this->layout = 'lumino-admin';

        $searchModel = new SearchProduct();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        //get feature product
        $query = new \yii\db\Query;
        $query->select('order_line.id_product,type.gender,product.name, sum(amount)')
            ->from('order_line')
            ->innerJoin('product',$on = 'product.id = order_line.id_product')
            ->innerJoin('type',$on = 'product.id_type = type.id')
            ->addGroupBy('order_line.id_product,product.name,type.gender')
            ->addOrderBy(['sum(amount)'=>SORT_DESC])
            ->limit(8);
        $featureProduct = $query->all();

        //get new product
        $query = new \yii\db\Query;
        $query->select('*')
            ->from('product')
            ->addOrderBy(['created_date'=>SORT_DESC])
            ->limit(8);
        $newProduct = $query->all();

        return $this->render('shopper', [
        	'searchModel' => $searchModel,
            'featureProduct' => $featureProduct,
            'newProduct' => $newProduct,
            'dataProvider' => $dataProvider,
        ]);
        //return $this->render('index');
    }

    public function actionAbout()
    {
        $this->layout = 'jdshop-user';
        return $this->render('about');
    }
    public function actionInfo()
    {
        $this->layout = 'jdshop-user';
        return $this->render('infodev');
    }
    public function actionFaq()
    {
        $this->layout = 'jdshop-user';
        return $this->render('faq');
    }
    public function actionHdmh()
    {
        $this->layout = 'jdshop-user';
        return $this->render('huongdanmuahang');
    }
    public function actionHdtt()
    {
        $this->layout = 'jdshop-user';
        return $this->render('huongdanthanhtoan');
    }
    public function actionHdvc()
    {
        $this->layout = 'jdshop-user';
        return $this->render('huongdanvanchuyen');
    }
    public function actionHdds()
    {
        $this->layout = 'jdshop-user';
        return $this->render('huongdandosize');
    }
    public function actionHdsd()
    {
        $this->layout = 'jdshop-user';
        return $this->render('huongdansudung');
    }
      public function actionHdtc()
    {
        $this->layout = 'jdshop-user';
        return $this->render('huongdantracuu');
    }
}