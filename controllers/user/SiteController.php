<?php

namespace app\controllers\user;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Users;
use yii\helpers\Url;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout = 0;
        $user = new Users();
        if ($user->idLogged()) {
            return $this->goHome();
        }

        $model = new LoginForm();
        $post = Yii::$app->request->post();
        if(isset($post['LoginForm'])){
            $model->formatForLoginUsers($post['LoginForm']);
            $model->login();
            if( $user->idLogged()){
                $id = $user->idLogged();
                $user = $user->findUsersById($id);
                $role = $user->role;
                if($role == 1){
                    header('Location: ../../admin/home');
                    exit;
                }
                if(isset($_SESSION['ID_CUS']))
                {
                    $_SESSION['ID_CUS']=null;
                }
            }
            return $this->goHome();
        }
        
        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogoutUser()
    {
        unset($_SESSION['ID_USER']);
        return $this->goHome();
        
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionRegister()
    {
        $post = Yii::$app->request->post();
        
        $user = new Users();
        if ($user->idLogged()) {
            return $this->goHome();
        }
        $this->layout = 'jdshop-user';
        if(isset($post['register']) && $post['register'] == 1){
            $this->layout = 0;
            $users = new Users();
            $users->formatForSaveUsers($post['Users']);
            $users->validate();
            $users->save();
            return $this->redirect('login');
        }
        return $this->render('register');
    }
    public function actionTest()
    {
        $this->layout = '';
        return $this->render('test');
    }
}
