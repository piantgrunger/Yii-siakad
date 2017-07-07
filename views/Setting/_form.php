<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Setting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setting-form">

    <?php $form = ActiveForm::begin( ['options' => ['enctype' => 'multipart/form-data']]); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

    <?= $form->field($model, 'id_thn_ajaran')->widget(Select2::classname(), [
    'data' => $dataThnAjaran,
    'options' => ['placeholder' => 'Pilih Tahun Ajaran ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],])->label('Tahun Ajaran'); ?> 

    <?= $form->field($model, 'semester')->dropDownList([ 'Gasal' => 'Gasal', 'Genap' => 'Genap', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'nama_sekolah')->textInput(['maxlength' => true]) ?>

  
    
    <?= $form->field($model, 'alamat_sekolah')->textarea(['rows' => 6]) ?>

  
  <?= $form->field($model, 'id_kepsek')->widget(Select2::classname(), [
    'data' => $dataKaryawan,
    'options' => ['placeholder' => 'Pilih Karyawan ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],])->label('Kepala Sekolah'); ?>

    <?= $form->field($model, 'ket')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
