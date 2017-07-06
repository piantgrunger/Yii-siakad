<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

use yii\helpers\ArrayHelper;




/**
 * This is the model class for table "tb_m_thn_ajaran".
 *
 * @property int $id_thn_ajaran
 * @property string $kode_thn_ajaran
 * @property string $tahun_mulai
 * @property string $tahun_selesai
 * @property string $tgl_mulai_thn_ajaran
 * @property string $tgl_selesai_thn_ajaran
 * @property int $hari_efektif
 * @property int $hari_libur
 * @property string $status
 * @property string $ket
 * @property string $created_at
 * @property string $updated_at
 */
class ThnAjaran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */


    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // if you're using datetime instead of UNIX timestamp:
                 'value' => new Expression('NOW()'),
            ],
            
           
        ];
    }
    public static function tableName()
    {
        return 'tb_m_thn_ajaran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'tgl_mulai_thn_ajaran', 'tgl_selesai_thn_ajaran' ], 'required'],
            [[ 'created_at', 'updated_at','status'], 'safe'],
            [['hari_efektif', 'hari_libur'], 'integer'],
            [['status', 'ket'], 'string'],
            [['kode_thn_ajaran'], 'string', 'max' => 50],
            [['tahun_mulai', 'tahun_selesai'], 'string', 'max' => 4],
            [['kode_thn_ajaran'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_thn_ajaran' => Yii::t('app', 'Id Thn Ajaran'),
            'kode_thn_ajaran' => Yii::t('app', 'Kode Thn Ajaran'),
            'tahun_mulai' => Yii::t('app', 'Tahun Mulai'),
            'tahun_selesai' => Yii::t('app', 'Tahun Selesai'),
            'tgl_mulai_thn_ajaran' => Yii::t('app', 'Tgl Mulai Thn Ajaran'),
            'tgl_selesai_thn_ajaran' => Yii::t('app', 'Tgl Selesai Thn Ajaran'),
            'hari_efektif' => Yii::t('app', 'Hari Efektif'),
            'hari_libur' => Yii::t('app', 'Hari Libur'),
            'status' => Yii::t('app', 'Status'),
            'ket' => Yii::t('app', 'Ket'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
    
    public function beforeSave($insert) {
         if (parent::beforeSave($insert)){
       
             $this->status='Tidak Aktif';
           
             $this->tahun_mulai = $this->tgl_mulai_thn_ajaran ;
            $this->tahun_selesai = $this->tgl_selesai_thn_ajaran;
             $this->kode_thn_ajaran = substr($this->tahun_mulai,0,4).'-'.substr($this->tahun_selesai,0,4);      
             return true;
         }
    }
    
    public function getDataBrowseThnAjaran()
    {        
     return ArrayHelper::map(
                     ThnAjaran::find()
                                        ->select([
                                                'id_Thn_Ajaran','ket_Thn_Ajaran' => 'kode_Thn_Ajaran'
                                        ])
                                        ->asArray()
                                        ->all(), 'id_Thn_Ajaran', 'ket_Thn_Ajaran');
    }

}
