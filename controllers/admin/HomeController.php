<?php
namespace app\controllers\admin;
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
use yii\data\Pagination;
use yii\data\ActiveDataProvider;

class HomeController extends Controller{
	public function actionIndex(){
		$this->layout='jdshop-admin';
		//get revenue
        $query = new \yii\db\Query;
        $query->select('sum(CAST(total_price AS BIGINT)) as revenue')
            ->from('sale_order');
        $revenue = $query->all();

		//get sales
        $query = new \yii\db\Query;
        $query->select('count(*) as sales')
            ->from('sale_order');
        $sales = $query->all();

		//get sales
        $query = new \yii\db\Query;
        $query->select('count(*) as products')
            ->from('sale_order');
        $products = $query->all();

        //get customers
        $query = new \yii\db\Query;
        $query->select('count(*) as users')
            ->from('users as t1')
            ->where('exists (select * from sale_order as t2 where t1.id = t2.id_user)');
        $customers = $query->all();

        //get recentSO
        $query = new \yii\db\Query;
        $query->select('t2.name, t1.total_price, t2.address, t1.status, t1.created_date')
            ->from('sale_order as t1, users as t2')
            ->where('t1.id_user = t2.id')
            ->addOrderBy(['t1.created_date'=>SORT_DESC])
            ->limit(5);
        $recentSO = $query->all();

		return $this->render('index', [
        	'revenue' => $revenue,
        	'sales' => $sales,
        	'products' => $products,
        	'customers' => $customers,
        	'recentSO' => $recentSO,
        ]);
	}
}
