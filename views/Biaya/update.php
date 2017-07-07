<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Biaya */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Biaya',
]) . $model->kode_biaya;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Biaya'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode_biaya, 'url' => ['view', 'id' => $model->id_biaya]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="biaya-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
