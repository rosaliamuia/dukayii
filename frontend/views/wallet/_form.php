<?php

use frontend\models\Payments;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Wallet */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wallet-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'userId')->hiddenInput(['value'=>yii::$app->user->id])->label(false)?>

    <?= $form->field($model, 'currencyId')->hiddenInput(['value'=>76])->label(false) ?>

    <?= $form->field($model, 'paymentId') ?>

    <?= $form->field($model, 'walletName')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'balance')->textInput() ?> -->

    <?= $form->field($model, 'createdBy')->hiddenInput(['value'=>yii::$app->user->id])->label(false) ?>

    <!-- <?= $form->field($model, 'createdAt')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
