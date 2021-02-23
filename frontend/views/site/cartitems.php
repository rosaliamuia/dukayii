<?php

use frontend\models\Cartitems;
use frontend\models\Product;
use yii\bootstrap4\Modal;
use yii\helpers\Url;


$cart= Cartitems::find()->joinWith('cart')->where(['userId'=>Yii::$app->user->id])->joinWith('product')->joinWith('productimages')->all();


$cartPrice = CartItems::find()->joinWith('product')->sum('basePrice');



?>

<div class="pb-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

          <!-- Shopping cart table -->
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="border-0 bg-light">
                    <div class="p-2 px-3 text-uppercase">Product</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Price</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Quantity</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Total Price</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Remove</div>
                  </th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($cart as $product) {?>
                <tr data-id="<?=$product['productId']?>">
                  <th scope="row" class="border-0">
                    <div class="p-2">
                      <img src="<?=yii::$app->request->baseUrl.'/'.$product->productimages[0]->imagePath?>?>" alt="" width="70" class="img-fluid rounded shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle"><?=$product->product->productName?></a></h5><span class="text-muted font-weight-normal font-italic d-block">Category: Men</span>
                      </div>
                    </div>
                  </th>
                  <td class="border-0 align-middle"><strong>$<?=$product->product->basePrice?>.00</strong></td>
                  <td class="border-0 align-middle"><strong>
                  <input type="number" class="form-control item-quantity" style="width: 60px" value="<?=$product->quantity?>" ></strong> 
                  </td>
                  <td class="border-0 align-middle">
                  <strong>$<?=$product->product->basePrice?>.00</strong>  
                  </td>
                  <td class="border-0 align-middle"><a href="#" class="text-dark"><i class="fa fa-trash"></i></a></td>
                </tr>
                <?php }?>      
              </tbody>
            </table>
            <div class="card-footer">
                    <div class="pull-right" style="margin: 10px">
                    
                    <!-- <button  baseUrl=<?=Yii::$app->request->baseUrl?> class="btn btn-success pull-right deposit" type="submit">Checkout</button> -->
                        <!-- <a href="" class="btn btn-success pull-right">&nbsp;Checkout</a> -->
                        <select id="total_<?=$product->productId?>" class="form-control form-control-sm" style="width:70px;">
                            <option><?=$cartPrice?> </option>
                            <option> 2 </option>
                            <option> 3 </option>
                        </select>
                        <a href="<?=Url::to(['site/checkout'])?>" baseUrl="<?= Yii::$app->request->baseUrl?>" productId="<?=$product->productId?>" userId="<?= Yii::$app->user->id?>" class="btn btn-lg btn-outline-primary text-uppercase addtoorder"> <i class="fas fa-shopping-cart"></i> Checkout </a>
                        <!-- <div class="pull-right" style="margin: 5px" totalId="<?=$cartPrice?>" >
                            Total price:&nbsp; <b><?=$cartPrice?>€</b>
                        </div> -->
                    </div>
                </div>
          </div>
          <!-- End -->
        </div>
      </div>
<!-- 
      <?php
     Modal::begin([
        'id'=>'deposit',
        'size'=>'modal-lg'
        ]);

    echo "<div id='depositContent'></div>";
    Modal::end();
?> -->


