<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;
use kartik\select2\Select2;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\web\View;





$js="window.initSelect2Loading = function(id, optVar){
    initS2Loading(id, optVar)
};
window.initSelect2DropStyle = function(id, kvClose, ev){
    initS2Open(id, kvClose, ev)
};";
        
$this->registerJs($js);        
/* @var $this yii\web\View */
/* @var $model app\models\Spp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="spp-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
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
         <div class="padding-v-md">
        <div class="line line-dashed"></div>
    </div>
 
    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper',
        'widgetBody' => '.container-items',
        'widgetItem' => '.biaya-item',
        'limit' => 10,
        'min' => 1,
        'insertButton' => '.add-biaya',
        'deleteButton' => '.remove-biaya',
        'model' => $model_dSpp[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'id_biaya',
            'total_biaya'
        ],
    ]); ?>     
            

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Jenis Biaya</th>
                <th style="width: 450px;">Total</th>
                <th class="text-center" style="width: 90px;">
                    <button type="button" class="add-biaya btn btn-success btn-xs"><span class="fa fa-plus"></span></button>
                </th>
            </tr>
        </thead>
        <tbody class="container-items">
        <?php foreach ($model_dSpp as $indexbiaya => $modelbiaya): ?>
            <tr class="biaya-item">
                <td class="vcenter">
                    <?php
                    
                        // necessary for update action.
                        if (! $modelbiaya->isNewRecord) {
                            echo Html::activeHiddenInput($modelbiaya, "[{$indexbiaya}]id_det_spp");
                        }
                    ?>
                    <?= $form->field($modelbiaya, "[{$indexbiaya}]id_biaya")->label(false)->widget(Select2::classname(), [
    'data' => $dataBiaya,
    'options' => ['placeholder' => 'Pilih Biaya ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],]) ?>
                </td>
                 <td class="vcenter">
                   
                    <?= $form->field($modelbiaya, "[{$indexbiaya}]total_biaya")->label(false)->textInput() ?>
                </td>
                <td class="text-center vcenter" style="width: 90px; verti">
                    <button type="button" class="remove-biaya btn btn-danger btn-xs"><span class="fa fa-minus"></span></button>
                </td>
            </tr>
         <?php endforeach; ?>
        </tbody>
    </table>
    <?php DynamicFormWidget::end(); ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
