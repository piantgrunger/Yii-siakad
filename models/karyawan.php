<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


use yii\web\UploadedFile;


/**
 * This is the model class for table "tb_m_karyawan".
 *
 * @property int $id_karyawan
 * @property string $kode_karyawan
 * @property string $nama_karyawan
 * @property string $foto_karyawan
 * @property string $alamat_karyawan
 * @property string $telp_karyawan
 * @property string $no_id
 * @property string $tempat_lahir
 * @property string $tgl_lahir
 * @property string $jns_kelamin
 * @property string $stat_nikah
 * @property string $agama
 * @property string $tgl_masuk
 * @property string $tgl_keluar
 * @property string $stat_karyawan
 * @property string $ket
 * @property string $created_at
 * @property string $updated_at
 */
class karyawan extends \yii\db\ActiveRecord
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
        return 'tb_m_karyawan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_karyawan', 'nama_karyawan', 'tgl_lahir', 'jns_kelamin', 'stat_nikah', 'agama', 'tgl_masuk', 'stat_karyawan','stat_pekerjaan'], 'required'],
            [['alamat_karyawan', 'jns_kelamin', 'stat_nikah', 'agama', 'stat_karyawan','stat_pekerjaan', 'ket'], 'string'],
            [['tgl_lahir', 'tgl_masuk', 'tgl_keluar', 'created_at', 'updated_at'], 'safe'],
            [['kode_karyawan', 'nama_karyawan', 'telp_karyawan', 'no_id', 'tempat_lahir'], 'string', 'max' => 50],
             [['foto_karyawan'],'file','extensions'=>'jpg, jpeg, png', 'maxSize'=>1024 * 1024 * 1],
    
            [['kode_karyawan'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_karyawan' => Yii::t('app', 'Id Karyawan'),
            'kode_karyawan' => Yii::t('app', 'Kode Karyawan'),
            'nama_karyawan' => Yii::t('app', 'Nama Karyawan'),
            'foto_karyawan' => Yii::t('app', 'Foto Karyawan'),
            'alamat_karyawan' => Yii::t('app', 'Alamat Karyawan'),
            'telp_karyawan' => Yii::t('app', 'Telp Karyawan'),
            'no_id' => Yii::t('app', 'No ID'),
            'tempat_lahir' => Yii::t('app', 'Tempat Lahir'),
            'tgl_lahir' => Yii::t('app', 'Tgl Lahir'),
            'jns_kelamin' => Yii::t('app', 'Jns Kelamin'),
            'stat_nikah' => Yii::t('app', 'Stat Nikah'),
            'agama' => Yii::t('app', 'Agama'),
            'tgl_masuk' => Yii::t('app', 'Tgl Masuk'),
            'tgl_keluar' => Yii::t('app', 'Tgl Keluar'),
            'stat_karyawan' => Yii::t('app', 'Stat Karyawan'),
            'stat_karyawan' => Yii::t('app', 'Stat Pekerjaan'),
            'ket' => Yii::t('app', 'Ket'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
