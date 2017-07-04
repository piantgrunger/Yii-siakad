<?php

namespace app\controllers;

use Yii;
use app\models\Karyawan;
use app\models\KaryawanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * KaryawanController implements the CRUD actions for Karyawan model.
 */
class KaryawanController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Karyawan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KaryawanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Karyawan model.
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
     * Creates a new Karyawan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
         $model = new Karyawan();

          if ($model->load(Yii::$app->request->post()))
        {    
             $picture = UploadedFile::getInstance($model,'foto_karyawan' );
            $model->foto_karyawan = $model->kode_karyawan.'.jpg';        

            if  ($model->save()) {
          if (!is_null($picture)) 
             {     
                $picture->saveAs(Yii::$app->basePath .'/web/uploads/'.$model->foto_karyawan);     
             }   
             return $this->redirect(['view', 'id' => $model->id_karyawan]);
            }
          
        } else {
          
            return $this->render('create', [
                'model' => $model,
             
                
            ]);
        }
    }

    /**
     * Updates an existing Karyawan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
          $model = $this->findModel($id);
            if ($model->load(Yii::$app->request->post()))
        {    
            $picture = UploadedFile::getInstance($model,'foto_karyawan' );
            $model->foto_karyawan = $model->kode_karyawan.'.jpg';    
        if  ($model->save()) {
             if (!is_null($picture)) 
             {     
              $picture->saveAs(Yii::$app->basePath. '/web/uploads/'.$model->foto_karyawan);     
             }
             return $this->redirect(['view', 'id' => $model->id_karyawan]);
           }    
        } 
         else {
              return $this->render('update', [
                'model' => $model,
           
                
            ]);
        }
    }

    /**
     * Deletes an existing Karyawan model.
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
     * Finds the Karyawan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Karyawan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Karyawan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
