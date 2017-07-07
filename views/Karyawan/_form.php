<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\datecontrol\DateControl;


/* @var $this yii\web\View */
/* @var $model app\models\Karyawan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="karyawan-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

    <?= $form->field($model, 'kode_karyawan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_karyawan')->textInput(['maxlength' => true]) ?>

  
    <?= $form->field($model, 'alamat_karyawan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'telp_karyawan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

   <?= $form->field($model, 'tgl_lahir')->widget(DateControl::classname(), [
    'options' => ['placeholder' => 'Masukkan Tanggal Lahir...'
        ],
    'pluginOptions' => [
        'autoclose'=>true
    ]
]); ?>

    <?= $form->field($model, 'jns_kelamin')->dropDownList([ 'Laki-Laki' => 'Laki-Laki', 'Perempuan' => 'Perempuan', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'stat_nikah')->dropDownList([ 'Menikah' => 'Menikah', 'Belum Menikah' => 'Belum Menikah', 'Janda' => 'Janda', 'Duda' => 'Duda', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'agama')->dropDownList([ 'Islam' => 'Islam', 'Kristen Protestan' => 'Kristen Protestan', 'Kristen Katolik' => 'Kristen Katolik', 'Hindu' => 'Hindu', 'Budha' => 'Budha', 'Konghocu' => 'Konghocu', ], ['prompt' => '']) ?>

   <?= $form->field($model, 'tgl_masuk')->widget(DateControl::classname(), [
    'options' => ['placeholder' => 'Masukkan Tanggal Masuk...'
        ],
    'pluginOptions' => [
        'autoclose'=>true
    ]
]); ?>

    <?= $form->field($model, 'stat_karyawan')->dropDownList([ 'Tetap' => 'Tetap', 'Kontrak' => 'Kontrak', 'Percobaan' => 'Percobaan', ], ['prompt' => '']) ?>
        
     <?= $form->field($model, 'stat_pekerjaan')->dropDownList([ 'Guru' => 'Guru', 'Tta Usaha' => 'Tata Usaha', 'Lain-Lain' => 'Lain-Lain', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'ket')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
