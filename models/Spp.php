<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;


/**
 * This is the model class for table "tb_mt_spp".
 *
 * @property int $id_spp
 * @property string $no_spp
 * @property string $tgl_spp
 * @property int $id_thn_ajaran
 * @property string $semester
 * @property int $bulan
 * @property int $id_siswa
 * @property string $total_spp
 * @property string $ket
 * @property string $created_at
 * @property string $updated_at
 *
 * @property TbDtSppBiaya[] $tbDtSppBiayas
 * @property TbMSiswa $siswa
 * @property TbMThnAjaran $thnAjaran
 */
class Spp extends \yii\db\ActiveRecord
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
        return 'tb_mt_spp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_spp', 'tgl_spp', 'semester', 'bulan', 'id_siswa', 'total_spp'], 'required'],
            [['tgl_spp', 'created_at', 'updated_at'], 'safe'],
            [['id_thn_ajaran', 'bulan', 'id_siswa'], 'integer'],
            [['semester', 'ket'], 'string'],
            [['total_spp'], 'number'],
            [['no_spp'], 'string', 'max' => 50],
            [['no_spp'], 'unique'],
            [['id_siswa'], 'exist', 'skipOnError' => true, 'targetClass' => Siswa::className(), 'targetAttribute' => ['id_siswa' => 'id_siswa']],
            [['id_thn_ajaran'], 'exist', 'skipOnError' => true, 'targetClass' => ThnAjaran::className(), 'targetAttribute' => ['id_thn_ajaran' => 'id_thn_ajaran']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_spp' => Yii::t('app', 'Id Spp'),
            'no_spp' => Yii::t('app', 'No Spp'),
            'tgl_spp' => Yii::t('app', 'Tgl Spp'),
            'id_thn_ajaran' => Yii::t('app', 'Id Thn Ajaran'),
            'semester' => Yii::t('app', 'Semester'),
            'bulan' => Yii::t('app', 'Bulan'),
            'id_siswa' => Yii::t('app', 'Id Siswa'),
            'total_spp' => Yii::t('app', 'Total Spp'),
            'ket' => Yii::t('app', 'Ket'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbDtSppBiayas()
    {
        return $this->hasMany(d_Spp::className(), ['id_spp' => 'id_spp']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiswa()
    {
        return $this->hasOne(Siswa::className(), ['id_siswa' => 'id_siswa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getThnAjaran()
    {
        return $this->hasOne(ThnAjaran::className(), ['id_thn_ajaran' => 'id_thn_ajaran']);
    }
       public function  getNama_siswa()
    {
        if ($this->siswa !== null)
        {    
          return $this->siswa->nama_siswa;
        } else {
            return null;    
        }  
    }   
    public function  getKode_thn_ajaran()
    {
        if ($this->thnAjaran !== null)
        {    
            return $this->thnAjaran->kode_thn_ajaran;
         } else {
            return null;    
        }   
    }    
}
