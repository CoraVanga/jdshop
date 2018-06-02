<?php

namespace app\controllers\admin;

use Yii;
use app\models\ProductDetail;
use app\models\DiscountProduct;
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
    public function actionDelimage($idi, $idp)
    {
        $this->layout = 'jdshop-admin';
        // $this->findModel($id)->delete();

        return $this->redirect(['update','id' => $idp]);
    }
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
        $productdetails = ProductDetail::find()->where(['id_product'=>$id])->all();
        $discount = DiscountProduct::find()->where(['id'=>$this->findModel($id)->id_discount])->one();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'productdetails' => $productdetails,
            'discount' => $discount,
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
            $model->created_uid = $_SESSION['ID_USER'];
            $model->save();
            foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name){
                $temp = $_FILES["files"]["tmp_name"][$key];
                $path = $_FILES["files"]["name"][$key];
                $ext = pathinfo($path, PATHINFO_EXTENSION);

                $modelImage = new ImageProduct();
                $modelImage->id_product = $model->id;
                $modelImage->save();
                $productId = $model->id; //model->id_product;
                $imageId = $modelImage->id;

                $name = '[JDSHOP]'.$productId.$imageId.'.'.$ext;
                 
                if(empty($temp))
                {
                    break;
                }
                 
                move_uploaded_file($temp,$this->getStoreToSave().'/'.$name);
                $modelImage->link = $name;
                $modelImage->save();
            }

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
            if (isset($_POST['sizeList']))
            {
                $size = json_decode($_POST['sizeList']);
                $amount = json_decode($_POST['amountList']);
                $price = json_decode($_POST['priceList']);
                //echo $array[0];
                for ($x = 0; $x <= count($price)-1; $x++) {
                    $productdetail = new ProductDetail();
                    $productdetail->size = $size[$x];
                    $productdetail->price = $price[$x];
                    $productdetail->amount = $amount[$x];
                    $productdetail->id_product = $model->id;
                    $productdetail->save();
                } 
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
            $model->created_uid = $_SESSION['ID_USER'];
            $model->save();
            foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name){
                $temp = $_FILES["files"]["tmp_name"][$key];
                $path = $_FILES["files"]["name"][$key];
                $ext = pathinfo($path, PATHINFO_EXTENSION);

                $modelImage = new ImageProduct();
                $modelImage->id_product = $model->id;
                $modelImage->save();
                $productId = $model->id; //model->id_product;
                $imageId = $modelImage->id;

                $name = '[JDSHOP]'.$productId.$imageId.'.'.$ext;
                 
                if(empty($temp))
                {
                    break;
                }
                 
                move_uploaded_file($temp,$this->getStoreToSave().'/'.$name);
                $modelImage->link = $name;
                $modelImage->save();
            }

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
            if (isset($_POST['sizeList']))
            {
                $size = json_decode($_POST['sizeList']);
                $amount = json_decode($_POST['amountList']);
                $price = json_decode($_POST['priceList']);
                //echo $array[0];
                for ($x = 0; $x <= count($price)-1; $x++) {
                    $productdetail = new ProductDetail();
                    $productdetail->size = $size[$x];
                    $productdetail->price = $price[$x];
                    $productdetail->amount = $amount[$x];
                    $productdetail->id_product = $model->id;
                    $productdetail->save();
                } 
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
