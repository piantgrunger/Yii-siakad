<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model app\models\Siswa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="siswa-form">

    
    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->
        
          <?= Tabs::widget([
        'items' => [
            [
                'label' => 'Data Siswa',
                'content' => $this->render('_form_data_siswa', ['model' => $model, 'form' => $form]),
                'active' => true
            ],
              [
                'label' => ' Data Orang Tua / Wali ',
                'content' => $this->render('_form_data_wali', ['model' => $model, 'form' => $form]),
            ],
           
        ]]);
 ?>   





    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
