<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Siswa */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Siswa',
]) . $model->kode_siswa;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Siswa'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode_siswa, 'url' => ['view', 'id' => $model->id_siswa]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="siswa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
