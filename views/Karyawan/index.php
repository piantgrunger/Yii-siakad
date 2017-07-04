<?php


use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax; use kartik\export\ExportMenu;
$gridColumns=[['class' => 'yii\grid\SerialColumn'], 
            'kode_karyawan',
            'nama_karyawan',
       //     'foto_karyawan',
            'alamat_karyawan:ntext',
            'telp_karyawan',
            // 'no_id',
             'tempat_lahir',
             'tgl_lahir:date',
             'jns_kelamin',
            // 'stat_nikah',
            // 'agama',
            // 'tgl_masuk',
            // 'tgl_keluar',
            // 'stat_karyawan',
            // 'ket:ntext',
            // 'created_at',
            // 'updated_at',

         ['class' => 'yii\grid\ActionColumn'],]; echo ExportMenu::widget(['dataProvider' => $dataProvider,'columns' => $gridColumns]);

/* @var $this yii\web\View */
/* @var $searchModel app\models\KaryawanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Daftar Karyawan');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="karyawan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Karyawan  Baru'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,        'responsive'=>true,
        'hover'=>true,
         'resizableColumns'=>true,    
    ]); ?>
    <?php Pjax::end(); ?>
</div>
