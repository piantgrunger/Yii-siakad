<?php

namespace app\controllers;

use Yii;
use app\models\Spp;
use app\models\SppSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Setting;

/**
 * SppController implements the CRUD actions for Spp model.
 */
class SppController extends Controller
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
     * Lists all Spp models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SppSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Spp model.
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
     * Creates a new Spp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Spp();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_spp]);
        } else {
            $model->tgl_spp =  date('Y-m-d');
            $model->bulan =  date('n');
            $setting = Setting::findOne(1);
            $model->id_thn_ajaran = $setting->id_thn_ajaran;
            $model->semester = $setting->semester;
            $dataThnAjaran = \app\models\ThnAjaran::getDataBrowseThnAjaran();
            $dataSiswa = \app\models\Siswa::getDataBrowseSiswa();
            
            
            
            return $this->render('create', [
                'model' => $model,
                 'dataThnAjaran'  =>  $dataThnAjaran ,
                'dataSiswa' =>$dataSiswa,
                    
            ]);
        }
    }

    /**
     * Updates an existing Spp model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_spp]);
        } else {
                 $dataThnAjaran = \app\models\ThnAjaran::getDataBrowseThnAjaran();
            $dataSiswa = \app\models\Siswa::getDataBrowseSiswa();
            
       
            return $this->render('update', [
                'model' => $model,
                          'dataThnAjaran'  =>  $dataThnAjaran ,
                'dataSiswa' =>$dataSiswa,
            ]);
        }
    }

    /**
     * Deletes an existing Spp model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        
       try
      {
        $this->findModel($id)->delete();
      
      }
      catch(\yii\db\IntegrityException  $e)
      {
	Yii::$app->session->setFlash('error', "Data Tidak Dapat Dihapus Karena Dipakai Modul Lain");
       } 
         return $this->redirect(['index']);
    }

    /**
     * Finds the Spp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Spp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Spp::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
