<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Productcategory */
/* @var $form ActiveForm */
?>
<div class="addcat">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'productId') ?>
        <?= $form->field($model, 'categoryId') ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- addcat -->
