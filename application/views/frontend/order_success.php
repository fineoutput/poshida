    <!-- <div class="section" style="margin-top: 175px;">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="text-center order_complete">
            <i class="fa fa-check-circle" style="color: green; font-size: 90px ;"></i>
            <div class="heading_s1">
              <h3>Your order is successfully placed!</h3>
            </div>
            <p>Thank you for your order! Your order is being processed...</p>

            <p>Your Ordr #<?=$order_id?> Amd amount <?=$amount?></p>

            <a href="<?= base_url() ?>my_profile/order" class="btn btn-fill-out btn-color" style="padding: 15px 27px ; margin-top: 10px; margin-bottom: 10px; ">View Order</a>
            <a href="<?= base_url() ?>" class="btn btn-fill-out btn-color" style="padding: 15px 27px ; margin-top: 10px; margin-bottom: 10px;">Continue Shopping</a>
          </div>
        </div>
      </div>
    </div>
  </div> -->

  <div class="section" style="margin-top: 175px;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="text-center order_complete">
          <i class="fa fa-check-circle" style="color: green; font-size: 90px;"></i>
          <div class="heading_s1">
            <h3>Your order has been successfully placed!</h3>
          </div>
          <p>We appreciate your purchase! Your order is currently being processed.</p>

          <p>Order ID: <?=$order_id?> <br> Total Amount: ₹<?=number_format($amount, 2)?></p>


          <a href="<?= base_url() ?>my_profile/order" class="btn btn-fill-out btn-color" style="padding: 15px 27px ; margin-top: 10px; margin-bottom: 10px; ">View Order</a>
            <a href="<?= base_url() ?>" class="btn btn-fill-out btn-color" style="padding: 15px 27px ; margin-top: 10px; margin-bottom: 10px;">Continue Shopping</a>
        </div>
      </div>
    </div>
  </div>
</div>
