<?php
use kartik\datecontrol\DateControl;
use kartik\widgets\FileInput;

use yii\bootstrap\Html;
?>
    <?= $form->field($model, 'kode_siswa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_siswa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_panggilan')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'foto_siswa')->widget(FileInput::classname(), [
    'options' => ['multiple' => FALSE,
                  'accept' => 'image/*'],
    'pluginOptions' => ['previewFileType' => 'any',
           
        'showPreview' => false,
        'showCaption' => true,
        'showRemove' => true,
        'showUpload' => false,
    
        'resizeImages'=>true,  'initialPreviewConfig' => [
            ['caption' => $model->nama_siswa, "width"=> "120px", "Height"=> "120px"]], 'initialPreview'=>[
                Html::img( Yii::getAlias('@web')."/uploads/" . $model->foto_siswa)
            ],
            'overwriteInitial'=>true]
        
]); ?>

    <?= $form->field($model, 'telp_siswa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_siswa')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

 <?= $form->field($model, 'tgl_lahir')->widget(DateControl::classname(), [
    'options' => ['placeholder' => 'Masukkan Tanggal Lahir...'
        ],
    'pluginOptions' => [
        'autoclose'=>true
    ]
]);?>
        
    <?= $form->field($model, 'jns_kelamin')->dropDownList([ 'Laki-Laki' => 'Laki-Laki', 'Perempuan' => 'Perempuan', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'anak_ke')->textInput() ?>

    <?= $form->field($model, 'jml_saudara')->textInput() ?>

    <?= $form->field($model, 'status_anak')->dropDownList([ 'Anak Kandung' => 'Anak Kandung', 'Anak Tiri' => 'Anak Tiri', 'Anak Angkat' => 'Anak Angkat', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'agama')->dropDownList([ 'Islam' => 'Islam', 'Kristen Protestan' => 'Kristen Protestan', 'Kristen Katolik' => 'Kristen Katolik', 'Hindu' => 'Hindu', 'Budha' => 'Budha', 'Konghocu' => 'Konghocu', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'gol_darah')->dropDownList([ 'A' => 'A', 'B' => 'B', 'AB' => 'AB', 'O' => 'O', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'Warga_Negara')->dropDownList([ 'WNI' => 'WNI', 'WNA' => 'WNA', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'tgl_masuk')->textInput() ?>


    <?= $form->field($model, 'ket')->textarea(['rows' => 6]) ?>
