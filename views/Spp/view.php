<?php
use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Spp */

$this->title = $model->no_spp;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Spp'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spp-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
                    <?php if ((Mimin::checkRoute($this->context->id."/update"))){ ?>    
        <?= Html::a(Yii::t('app', 'Ubah'), ['update', 'id' => $model->id_spp], ['class' => 'btn btn-primary']) ?>
           <?php } if ((Mimin::checkRoute($this->context->id."/delete"))){ ?>     
   <?= Html::a(Yii::t('app', 'Hapus'), ['delete', 'id' => $model->id_spp], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Apakah Anda yakin ingin menghapus item ini??'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
           <?php } ?>

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
        ],
    ]) ?>
    <?php
$gridColumns=[['class' => 'yii\grid\SerialColumn'], 
            'nama_biaya',
            'total_biaya',
    ];
?>
        <?= GridView::widget([
        'dataProvider' => $model_dSpp,
        'columns' => $gridColumns,        'responsive'=>true,
        'hover'=>true,
         'resizableColumns'=>true,    
    ]); ?>

</div>
