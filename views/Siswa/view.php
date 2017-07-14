<?php
use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Siswa */

$this->title = $model->kode_siswa;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Siswa'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="siswa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
            <?php if ((Mimin::checkRoute($this->context->id."/update"))){ ?>    
        <?= Html::a(Yii::t('app', 'Ubah'), ['update', 'id' => $model->id_siswa], ['class' => 'btn btn-primary']) ?>
            <?php } if ((Mimin::checkRoute($this->context->id."/delete"))){ ?>    
 <?= Html::a(Yii::t('app', 'Hapus'), ['delete', 'id' => $model->id_siswa], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Apakah Anda yakin ingin menghapus item ini??'),
                'method' => 'post',
            ],
        ]) ?>
            <?php }?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'kode_siswa',
            'nama_siswa',
            'nama_panggilan',
                [
    'attribute'=>'foto_siswa',
    'value'=>  Yii::getAlias('@web').'/uploads/'.$model->foto_siswa,
    'format' => ['image',['width'=>'100','height'=>'100']],
],
            'telp_siswa',
            'alamat_siswa:ntext',
            'tempat_lahir',
            'tgl_lahir',
            'jns_kelamin',
            'anak_ke',
            'jml_saudara',
            'status_anak',
            'agama',
            'gol_darah',
            'Warga_Negara',
            'nama_ayah',
            'telp_ayah',
            'alamat_ayah:ntext',
            'pekerjaan_ayah',
            'nama_ibu',
            'telp_ibu',
            'alamat_ibu:ntext',
            'pekerjaan_ibu',
            'nama_wali',
            'telp_wali',
            'alamat_wali:ntext',
            'pekerjaan_wali',
            'tgl_masuk',
            'tgl_lulus',
            'ket:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
