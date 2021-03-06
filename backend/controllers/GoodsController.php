<?php

namespace backend\controllers;

use Yii;
use backend\models\Goods;
use backend\models\search\GoodsSearch;
use backend\controllers\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\widgets\ActiveForm;
use yii\web\Response;

/**
 * GoodsController implements the CRUD actions for Goods model.
 */
class GoodsController extends BaseController
{

    /**
     * Lists all Goods models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GoodsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    
    public function actionShow(){
        
        $searchModel = new GoodsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('show', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionShow2(){
        
        $goods = Goods::findOne(45);
        
//        show($goods);exit;
        
        return $this->render('show2', [
            'model' => $goods,
        ]);
    }

    /**
     * Displays a single Goods model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Goods model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Goods();
        
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())){
            
            try {
                
//                show(Yii::$app->request->post());
//                
//                exit('ok');
                
                if (!$model->save()){
                    $error = implode('', current($model->getErrors()));
                    $this->exception($error);
                }
                
                return $this->redirect(['view', 'id' => $model->id]);
            }catch(\Exception $e){
                Yii::$app->session->setFlash('model-error', $e->getMessage());
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
        
        return $this->render('create', [
            'model' => $model,
        ]);
        
        
    }

    /**
     * Updates an existing Goods model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post())){
            
            try{
                if (!$model->save()){
                    $error = implode('', current($model->getErrors()));
                    $this->exception($error);
                }
                
                return $this->redirect(['view', 'id' => $model->id]);
            }catch (\Exception $e){
                Yii::$app->session->setFlash('model-error', $e->getMessage());
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
        
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Goods model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Goods model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Goods the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Goods::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
