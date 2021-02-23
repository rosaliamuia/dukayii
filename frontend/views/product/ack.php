<?php

use yii\helpers\Url;
use frontend\models\Cartitems;

$cartPrice = CartItems::find()->joinWith('product')->sum('basePrice');
?>

<div class="jumbotron">
  <h1 class="display-4">Thank you for your Purchase!</h1>
  <p class="lead">Your OrderId of amount Ksh <?= $cartPrice ?> has been Confirmed</p>
  <hr class="my-4">
  <p>We'd love to hear from you. <br>Please send an email to our customer service at scool@help.com to let us know how your experience went </p>
  <p class="lead">
    <a class="btn btn-success" href="<?=Url::to(['site/index'])?>" role="button">Continue Shopping</a>
  </p>
</div>

</div>