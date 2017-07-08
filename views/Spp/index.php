<?php


use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax; use kartik\export\ExportMenu;
$gridColumns=[['class' => 'yii\grid\SerialColumn'], 
            'no_spp',
            'tgl_spp',
            'kode_thn_ajaran',
            'semester',
            'bulan',
            'nama_siswa',
            'total_spp',
    
            // 'bulan',
            // 'id_siswa',
            // 'total_spp',
            // 'ket:ntext',
            // 'created_at',
            // 'updated_at',

         ['class' => 'yii\grid\ActionColumn'],]; echo ExportMenu::widget(['dataProvider' => $dataProvider,'columns' => $gridColumns]);

/* @var $this yii\web\View */
/* @var $searchModel app\models\SppSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Daftar Spp');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spp-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Spp  Baru'), ['create'], ['class' => 'btn btn-success']) ?>
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
