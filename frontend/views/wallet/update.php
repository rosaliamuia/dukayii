<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Wallet */

$this->title = Yii::t('app', 'Update Wallet: {name}', [
    'name' => $model->walletId,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Wallets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->walletId, 'url' => ['view', 'id' => $model->walletId]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="wallet-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
