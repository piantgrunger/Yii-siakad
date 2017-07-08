<?php

namespace app\models;

use Yii;



/**
 * This is the model class for table "tb_dt_spp_biaya".
 *
 * @property int $id_det_spp
 * @property int $id_spp
 * @property int $id_biaya
 * @property string $total_biaya
 *
 * @property TbMBiaya $biaya
 * @property TbMtSpp $spp
 */
class d_Spp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */


  
    public static function tableName()
    {
        return 'tb_dt_spp_biaya';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_spp', 'id_biaya'], 'integer'],
            [['id_biaya', 'total_biaya'], 'required'],
            [['total_biaya'], 'number'],
            [['id_biaya'], 'exist', 'skipOnError' => true, 'targetClass' => Biaya::className(), 'targetAttribute' => ['id_biaya' => 'id_biaya']],
            [['id_spp'], 'exist', 'skipOnError' => true, 'targetClass' => Spp::className(), 'targetAttribute' => ['id_spp' => 'id_spp']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_det_spp' => Yii::t('app', 'Id Det Spp'),
            'id_spp' => Yii::t('app', 'Id Spp'),
            'id_biaya' => Yii::t('app', 'Id Biaya'),
            'total_biaya' => Yii::t('app', 'Total Biaya'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBiaya()
    {
        return $this->hasOne(Biaya::className(), ['id_biaya' => 'id_biaya']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpp()
    {
        return $this->hasOne(Spp::className(), ['id_spp' => 'id_spp']);
    }
}
