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
            //get product by type
            $query = new \yii\db\Query;
            $query->select('p.name as productname, t.gender as gender, t.name as typename,p.id as pid')
                ->from('product as p, type as t')
                ->where('p.id_type=t.id and t.name='.$name);
            $productList = $query->all();
        }
        return $this->render('view', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'productList' => $productList,
            'nametype'=>$nametype,
        ]);
    }
}