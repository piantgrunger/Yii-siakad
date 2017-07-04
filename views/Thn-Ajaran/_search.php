<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ThnAjaranSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="thn-ajaran-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_thn_ajaran') ?>

    <?= $form->field($model, 'kode_thn_ajaran') ?>

    <?= $form->field($model, 'tahun_mulai') ?>

    <?= $form->field($model, 'tahun_selesai') ?>

    <?= $form->field($model, 'tgl_mulai_thn_ajaran') ?>

    <?php // echo $form->field($model, 'tgl_selesai_thn_ajaran') ?>

    <?php // echo $form->field($model, 'hari_efektif') ?>

    <?php // echo $form->field($model, 'hari_libur') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'ket') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
