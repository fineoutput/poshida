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
      <div class="row">
        <div class="col-12 col-lg-4 col-xl-3 gbgb ">
          <form action="<?= base_url() ?>Home/apply_filter" id="applyFilter" method="get" enctype="multipart/form-data">
            <input type="hidden" value="<?= $url ?>" name="url" />
            <div class=" d-flex justify-content-end p-2 mb-2 " style="gap: 10px ;">
              <span style="cursor: pointer;" onclick="clearAllFilters()"> Clear All </span> |
              <span style="cursor: pointer;" onclick="submitFilters()">Apply</span>
            </div>
            <div class="sidebar mb-md-30">

              <div class="accordion accordion_style1 mt-0 sidebar-default ">
                <div class="card ">
                  <div class="card-header" id="headingThre">
                    <h6 class="mb-0"> <a class="collapsed fontweidth cat-title " data-toggle="collapse" href="#collapseThr" aria-expanded="false" aria-controls="collapseSec">Price</a>
                    </h6>
                  </div>

                  <div id="accordion">
                    <div id="collapseThr" class="collapse scrollbarr " aria-labelledby="headingThre" data-parent="#accordion" style="max-height:11rem;overflow-y: scroll;">
                      <a class="btn btn-color small btn-filter  me-3  mb-20" href="javascript:void(0)" onclick="priceReset()"><i class="fa fa-close"></i><span>Reset</span></a>
                      <ul>
                        <div class="filter_price" style="padding: 0px 25px;">
                          <div id="price_filter" data-min="0" data-max="5000" data-min-value="0" data-max-value="2000" data-price-sign="₹"></div>
                          <div class="price_range">
                            <span> <span id="flt_price"></span></span>
                            <input type="hidden" id="price_first" name="minprice" value="0">
                            <input type="hidden" id="price_second" name="maxprice" value="2000">
                            <input type="hidden" id="sort_by" name="sort_by" />
                          </div>
                        </div>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>

              <!-- ============= START SIZE FILTER ================== -->
              <div class="accordion accordion_style1 mt-0 sidebar-default ">
                <div class="card ">
                  <div class="card-header" id="Wsize">
                    <h6 class="mb-0"> <a class="collapsed fontweidth cat-title " data-toggle="collapse" href="#collapseWsize" aria-expanded="false" aria-controls="collapseSec">Size</a>
                    </h6>
                  </div>

                  <div id="accordion">
                    <div id="collapseWsize" class="collapse scrollbarr " aria-labelledby="Wsize" data-parent="#accordion" style="max-height:11rem;overflow-y: scroll;">
                      <a class="btn btn-color small btn-filter  me-3  mb-20" href="javascript:void(0)" onclick="clearSize()"><i class="fa fa-close"></i><span>Clear all</span></a>
                      <a class="btn btn-color small btn-filter  me-3  mb-20" href="javascript:void(0)" onclick="selectSize()"><i class="fa-solid fa-check" style="font-family: 'FontAwesome';"></i><span> Select
                          all</span></a>
                      <ul>

                        <? foreach ($filter_size as $size) {
                          $size_filter = $this->db->get_where('tbl_size', array('is_active' => 1, 'id' => $size))->result();
                          if (!empty($size_filter)) {
                        ?>
                            <li>
                              <div class="check-box">
                                <span>
                                  <input type="checkbox" class="checkbox sizeCheck" id="s<?= $size_filter[0]->id ?>" name="size[]" value="<?= $size_filter[0]->id ?>">
                                  <label for="s<?= $size_filter[0]->id ?>"><?= $size_filter[0]->name ?></span></label>
                                </span>
                              </div>
                            </li>
                        <? }
                        } ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <!-- ============= END SIZE FILTER ================== -->
              <!-- ============= START COLOR FILTER ================== -->
              <div class="accordion accordion_style1 mt-0 sidebar-default ">
                <div class="card ">
                  <div class="card-header" id="Wcolor">
                    <h6 class="mb-0"> <a class="collapsed fontweidth cat-title " data-toggle="collapse" href="#collapseWcolor" aria-expanded="false" aria-controls="collapseSec">Color</a>
                    </h6>
                  </div>

                  <div id="accordion">
                    <div id="collapseWcolor" class="collapse scrollbarr " aria-labelledby="Wcolor" data-parent="#accordion" style="max-height:11rem;overflow-y: scroll;">
                      <a class="btn btn-color small btn-filter  me-3  mb-20" href="javascript:void(0)" onclick="clearColor()"><i class="fa fa-close"></i><span>Clear all</span></a>

                      <a class="btn btn-color small btn-filter  me-3  mb-20" href="javascript:void(0)" onclick="selectColor()"><i class="fa-solid fa-check" style="    font-family: 'FontAwesome';"></i><span> Select
                          all</span></a>
                      <ul>

                        <? foreach ($filter_color as $color) {
                          $olor_filter = $this->db->get_where('tbl_colour', array('is_active' => 1, 'id' => $color))->result();
                          if (!empty($olor_filter)) {
                        ?>
                            <li>
                              <div class="check-box">
                                <span>
                                  <input type="checkbox" class="checkbox colorCheck" id="c<?= $olor_filter[0]->id ?>" name="color[]" value="<?= $olor_filter[0]->id ?>">
                                  <label for="c<?= $olor_filter[0]->id ?>"><span data-color="<?= $olor_filter[0]->name ?>" class="colorspann"></span>
                                    <span style="width:100px;height:auto;font-size:14px;vertical-align:top;"><?= $olor_filter[0]->colour_name ?> </span></label>
                                </span>
                              </div>
                            </li>
                        <? }
                        } ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <!-- ============= END COLOR FILTER ================== -->
              <!--  -->
              <? foreach ($filter_main->result() as $filter) {
                if ($t == 1) {
                  $column = 'category_id';
                } else {
                  $column = 'subcategory_id';
                }
                $check = $this->db->get_where('tbl_product', array("(JSON_CONTAINS(all_filters,'[\"$filter->id\"]')) > " => 0, $column => $id))->result();
                if (!empty($check)) {
              ?>
                  <!-- ============= START OTHER FILTER ================== -->
                  <div class="accordion accordion_style1 mt-0 sidebar-default ">
                    <div class="card ">
                      <div class="card-header" id="Wfilter<?= $filter->id ?>">
                        <h6 class="mb-0"> <a class="collapsed fontweidth cat-title " data-toggle="collapse" href="#collapse<?= $filter->id ?>" aria-expanded="false" aria-controls="collapseSec"><?= $filter->name ?></a>
                        </h6>
                      </div>

                      <div id="accordion">
                        <div id="collapse<?= $filter->id ?>" class="collapse scrollbarr " aria-labelledby="Wfilter<?= $filter->id ?>" data-parent=" #accordion" style="max-height:11rem;overflow-y: scroll;">
                          <a class="btn btn-color small btn-filter  me-3  mb-20" href="javascript:void(0)" onclick="removeAttributes(<?= $filter->id ?>)"><i class="fa fa-close"></i><span>Clear all</span></a>

                          <a class="btn btn-color small btn-filter  me-3  mb-20" href="javascript:void(0)" onclick="selectAttribute(<?= $filter->id ?>)"><i class="fa-solid fa-check" style="font-family: 'FontAwesome';"></i><span> Select
                              all</span></a>
                          <ul>
                            <? $attributes = $this->db->get_where('tbl_attribute', array('filter_id = ' => $filter->id));
                            foreach ($attributes->result() as $attr) {
                              if ($t == 1) {
                                $column = 'category_id';
                              } else {
                                $column = 'subcategory_id';
                              }
                              $check2 = $this->db->get_where('tbl_product', array("(JSON_CONTAINS(all_attributes,'[\"$attr->id\"]')) > " => 0, $column => $id))->result();
                              if (!empty($check2)) {
                            ?>
                                <li>
                                  <div class="check-box">
                                    <span>
                                      <input type="checkbox" class="checkbox attribute<?= $filter->id ?>" name="attribute[]" id="f<?= $attr->id ?>" value="<?= $attr->id ?>">
                                      <label for="f<?= $attr->id ?>">
                                        <?= $attr->name ?></label>
                                    </span>
                                  </div>
                                </li>
                            <? }
                            } ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- ============= END OTHER FILTER ================== -->
              <? }
              } ?>

          </form>
        </div>

      </div>
      <div class="col-12 col-lg-8 col-xl-9">

        <div class="product-section grid-view">
          <!-- ============= START SORT BY ================== -->
          <div class="col-lg-12 leftr mb-2">
            <div class="short-by float-right-md"> <span> Sort by price</span>
              <div class="select-item">
                <select id="mySelect" onchange="myFunction()">
                  <option value="ASC" selected="selected"> Low to High</option>
                  <option value="DESC"> High to Low</option>

                </select>
              </div>
            </div>
          </div>
          <!-- ============= END SORT BY ================== -->


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

        <!-- ============= START PAGINATION ================== -->
        <div class="shorting center-md mb-3 p-1">
          <div class="row">
            <div class="col-lg-6">
              <div class="pagination-bar">
                <?php echo $links; ?>
              </div>
            </div>
          </div>
        </div>
        <!-- ============= END PAGINATION ================== -->

      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
<div class="container-fluid mobilebottom" style="position:sticky; bottom: 0;background:#f2f2f2;" id="footerCount">
  <div class="row text-center">
    <div class="col-6 p-2" style="border-right: 2px solid #dee2e6 ;">
      <a href="#" data-target="#sortby" data-toggle="modal" data-bs-dismiss="modal"> <img src="<?= base_url() ?>assets/frontend/img/sort.png"> SORT BY</a>
    </div>
    <div class="col-6 p-2">
      <a href="#" data-target="#filter" data-toggle="modal" data-bs-dismiss="modal"> <img src="<?= base_url() ?>assets/frontend/img/filter.png">
 FILTER</a>
    </div>
  </div>

</div>

<div class="modal subscribe_popup show" id="sortby" tabindex="-1" style="display: none;" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-lg  m-0 modal-dialog12" role="document" style="width: 100%; min-width: -webkit-fill-available;">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="ion-ios-close-empty"></i></span>
        </button>
        <div class="row no-gutters">
          <div class="col-sm-12">
            <div class="popup_content">
              <div class="popup-text">
                <div class="heading_s1">
                  <h6>Sort by price</h6>
                </div>
              </div>
              <ul style="list-style-type: none;">
                <li style="padding:15px 0px; border-bottom: 2px solid rgb(235, 232, 232);"> <a href="javascript:;" onclick="soryBy('ASC')">Sort by price: Low to High</a>
                </li>
                <li style="padding:15px 0px; border-bottom: 2px solid rgb(235, 232, 232);"> <a href="javascript:;" onclick="soryBy('DESC')">Sort by price: High to Low</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal subscribe_popup show" id="filter" tabindex="-1" style="z-index: 100321; overflow: hidden; display: none;" aria-modal="true" role="dialog">


  <div class="modal-dialog modal-lg modal-dialog-top m-0" role="document" style="max-width: 100%;">
    <div class="modal-content" style="top: 0;">
      <div class="modal-body text-center">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="ion-ios-close-empty"></i></span>
        </button>
        <h6 style="padding-top: 10px;font-size: 12px;">
          FILTER</h6>
        <div class="row no-gutters">
          <div class="col-sm-12" style="margin-top:-15px;">
            <div class="popup_content" style="padding: 0px 0px ;">
              <div class="row mt-2" style="margin-right: 0px; 
								margin-left: 0px;">
                <div class="col-6 fdghddf">
                  <a href="javascript:void(0);" onclick="clearAllFilters()" class="btn df">CLEAR ALL</a>
                </div>
                <div class="col-6 fdghddf">
                  <a href="javascript:;" class="btn df" onclick="submitMOB()">APPLY</a>
                </div>
              </div>
              <form action="<?= base_url() ?>Home/apply_filter" id="applyFilteronMobile" method="get" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-4" style="border-right: 2px solid rgb(240, 238, 238); min-height: 100vh;">
                    <ul class="nav nav-tabs visitedcolor" role="tablist" style="display: block; border-bottom: 0px;">
                      <input type="hidden" value="<?= $url ?>" name="url" />
                      <div class="list-group" id="list-tab" role="tablist">
                        <a class="active" id="price-tab" data-toggle="tab" href="#price" role="tab" aria-controls="price" aria-selected="true">Price</a>
                        <a id="list-profile-list" id="size-tab" data-toggle="tab" href="#size" role="tab" aria-controls="size" aria-selected="false">Size</a>
                        <a id="color-tab" data-toggle="tab" href="#color" role="tab" aria-controls="color" aria-selected="false">Color</a>
                        <? foreach ($filter_main->result() as $filter) { ?>
                          <a id="tab<?= $filter->id ?>" data-toggle="tab" href="#tog<?= $filter->id ?>" role="tab" aria-controls="tog<?= $filter->id ?>" aria-selected="false"><?= $filter->name ?></a>
                        <? } ?>
                      </div>

                    </ul>
                  </div>
                  <div class="col-8">
                    <div class="tab-content shop_info_tab" style="margin-top:5px;">
                      <div class="tab-pane show active" id="price" role="tabpanel" aria-labelledby="price-tab">
                        <div class="row float-right mr-2 classk" style="margin-top:20px;">
                          <a class="btn btn-color dcxc small btn-filter  me-3  mb-20" href="javascript:void(0)" onclick="priceReset()"><i class="fa fa-close"></i><span class="hn">Reset</span></a>
                        </div>

                        <div class="filter_price hrtf   " style="    position: absolute;
													width: 100%;
													top: 96px;">
                          <div id="price_filter22" class="reset-price" data-min="0" data-max="5000" data-min-value="0" data-max-value="2000" data-price-sign="₹"></div>
                          <div class="price_range">
                            <span> <span id="flt_price22"></span></span>
                            <input type="hidden" id="price_first22" name="minprice" value="0">
                            <input type="hidden" id="price_second22" name="maxprice" value="2000">
                            <input type="hidden" id="sort_byWeb" name="sort_by" />
                          </div>
                        </div>
                      </div>

                      <div class="tab-pane fade" id="size" role="tabpanel" aria-labelledby="size-tab">
                        <div class="row float-right mr-2 classk" style="margin-top:20px;">
                          <a class="btn btn-color dcxc small btn-filter  me-3  mb-20" href="javascript:void(0)" onclick="clearSize()"><i class="fa fa-close"></i><span class="hn">Clear
                              all</span></a>

                          <a class="btn btn-color dcxc small btn-filter  me-3  mb-20" href="javascript:void(0)" onclick="selectSize()"><i class="fa-solid fa-check" style="    font-family: 'FontAwesome';"></i><span class="hn">
                              Select all</span></a>
                        </div>
                        <ul class="list_brand " style="text-align: left;max-height:87vh;overflow:auto; width: 100%;">
                          <? foreach ($filter_size as $size) {
                            $size_filter = $this->db->get_where('tbl_size', array('is_active' => 1, 'id' => $size))->result();
                            if (!empty($size_filter)) {
                          ?>
                              <li>
                                <div class="custome-checkbox">
                                  <input class="form-check-input sizeCheck" type="checkbox" name="size[]" id="size<?= $size_filter[0]->id ?>" value="<?= $size_filter[0]->id ?>">
                                  <label class="form-check-label" for="size<?= $size_filter[0]->id ?>"><span><?= $size_filter[0]->name ?></span></label>
                                </div>
                              </li>
                          <? }
                          } ?>
                        </ul>
                      </div>
                      <div class="tab-pane fade" id="color" role="tabpanel" aria-labelledby="color-tab">
                        <div class="row float-right mr-2 classk" style="margin-top:20px;">
                          <a class="btn btn-color dcxc small btn-filter  me-3  mb-20" href="javascript:void(0)"onclick="clearColor()"><i class="fa fa-close"></i><span class="hn">Clear
                              all</span></a>

                          <a class="btn btn-color dcxc small btn-filter  me-3  mb-20" href="javascript:void(0)" onclick="selectColor()"><i class="fa-solid fa-check" style="    font-family: 'FontAwesome';"></i><span class="hn">
                              Select all</span></a>
                        </div>
                        <ul class="list_brand mt-4" style="text-align: left;max-height:87vh;overflow:auto;">
                          <? foreach ($filter_color as $color) {
                            $olor_filter = $this->db->get_where('tbl_colour', array('is_active' => 1, 'id' => $color))->result();
                            if (!empty($olor_filter)) {
                          ?>

                              <li>
                                <div class="custome-checkbox">
                                  <input class="form-check-input colorCheck" type="checkbox" name="color[]" id="color<?= $olor_filter[0]->id ?>" value="<?= $olor_filter[0]->id ?>">
                                  <label class="form-check-label" for="color<?= $olor_filter[0]->id ?>"> <span data-color="<?= $olor_filter[0]->name ?>"></span>
                                    <?= $olor_filter[0]->colour_name ?></label>
                                </div>
                              </li>
                          <? }
                          } ?>


                        </ul>
                      </div>
                      <? foreach ($filter_main->result() as $filter) {
                        if ($t == 1) {
                          $column = 'category_id';
                        } else {
                          $column = 'subcategory_id';
                        }
                        $check = $this->db->get_where('tbl_product', array("(JSON_CONTAINS(all_filters,'[\"$filter->id\"]')) > " => 0, $column => $id))->result();
                        if (!empty($check)) {
                      ?>
                          <div class="tab-pane fade" id="tog<?= $filter->id ?>" role="tabpanel" aria-labelledby="<?= $filter->id ?>-tab">
                            <div class="row float-right mr-2 classk" style="margin-top:20px;">
                              <a class="btn btn-color dcxc small btn-filter  me-3  mb-20" href="javascript:void(0)" onclick="removeAttributes(<?= $filter->id ?>)"><i class="fa fa-close"></i><span class="hn">Clear
                                  all</span></a>

                              <a class="btn btn-color dcxc small btn-filter  me-3  mb-20" href="javascript:void(0)" onclick="selectAttribute(<?= $filter->id ?>)"><i class="fa-solid fa-check" style="    font-family: 'FontAwesome';"></i><span class="hn">
                                  Select all</span></a>
                            </div>
                            <ul class="list_brand product_color_switch mt-4" style="text-align: left;max-height:65vh;overflow:auto; width: 100%;">
                              <? $attributes = $this->db->get_where('tbl_attribute', array('filter_id = ' => $filter->id));
                              foreach ($attributes->result() as $attr) {
                                if ($t == 1) {
                                  $column = 'category_id';
                                } else {
                                  $column = 'subcategory_id';
                                }
                                $check2 = $this->db->get_where('tbl_product', array("(JSON_CONTAINS(all_attributes,'[\"$attr->id\"]')) > " => 0, $column => $id))->result();
                                if (!empty($check2)) {
                              ?>
                                  <li>
                                    <div class="custome-checkbox">
                                      <input class="form-check-input attribute<?= $filter->id ?>" type="checkbox" name="attribute[]" id="attr<?= $attr->id ?>" value="<?= $attr->id ?>">
                                      <label class="form-check-label" for="attr<?= $attr->id ?>"><span><?= $attr->name ?></span></label>
                                    </div>
                                <? }
                              } ?>
                            </ul>
                          </div>
                      <? }
                      } ?>
                    </div>
                  </div>
                </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END MAIN CONTENT -->
<script>
  function submitFilters() {
    document.getElementById("applyFilter").submit();
  }

  function submitMOB() {
    document.getElementById("applyFilteronMobile").submit();
  }

  function soryBy(sort) {
    if (sort == "ASC") {
      $('#sort_by').val('ASC')
      $('#sort_byWeb').val('ASC')
    } else {
      $('#sort_by').val('DESC')
      $('#sort_byWeb').val('DESC')
    }
    var width = screen.availWidth
    if (width > 446) {
      submitFilters()
    } else {
      submitMOB()
    }
  }

  function myFunction() {
    var x = document.getElementById("mySelect").value;
    soryBy(x)
  }

  function selectAllFilters() {
    $('.form-check-input').attr("checked", "true")
  }

  function clearAllFilters() {
    $('.form-check-input').prop("checked", false)
  }

  function selectAttribute(i) {
    $('.attribute' + i).prop("checked", true)
  }

  function removeAttributes(i) {
    $('.attribute' + i).prop("checked", false)
  }

  function LASTaTTR(i) {
    $('.attribute' + i).prop("checked", true)
  }

  function selectColor() {
    $('.colorCheck').prop("checked", true)
  }

  function clearColor() {
    $('.colorCheck').prop("checked", false)
  }

  function selectSize() {
    $('.sizeCheck').prop("checked", true)
  }

  function clearSize() {
    $('.sizeCheck').prop("checked", false)
  }

  function priceReset() {
    $('.reset-price').prop("data-min-value", "false")
    $('.reset-price').prop("data-max-value", "false")
  }
</script>