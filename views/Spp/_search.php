<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SppSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="spp-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_spp') ?>

    <?= $form->field($model, 'no_spp') ?>

    <?= $form->field($model, 'tgl_spp') ?>

    <?= $form->field($model, 'id_thn_ajaran') ?>

    <?= $form->field($model, 'semester') ?>

    <?php // echo $form->field($model, 'bulan') ?>

    <?php // echo $form->field($model, 'id_siswa') ?>

    <?php // echo $form->field($model, 'total_spp') ?>

    <?php // echo $form->field($model, 'ket') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
