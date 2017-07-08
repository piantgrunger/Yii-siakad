<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Spp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="spp-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->
        
        <div class="row">
        <div class="col-sm-4">

    <?= $form->field($model, 'no_spp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_thn_ajaran')->widget(Select2::classname(), [
    'data' => $dataThnAjaran,
    'options' => ['placeholder' => 'Pilih Tahun Ajaran ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],])->label('Tahun Ajaran'); ?> 

        
   </div>       
            <div class="col-sm-4">        
<?= $form->field($model, 'tgl_spp')->widget(DateControl::classname(), [
    'options' => ['placeholder' => 'Masukkan Tanggal ...'
        ],
    'pluginOptions' => [
        'autoclose'=>true
    ]
]); ?>

     <?= $form->field($model, 'semester')->dropDownList([ 'Gasal' => 'Gasal', 'Genap' => 'Genap', ], ['prompt' => '']) ?>
   
    <?= $form->field($model, 'total_spp')->textInput() ?>


            </div> 
            <div class="col-sm-4">        

    <?= $form->field($model, 'bulan')->dropDownList([ '1' => 'Januari', '2' => 'Februari','3'=>'Maret','4'=>'April','5'=>'Mei','6'=>'Juni'
        ,'7'=>'Juli','8'=>'Agustus','9'=>'September','10'=>'Oktober','11'=>'November','12'=>'Desember']) ?>
   <?= $form->field($model, 'id_siswa')->widget(Select2::classname(), [
    'data' => $dataSiswa,
    'options' => ['placeholder' => 'Pilih Siswa ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],])->label('Siswa'); ?> 

            </div> 

        </div>
            
            

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
