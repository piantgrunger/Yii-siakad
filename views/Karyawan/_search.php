<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KaryawanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="karyawan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_karyawan') ?>

    <?= $form->field($model, 'kode_karyawan') ?>

    <?= $form->field($model, 'nama_karyawan') ?>

    <?= $form->field($model, 'foto_karyawan') ?>

    <?= $form->field($model, 'alamat_karyawan') ?>

    <?php // echo $form->field($model, 'telp_karyawan') ?>

    <?php // echo $form->field($model, 'no_id') ?>

    <?php // echo $form->field($model, 'tempat_lahir') ?>

    <?php // echo $form->field($model, 'tgl_lahir') ?>

    <?php // echo $form->field($model, 'jns_kelamin') ?>

    <?php // echo $form->field($model, 'stat_nikah') ?>

    <?php // echo $form->field($model, 'agama') ?>

    <?php // echo $form->field($model, 'tgl_masuk') ?>

    <?php // echo $form->field($model, 'tgl_keluar') ?>

    <?php // echo $form->field($model, 'stat_karyawan') ?>

    <?php // echo $form->field($model, 'ket') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
