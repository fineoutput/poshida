<style>
  .product-details-btn ul {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .table-users {
    /* border: 1px solid #327a81; */
    border-radius: 10px;
    box-shadow: 3px 3px 0 rgba(0, 0, 0, 0.1);
    max-width: calc(100% - 2em);
    margin: 1em auto;
    overflow: hidden;
    width: 800px;
  }

  table {
    width: 100%;
  }

  table td,
  table th {
    /* color: #2b686e; */
    padding: 10px;
    border: 0px !important;
  }

  table td:last-child {
    font-size: 0.95em;
    line-height: 1.4;
    text-align: left;
  }





  @media screen and (max-width: 700px) {

    table,
    tr,
    td {
      display: block;
    }

    .safee {
      display: flex;
      justify-content: center;
    }

    td:first-child {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);

    }

    td:not(:first-child) {
      clear: both;
      /* margin-left: 100px; */
      padding: 4px 20px 4px 90px;
      position: relative;
      text-align: left;
    }

    td:not(:first-child):before {
      /* color: #91ced4; */
      content: '';
      display: block;
      left: 0;
      position: absolute;
    }


    tr {
      padding: 10px 0;
      position: relative;
    }

    thead {
      display: none;
    }
  }

  @media (max-width: 768px) {
    .banner-21 {
      height: 100%;
      position: relative;
      margin-top: 91px !important;
    }

    .banner {
      margin-top: 90px !important;
    }

    .contant {
      margin-top: 90px !important;
    }

    .price-box span.price {
      font-size: 17px !important;
    }
  }


  @media (max-width: 425px) {
    .banner {
      margin-top: 99px !important;
    }

    .price-box span.price {
      font-size: 17px !important;
    }
  }

  @media (max-width: 375px) {
    .banner {
      margin-top: 91px !important;
    }

    .price-box span.price {
      font-size: 17px !important;
    }
  }

  @media (max-width: 320px) {
    .banner-21 {
      height: 100%;
      position: relative;
      margin-top: 81px !important;
    }

    .price-box span.price {
      font-size: 17px !important;
    }

    .banner {
      margin-top: 80px !important;
    }
  }
</style>
<div class="contant refreshing">
  <!-- ================================== START SECTION BREADCRUMB =================== -->

  <div id="banner-part" class="banner inner-banner">
    <div class="container">
      <div class="bread-crumb-main">
        <h1 class="banner-title">Shopping Cart</h1>
        <div class="breadcrumb">
          <ul class="inline">
            <li><a href="<?= base_url() ?>">Home</a>
            </li>
            <li>Shopping Cart</li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- ================================== END SECTION BREADCRUMB =================== -->

  <div class="ptb-100">
    <?
    if (!empty($cart_data)) { ?>
      <div class="container">
        <div class="cart-item-table commun-table">
          <table class="table border mb-0" style="border-left: 0px !important;
						    border-right: 0px !important; text-align: center;">
            <thead>
              <tr>
                <th class="align-left ">Product</th>
                <th class="align-left ">Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody width="100%" style="text-align: center;">
              <?php $i = 1;
              foreach ($cart_data as $cart) { ?>
                <tr>
                  <td class="align-left">
                    <a href="javascript:void();">
                      <div class="product-image eab_inmad">
                        <img alt="Broken Image" src="<?= $cart['image'] ?>">
                      </div>
                    </a>
                  </td>
                  <td class="align-left margin-respon fgvsdg" style="max-width: 120px;">
                    <div class="product-title ">
                      <a href="javascript:void();"> <b><?= $cart['product_name'] ?></b></a>
                      <div class="d-flex">
                        <p style="margin-bottom: 5px !important;">Color</p>
                        <p style="margin-bottom: 5px !important;">: <?= $cart['color'] ?></p>
                      </div>
                      <div class="d-flex">
                        <p style="margin-bottom: 5px !important;">Size</p>
                        <p style="margin-bottom: 5px !important;">: <?= $cart['size'] ?></p>
                      </div>
                    </div>
                  </td>
                  <td class="margin-respon">
                    <ul>
                      <li>
                        <div class="base-price price-box">
                          <span class="price">₹<?= $cart['price'] ?></span>
                        </div>
                      </li>
                    </ul>
                  </td>
                  <td class="margin-respon rger">
                    <div class="col-xl-12 col-md-12 col-sm-12 " style="padding: 0px !important;">
                      <div class="custom-qty">
                        <button type="button" value="-" product_id="<?= base64_encode($cart['product_id']) ?>" type_id="<?= base64_encode($cart['type_id']) ?>" change="<?= $cart['type_id'] ?>" class="reduced items paa-ews minus"> <i class="fa fa-minus "></i> </button>
                        <input class="input-text qty voain-re" type="text" name="quantity" readonly id="quantity<?= $cart['type_id'] ?>" product_id="<?= base64_encode($cart['product_id']) ?>" type_id="<?= base64_encode($cart['type_id']) ?>" value="<?= $cart['quantity'] ?>" title="Qty" class="qty" size="4">
                        <button type="button" value="+" product_id="<?= base64_encode($cart['product_id']) ?>" type_id="<?= base64_encode($cart['type_id']) ?>" change="<?= $cart['type_id'] ?>" class="increase items paa-ews plus"> <i class="fa fa-plus "></i> </button>
                      </div>
                    </div>
                  </td>
                  <td class="margin-respon icone-red text-center">
                    <a href="javascript:void(0);" product_id="<?= base64_encode($cart['product_id']) ?>" type_id="<?= base64_encode($cart['type_id']) ?>" onclick="deleteCart(this)" class="btn small btn-color">
                      <i title="Remove Item From Cart" data-id="100" class="fa fa-trash cart-remove-item"></i>
                    </a>
                  </td>
                </tr>
              <?php $i++;
              } ?>
            </tbody>
          </table>
        </div>
        <div class="mt-30">
          <div class="row">
            <div class="col-12 safee">
              <div class="right-side float-none-xs">
                <h5>Total : ₹<?= $sub_total ?></h5>
                <? if (!empty($this->session->userdata('user_data'))) { ?>
                  <a href="javascript:void(0)" onclick="call_calculate()" class="btn btn-color">Proceed to checkout
                    <span><i class="fa fa-angle-right"></i></span>
                  </a>
                <? } else { ?>
                  <a href="javascript:void(0)" data-toggle="modal" data-target="#LoginModel" class="btn btn-color">Proceed to checkout
                    <span><i class="fa fa-angle-right"></i></span>
                  </a>
                <? } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    <? } else { ?>
      <div class="text-center">
        <img src="<?= base_url() ?>assets/frontend/images/cart_empty.jpg" alt="Empty Cart" class="img-fluid">
      </div>
    <? } ?>
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 d-flex justify-content-center">
          <img src="<?= base_url() ?>assets/frontend/img/about.gif" alt="" class="img-fluid">
        </div>
      </div>
    </div>

  </div>

</div>