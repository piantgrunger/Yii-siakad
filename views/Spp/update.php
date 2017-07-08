<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Spp */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Spp',
]) . $model->no_spp;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Spp'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_spp, 'url' => ['view', 'id' => $model->id_spp]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="spp-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
                  'dataThnAjaran'  =>  $dataThnAjaran ,
                'dataSiswa' =>$dataSiswa,
                                'dataBiaya' => $dataBiaya, 
                       'model_dSpp'=>$model_dSpp,

    ]) ?>

</div>
