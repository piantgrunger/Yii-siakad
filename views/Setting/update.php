<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Setting */

$this->title = Yii::t('app', 'Update Setting Siakad ', [
    'modelClass' => 'Setting',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Setting'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_setting, 'url' => ['view', 'id' => $model->id_setting]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="setting-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dataKaryawan' =>$dataKaryawan,
        'dataThnAjaran' => $dataThnAjaran,
    ]) ?>

</div>
