<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Productcolor */
/* @var $form ActiveForm */
?>
<div class="addcolor">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'colorDesc') ?>
        <?= $form->field($model, 'colorCode') ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- addcolor -->
