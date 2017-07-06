<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Setting */

$this->title = 'Setting Siakad';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Setting Siakad'), 'url' => ['index']];

?>
<div class="setting-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Ubah'), ['update', 'id' => $model->id_setting], ['class' => 'btn btn-primary']) ?>
      
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'kode_thn_ajaran',
            'semester',
            'nama_kepala_sekolah',
       
        ],
    ]) ?>

</div>
