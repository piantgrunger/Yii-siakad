<?php
use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Biaya */

$this->title = $model->kode_biaya;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Biaya'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="biaya-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if ((Mimin::checkRoute($this->context->id.'/update'))){ echo Html::a(Yii::t('app', 'Ubah'), ['update', 'id' => $model->id_biaya], ['class' => 'btn btn-primary']) ;}?>
        <?php if ((Mimin::checkRoute($this->context->id.'/delete'))){ echo Html::a(Yii::t('app', 'Hapus'), ['delete', 'id' => $model->id_biaya], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Apakah Anda yakin ingin menghapus item ini??'),
                'method' => 'post',
            ],
        ]); }?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'kode_biaya',
            'nama_biaya',
            'total_biaya',
            'jenis_biaya',
            'ket:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
