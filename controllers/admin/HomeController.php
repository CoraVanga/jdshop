<?php
namespace app\controllers\admin;
use Yii;
use yii\web\Controller;

class HomeController extends Controller{
	public function actionIndex(){
		$this->layout='jdshop-admin';
		return $this->render('index');
	}
}
