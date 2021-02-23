<?php

use frontend\models\Productbrand;
use frontend\models\Productcolor;
use frontend\models\Productimages;
use frontend\models\Productuom;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap4\Modal;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model frontend\models\Product */
/* @var $form yii\widgets\ActiveForm */

$brands = ArrayHelper::map(Productbrand::find()->all(), 'brandId', 'brandName');
$colors= ArrayHelper::map(Productcolor::find()->all(), 'colorId', 'colorDesc');
$uom= ArrayHelper::map(Productuom::find()->all(), 'uomId', 'uomDesc');
$images= ArrayHelper::map(Productimages::find()->all(), 'imageId', 'imagePath');

$imagess = new frontend\models\Productimages;
$userId = user::find()->where(['id'=>Yii::$app->user->id])->one();
?>



<?php
    Modal::begin([
        'id'  =>'addbrand',
        'size' => 'modal-lg'
    ]);

    echo "<div id='addbrandContent'></div>";
    Modal::end();

?>

<?php
     Modal::begin([
        'id'=>'addcolor',
        'size'=>'modal-lg'
        ]);

    echo "<div id='addcolorContent'></div>";
    Modal::end();
?>

<?php
     Modal::begin([
        'id'=>'uom',
        'size'=>'modal-lg'
        ]);

    echo "<div id='uomContent'></div>";
    Modal::end();
?>



<section class="signup-step-container">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="wizard">
                        <div class="wizard-inner">
                            <div class="connecting-line"></div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i>Step 1</i></a>
                                </li>
                                <li role="presentation" class="disabled">
                                    <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>Step 2</i></a>
                                </li>
                                <li role="presentation" class="disabled">
                                    <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab"><span class="round-tab">3</span> <i>Step 3</i></a>
                                </li>
                                <!-- <li role="presentation" class="disabled">
                                    <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab"><span class="round-tab">4</span> <i>Step 4</i></a>
                                </li>
                            </ul> -->
                        </div>
<!--         
                        <form class="login-box"> -->
                            <div class="tab-content" id="main_form">
                                <div class="tab-pane active" role="tabpanel" id="step1">
                                    <h4 class="text-center">Step 1</h4>
                                   
                                        
                                    <div class="container col-10 h-80 product-form mb-3">

                                        <?php $form = ActiveForm::begin(); ?>

                                        <?= $form->field($model, 'productName')->textInput(['maxlength' => true]) ?>

                                        <?= $form->field($model, 'productDesc')->textarea(['rows' => 6]) ?>


                                    </div>


                                    
                                    <ul class="list-inline pull-right">
                                    

                                        <li><button type="button" class="default-btn next-step">Continue to next step</button></li>
                                    </ul>
                                </div>
                                <div class="tab-pane" role="tabpanel" id="step2">
                                    <h4 class="text-center">Step 2</h4>
                               
                                   
                                    <div class="all-info-container">
                                        <div class="list-content">
                                                <?= $form->field($model, 'basePrice')->textInput(['maxlength' => true]) ?>
                                            <a href="#listone" data-toggle="collapse" aria-expanded="false" aria-controls="listone">Collapse 1 <i class="fa fa-chevron-down"></i></a>
                                            <div class="collapse" id="listone">
                                                <div class="list-box">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <?= $form->field($model, 'uomId')->dropDownList($uom, ['placeholder' => 'Select Brand Name']) ?> 
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <?= Html::Button(Yii::t('app', 'Unit of Measure'), ['class' => 'btn btn-danger uom']) ?>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-content">
                                            <a href="#listtwo" data-toggle="collapse" aria-expanded="false" aria-controls="listtwo">Collapse 2 <i class="fa fa-chevron-down"></i></a>
                                            <div class="collapse" id="listtwo">
                                                <div class="list-box">
                                                    <div class="row">
                                                        
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                            <?= $form->field($model, 'brandId')->dropDownList($brands, ['placeholder' => 'Select Brand Name']) ?>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <?= Html::Button(Yii::t('app', 'Add Brand'), ['class' => 'btn btn-success addbrand']) ?>
                                                            </div>
                                                        </div>
                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-content">
                                            <a href="#listthree" data-toggle="collapse" aria-expanded="false" aria-controls="listthree">Collapse 3 <i class="fa fa-chevron-down"></i></a>
                                            <div class="collapse" id="listthree">
                                                <div class="list-box">
                                                    <div class="row">
                                                        
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <?= $form->field($model, 'colorId')->dropDownList($colors, ['placeholder' => 'Select Color']) ?>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                            <?= Html::Button(Yii::t('app', 'Add Brand'), ['class' => 'btn btn-warning addcolor']) ?>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <!-- <?= $form->field($model, 'createdAt')->textInput() ?> -->

                                        <?= $form->field($model, 'createdBy')->textInput()->hiddenInput(['value' => $userId->id, 'readonly'=>true])->label(false) ?>

                                      
                                    
                                  
                                  
                                    
                                    
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Back</button></li>
                                        <li><button type="button" class="default-btn next-step skip-btn">Skip</button></li>
                                        <li><button type="button" class="default-btn next-step">Continue</button></li>
                                    </ul>
                                </div>
                                <div class="tab-pane" role="tabpanel" id="step3">
                                    <h4 class="text-center">Step 3</h4>
                                     <div class="row">
                                    
                                   
                                     <?= $form->field($image, 'imagePath')->fileInput() ?>                     
                                    
                                   
                                    
                                       </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Back</button></li>
                                        
                                        <div class="form-group">
                                            <?= Html::submitButton(Yii::t('app', 'Finish'), ['class' => 'btn btn-primary pull-left']) ?>
                                            
                                        </div>

                                        <?php ActiveForm::end(); ?>    
                                    
                                        <!-- <li><button type="button" class="default-btn next-step">Finish</button></li> -->
                                    </ul>
                                    <!-- <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Back</button></li>
                                        <li><button type="button" class="default-btn next-step skip-btn">Skip</button></li>
                                        <li><button type="button" class="default-btn next-step">Continue</button></li>
                                    </ul> -->
                                </div>
                                <div class="clearfix"></div>
                            </div>
<!--                             
                        </form> -->
                    </div>
                </div>
            </div>
        </div>
    </section>


