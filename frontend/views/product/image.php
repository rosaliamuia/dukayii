<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Productimages;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model frontend\models\Productimages */
/* @var $form ActiveForm */

$images= ArrayHelper::map(Productimages::find()->all(), 'imageId', 'imagePath');
?>
<div class="image">

    

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'imagePath')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
        ]) ?>

        <?= $form->field($model, 'productId') ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- image -->
