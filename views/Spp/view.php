<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Spp */

$this->title = $model->no_spp;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Spp'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spp-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Ubah'), ['update', 'id' => $model->id_spp], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Hapus'), ['delete', 'id' => $model->id_spp], [
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
            'no_spp',
            'tgl_spp',
            'kode_thn_ajaran',
            'semester',
            'bulan',
            'nama_siswa',
            'total_spp',
            'ket:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
