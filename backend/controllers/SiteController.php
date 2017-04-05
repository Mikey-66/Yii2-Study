<?php
namespace backend\controllers;

use Yii;
use backend\controllers\BaseController;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends BaseController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
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
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
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
//        $this->layout = "main";
        // 当前用户的身份实例。未认证用户则为 Null 。
        $identity = Yii::$app->user->identity;

//        show($identity);exit;
        
        // 当前用户的ID。 未认证用户则为 Null 。
        $id = Yii::$app->user->id;
//        show($id);exit;

        // 判断当前用户是否是游客（未认证的）
        $isGuest = Yii::$app->user->isGuest;
//        show($isGuest);exit;

        return $this->render('index');
    }
    
//    public function actionInit(){
//        
//        $admin = new \common\models\User();
//        $admin->username = 'admin';
//        $admin->password_hash = Yii::$app->security->generatePasswordHash('123456');
//        $admin->email = "805742791@qq.com";
//        $admin->created_at = time();
//        $admin->updated_at = time();
//        
//        if (!$admin->save()){
//            $error = implode('', current($admin->getErrors()));
//            exit('init user fail : ' . $error);
//        }else{
//            exit('done');
//        }
//    }
    
    public function actionTest(){
        echo 'test';
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        
//        if (Yii::$app->request->isPost){
//            $post = Yii::$app->request->post();
//            show($post);
//            exit;
//        }
        
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            
//            return $this->render('login', [
//                'model' => $model,
//            ]);
            
            return $this->renderPartial('ilogin', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
