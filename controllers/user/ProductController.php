<?php

namespace app\controllers\user;

use Yii;
use app\models\Product;
use app\models\SearchProduct;
use app\models\ImageProduct;
use app\models\SearchImageProduct;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
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
    }
    public function actionView($type)
    {
        $this->layout = 'jdshop-user';
        $searchModel = new SearchProduct();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if($type=='ring')
        {
            $name="N'Nhẫn'";
            $nametype='Nhẫn';
        }
        if($type=='earring')
        {
            $name="N'Bông tai'";
            $nametype='Bông tai';
        }
        if($type=='necklace')
        {
            $name="N'Dây chuyền'";
            $nametype='Dây chuyền';
        }
        if($type=='bangles')
        {
            $name="N'Lắc tay'";
            $nametype='Lắc tay';
        }
        //get product by type
        $query = new \yii\db\Query;
        $query->select('p.name as productname, t.gender as gender, t.name as typename,p.id as pid')
            ->from('product as p, type as t')
            ->where('p.id_type=t.id and t.name='.$name);
        //$productList = $query->all();
        // nghia
        $countQuery = $query->count();
        $pages = new Pagination(['totalCount' => $countQuery]);
        $pages->pageSize= 6;
        $productList = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
            // nghia

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

        return $this->render('view', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'productList' => $productList,
            'nametype'=>$nametype,
            'newProduct' => $newProduct,
            'featureProduct' =>$featureProduct,
            'pages' => $pages,
        ]);
    }
}