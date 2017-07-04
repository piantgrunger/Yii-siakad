<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ThnAjaran */

$this->title = Yii::t('app', 'Tahun Ajaran  Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Tahun Ajaran'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="thn-ajaran-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
