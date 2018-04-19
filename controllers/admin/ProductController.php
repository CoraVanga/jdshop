<?php

namespace app\controllers\admin;

use Yii;
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
                    'index'  => ['GET'],
                    'view'   => ['GET'],
                    'create' => ['GET', 'POST'],
                    'update' => ['GET', 'PUT', 'POST'],
                    'delete' => ['POST', 'DELETE'],
                ],
            ],
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {

        $this->layout = 'jdshop-admin';
        $searchModel = new SearchProduct();
        

        $query = Product::find();
        // $dataProvider = new ActiveDataProvider([
        // 'query' => $query,
        // 'pagination' => [
        //     'pageSize' => 10,
        // ],
        // 'sort' => [
        //     'defaultOrder' => [
        //         'name' => SORT_DESC,
        //         'id' => SORT_DESC,
        //         ]
        //     ],
        // ]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->layout = 'jdshop-admin';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'jdshop-admin';
        $model = new Product();
        $modelImage = new ImageProduct();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            if(UploadedFile::getInstance($modelImage, 'link'))
            {
                $modelImage->id_product = $model->id;
                $modelImage->save();
                $productId = $model->id; //model->id_product;
                $imageId = $modelImage->id;
                $image = UploadedFile::getInstance($modelImage, 'link');
                $imgName = '[JDSHOP]'.$productId.$imageId.'.'.$image->getExtension();
                $image->saveAs($this->getStoreToSave().'/'.$imgName);
                //$image->saveAs('localhost:7777/images/product-images'.'/'.$imgName);
                $modelImage->link = $imgName;
                $modelImage->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'modelImage'=> $modelImage,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $this->layout = 'jdshop-admin';
        $model = $this->findModel($id);
        $modelImage = new ImageProduct();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            if(UploadedFile::getInstance($modelImage, 'link'))
            {
                $modelImage->id_product = $model->id;
                $modelImage->save();
                $productId = $model->id; //model->id_product;
                $imageId = $modelImage->id;
                $image = UploadedFile::getInstance($modelImage, 'link');
                $imgName = '[JDSHOP]'.$productId.$imageId.'.'.$image->getExtension();
                $image->saveAs($this->getStoreToSave().'/'.$imgName);
                $modelImage->link = $imgName;
                $modelImage->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'modelImage'=> $modelImage,
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->layout = 'jdshop-admin';
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function getStoreToSave(){
      Yii::setAlias('@project', realpath(dirname(__FILE__).'/../../'));
      return Yii::getAlias('@project') .'\web\images\product-images';
    }
}
