<style>
  .product-details-btn ul {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .popup_content .list-group a.active {
    background-color: #c68fa6 !important;
    color: white;
  }

  .popup_content .list-group a.active {
    background-color: #c68fa6 !important;
  }

  .sidebar .sidebar-default {
    background: #f5f5f5;
    padding: 10px;
    margin-bottom: 0px !important;
    width: 100%;
  }

  .accordion.accordion_style1.mt-0.sidebar-default {
    margin-bottom: 2px !important;
    padding: 10px auto !important;
  }

  @media (min-width:991px) {
    .mobilebottom {
      display: none;
    }
  }
  .card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fdf7f9;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, .125);
    border-radius: .25rem;
    border-left: none;
    border-right: none;

  }

  .card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    min-height: 1px;
    padding: 0px !important;
  }

  .card-header {
    padding: .75rem 1.25rem;
    margin-bottom: 0;
    background: none !important;
    border-bottom: 1px solid rgba(0, 0, 0, .125);
  }

  .card-header:first-child {
    border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
  }

  .accordion {
    overflow-anchor: none;
  }

  .accordion>.card {
    overflow: hidden;
  }

  .accordion>.card:not(:last-of-type) {
    border-bottom: 0;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
  }

  .accordion>.card:not(:first-of-type) {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
  }

  .accordion>.card>.card-header {
    border-radius: 0;
    margin-bottom: -1px;
  }


  @media (min-width:992px) {
    .mt-lg-0 {
      margin-top: 0 !important;
    }

    .pt-lg-0 {
      padding-top: 0 !important;
    }
  }

  .ui-slider {
    position: relative;
    text-align: left;
  }

  .ui-slider .ui-slider-handle {
    position: absolute;
    z-index: 2;
    width: 1.2em;
    height: 1.2em;
    cursor: default;
    -ms-touch-action: none;
    touch-action: none;
  }

  .ui-slider .ui-slider-range {
    position: absolute;
    z-index: 1;
    font-size: .7em;
    display: block;
    border: 0;
    background-position: 0 0;
  }

  .ui-slider-horizontal {
    height: .8em;
  }

  .ui-slider-horizontal .ui-slider-handle {
    top: -.3em;
    margin-left: -.6em;
  }

  .ui-slider-horizontal .ui-slider-range {
    top: 0;
    height: 100%;
  }

  .ui-widget {

    font-size: 1em;
  }

  .ui-widget.ui-widget-content {
    border: 1px solid #c5c5c5;
  }

  .ui-widget-content {
    border: 1px solid #dddddd;
    background: #ffffff;
    color: #333333;
  }

  .ui-widget-header {
    border: 1px solid #dddddd;
    background: #e9e9e9;
    color: #333333;
    font-weight: bold;
  }

  .ui-state-default,
  .ui-widget-content .ui-state-default {
    border: 1px solid #c5c5c5;
    background: #f6f6f6;
    font-weight: normal;
    color: #454545;
  }

  .ui-corner-all {
    border-top-left-radius: 3px;
  }

  .ui-corner-all {
    border-top-right-radius: 3px;
  }

  .ui-corner-all {
    border-bottom-left-radius: 3px;
  }

  .ui-corner-all {
    border-bottom-right-radius: 3px;
  }

  .colorcheckboxes .colorspann::before {
    content: "";
    border: 2px solid #fff;
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    margin: -3px;
    border-radius: 100%;
    box-shadow: 0 0 5px rgb(0 0 0 / 50%);
  }

  @media (max-width: 991px) {
    .desktopfilterlist {
      display: none;
    }
  }

  

  .accordion .card .card-header {
    background-color: transparent;
    padding: 0px;
    margin: 0;
    border: 0px;
  }

  .accordion .card-header a {
   
    display: block;
    line-height: normal;
  }

  .accordion .card-body p:last-child {
    margin: 0;
  }

  .card-body p {
    margin-bottom: 1px;
  }

  .accordion_style1.accordion .card {

    margin-bottom: 15px;
    border-radius: 0;
    border: 0;


    background: #f5f5f5;

  }

  .accordion_style1.accordion .card:last-child {
    margin-bottom: 0;
  }



  .accordion.accordion_style1 .card-header a {
    padding-left: 0;
    padding-top: 0;
    font-weight: 500 !important;
    text-transform: capitalize;
    font-family: 'Montserrat', sans-serif;
    font-size: 16px;
    line-height: 30px;
    margin-bottom: 0px !important;

    color: inherit !important;
  }

  .accordion_style1 .card-header a::after {
    content: "\f106";
   
    font-family: "FontAwesome";
    font-size: 16px;
    font-weight: normal;
    position: absolute;
    right: 15px;
    top: 1px;
  }

  .accordion_style1 .card-header a[aria-expanded="false"]::after {
    content: "\f107";
  }

  .product_color_switch span {
    height: 15px;
    width: 15px;
    display: inline-block;
    vertical-align: middle;
    margin: 5px;
    position: relative;
    cursor: pointer;
    border-radius: 100%;
  }

  .product_color_switch span:first-child {
    -webkit-transition: all 0.2s ease 0s;
    -o-transition: all 0.2s ease 0s;
    transition: all 0.2s ease 0s;
  }

  .product_color_switch span:nth-child(2) {
    -webkit-transition: all 0.3s ease 0s;
    -o-transition: all 0.3s ease 0s;
    transition: all 0.3s ease 0s;
  }

  .list_brand li {
    list-style: none;
    margin-bottom: 10px;
  }

  .list_brand li:last-child {
    margin-bottom: 0;
  }

  .list_brand .custome-checkbox .form-check-label {
    color: #292b2c;
  }

  .filter_price .ui-widget.ui-widget-content {
    border: 0;
    border-radius: 0;
    background-color: #ddd;
    height: 4px;
    margin-bottom: 20px;
  }

  .ui-slider-horizontal .ui-slider-range {
    top: 0;
    height: 100%;
  }

  .filter_price .ui-slider .ui-slider-range {
    background-color: #c68fa6;
    border-radius: 0;
  }

  .filter_price .ui-slider .ui-slider-handle {
    cursor: pointer;
    background-color: #fff;
    border-radius: 100%;
    border: 0;
    height: 18px;
    top: -8px;
    width: 18px;
    margin: 0;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  }

  .price_range {
    color: #292b2c;
  }

  #flt_price {
    margin-left: 5px;
    font-weight: 600;
  }

  .widget_title {
    margin-bottom: 25px;
    text-transform: capitalize;
    font-weight: 600;
    letter-spacing: 0.3px;
  }

  .custome-checkbox .form-check-label {
    position: relative;
    cursor: pointer;
    color: #687188;
    padding: 0;
    vertical-align: middle;
  }

  .custome-checkbox .form-check-input {
    display: none;
  }

  .custome-checkbox .form-check-label span {
    vertical-align: middle;
  }

  .custome-checkbox .form-check-label::before {
    content: "";
    border: 2px solid #ced4da;
    height: 17px;
    width: 17px;
    margin: 0px 8px 0 0;
    display: inline-block;
    vertical-align: middle;
  }

  .custome-checkbox input[type="checkbox"]:checked+.form-check-label::after {
    opacity: 1;
  }

  .custome-checkbox input[type="checkbox"]+.form-check-label::after {
    content: "";
    width: 11px;
    position: absolute;
    top: 50%;
    left: 3px;
    opacity: 0;
    height: 6px;
    border-left: 2px solid #fff;
    border-bottom: 2px solid #fff;
    -moz-transform: translateY(-65%) rotate(-45deg);
    -webkit-transform: translateY(-65%) rotate(-45deg);
    transform: translateY(-65%) rotate(-45deg);
  }

  .colorcheckboxess input[type="checkbox"]+.form-check-label::after {
    content: "";
    width: 11px;
    position: absolute;
    top: 40% !important;
    left: 3px;
    opacity: 0;
    height: 6px;
    border-left: 2px solid #fff;
    border-bottom: 2px solid #fff;
    -moz-transform: translateY(-65%) rotate(-45deg);
    -webkit-transform: translateY(-65%) rotate(-45deg);
    transform: translateY(-65%) rotate(-45deg);
  }

  .custome-checkbox input[type="checkbox"]:checked+.form-check-label::before {
    background-color: #c68fa6;
    border-color: #c68fa6;
  }

  .custome-checkbox .form-check-input {
    display: none;
  }

  .custome-checkbox .form-check-label {
    position: relative;
    cursor: pointer;
  }


  /* tableTabs */
  .popup_content .list-group a {
    text-align: left;
    padding: 12px 20px;
    border-radius: 0;
    border-bottom: 1px solid #efefef;
    color: #2b2f4c;
  }

  .list-group-content {
    border-radius: 0;
    border: 0;

  }

  .subscribe_popup {
    margin: 40px 0;
  }

  .banner-22 {
    height: 100%;
    position: relative;
    margin-top: 174px;
  }

  
  p {
    color: #687188;
    line-height: 28px;
    margin-bottom: 25px;
  }

  .tab-pane .justify-content-center .card {
    border-radius: 0;
    border: 0;
    box-shadow: 0 0px 4px 0 #e9e9e9;
  }

  .btn {
    border-width: 1px;
    cursor: pointer;
    line-height: normal;
  
    text-transform: capitalize;
    transition: all 0.3s ease-in-out;
  }

  .btn-fill-out {
    background-color: transparent;
    border: 1px solid #c68fa6;
    color: #fff;
    position: relative;
    overflow: hidden;
    z-index: 1;
  }

  .btn-fill-out:hover {
    color: #fffafc !important;
  }

  .btn-fill-out::before,
  .btn-fill-out::after {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    background-color: #c68fa6;
    z-index: -1;
    transition: all 0.3s ease-in-out;
    width: 51%;
  }

  .btn-fill-out::before,
  .btn-fill-out::after {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    background-color: #c68fa6;
    z-index: -1;
    transition: all 0.3s ease-in-out;
    width: 51%;
  }

  .btn-fill-out::after {
    right: 0;
    left: auto;
  }

  .popup_content .list-group a i {
    margin-right: 8px;
    vertical-align: middle;
    font-size: 16px;
  }


  @media only screen and (max-width: 575px) {
    p {
      margin-bottom: 15px;
    }

    .widget_title {
      margin-bottom: 20px;
    }
  }

  @media only screen and (max-width: 480px) {
    p {
      line-height: 24px;
    }

    h6 {
      font-size: 14px;
    }

    p {
      margin-bottom: 15px;
    }
  }


  @media (max-width:980px) {
    .contant {
      margin-top: 100px !important;
    }

    .inner-banner {
      padding: 26px 0 !important;
    }

    .banner-22 {

      margin-top: 110px !important;
    }
  }

  @media (max-width: 320px) {
    .banner-22 {
      margin-top: 95px !important;
    }
  }

  @media (max-width:980px) {
    .contant {
      margin-top: 100px !important;
    }

    .inner-banner {
      padding: 1px 0 !important;
    }

    .inner-banner {
      padding: 1px 0 !important;
    }

    .inner-banner {
      padding: 2px 0 !important;
    }

    .banner-22 {
      height: 100%;
      position: relative;
      margin-top: 0px !important;
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
  }


  @media (max-width: 425px) {
    .banner {
      margin-top: 99px !important;
    }
  }

  @media (max-width: 375px) {
    .banner {
      margin-top: 91px !important;
    }
  }

  @media (max-width: 320px) {
    .banner-21 {
      height: 100%;
      position: relative;
      margin-top: 81px !important;
    }

    .banner {
      margin-top: 80px !important;
    }
  }
</style>
<div class="main_content banner-22 ">
  <!-- START DESKTOP SECTION SHOP -->
  <div class=" subscribe_popup show" id="filter" tabindex="-1">
    <!-- START SECTION BREADCRUMB -->
    <div id="banner-part  " class="banner inner-banner inner-banner mb-3">
      <div class="container">
        <div class="bread-crumb-main">
          <h1 class="banner-title">My Account</h1>
          <div class="breadcrumb">
            <ul class="inline">
              <li><a href="<?= base_url() ?>">Home</a>
              </li>
              <li><a href="#">My Account</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- END SECTION BREADCRUMB -->
    <div class="modal-dialog-top m-0" role="document">
      <div class="modal-content border-0" style="top: 0;">
        <div class="modal-body text-center border-0 p-0">
          <div class="row no-gutters">
            <div class="col-sm-12">
              <div class="popup_content" style="padding: 0px 20px ;">
                <div class="row">
                  <div class="col-lg-3 col-md-4 list-group-tabs" style="border-right: 2px solid rgb(240, 238, 238);">
                    <ul class="nav nav-tabs visitedcolor" role="tablist" style="display: block; border-bottom: 0px;">
                      <div class="list-group" id="list-tab" role="tablist">
                        <a class="active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home" aria-selected="true"><i class="bi bi-cart"></i>Orders</a>
                        <a id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile" class="" aria-selected="false"><i class="bi bi-geo-alt"></i>Address</a>
                        <? if ($this->session->userdata('user_type') == 1) {
                          if ($user_data[0]->is_model == 1) { ?>
                            <a id="account-detail-tab" data-toggle="tab" href="#modalproduct" role="tab" aria-controls="account-detail" aria-selected="true"><i class="bi bi-person-vcard"></i>Model Product</a>
                            <a id="address-tab" data-toggle="tab" href="#pointstransaction" role="tab" aria-controls="address" aria-selected="true"><i class="bi bi-person-vcard"></i>Points Redeem Requests</a>
                        <? }
                        } ?>
                        <a id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages" aria-selected="false"><i class="bi bi-person-vcard"></i>Account details</a>
                        <a href="<?= base_url() ?>User/logout"><i class="bi bi-box-arrow-right"></i>Logout</a>
                      </div>
                    </ul>
                  </div>
                  <div class="col-lg-9 col-md-8 list-group-content">
                    <div class="tab-content shop_info_tab" style="margin-top:5px;">
                      <div class="tab-pane show active" id="list-home" role="tabpanel" aria-labelledby="price-tab">
                        <div class="card">
                          <div class="card-header">
                            <h3>Orders</h3>
                          </div>
                          <div class="card-body">
                            <div class="table-responsive">
                              <table class="table">
                                <thead>
                                  <tr class="text-center" style="vertical-align: top;">
                                    <th>Order Id</th>
                                    <th style="vertical-align:middle;">Date</th>
                                    <th>Total Amount</th>
                                    <th>Shipping Charge</th>
                                    <th>Promocode Discount</th>
                                    <th>Final Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Track</th>
                                    <th>Cancel</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <? foreach ($order1_dataa->result() as $orderOne) { ?>
                                    <tr class="text-center">
                                      <td>#<?= $orderOne->id ?></td>
                                      <td><?= $orderOne->date ?></td>
                                      <td>₹<?= $orderOne->total_amount ?></td>
                                      <td><? if (empty($orderOne->shipping)) {
                                            echo 'Free Shipping';
                                          } else {
                                            echo '₹' . $orderOne->shipping;
                                          } ?></td>
                                      <td>
                                        <? if (!empty($orderOne->promo_discount)) {
                                          echo $orderOne->promo_discount;
                                        } else {
                                          echo "N/A";
                                        } ?>
                                      </td>
                                      <td>₹<?= $orderOne->final_amount ?></td>
                                      <td class="product-stock-status" data-title="Stock Status">
                                        <?php if ($orderOne->order_status == 1) { ?>
                                          <span class="badge badge-pill badge-warning">Placed</span>
                                        <?php } elseif ($orderOne->order_status == 2) { ?>
                                          <span class="badge badge-pill badge-info">Accepted</span>
                                        <?php    } elseif ($orderOne->order_status == 3) { ?>
                                          <span class="badge badge-pill badge-info">Dispatched</span>
                                        <?php    } elseif ($orderOne->order_status == 4) { ?>
                                          <span class="badge badge-pill badge-success">Delivered</span>
                                        <? } elseif ($orderOne->order_status == 5) { ?>
                                          <span class="badge badge-pill badge-danger">Rejected</span>
                                        <?php    }
                                        if ($orderOne->order_status == 6) { ?>
                                          <span class="badge badge-pill badge-danger">Cancelled</span>
                                        <? } ?>
                                      </td>
                                      <td> <a style="padding:6px 20px;" class="btn btn-fill-out checkout" href="<?= base_url() ?>Home/order_details/<?= base64_encode($orderOne->id) ?>">View</a></td>
                                      <td>
                                        <!-- <? if ($orderOne->order_status == 3) { ?> -->
                                        <a href="<?= base_url() ?>Home/track_order/<?= base64_encode($orderOne->id) ?>" class="btn btn-fill-out checkout" style="padding:6px 20px;"><i class="linearicons-truck" style="vertical-align:text-top;"></i>Track</a>
                                        <!-- <? } ?> -->
                                      </td>
                                      </td>
                                      <td>
                                        <? if ($orderOne->order_status == 1) { ?>
                                          <a style="padding:6px 20px;" class="btn btn-fill-out checkout" href="<?= base_url() ?>Order/cancel_order/<?= base64_encode($orderOne->id) ?>">X</a>
                                        <? } ?>
                                      </td>
                                    </tr>
                                  <? } ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="pointstransaction" role="tabpanel" aria-labelledby="orders-tab">
                        <div class="card">
                          <div class="card-header">
                            <h3>Referral Points Redeem Requests</h3>
                          </div>
                          <div class="card-body">
                            <div class="table-responsive">
                              <table class="table">
                                <thead>
                                  <tr class="text-center" style="vertical-align: top;">
                                    <th>Request ID</th>
                                    <th>Requested Points</th>
                                    <th>Request Date</th>
                                    <th>Completion Date</th>
                                    <th>Status</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <? foreach ($model_points->result() as $modelPo) { ?>
                                    <tr class="text-center">
                                      <td>#<?= $modelPo->id ?></td>
                                      <td><?= $modelPo->req_points ?></td>
                                      <td><? $newdate = new DateTime($modelPo->date);
                                          echo $newdate->format('F j, Y, g:i a'); ?></td>
                                      <td><? $completed = new DateTime($modelPo->completed_date);
                                          echo $completed->format('F j, Y, g:i a'); ?></td>
                                      <td class="product-stock-status" data-title="Stock Status">
                                        <? if ($modelPo->status == 0) { ?>
                                          <span class="badge badge-pill badge-warning">Pending</span>
                                        <? } elseif ($modelPo->status == 1) { ?>
                                          <span class="badge badge-pill badge-success">Accepted</span>
                                        <? } elseif ($modelPo->status = 2) { ?>
                                          <span class="badge badge-pill badge-danger">Rejected</span>
                                        <? } ?>
                                      </td>
                                    </tr>
                                  <? } ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                      <? if ($this->session->userdata('user_type') == 1) {
                        if ($user_data[0]->is_model == 1) { ?>
                          <div class="tab-pane fade" id="modalproduct" role="tabpanel" aria-labelledby="orders-tab">
                            <div class="card">
                              <div class="card-header">
                                <h3>Model Products</h3>
                              </div>
                              <div class="card-body">
                                <div class="table-responsive">
                                  <table class="table">
                                    <thead>
                                      <tr>
                                        <th class="product-thumbnail">Image</th>
                                        <th class="product-name">Product Name</th>
                                        <th class="product-price">SKU</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <? foreach ($model_table->result() as $model) {
                                        $product_data = $this->db->get_where('tbl_product', array('id = ' => $model->product_id, 'is_active' => 1))->result();
                                        $type_data = $this->db->get_where('tbl_type', array('product_id = ' => $product_data[0]->id))->result();
                                      ?>
                                        <tr>
                                          <td class="product-thumbnail"><a href="<?= base_url() ?>Home/product_detail/<?= $product_data[0]->url ?>?type=<?= base64_encode($type_data[0]->id) ?>"><img src="<?= base_url() . $type_data[0]->image ?>" alt="<?= $product_data[0]->name ?>"></a></td>
                                          <td class="product-name" data-title="Product"><a href="javascript:;"><?= $product_data[0]->name ?></a></td>
                                          <td class="product-price" data-title="Price"><?= $product_data[0]->sku ?></td>
                                        </tr>
                                      <?
                                      } ?>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                      <? }
                      } ?>
                      <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="size-tab">
                        <div class="card">
                          <div class="card-header " style="display: flex;
                        align-items: center;     justify-content: space-between;">
                            <h3>Address</h3>
                            <div>
                              <a class="btn btn-fill-out btn-block  " style="width: 100% ; 
                     padding: 8px 15px" href="<?= base_url() ?>Home/add_address">
                                Add Address </a>
                            </div>
                          </div>
                          <div class="card-body">
                            <div class="col-md-12 text-left">
                              <? if (!empty($address_data)) {
                                foreach ($address_data as $address) { ?>
                                  <div class="bottom-11">
                                    <div class=" row add_sel">
                                      <div class="col-12 col-md-11 adders p-3">
                                        <p><b>First Name:</b> <a><?= $address->f_name ?></a></p>
                                        <p><b>Last Name:</b> <a><?= $address->l_name ?></a></p>
                                        <p><b>Email Address:</b> <a><?= $address->email ?></a></p>
                                        <p><b>Phone Number:</b> <a><?= $address->phone ?></p>
                                        <p><b>State:</b> <a><?= $address->state ?></a></p>
                                        <p><b>city:</b> <a><?= $address->city ?></a></p>
                                        <p><b>Address:</b> <a><?= $address->address ?></a></p>
                                        <p><b>Pincode:</b> <a><?= $address->pincode ?></a></p>
                                        <div style=" display: flex;
                                        justify-content: end;">
                                          <a href="<?= base_url() ?>Home/edit_address/<?= base64_encode($address->id) ?>" class="mr-2"><button class="btn btn-fill-out"> <i class="bi bi-pencil"></i></button></a>
                                          <a href="<?= base_url() ?>Home/delete_address/<?= base64_encode($address->id) ?>"><button class="btn btn-fill-out"> <i class="bi bi-trash"></i></button></a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                <? }
                              } else { ?>
                                <div class="w-100 text-center mt-5">
                                  <h5 class="text-center" style="color:#FF324D">No address found</h5>
                                </div>
                              <? } ?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade show" id="list-messages" role="tabpanel" aria-labelledby="color-tab">
                        <div class="row justify-content-center">
                          <div class="card col-lg-8">
                            <div class="card-header">
                              <h3>Account Details</h3>
                            </div>
                            <? if ($this->session->userdata('user_type') == 1) {
                              if ($user_data[0]->is_model == 1) { ?>
                                <div class="container mt-2">
                                  <div class="row">
                                    <h5 style="margin-left: 20px;">Referral Code:&nbsp;
                                      <!-- <span style="font-size:17px;" >
                        <?= $user_data[0]->reference_code; ?>
                      </span> -->
                                      <input type="text" style="font-size:17px;" id="myInput" readonly value="<?= $user_data[0]->reference_code; ?>" />
                                      &nbsp;&nbsp;<span onclick="myFunction()" style="cursor: pointer" title="Click to copy referral"><i class="bi bi-clipboard"></i></span>
                                    </h5>

                                  </div>
                                </div>
                                <div class="row mb-2">
                                  <div class="col-lg-8">
                                    <h5 style="margin-left: 20px;">Total Points: &nbsp;<span style="font-size:17px;"><?= $user_data[0]->total_points; ?> Points</span></h5>
                                  </div>
                                  <div class="col-lg-4"><button type="submit" class="btn btn-fill-out" name="submit" value="Submit" data-target="#onload-popup5" data-toggle="modal" data-dismiss="modal" style="padding:5px 10px;">Redeem Points</button></div>
                                </div>
                            <? }
                            } ?>
                            <div class="card-body">
                              <? if ($this->session->userdata('user_type') == 2) { ?>
                                <form method="POST" action="<?= base_url() ?>User/update_reseller_profile" enctype="multipart/form-data">
                                  <div class="row">
                                    <div class="form-group col-md-6">
                                      <label>Name <span class="required">*</span></label>
                                      <input required="" class="form-control" value="<?= $user_data[0]->name; ?>" name="name" type="text">
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label>Email<span class="required">*</span></label>
                                      <input required="" class="form-control" value="<?= $user_data[0]->email; ?>" name="email">
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label>Phone <span class="required">*</span></label>
                                      <input required="" class="form-control" readonly value="<?= $user_data[0]->phone; ?>" name="phone" type="text">
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label>Shop<span class="required">*</span></label>
                                      <input required="" class="form-control" value="<?= $user_data[0]->shop; ?>" name="shop">
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label>GST Number <span class="required"></span></label>
                                      <input class="form-control" value="<?= $user_data[0]->gst_number; ?>" name="gstin" type="text">
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label>City<span class="required">*</span></label>
                                      <input required="" class="form-control" value="<?= $user_data[0]->city; ?>" name="city">
                                    </div>
                                    <div class="form-group col-md-12">
                                      <label>Address <span class="required">*</span></label>
                                      <input required class="form-control" name="address" value="<?= $user_data[0]->address; ?>" type="text">
                                    </div>
                                    <div class="col-md-12">
                                      <button type="submit" class="btn btn-fill-out" name="submit" value="Submit">Save</button>
                                    </div>
                                  </div>
                                </form>
                              <? } else { ?>
                                <form method="POST" action="<?= base_url() ?>User/update_profile" enctype="multipart/form-data">
                                  <div class="row">
                                    <div class="form-group col-md-6">
                                      <label>First Name <span class="required">*</span></label>
                                      <input required="" class="form-control" value="<?= $user_data[0]->f_name; ?>" name="fname" type="text">
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label>Last Name <span class="required">*</span></label>
                                      <input required="" class="form-control" value="<?= $user_data[0]->l_name; ?>" name="lname">
                                    </div>
                                    <div class="form-group col-md-12">
                                      <label>Phone Number <span class="required">*</span></label>
                                      <input required class="form-control" name="phonenumber" readonly value="<?= $user_data[0]->phone; ?>" type="text">
                                    </div>
                                    <div class="col-md-12">
                                      <button type="submit" class="btn btn-fill-out" name="submit" value="Submit">Save</button>
                                    </div>
                                  </div>
                                </form>
                              <? } ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END DESKTOP SECTION SHOP -->
</div>
<!-- END MAIN CONTENT -->
<script src="<?= base_url() ?>assets/frontend/js/jquery-3.4.1.min.js"></script>

<script type="text/javascript">
  $(window).on('load', function() {
    var pageURL = $(location).attr("href");
    if (pageURL.includes('order')) {
      $('#list-profile-list').removeClass('active');
      $('#account-detail-tab').removeClass('active');
      $('#list-messages-list').removeClass('active');
      $('#list-home-list').addClass('active');
      $('#list-profile').removeClass('active show');
      $('#orders-tab').removeClass('active show');
      $('#list-messages').removeClass('active show');
      $('#list-home').addClass('active show');
    }
    if (pageURL.includes('account')) {
      $('#list-messages-list').removeClass('active');
      $('#account-detail-tab').removeClass('active');
      $('#list-profile-list').removeClass('active');
      $('#list-home-list').addClass('active');
      $('#list-profile').removeClass('active show');
      $('#orders-tab').removeClass('active show');
      $('#list-home').removeClass('active show');
      $('#list-messages').addClass('active show');
    }
    if (pageURL.includes('ordes')) {
      $('#list-home-list').removeClass('active');
      $('#account-detail-tab').removeClass('active');
      $('#list-messages-list').removeClass('active');
      $('#list-profile-list').addClass('active');
      $('#list-home').removeClass('active show');
      $('#orders-tab').removeClass('active show');
      $('#list-messages').removeClass('active show');
      $('#list-profile').addClass('active show');
    }
  });
</script>
<script>
  function myFunction() {
    /* Get the text field */
    var copyText = document.getElementById("myInput");

    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */

    /* Copy the text inside the text field */
    navigator.clipboard.writeText(copyText.value);

    /* Alert the copied text */
    notifyInfo("Copied")
  }
</script>