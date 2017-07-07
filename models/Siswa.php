<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


/**
 * This is the model class for table "tb_m_siswa".
 *
 * @property int $id_siswa
 * @property string $kode_siswa
 * @property string $nama_siswa
 * @property string $nama_panggilan
 * @property string $foto_siswa
 * @property string $telp_siswa
 * @property string $alamat_siswa
 * @property string $tempat_lahir
 * @property string $tgl_lahir
 * @property string $jns_kelamin
 * @property int $anak_ke
 * @property int $jml_saudara
 * @property string $status_anak
 * @property string $agama
 * @property string $gol_darah
 * @property string $Warga_Negara
 * @property string $nama_ayah
 * @property string $telp_ayah
 * @property string $alamat_ayah
 * @property string $pekerjaan_ayah
 * @property string $nama_ibu
 * @property string $telp_ibu
 * @property string $alamat_ibu
 * @property string $pekerjaan_ibu
 * @property string $nama_wali
 * @property string $telp_wali
 * @property string $alamat_wali
 * @property string $pekerjaan_wali
 * @property string $tgl_masuk
 * @property string $tgl_lulus
 * @property string $ket
 * @property string $created_at
 * @property string $updated_at
 */
class Siswa extends \yii\db\ActiveRecord
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
        return 'tb_m_siswa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_siswa', 'nama_siswa', 'nama_panggilan', 'tgl_lahir', 'jns_kelamin', 'status_anak', 'agama', 'Warga_Negara', 'nama_ayah', 'nama_ibu',  'tgl_masuk'], 'required'],
            [['alamat_siswa', 'jns_kelamin', 'status_anak', 'agama', 'gol_darah', 'Warga_Negara', 'alamat_ayah', 'alamat_ibu', 'alamat_wali', 'ket'], 'string'],
            [['foto_siswa','tgl_lahir', 'tgl_masuk', 'tgl_lulus', 'created_at', 'updated_at'], 'safe'],
            [['anak_ke', 'jml_saudara'], 'integer'],
            [['kode_siswa', 'nama_siswa', 'nama_panggilan', 'telp_siswa', 'tempat_lahir', 'nama_ayah', 'telp_ayah', 'pekerjaan_ayah', 'nama_ibu', 'telp_ibu', 'pekerjaan_ibu', 'nama_wali', 'telp_wali', 'pekerjaan_wali'], 'string', 'max' => 50],
            [['foto_siswa'], 'file',     'extensions'=>'jpg, jpeg, png', 'maxSize'=>1024 * 1024 * 1],
    
            [['kode_siswa'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_siswa' => Yii::t('app', 'Id Siswa'),
            'kode_siswa' => Yii::t('app', 'NIS'),
            'nama_siswa' => Yii::t('app', 'Nama Siswa'),
            'nama_panggilan' => Yii::t('app', 'Nama Panggilan'),
            'foto_siswa' => Yii::t('app', 'Foto Siswa'),
            'telp_siswa' => Yii::t('app', 'Telp Siswa'),
            'alamat_siswa' => Yii::t('app', 'Alamat Siswa'),
            'tempat_lahir' => Yii::t('app', 'Tempat Lahir'),
            'tgl_lahir' => Yii::t('app', 'Tgl Lahir'),
            'jns_kelamin' => Yii::t('app', 'Jns Kelamin'),
            'anak_ke' => Yii::t('app', 'Anak Ke'),
            'jml_saudara' => Yii::t('app', 'Jml Saudara'),
            'status_anak' => Yii::t('app', 'Status Anak'),
            'agama' => Yii::t('app', 'Agama'),
            'gol_darah' => Yii::t('app', 'Gol Darah'),
            'Warga_Negara' => Yii::t('app', 'Warga  Negara'),
            'nama_ayah' => Yii::t('app', 'Nama Ayah'),
            'telp_ayah' => Yii::t('app', 'Telp Ayah'),
            'alamat_ayah' => Yii::t('app', 'Alamat Ayah'),
            'pekerjaan_ayah' => Yii::t('app', 'Pekerjaan Ayah'),
            'nama_ibu' => Yii::t('app', 'Nama Ibu'),
            'telp_ibu' => Yii::t('app', 'Telp Ibu'),
            'alamat_ibu' => Yii::t('app', 'Alamat Ibu'),
            'pekerjaan_ibu' => Yii::t('app', 'Pekerjaan Ibu'),
            'nama_wali' => Yii::t('app', 'Nama Wali'),
            'telp_wali' => Yii::t('app', 'Telp Wali'),
            'alamat_wali' => Yii::t('app', 'Alamat Wali'),
            'pekerjaan_wali' => Yii::t('app', 'Pekerjaan Wali'),
            'tgl_masuk' => Yii::t('app', 'Tgl Masuk'),
            'tgl_lulus' => Yii::t('app', 'Tgl Lulus'),
            'ket' => Yii::t('app', 'Ket'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
