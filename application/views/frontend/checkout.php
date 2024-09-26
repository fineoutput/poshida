<div class="contant">
  <!-- START SECTION BREADCRUMB -->
  <div id="banner-part" class="banner inner-banner">
    <div class="container">
      <div class="bread-crumb-main">
        <h1 class="banner-title">Checkout</h1>
        <div class="breadcrumb">
          <ul class="inline">
            <li><a rel="canonical" href="<?= base_url() ?>">Home</a>
            </li>
            <li>Checkout</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- END SECTION BREADCRUMB -->

  <div class="checkout-part ptb-100" style="padding-top: 20px;">
    <div class="container">
      <div class="main-form">
        <div class="row">
          <div class="col-12 col-lg-8">
            <div class="mb-md-30">
              <div class="mb-60">
                <div class="col-md-12  p-0">
                  <div class="row">
                    <div class="col-12 mb-3 mt-2 d-flex justify-content-center">
                      <!-- <img src="<?= base_url() ?>assets/frontend/img/add.gif" alt="" class="img-fluid"> -->
                    </div>
                  </div>
                  <!------ start address section ------ -->
                  <div class="heading_s1 border-input ">
                    <div style="display: flex; justify-content: space-between;">
                      <div class="addressStrip-base-title">
                        <? if (!empty($address_data)) { ?>
                          <div class="addressStrip-base-addressName">Deliver to: <span class="addressStrip-base-highlight"><?= $address_data->f_name ?> <?= $address_data->l_name ?></span>
                            <div class="addressStrip-base-highlight"><?= $address_data->address ?>, <?= $address_data->city ?>, <?= $address_data->state ?>- <?= $address_data->pincode ?> </div>
                          </div>
                          <div class="addressStrip-base-subText"><?= $address_data->email ?>, <?= $address_data->phone ?></div>
                        <? } else { ?>
                          <div class="addressStrip-base-addressName">
                            <h5 class="text-center" style="color:#FF324D">Please add address for checkout</h5>
                          </div>
                        <? } ?>

                      </div>
                      <div style="align-items: center;display: flex;">
                        <a href="<?= base_url() ?>Order/add_address" class="btn-color fdghrd " style="padding: 10px 20px; border-radius: 6px;"> <? if (!empty($address_data)) {
                                                                                                                                                  echo 'Change';
                                                                                                                                                } else {
                                                                                                                                                  echo 'Add';
                                                                                                                                                } ?>
                        </a>
                      </div>
                    </div>
                  </div>
                  <!------ End address section ------ -->

                  <!------ Start  products section ------ -->
                  <div class="col-12 col-lg-12">
                    <div class="checkout-products sidebar-product mb-60">
                      <ul>
                        <?php foreach ($cart_fetch['cart_data'] as $cart) { ?>
                          <li>
                            <div class="pro-media"> <a href="javascript:void(0)"><img alt="Image not found" src="<?= $cart['image'] ?>"></a>
                            </div>
                            <div class="pro-detail-info"> <a href="javascript:void(0)" class="product-title"><?= $cart['product_name'] ?></a>
                              <div class="price-box"> <span class="price">₹<?= $cart['price'] ?></span> </div>
                              <!-- <div class="d-flex ">
                                <p class="mb-0">Color</p>
                                <p class="mb-0">: Red</p>
                              </div>
                              <div class="d-flex ">
                                <p class="mb-0">Size</p>
                                <p class="mb-0">: XL</p>
                              </div> -->
                              <div class="checkout-qty">
                                <div>
                                  <label>Qty: </label>
                                  <span class="info-deta"><?= $cart['quantity'] ?></span>
                                </div>
                              </div>
                            </div>
                          </li>
                        <? } ?>
                      </ul>
                    </div>
                  </div>
                  <!------ end  products section ------ -->
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-lg-4" id="summary">

            <div class="complete-order-detail commun-table gray-bg mb-30">
              <div class="table-responsive n-1">
                <div class="payment_method" style="padding: 10px;">
                  <div class="heading_s1">
                    <p style="margin-bottom: 5px !important;"> <b>PRICE DETAILS </b></p>
                  </div>
                  <div class="payment_option " style="border-top:  1px solid gainsboro;">
                    <div id="order_review">
                      <div class="d-flex justify-content-between">
                        <span>
                          Sub Total
                        </span>
                        <span>
                          ₹<?= $order_data[0]->total_amount ?>
                        </span>
                      </div>

                      <div class="d-flex justify-content-between">
                        <span>
                          Shipping charges
                        </span>
                        <span>
                          <? if (empty($order_data[0]->shipping)) {
                            echo 'Free Shipping';
                          } else {
                            echo '₹' . $order_data[0]->shipping;
                          } ?>
                        </span>
                      </div>
                      <?
                      if (!empty($order_data[0]->promo_discount) && $order_data[0]->promo_discount > 1) {
                      ?>
                        <div class="d-flex justify-content-between">
                          <span>
                            Promocode Discount
                          </span>
                          <span>
                            -₹<?= $order_data[0]->promo_discount ?>
                          </span>
                        </div>
                      <? } ?>

                      <div class="d-flex justify-content-between mb-2">
                        <span>
                          Total Amount
                        </span>
                        <span>
                          ₹<?= number_format($order_data[0]->final_amount, 2); ?>
                        </span>
                      </div>
                      <? $promo_string = $this->db->get_where('tbl_promocode', array('id = ' => $order_data[0]->promocode))->result();
                      $input = "";
                      if (!empty($promo_string)) {
                        $input = $promo_string[0]->promocode;
                      } ?>
                      <? if (!empty($input)) {
                      ?>
                        <div class="d-flex justify-content-between mb-2">
                          <span style="color: #FF324D">
                            <?= $input ?>
                          </span>
                          <span style="color: #FF324D">
                            <a href="javascript:void(0);" onclick="remove_promocode()" style="color:unset;"><i class="fa fa-times" aria-hidden="true"></i></a>
                          </span>
                        </div>
                      <?
                      } ?>
                    </div>

                    <div style="border-top:  1px solid gainsboro;" class="mt-3">
                      <p style="margin-bottom: 5px !important; margin-top: 5px !important"> <b>Have any Promocode ? </b></p>
                      <form id="promocode_form" method="POST" enctype="multipart/form-data" action="javascript:void(0)">
                        <div class=" btn-app" style="display: flex; align-items: center;">
                          <div style="width: 100%;">
                            <input type="text" name="promocode" id="inputPromocode" required placeholder="Apply Coupon">
                          </div>
                          <div class="d-flex justify-content-end m-2">
                            <button class="btn-color costrm" type="submit"> APPLY</button>
                          </div>
                        </div>
                      </form>
                    </div>

                    <form method="POST" id="placeOrderForm" action="javascript:;" enctype="multipart/form-data">
                      <input type="hidden" id="totAmt" name="totalAmount" value="<?= $order_data[0]->final_amount ?>" />
                      <div style="border-top:  1px solid gainsboro;" class="mt-3">
                        <div class="form-group  mb-2 p-0 d-flex m-0">
                          <p class="ma" style="margin-bottom: 5px !important; margin-top: 5px !important"><b style="color: rgb(66 64 64);">
                              Have Any referral
                              Code ? </b></p>
                        </div>
                        <div class="col-lg-12 p-0">
                          <div class="form-group">
                            <input class="form-control" type="text" id="referalcode" name="reffercode" placeholder="Enter Referral Code">
                          </div>
                        </div>
                      </div>


                      <div class="payment_method mt-3 " style="padding: 10px;  border-top:  1px solid gainsboro;">
                        <div class="heading_s1">
                          <p style="margin-bottom: 5px !important;"> <b>Payment </b></p>
                          <p style="color: red;padding-bottom:0px;">Delivery Free Above ₹<?= FREESHIPPING ?>
                          </p>
                        </div>
                        <div class="payment_option">
                          <div class="check-box">
                            <span>
                              <input type="radio" class="checkbox payment_method" id="COD" checked name="payment_option" value="1">
                              <label for="COD" class="mb-0">Cash On Delivery
                                (COD)</label>
                            </span>
                          </div>

                          <div class="check-box">
                            <span>
                              <input type="radio" class="checkbox payment_method" value="2" id="online" name="payment_option">
                              <label for="online" class="mb-0">Online
                                Payment</label>
                            </span>
                          </div>
                        </div>
                      </div>

                      <!-- <div class="col-12 mb-3 mt-2 d-flex justify-content-center">
                      <img src="<?= base_url() ?>assets/frontend/img/Qrcode.jpg" alt="" class="img-fluid">
                    </div> -->

                      <div class="col-12 col-md-12  dsgsdcvsd trasition-csm" id="sticks" style="padding: 10px;  border-top:  1px solid gainsboro;">
                        <button class="btn full btn-color" type="submit" id="place">Place Order</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
      <!-- Checkout end -->