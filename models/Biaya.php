<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "tb_m_biaya".
 *
 * @property int $id_biaya
 * @property string $kode_biaya
 * @property string $nama_biaya
 * @property string $total_biaya
 * @property string $ket
 * @property string $created_at
 * @property string $updated_at
 */
class Biaya extends \yii\db\ActiveRecord
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
        return 'tb_m_biaya';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_biaya', 'nama_biaya', 'total_biaya','jenis_biaya'], 'required'],
            [['total_biaya'], 'number'],
            [['ket'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['kode_biaya'], 'string', 'max' => 50],
            [['nama_biaya'], 'string', 'max' => 100],
            [['kode_biaya'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_biaya' => Yii::t('app', 'Id Biaya'),
            'kode_biaya' => Yii::t('app', 'Kode Biaya'),
            'nama_biaya' => Yii::t('app', 'Nama Biaya'),
            'jenis_biaya' => Yii::t('app', 'Jenis Biaya'),
            'total_biaya' => Yii::t('app', 'Total Biaya'),
            'ket' => Yii::t('app', 'Ket'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
    public function getDataBrowseBiaya()
    {        
     return ArrayHelper::map(
                     biaya::find()
                                        ->select([
                                                'id_biaya','ket_biaya' => 'CONCAT(kode_biaya," - ",nama_biaya)'
                                        ])
                                        ->asArray()
                                        ->all(), 'id_biaya', 'ket_biaya');
    }

}
