<?php

namespace app\controllers\admin;

use Yii;
use app\models\Product;
use app\models\Type;
use app\models\DiscountProduct;
use app\models\SearchDiscountProduct;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DiscountProductController implements the CRUD actions for DiscountProduct model.
 */
class DiscountProductController extends Controller
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

    /**
     * Lists all DiscountProduct models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout='jdshop-admin';
        $searchModel = new SearchDiscountProduct();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DiscountProduct model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->layout='jdshop-admin';

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new DiscountProduct model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout='jdshop-admin';
        $model = new DiscountProduct();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if (isset($_POST['productList']))
            {
                $idProduct = json_decode($_POST['productList']);
                //echo $array[0];
                for ($x = 0; $x <= count($idProduct)-1; $x++) {
                    $product = Product::findOne($idProduct[$x]);
                    if(isset($product))
                    {
                        $product->id_discount = $model->id;
                        $product->save();
                    }
                } 
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $productList = Product::find()->all();

        $query = new \yii\db\Query;
        $query->select('t.name')
            ->from('type as t, product as p')
            ->where('t.id = p.id_type')
            ->groupBy(['t.name']);
        $typeList = $query->all();
        return $this->render('create', [
            'model' => $model,
            'productList' => $productList,
            'typeList' =>$typeList,
        ]);
    }

    /**
     * Updates an existing DiscountProduct model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $this->layout='jdshop-admin';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing DiscountProduct model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->layout='jdshop-admin';
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DiscountProduct model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DiscountProduct the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DiscountProduct::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
