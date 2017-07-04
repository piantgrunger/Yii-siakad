<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ThnAjaran */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Thn Ajaran',
]) . $model->kode_thn_ajaran;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Tahun Ajaran'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode_thn_ajaran, 'url' => ['view', 'id' => $model->id_thn_ajaran]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="thn-ajaran-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
