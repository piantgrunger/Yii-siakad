<?php


use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax; use kartik\export\ExportMenu;
$gridColumns=[['class' => 'yii\grid\SerialColumn'], 
            'kode_thn_ajaran',
            'tahun_mulai',
            'tahun_selesai',
            'tgl_mulai_thn_ajaran:date',
             'tgl_selesai_thn_ajaran:date',
            // 'hari_efektif',
            // 'hari_libur',
            // 'status',
            // 'ket:ntext',
            // 'created_at',
            // 'updated_at',

         ['class' => 'yii\grid\ActionColumn'],]; echo ExportMenu::widget(['dataProvider' => $dataProvider,'columns' => $gridColumns]);

/* @var $this yii\web\View */
/* @var $searchModel app\models\ThnAjaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Daftar Tahun Ajaran');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="thn-ajaran-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Thn Ajaran  Baru'), ['create'], ['class' => 'btn btn-success']) ?>
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
