<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model app\models\ThnAjaran */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="thn-ajaran-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

    
  
    <?= $form->field($model, 'tgl_mulai_thn_ajaran')->widget(DateControl::classname(), [
    'options' => ['placeholder' => 'Masukkan Tanggal Mulai...'
        ],
    'pluginOptions' => [
        'autoclose'=>true
    ]]
        ); ?>

    <?= $form->field($model, 'tgl_selesai_thn_ajaran')->widget(DateControl::classname(), [
    'options' => ['placeholder' => 'Masukkan Tanggal Selesai...'
        ],
    'pluginOptions' => [
        'autoclose'=>true
    ]]
        ); ?>

    <?= $form->field($model, 'hari_efektif')->textInput() ?>

    <?= $form->field($model, 'hari_libur')->textInput() ?>


    <?= $form->field($model, 'ket')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
