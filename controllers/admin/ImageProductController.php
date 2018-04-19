<?php

namespace app\controllers\admin;

use Yii;
use app\models\Product;
use app\models\ImageProduct;
use app\models\SearchImageProduct;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ImageProductController implements the CRUD actions for ImageProduct model.
 */
class ImageProductController extends Controller
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
     * Lists all ImageProduct models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'jdshop-admin';
        $searchModel = new SearchImageProduct();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ImageProduct model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->layout = 'jdshop-user';
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new ImageProduct model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'lumino-admin';
        $model = new ImageProduct();

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            $productId = $model->id; //model->id_product;
            $image = UploadedFile::getInstance($model, 'link');
            $imgName = '[JDSHOP]'.$productId.'.'.$image->getExtension();
            $image->saveAs($this->getStoreToSave().'/'.$imgName);
            $model->link = $imgName;
            if($model->save())
            {
                return $this->redirect(['view', 'id' => $model->id]);
            }
           
        }


        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ImageProduct model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $this->layout = 'jdshop-admin';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            $productId = $model->id; //model->id_product;
            $image = UploadedFile::getInstance($model, 'link');
            $imgName = '[JDSHOP]'.$productId.'.'.$image->getExtension();
            $image->saveAs($this->getStoreToSave().'/'.$imgName);
            $model->link = $imgName;
            if($model->save())
            {
                return $this->redirect(['view', 'id' => $model->id]);
            }

        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ImageProduct model.
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
     * Finds the ImageProduct model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ImageProduct the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ImageProduct::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function getStoreToSave(){
      Yii::setAlias('@project', realpath(dirname(__FILE__).'/../../'));
      return Yii::getAlias('@project') .'\web\images\product-images';
    }
}
