<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Biaya */

$this->title = Yii::t('app', 'Biaya  Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Biaya'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="biaya-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
