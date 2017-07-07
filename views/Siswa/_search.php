<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SiswaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="siswa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_siswa') ?>

    <?= $form->field($model, 'kode_siswa') ?>

    <?= $form->field($model, 'nama_siswa') ?>

    <?= $form->field($model, 'nama_panggilan') ?>

    <?= $form->field($model, 'foto_siswa') ?>

    <?php // echo $form->field($model, 'telp_siswa') ?>

    <?php // echo $form->field($model, 'alamat_siswa') ?>

    <?php // echo $form->field($model, 'tempat_lahir') ?>

    <?php // echo $form->field($model, 'tgl_lahir') ?>

    <?php // echo $form->field($model, 'jns_kelamin') ?>

    <?php // echo $form->field($model, 'anak_ke') ?>

    <?php // echo $form->field($model, 'jml_saudara') ?>

    <?php // echo $form->field($model, 'status_anak') ?>

    <?php // echo $form->field($model, 'agama') ?>

    <?php // echo $form->field($model, 'gol_darah') ?>

    <?php // echo $form->field($model, 'Warga_Negara') ?>

    <?php // echo $form->field($model, 'nama_ayah') ?>

    <?php // echo $form->field($model, 'telp_ayah') ?>

    <?php // echo $form->field($model, 'alamat_ayah') ?>

    <?php // echo $form->field($model, 'pekerjaan_ayah') ?>

    <?php // echo $form->field($model, 'nama_ibu') ?>

    <?php // echo $form->field($model, 'telp_ibu') ?>

    <?php // echo $form->field($model, 'alamat_ibu') ?>

    <?php // echo $form->field($model, 'pekerjaan_ibu') ?>

    <?php // echo $form->field($model, 'nama_wali') ?>

    <?php // echo $form->field($model, 'telp_wali') ?>

    <?php // echo $form->field($model, 'alamat_wali') ?>

    <?php // echo $form->field($model, 'pekerjaan_wali') ?>

    <?php // echo $form->field($model, 'tgl_masuk') ?>

    <?php // echo $form->field($model, 'tgl_lulus') ?>

    <?php // echo $form->field($model, 'ket') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
