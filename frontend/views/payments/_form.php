<?php

use frontend\models\Orders;
use frontend\models\Paymentmethods;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Payments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'orderId')->dropDownList(ArrayHelper::map(Orders::find()->all(), 'orderId', 'fullName'))?>

    <?= $form->field($model, 'amount')->dropDownList(ArrayHelper::map(Orders::find()->all(), 'total', 'total')) ?>

    <?= $form->field($model, 'userId')->hiddenInput(['value'=>Yii::$app->user->id])->label(false) ?>

    <?= $form->field($model, 'paymentmethodId')->dropDownList(ArrayHelper::map(Paymentmethods::find()->all(),'paymentmethodId', 'paymentmethodDesc')) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Paid' => 'Paid', 'Not paid' => 'Not paid', '' => '', ], ['prompt' => '']) ?>

    <!-- <?= $form->field($model, 'createdAt')->textInput() ?> -->

    <?= $form->field($model, 'createdBy')->hiddenInput(['value'=>Yii::$app->user->id])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
