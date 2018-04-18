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
 
class AdminController extends Controller
{
    public $defaultAction = 'index';
 
    public function actionIndex()
    {
        
        $this->layout = 'lumino-admin';
        return $this->render('index');
    }
}