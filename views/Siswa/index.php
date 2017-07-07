<?php


use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax; use kartik\export\ExportMenu;
$gridColumns=[['class' => 'yii\grid\SerialColumn'], 
            'kode_siswa',
            'nama_siswa',
            'nama_panggilan',
    [
             'attribute' => 'foto_siswa',
        'format' => 'html',    
        'value' => function ($data) {
            return Html::img( Yii::getAlias('@web').'/uploads/'. $data['foto_siswa'],
                ['width' => '100','height'=>'100']);
        },],
            // 'telp_siswa',
            // 'alamat_siswa:ntext',
            // 'tempat_lahir',
            // 'tgl_lahir',
            // 'jns_kelamin',
            // 'anak_ke',
            // 'jml_saudara',
            // 'status_anak',
            // 'agama',
            // 'gol_darah',
            // 'Warga_Negara',
            // 'nama_ayah',
            // 'telp_ayah',
            // 'alamat_ayah:ntext',
            // 'pekerjaan_ayah',
            // 'nama_ibu',
            // 'telp_ibu',
            // 'alamat_ibu:ntext',
            // 'pekerjaan_ibu',
            // 'nama_wali',
            // 'telp_wali',
            // 'alamat_wali:ntext',
            // 'pekerjaan_wali',
            // 'tgl_masuk',
            // 'tgl_lulus',
            // 'ket:ntext',
            // 'created_at',
            // 'updated_at',

         ['class' => 'yii\grid\ActionColumn'],]; echo ExportMenu::widget(['dataProvider' => $dataProvider,'columns' => $gridColumns]);

/* @var $this yii\web\View */
/* @var $searchModel app\models\SiswaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Daftar Siswa');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="siswa-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Siswa  Baru'), ['create'], ['class' => 'btn btn-success']) ?>
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
