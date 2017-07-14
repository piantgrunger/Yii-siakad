<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use hscstudio\mimin\components\Mimin;

/* @var $this yii\web\View */
/* @var $model app\models\ThnAjaran */

$this->title = $model->kode_thn_ajaran;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Thn Ajaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="thn-ajaran-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
             <?php if ((Mimin::checkRoute($this->context->id."/update"))){ ?>        <?= Html::a('Ubah', ['update', 'id' => $model->id_thn_ajaran], ['class' => 'btn btn-primary']) ?>
        <?php } if ((Mimin::checkRoute($this->context->id."/delete"))){ ?>        <?= Html::a('Hapus', ['delete', 'id' => $model->id_thn_ajaran], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah Anda yakin ingin menghapus item ini??',
                'method' => 'post',
            ],
        ]) ?>
        <?php } ?>    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'kode_thn_ajaran',
            'tahun_mulai',
            'tahun_selesai',
            'tgl_mulai_thn_ajaran',
            'tgl_selesai_thn_ajaran',
            'hari_efektif',
            'hari_libur',
            'status',
            'ket:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
