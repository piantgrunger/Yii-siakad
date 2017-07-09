<?php

namespace app\controllers;

use Yii;
use app\models\Spp;
use app\models\SppSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Setting;
use app\models\d_Spp;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use app\models\Biaya;
use yii\helpers\Json;
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
           $query = d_Spp::find();

        // add conditions that should always apply here

        $model_dSpp = new ActiveDataProvider([
            'query' => $query,
        ]);
  $query->andFilterWhere(['id_spp'=>$id]);
        return $this->render('view', [
            'model' => $this->findModel($id),
         'model_dSpp'=> $model_dSpp,
               
            
        ]);
    }

   public function actionBiaya($id){
    // you may need to check whether the entered ID is valid or not
    $model= Biaya::findOne(['id_biaya'=>$id]);
    return Json::encode([
        'id_biaya'=>$model->id_biaya,
        'total_biaya'=>$model->total_biaya,
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
        $model_dSpp = [new d_Spp()];
        $dataThnAjaran = \app\models\ThnAjaran::getDataBrowseThnAjaran();
        $dataSiswa = \app\models\Siswa::getDataBrowseSiswa();
        $dataBiaya = \app\models\Biaya::getDataBrowseBiaya();
           
        if ($model->load(Yii::$app->request->post()) ) {
            $model_dSpp = \app\models\Model::createMultiple(d_Spp::className(),$model_dSpp,'id_det_spp');
            \yii\base\Model::loadMultiple($model_dSpp, Yii::$app->request->post());
            $valid=$model->validate(); 
            $valid = \yii\base\Model::validateMultiple($model_dSpp) && $valid;
            
            if ($valid){ 
            try {
               $transaction = Yii::$app->db->beginTransaction();
               $model->total_spp =0;
               foreach ($model_dSpp as $indexBiaya => $modelBiaya)
               {
                 $model->total_spp =+ $modelBiaya->total_biaya;    
               }   
               
               
                if ($flag = $model->save(false)) {
                    foreach ($model_dSpp as $indexBiaya => $modelBiaya) {
 
                        if ($flag === false) {
                            break;
                        }
 
                        $modelBiaya->id_spp = $model->id_spp;
 
                        if (!($flag = $modelBiaya->save(false))) {
                            break;
                        }
                       
                        
                    }
                }
                if ($flag) {
                    $transaction->commit();
                    return $this->redirect(['view', 'id' => $model->id_spp]);
                } else {
                    $transaction->rollBack();
                }
            } catch (Exception $e) {
                $transaction->rollBack();
            }
            
            } 
              return $this->render('create', [
                'model' => $model,
                 'dataThnAjaran'  =>  $dataThnAjaran ,
                'dataSiswa' =>$dataSiswa,
                'dataBiaya' => $dataBiaya, 
                'model_dSpp'=>(empty($model_dSpp)) ? [new d_Spp]  : $model_dSpp,
                    
            ]);
        
        } else {
            $model->tgl_spp =  date('Y-m-d');
            $model->bulan =  date('n');
            $setting = Setting::findOne(1);
            $model->id_thn_ajaran = $setting->id_thn_ajaran;
            $model->semester = $setting->semester;
            return $this->render('create', [
                'model' => $model,
                 'dataThnAjaran'  =>  $dataThnAjaran ,
                'dataSiswa' =>$dataSiswa,
                'dataBiaya' => $dataBiaya, 
                'model_dSpp'=>(empty($model_dSpp)) ? [new d_Spp]  : $model_dSpp,
                    
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
        $dataThnAjaran = \app\models\ThnAjaran::getDataBrowseThnAjaran();
        $dataSiswa = \app\models\Siswa::getDataBrowseSiswa();
        $dataBiaya = \app\models\Biaya::getDataBrowseBiaya();
        $model_dSpp= $model->detail;           
      
        if ($model->load(Yii::$app->request->post()) ) {
           $oldIDs = ArrayHelper::map($model_dSpp, 'id_det_spp', 'id_det_spp');
          
            $model_dSpp = \app\models\Model::createMultiple(d_Spp::className(),$model_dSpp,'id_det_spp');
            \yii\base\Model::loadMultiple($model_dSpp, Yii::$app->request->post());
             $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($model_dSpp, 'id_det_spp', 'id_det_spp')));

            $valid=$model->validate(); 
            $valid = \yii\base\Model::validateMultiple($model_dSpp) && $valid;
            
            if ($valid){ 
            try {
               $transaction = Yii::$app->db->beginTransaction();
               $model->total_spp =0;
               foreach ($model_dSpp as $indexBiaya => $modelBiaya)
               {
                 $model->total_spp =+ $modelBiaya->total_biaya;    
               }   
              
               if ($flag = $model->save(false)) {
                         if (!empty($deletedIDs)) {
                             d_Spp::deleteAll(['id_det_spp' => $deletedIDs]);
                        }
                    foreach ($model_dSpp as $indexBiaya => $modelBiaya) {
 
                        if ($flag === false) {
                            break;
                        }
 
                        $modelBiaya->id_spp = $model->id_spp;
 
                        if (!($flag = $modelBiaya->save(false))) {
                            break;
                        }
                       
                        
                    }
                }
                if ($flag) {
                    $transaction->commit();
                    return $this->redirect(['view', 'id' => $model->id_spp]);
                } else {
                    $transaction->rollBack();
                }
            } catch (Exception $e) {
                $transaction->rollBack();
            }
            
            } 
              return $this->render('create', [
                'model' => $model,
                 'dataThnAjaran'  =>  $dataThnAjaran ,
                'dataSiswa' =>$dataSiswa,
                'dataBiaya' => $dataBiaya, 
                'model_dSpp'=>(empty($model_dSpp)) ? [new d_Spp]  : $model_dSpp,
                    
            ]);
        
        } else {
            
       
            return $this->render('update', [
                'model' => $model,
                 'dataThnAjaran'  =>  $dataThnAjaran ,
                'dataSiswa' =>$dataSiswa,
                'dataBiaya' => $dataBiaya, 
                'model_dSpp'=>(empty($model_dSpp)) ? [new d_Spp]  : $model_dSpp,
                    
            ]);     }
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
