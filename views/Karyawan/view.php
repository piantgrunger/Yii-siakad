<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Karyawan */

$this->title = $model->kode_karyawan;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Karyawan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="karyawan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Ubah'), ['update', 'id' => $model->id_karyawan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Hapus'), ['delete', 'id' => $model->id_karyawan], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Apakah Anda yakin ingin menghapus item ini??'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'kode_karyawan',
            'nama_karyawan',
 
            'alamat_karyawan:ntext',
            'telp_karyawan',
            'no_id',
            'tempat_lahir',
            'tgl_lahir:date',
            'jns_kelamin',
            'stat_nikah',
            'agama',
            'tgl_masuk:date',
            'tgl_keluar',
            'stat_karyawan',
            'ket:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
