<style>
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
</style>
<!-- Product list contant start -->
<div class="contant" style="margin-top: 162px;">
  <!--========================= START SECTION BREADCRUMB ==============================-->
  <div id="banner-part" class="banner inner-banner">
    <div class="container">
      <div class="bread-crumb-main">
        <h1 class="banner-title"><?= $subcategory_name ?></h1>
        <div class="breadcrumb">
          <ul class="inline">
            <? $cat = explode(" ", $category_name);
            $caturl = implode("-", $cat); ?>
            <li><a href="<?= base_url() ?>">Home</a></li>
            <li><a href="<?= base_url() ?>Home/all_products/<?= $caturl ?>/1"><?= $category_name ?></a></li>
            <li><?= $subcategory_name ?></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- =================== END SECTION BREADCRUMB ==========================-->
  <div>
    <div class="container-fulide " style="margin:  0px 20px;">
      <div class="col-12 col-lg-12 col-xl-12">
        <div class="product-section grid-view">
          <? if (!empty($product)) { ?>
            <div class="row">
              <!-- ============= START PRODUCT CARD ================== -->
              <? foreach ($product as $data) {
                $type_mrp = 0;
                $type_spgst = 0;
                $type_datas = $this->db->get_where('tbl_type', array('product_id = ' => $data->id, 'is_active' => 1, 'color_active' => 1, 'size_active' => 1));
                $type_data = $type_datas->result();
                if (!empty($type_data)) {
                  if ($data->product_view == 3) {
                    if (!empty($this->session->userdata('user_type'))) {
                      if ($this->session->userdata('user_type') == 2) {
                        $type_mrp = $type_data[0]->reseller_mrp;
                        $type_spgst = $type_data[0]->reseller_spgst;
                      } else {
                        $type_mrp = $type_data[0]->retailer_mrp;
                        $type_spgst = $type_data[0]->retailer_spgst;
                      }
                    } else {
                      $type_mrp = $type_data[0]->retailer_mrp;
                      $type_spgst = $type_data[0]->retailer_spgst;
                    }
                  } elseif ($data->product_view == 2) {
                    $type_mrp = $type_data[0]->reseller_mrp;
                    $type_spgst = $type_data[0]->reseller_spgst;
                  } else {
                    $type_mrp = $type_data[0]->retailer_mrp;
                    $type_spgst = $type_data[0]->retailer_spgst;
                  }
                  $discount = $type_mrp - $type_spgst;
                  $percent = 0;
                  if ($discount > 0) {
                    $percent = $discount / $type_mrp * 100;
                    $percent  = round($percent, 2);
                  }
                  if (!empty($type_data[0]->image2)) {
                    $image1 = $type_data[0]->image2;
                  } else {
                    $image1 = $type_data[0]->image;
                  }
              ?>
                  <div class="col-lg-3 col-md-3 col-6">
                    <div class="product-item">
                      <div class="product-image">
                        <? if ($data->exclusive == 1) { ?> <div class="sale-label"><span>Exclusive</span></div><? } ?>
                        <a href="<?= base_url() ?>Home/product_detail/<?= $data->url ?>?type=<?= base64_encode($type_data[0]->id) ?>">
                          <img src="<?= base_url() . $type_data[0]->image ?>" alt=" ">
                        </a>
                      </div>
                      <div class="product-details-outer">
                        <div class="product-details">
                          <div class="product-title">
                            <a href="<?= base_url() ?>Home/product_detail/<?= $data->url ?>?type=<?= base64_encode($type_data[0]->id) ?>"><?= $data->name ?></a>
                          </div>
                          <div class="price-box">
                            <span class="price">₹<?= $type_spgst ?></span>
                            <? if ($type_mrp > $type_spgst) { ?><del class="price old-price">₹<?= $type_mrp ?></del> <? } ?>
                            <? if ($percent > 0) { ?>
                              <span class="on-sic"> <?= round($percent) ?>% off </span>
                            <? } ?>
                          </div>
                        </div>
                        <div class="product-details-btn">
                          <ul>
                            <?php $i = 1;
                            $size_arr = [];
                            $more = 0;
                            foreach ($type_datas->result() as $type_size) {
                              $status = 0;
                              if ($i < 5) {
                                $this->db->select('*');
                                $this->db->from('tbl_size');
                                $this->db->where('id', $type_size->size_id);
                                $this->db->where('is_active', 1);
                                $size_data = $this->db->get()->row();
                                if (!empty($size_data)) {
                                  if ($i == 1) {
                                    array_push($size_arr, $size_data->id);
                                    $status = 0;
                                  } else {
                                    foreach ($size_arr as $key) {
                                      if ($key == $size_data->id) {
                                        $status = 1;
                                        break;
                                      }
                                    }
                                  }
                                  if ($status == 0) {
                                    array_push($size_arr, $size_data->id); ?>
                                    <li class="icon  cart-icon">
                                      <a href="<?= base_url() ?>Home/product_detail/<?= $data->url ?>?type=<?= base64_encode($type_size->id) ?>"><?= $size_data->name ?></a>
                                    </li>
                                <?php
                                  }
                                }
                              } else {
                                $more++;
                              }
                              $i++;
                            }
                            if ($more > 0) {
                              if (!empty($size_data)) {
                                ?>
                                <li class="icon ivo-ho compare-icon">
                                  <a href="<?= base_url() ?>Home/product_detail/<?= $data->url ?>?type=<?= base64_encode($type_data[0]->id) ?>"> +<?= $more ?></a>
                                </li>
                            <? }
                            } ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- ============= END PRODUCT CARD ================== -->
              <? }
              } ?>
            </div>
          <? } ?>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- END MAIN CONTENT -->