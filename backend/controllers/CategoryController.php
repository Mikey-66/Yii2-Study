<?php

namespace backend\controllers;

use Yii;
use backend\models\Category;
use backend\models\search\CategorySearch;
use backend\controllers\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Intervention\Image\ImageManager;
use common\components\BaseApi;
use yii\helpers\Url;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends BaseController
{

    /**
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategorySearch();
        $searchModel->parent_id = 0;
        
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Category model.
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
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Category();
        
        if ( $model->load(Yii::$app->request->post()) ){
            
            try{
                
                if ($model->parent_id){
                    $cate = Category::findOne($model->parent_id);
                    if (!$cate){
                        $this->exception('分类不存在');
                    }
                }
                
                $model->cate_path = ':cate_path';
                
                if (!$model->validate()){
                    $error = implode('', current($model->getErrors()));
                    $this->exception($error);
                }

                if (!$model->save()){
                    $error = implode('', current($model->getErrors()));
                    $this->exception($error);
                }
                
                if ($model->logo){
                    $size = Yii::$app->params['thumb_config']['logo'];
                    // 移动到正式目录
                    $res = BaseApi::moveTempImg($model->logo, 'category/logo', [$size['width'], $size['height']]);
                    
                    if (!$res['status']){
                        $this->exception($res['msg']);
                    }
                    
                    $model->logo = $res['path'];
                }
                
                $model->cate_path = isset($cate) ? $cate->cate_path . ',' . $model->id : '0,' . $model->id;
                $model->update(false);

                return $this->redirect(['view', 'id' => $model->id]);
                
            }catch (\Exception $e){
                
                Yii::$app->session->setFlash('model-error', [$e->getMessage()]);
                
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
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post())){
            
            try{
                
                if ($model->parent_id){
                    $cate = Category::findOne($model->parent_id);
                    if (!$cate){
                        $this->exception('分类不存在');
                    }
                }
                
                $model->cate_path = isset($cate) ? $cate->cate_path . ',' . $model->id : '0,' . $model->id;
                
                if (!$model->validate()){
                    $error = implode('', current($model->getErrors()));
                    $this->exception($error);
                }
                
                # logo 字段发生了变化
                if ($model->isAttributeChanged('logo')){
                    
                    # 新图存在
                    if ($model->logo){
                        $size = Yii::$app->params['thumb_config']['logo'];
                        // 移动到正式目录
                        $res = BaseApi::moveTempImg($model->logo, 'category/logo', [$size['width'], $size['height']]);
//                        $res = BaseApi::moveTempImg($model->logo, 'category/logo');

                        if (!$res['status']){
                            $this->exception($res['msg']);
                        }

                        $model->logo = $res['path'];
                    }
                    
                    // 如果原图存在，删除以前的图片
                    if ($oldimg = $model->getOldAttribute('logo')){
                        $absPath = Yii::getAlias('@backend') . '/web' .  $oldimg;
                        @unlink($absPath);
                    }
                }
                
                if (!$model->save()){
                    $error = implode('', current($model->getErrors()));
                    $this->exception($error);
                }

                return $this->redirect(['view', 'id' => $model->id]);
                
            }catch (\Exception $e){
                
                Yii::$app->session->setFlash('model-error', [$e->getMessage()]);
                
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
        
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Category model.
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
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function back($msg, $defaultUrl = null) {
        if ($msg){
            Yii::$app->session->setFlash('model-error', $msg);
        }
        parent::goBack($defaultUrl);
    }
    
    
}
