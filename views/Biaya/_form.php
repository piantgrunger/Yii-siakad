<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Biaya */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="biaya-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

    <?= $form->field($model, 'kode_biaya')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_biaya')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_biaya')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_biaya')->dropDownList([ 'Wajib' => 'Wajib', 'Sukarela' => 'Sukarela', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'ket')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
