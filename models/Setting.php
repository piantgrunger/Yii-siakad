<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


/**
 * This is the model class for table "tb_setting".
 *
 * @property int $id_setting
 * @property int $id_thn_ajaran
 * @property string $semester
 * @property int $id_kepsek
 * @property string $ket
 * @property string $nama_sekolah
 * @property string $alamat_sekolah
 
 * * @property string $created_at
 * @property string $updated_at
 *
 * @property TbMKaryawan $kepsek
 * @property TbMThnAjaran $thnAjaran
 */
class Setting extends \yii\db\ActiveRecord
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
        return 'tb_setting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_thn_ajaran', 'semester', 'id_kepsek'], 'required'],
            [['id_thn_ajaran', 'id_kepsek'], 'integer'],
            [['semester', 'ket','nama_sekolah','alamat_sekolah'], 'string'],
            [['created_at', 'updated_at','nama_sekolah','alamat_sekolah'], 'safe'],
            [['id_kepsek'], 'exist', 'skipOnError' => true, 'targetClass' => Karyawan::className(), 'targetAttribute' => ['id_kepsek' => 'id_karyawan']],
            [['id_thn_ajaran'], 'exist', 'skipOnError' => true, 'targetClass' => ThnAjaran::className(), 'targetAttribute' => ['id_thn_ajaran' => 'id_thn_ajaran']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_setting' => Yii::t('app', 'Id Setting'),
            'id_thn_ajaran' => Yii::t('app', 'Id Thn Ajaran'),
            'semester' => Yii::t('app', 'Semester'),
            'id_kepsek' => Yii::t('app', 'Id Kepsek'),
            'nama_sekolah' => Yii::t('app', 'Nama Sekolah'),
            'alamat_sekolah' => Yii::t('app', 'Alamat Sekolah'),
            'ket' => Yii::t('app', 'Ket'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKepsek()
    {
        return $this->hasOne(karyawan::className(), ['id_karyawan' => 'id_kepsek']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getThnAjaran()
    {
        return $this->hasOne(ThnAjaran::className(), ['id_thn_ajaran' => 'id_thn_ajaran']);
    }
    
    public function  getNama_kepala_sekolah()
    {
        if ($this->kepsek !== null)
        {    
          return $this->kepsek->nama_karyawan;
        } else {
            return null;    
        }  
    }   
    public function  getKode_thn_ajaran()
    {
        if ($this->kepsek !== null)
        {    
            return $this->thnAjaran->kode_thn_ajaran;
         } else {
            return null;    
        }   
    }    
}

