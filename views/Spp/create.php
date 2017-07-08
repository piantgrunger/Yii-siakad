<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Spp */

$this->title = Yii::t('app', 'Spp  Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Spp'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
                'dataThnAjaran' => $dataThnAjaran,
              'dataSiswa' =>$dataSiswa,
    ]) ?>

</div>
