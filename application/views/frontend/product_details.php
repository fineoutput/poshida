<!-- Product detail contant start -->
<link rel="stylesheet" href="https://www.insightindia.com/mcss/icon-font.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css"> -->
<style>
  html {
    scroll-behavior: smooth;
  }

  .breadcrumb {
    background-color: transparent !important;
    display: unset;
    padding: 0;
    margin: 0;
    float: right;
  }
  .owl-dots{
    display: none;
  }
    .itme-responsiv{
      width: 70%;
    }
    @media (max-width:971px) {
      .itme-responsiv{
      width: 100%;
    }
    }
  .showContent {
    height: auto;
  }

  .hideContent {
    height: 30px;
    overflow: hidden;
  }

  .product-details-btn ul {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  h3.head-three {
    font-size: 16px;
  }

  .wsws:hover {
    color: #c68fa6 !important;
  }

  .rating_wrap.d-flex {
    margin-top: 18px;
  }

  .review_author {
    display: block;
    color: #292b2c;
    font-weight: 500;
  }


  .spanpadding span {
    width: 35px !important;
    height: 35px !important;
    line-height: 32px !important;
  }

  .product_size_switch span {
    cursor: pointer;
    text-transform: uppercase;
    width: 32px;
    display: inline-block;
    border: 2px solid #ddd;
    text-align: center;
    height: 32px;
    line-height: 28px;
    font-size: 14px;
    margin-bottom: 3px;
    border-radius: 21%;
  }

  .product_size_switch span.active {
    border-color: #c68fa6;
    background-color: #c68fa6;
    color: #fff;
  }

  .product_size_switch .spananim {
    pointer-events: none;
    opacity: 0.3;
    position: relative;
  }

  .product_size_switch .spananim:after {
    position: absolute;
    left: 0;
    top: 50%;
    height: 1px;
    background: rgb(80, 80, 80);
    content: "";
    width: 100%;
    display: block;
    transform: rotate(140deg);
  }


  .product_color_switch span,
  .product-details-btn ul li i {
    position: relative;
    display: inline-block;
    cursor: pointer;
  }

  .tooltip {
    visibility: hidden;
    background-color: #c68fa6;
    color: #fff;
    text-align: center;
    border-radius: 4px;
    padding: 6px;
    position: absolute;
    z-index: 1;
    bottom: 150%;
    left: 50%;
    transform: translateX(-50%);
    opacity: 0;
    transition: opacity 0.3s ease;
    width: 120px;
  }

  .product_color_switch span:hover,
  .product-details-btn ul li i:hover .tooltip {
    visibility: visible;
    opacity: 1;
  }

  .slick-slider .slick-prev,
  .slick-slider .slick-next {
    z-index: 100;
    font-size: 2.5em;
    height: 46px;
    width: 40px;
    margin-top: -20px;
    color: #B7B7B7;
    position: absolute;
    top: 50%;
    text-align: center;
    color: #000;
    opacity: .3;
    transition: opacity .25s;
    cursor: pointer;
  }

  .slick-slider .slick-prev:hover,
  .slick-slider .slick-next:hover {
    opacity: .65;
  }

  .slick-slider .slick-prev {
    left: 0;
  }

  .slick-slider .slick-next {
    right: 0;
  }

  #detail .product-images {
    width: 100%;
    margin: 0 auto;
    border: 1px solid #eee;
  }

  #detail .product-images li,
  #detail .product-images figure,
  #detail .product-images a,
  #detail .product-images img {
    display: block;
    outline: none;
    border: none;
  }

  #detail .product-images .main-img-slider figure {
    margin: 0 auto;
    padding: 0 2em;
  }

  #detail .product-images .main-img-slider figure a {
    cursor: pointer;
    cursor: -webkit-zoom-in;
    cursor: -moz-zoom-in;
    cursor: zoom-in;
  }

  #detail .product-images .main-img-slider figure a img {
    width: 100%;
    max-width: 400px;
    margin: 0 auto;
  }

  #detail .product-images .thumb-nav {
    margin: 0 auto;
    padding: 20px 10px;
    max-width: 600px;
  }

  #detail .product-images .thumb-nav.slick-slider .slick-prev,
  #detail .product-images .thumb-nav.slick-slider .slick-next {
    font-size: 1.2em;
    height: 20px;
    width: 26px;
    margin-top: -10px;
  }

  #detail .product-images .thumb-nav.slick-slider .slick-prev {
    margin-left: -30px;
  }

  #detail .product-images .thumb-nav.slick-slider .slick-next {
    margin-right: -30px;
  }

  #detail .product-images .thumb-nav li {
    display: block;
    margin: 0 auto;
    cursor: pointer;
  }

  #detail .product-images .thumb-nav li img {
    display: block;
    width: 100%;
    max-width: 75px;
    margin: 0 auto;
    border: 2px solid transparent;
    -webkit-transition: border-color .25s;
    -ms-transition: border-color .25s;
    -moz-transition: border-color .25s;
    transition: border-color .25s;
  }

  #detail .product-images .thumb-nav li:hover,
  #detail .product-images .thumb-nav li:focus {
    border-color: #999;
  }

  #detail .product-images .thumb-nav li.slick-current img {
    border-color: #d12f81;
  }


  .slick-slider .slick-prev,
  .slick-slider .slick-next {
    background: white;
    padding: 7px 0px;
  }
  @media (max-width: 980px){
.contant {
    margin-top: 111px !important;
}}

@media (max-width: 747px){
.contant {
    margin-top: 97px !important;
}}
</style>



<div class="contant">
  <!--========================= START SECTION BREADCRUMB ==============================-->

  <div id="banner-part" class="banner inner-banner">
    <div class="container">
      <div class="bread-crumb-main">
        <? $cat_name = $this->db->get_where('tbl_category', array('id = ' => $product_data[0]->category_id))->result();
        $subcat_name = $this->db->get_where('tbl_subcategory', array('id = ' => $product_data[0]->subcategory_id))->result(); ?>
        <div class="breadcrumb">
          <ul class="inline">
            <li><a href="<?= base_url() ?>">Home</a></li>
            <li><a href="<?= base_url() ?>products/<?= $cat_name[0]->url ?>/1"><?= $cat_name[0]->name ?></a></li>
            <li><a href="<?= base_url() ?>products/<?= $subcat_name[0]->url ?>/1"><?= $subcat_name[0]->name ?></a></li>
            <!-- <li><?= $product_data[0]->name ?></li> -->
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!--========================= END SECTION BREADCRUMB ==============================-->

  <div class="ptb-100 product-irme-m">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 col-md-6 col-12">
          <?php $type_mrp = 0;
          $type_spgst = 0;
          $type_datas = $this->db->get_where('tbl_type', array('product_id = ' => $product_data[0]->id, 'is_active = ' => 1, 'color_active' => 1, 'size_active' => 1));
          $type_data = $this->db->get_where('tbl_type', array('id = ' => $type_id))->result();
          if ($product_data[0]->product_view == 3) {
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
          } elseif ($product_data[0]->product_view == 2) {
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
          } ?>

          <div class="sk"></div>
          <div class="sj"></div>
          <div class="align-center mb-md-30">
            <!-- <ul id="glasscase" class="gc-start">
              <li><img src="<?= base_url() . $type_data[0]->image ?>" alt=" "></li>
              <? if (!empty($type_data[0]->image2)) { ?><li><img src="<?= base_url() .  $type_data[0]->image2 ?>" alt=" "></li> <? }
                                                                                                                              if (!empty($type_data[0]->image3)) { ?>
                <li><img src="<?= base_url() .  $type_data[0]->image3 ?>" alt=" "></li> <? }
                                                                                                                              if (!empty($type_data[0]->image4)) { ?>
                <li><img src="<?= base_url() .  $type_data[0]->image4 ?>" alt=" "></li> <? }
                                                                                                                              if (!empty($type_data[0]->image5)) { ?>
                <li><img src="<?= base_url() . $type_data[0]->image5 ?>" alt=" "></li> <? }
                                                                                                                              if (!empty($type_data[0]->image6)) { ?>
                <li><img src="<?= base_url() .  $type_data[0]->image6 ?>" alt=" "></li> <? }
                                                                                                                              if (!empty($type_data[0]->video)) { ?>
                <li><img src="<?= base_url() .  $type_data[0]->video ?>"></li> <? }
                                                                                ?>
            </ul> -->


            <section id="detail">
              <div class="container">
                <div class="row">
                  <div class="col-md-12 mx-auto">

                    <div class="product-images demo-gallery">
                      <div class="main-img-slider">

                        <a data-fancybox="gallery" href="<?= base_url() . $type_data[0]->image ?>"> <img src="<?= base_url() . $type_data[0]->image ?>" class="img-fluid"></a>
                        <? if (!empty($type_data[0]->image2)) { ?>
                          <a data-fancybox="gallery" href="<?= base_url() . $type_data[0]->image2 ?>"> <img src="<?= base_url() . $type_data[0]->image2 ?>" class="img-fluid"></a>
                        <? }
                        if (!empty($type_data[0]->image3)) { ?>
                          <a data-fancybox="gallery" href="<?= base_url() . $type_data[0]->image3 ?>"> <img src="<?= base_url() . $type_data[0]->image3 ?>" class="img-fluid "></a>
                        <? }
                        if (!empty($type_data[0]->image4)) { ?>
                          <a data-fancybox="gallery" href="<?= base_url() . $type_data[0]->image4 ?>"> <img src="<?= base_url() . $type_data[0]->image4 ?>" class="img-fluid"></a>
                        <? }
                        if (!empty($type_data[0]->image5)) { ?>
                          <a data-fancybox="gallery" href="<?= base_url() . $type_data[0]->image5 ?>"> <img src="<?= base_url() . $type_data[0]->image5 ?>" class="img-fluid"></a>
                        <? }
                        if (!empty($type_data[0]->image6)) { ?>
                          <a data-fancybox="gallery" href="<?= base_url() . $type_data[0]->image6 ?>"> <img src="<?= base_url() . $type_data[0]->image6 ?>" class="img-fluid "></a>
                        <? }
                        if (!empty($type_data[0]->video)) { ?>
                          <a data-fancybox="gallery" href="<?= base_url() . $type_data[0]->video ?>"> <video>
                              <source type="video/mp4" autoplay controls src="<?= base_url() . $type_data[0]->video ?>" class="img-fluid gc-zoom">
                            </video> </a>

                        <? } ?>
                      </div>



                      <ul class="thumb-nav">
                        <li><img src="<?= base_url() . $type_data[0]->image ?>" alt=" "></li>
                        <? if (!empty($type_data[0]->image2)) { ?><li><img src="<?= base_url() .  $type_data[0]->image2 ?>" alt=" "></li> <? }
                                                                                                                                        if (!empty($type_data[0]->image3)) { ?>
                          <li><img src="<?= base_url() .  $type_data[0]->image3 ?>" alt=" "></li> <? }
                                                                                                                                        if (!empty($type_data[0]->image4)) { ?>
                          <li><img src="<?= base_url() .  $type_data[0]->image4 ?>" alt=" "></li> <? }
                                                                                                                                        if (!empty($type_data[0]->image5)) { ?>
                          <li><img src="<?= base_url() . $type_data[0]->image5 ?>" alt=" "></li> <? }
                                                                                                                                        if (!empty($type_data[0]->image6)) { ?>
                          <li><img src="<?= base_url() .  $type_data[0]->image6 ?>" alt=" "></li> <? }
                                                                                                                                        if (!empty($type_data[0]->video)) { ?>
                          <li><img src="<?= base_url() ?>assets/frontend/img/play.jpg"></li> <? }
                                                                                              ?>

                      </ul>
                    </div>


                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
        <div class="col-lg-7 col-md-6 col-12">
          <div class="product-detail-main">
            <div class="product-item-details">
              <h1 class="product-item-name"><?= $product_data[0]->name ?></h1>
              <div class="price-box"> <span class="price">₹<?= $type_spgst ?></span>
                <? if ($type_mrp > $type_spgst) { ?><del class="price old-price">₹<?= $type_mrp ?></del>
                <? } ?>
              </div>
              <div class="rating-main">
                <? $review_count = 0;
                $totalStars = 0;
                foreach ($product_reviews->result() as $count) {
                  $review_count++;
                  $totalStars = $count->star_rating + $totalStars;
                }
                if ($review_count == 0) {
                  $review_countdiv = 1;
                } else {
                  $review_countdiv = $review_count;
                }
                $rating = ($totalStars / $review_countdiv) * 100;
                ?>
                <a href="javascript:void(0)" onclick="scrollMe()">
                  <div class="rating-summary-block">
                    <div title="<?= $rating ?>%" class="rating-result"> <span style="width:<?= $rating ?>%"></span>
                    </div>
                  </div>
                </a>
                <span><? echo "(" . $review_count . ")";
                      ?></span>
              </div>
              <!-- <div class="product-des" style="text-align: justify;">
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco aboris nisi ut
                  aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                  oluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
              </div> -->

              <hr class="mb-20">
              <div class="row">

                <div class="col-12">
                  <div class="table-listing product-size select-arrow mb-20">
                    <div class="row">
                      <div class="col-12" style="display: flex; justify-content: end;">
                        <div>
                          <h5 style="    color: #ba1b53;
															cursor: pointer;" data-toggle="modal" data-target="#exampleModalCenter" class="dfkghk"> <b>Size Chart </b></h5>
                        </div>
                      </div>
                      <!-- ========= START SIZE ============= -->
                      <div class="col-xl-2 col-md-2 col-2">
                        <span>Size:</span>
                      </div>
                      <div class="col-xl-10 col-md-10 col-10">
                        <div style="display: flex; align-items: center ; justify-content: space-between;" class="vlome">
                          <div class="product_size_switch spanpadding d-flex" id="size_div" style="flex-wrap: wrap;">
                            <?
                            foreach ($size_arr as $size) {
                            ?>
                              <div>
                                <div class="m-2 " style="margin-bottom: 0px !important;">
                                  <a href="<?= base_url() ?>product_detail/<?= $product_data[0]->url ?>?type=<?= base64_encode($size['type_id']) ?>"><span class="<? if ($size['id'] == $type_data[0]->size_id) { ?> active<? } ?> <? if ($size['stock'] == 0) { ?> spananim <? } ?>"><?= $size['size_name']; ?></span></a>
                                </div>
                                <div class="text-center" style="font-size: 11px ;">
                                  <? if ($size['id'] == $type_data[0]->size_id && $type_data[0]->inventory < 15) {
                                    echo "Left:" . $type_data[0]->inventory;
                                  } ?>
                                </div>
                              </div>
                            <? } ?>
                          </div>
                        </div>
                      </div>
                      <!-- ========= END SIZE ============= -->
                    </div>
                  </div>
                </div>
                <!-- ========= END SIZE CHART MODEL ============= -->
                <div class="col-12 mb-2">
                  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <div>
                            <img src="<?= base_url() . $product_data[0]->image1 ?>" alt="">
                          </div>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- ========= END SIZE CHART MODEL============= -->

                <!-- ========= START COLORS============= -->
                <div class="col-12">
                  <div class="table-listing qty mb-20">
                    <div class="row">
                      <div class="col-xl-2 col-md-3 col-3">
                        <span>Color:</span>
                      </div>
                      <div class="col-xl-10 col-md-9 col-9">
                        <div class="product_color_switch ">
                          <? foreach ($color_arr as $type) {
                            $color = $this->db->get_where('tbl_colour', array('id = ' => $type->colour_id, 'is_active = ' => 1))->result();
                          ?>
                            <span <? if ($type_data[0]->colour_id == $type->colour_id) { ?> class="active" <? } ?> data-color="<?= $color[0]->name ?>" color_id="<?= $color[0]->id ?>" product_id="<?= $product_data[0]->id ?>" onclick="location.href='<?= base_url() ?>product_detail/<?= $product_data[0]->url ?>?type=<?= base64_encode($type->id) ?>'">
                              <div class="tooltip"><?= $color[0]->name ?></div>
                            </span>
                          <? } ?>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- ========= END COLORS============= -->
                <? if ($this->session->userdata('user_type') == 2) {
                  $minQty = (int)$type_data[0]->reseller_min_qty;
                } else {
                  $minQty = 1;
                } ?>
                <!-- ========= START QUANTITY ============= -->

                <div class="col-12">
                  <div class="table-listing qty mb-20">
                    <div class="row">
                      <div class="col-xl-2 col-md-3 col-3">
                        <span>Qty:</span>
                      </div>
                      <div class="col-xl-10 col-md-9 col-9">
                        <div class="custom-qty">
                          <button type="button" value="-" change=0 id="myminus" class="reduced items paa-ews minus"> <i class="fa fa-minus "></i> </button>
                          <input type="text" readonly onkeypress="return isNumberKey(event)" min-qty="<?= $minQty ?>" name="quantity" product_id='' value="<?= $minQty ?>" title="Qty" id="quantity" size="4" class="input-text qty voain-re">
                          <button type="button" value="+" change=0 id="" class="increase items paa-ews plus" type="button"> <i class="fa fa-plus "></i> </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- ========= END QUANTITY ============= -->
              </div>

              <hr class="mb-20">


              <div class="product-details-btn stickyAdClass" id="addCartFav">
                <ul style="    display: flex;
                  justify-content: start;" id="btn-center">
                  <li class="icon cart-icon " style="    background: #c68fa6;
    border-radius: 6px;     text-align: center;">
                    <button class="btn btn-color fhf" product_id="<?= base64_encode($product_data[0]->id) ?>" type_id="<?= base64_encode($type_data[0]->id) ?>" quantity="<?= $minQty ?>" id="addtoCartButton" onclick="addToCart(this)" type="button"><span></span>Add to cart <span></span> </button>
                  </li>
                  <? if (!empty($this->session->userdata('user_data'))) {
                    $user_id = $this->session->userdata('user_id');
                    $wihslist = $this->db->get_where('tbl_wishlist', array('user_id' => $user_id, 'product_id' => $product_data[0]->id, 'type_id' => $type_data[0]->id))->result();
                    if (!empty($wihslist)) {
                  ?>
                      <li class="icon cart-icon wishlist-heart">
                        <a href="javascript:void(0)" product_id="<?= base64_encode($product_data[0]->id) ?>" type_id="<?= base64_encode($type_data[0]->id) ?>" status="remove" onclick="wishlist(this)" class="btn btn-color sice"> <i class="fa fa-hart wsws" style="font-size: 23px; color: #fff; "></i>Remove Wishlist</a>
                      </li>
                      <li class="icon fav-icon-heart ">
                        <a href="javascript:void(0)" product_id="<?= base64_encode($product_data[0]->id) ?>" type_id="<?= base64_encode($type_data[0]->id) ?>" status="remove" onclick="wishlist(this)"><i class="fa fa-hert wsws" style="font-size: 23px; margin-left: 24px; color: #c68fa6; ">
                            <div class="tooltip">Remove to wishlist</div>
                          </i>
                        </a>
                      </li>
                    <? } else { ?>
                      <li class="icon cart-icon wishlist-heart">
                        <a href="javascript:void(0)" product_id="<?= base64_encode($product_data[0]->id) ?>" type_id="<?= base64_encode($type_data[0]->id) ?>" status="add" onclick="wishlist(this)" class="btn btn-color sice"> <i class="fa fa-hart wsws" style="font-size: 23px; color: #fff; "></i>Add Wishlist</a>
                      </li>
                      <li class="icon fav-icon-heart ">
                        <a href="javascript:void(0)" product_id="<?= base64_encode($product_data[0]->id) ?>" type_id="<?= base64_encode($type_data[0]->id) ?>" status="add" onclick="wishlist(this)"><i class="fa fa-heart-o wsws" style="font-size: 23px; margin-left: 24px; color: #686868;; ">
                            <div class="tooltip">Add to wishlist</div>
                          </i></a>
                      </li>
                    <? } ?>
                  <? } else { ?>
                    <!-- //-----LOGIN ----- -->
                    <li class="icon cart-icon wishlist-heart">
                      <a href="javascript:void(0)" data-toggle="modal" data-target="#LoginModel" class="btn btn-color sice"> <i class="fa fa wsws" style="font-size: 23px; color: #fff; "></i>Add to wishlist</a>
                    </li>
                    <li class="icon fav-icon-heart ">
                      <a href="javascript:void(0)" data-toggle="modal" data-target="#LoginModel"><i class="fa fa-he=art-o wsws" style="font-size: 23px; margin-left: 24px; color: #686868;; ">
                          <div class="tooltip">Add to wishlist</div>
                        </i>
                      </a>
                    </li>
                  <? } ?>
                </ul>
              </div>




              <? if (!empty($product_data[0]->short_description)) { ?>
                <div>
                  <h5>About </h5>
                  <div class="content hideContent">
                    <p class="text-justify "><?= $product_data[0]->short_description ?></p>
                  </div>
                  <div class="show-more">
                    <a href="javascript:void(0);" style="color:#c68fa6">Show more</a>
                  </div>


                  <ul class="product-list mt-20">
                    <li><i class="fa fa-check"> </i> Cash On Delivery Available</li>
                    <li><i class="fa fa-truck"></i> Free shipping on orders over ₹<?= FREESHIPPING ?></li>
                    <li><i class="fa fa-repeat"></i> Return And Exchange</li>
                  </ul>
                </div>
              <? } ?>
              <div class="carousel_slider owl-carousel owl-theme" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "1"}, "768":{"items": "1"}, "992":{"items": "1"}, "1199":{"items": "1"}}' data-autoplay="true" data-loop="true">
                <? $promocode_data = $this->db->get_where('tbl_promocode', array('is_active = ' => 1));
                foreach ($promocode_data->result() as $promocode) { ?>
                  <div class="item table-bordered itme-responsiv" >
                    <div class="product">
                      <div class="product_img pt-2 pb-2">
                        <div class="ml-3 d-flex"> <img src="<?= base_url() ?>assets\frontend\img\discount.png" alt="" style="max-width: 100%!important;height: auto!important;width:auto"><span class="mt-1 ml-2"> Offers For You </span> </div>
                        <div class="row">
                          <div class="col-md-12 ml-3">
                            <p class="mb-0">COUPON: <b><?= $promocode->promocode; ?></b> </p>
                          </div>
                          <div class="col-md-12 ml-3" style=""><span>Congratulation! You are eligible for <? if ($promocode->type == 1) {
                                                                                                                              echo $promocode->percentage_amount . "%";
                                                                                                                            } else {
                                                                                                                              echo $symbol . round($promocode->percentage_amount * $multiplier, 2);
                                                                                                                            } ?> extra discount</span></div>
                        </div>
                      </div>
                    </div>
                  </div>
                <? } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- ========= START DESCRIPTION ============= -->
  <section class="product-tab-part position-r pb-100" style="padding-bottom: 20px;">
    <div class="container">
      <div class="product-tab-inner">
        <div class="row">
          <div class="col-12">
            <div id="tabs">
              <ul class="nav nav-tabs">
                <li><a class="tab-Description selected" style="padding: 10px 0px;" title="Description">Product Details</a></li>
              </ul>
            </div>
            <div id="items">
              <div class="tab_content">
                <ul>
                  <li>
                    <div class="items-Description selected" style=" text-align: justify;">
                      <table class="table table-bordered">
                        <? $description = explode(',', $product_data[0]->description); ?>
                        <tr>
                          <? $i = 1;
                          foreach ($description as $desc) { ?>
                            <td><?= $desc ?></td>
                            <? if ($i % 2 == 0) { ?>
                        </tr>
                        <tr>
                        <? } ?>
                      <? $i++;
                          } ?>
                        </tr>
                      </table>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ========= END DESCRIPTION ============= -->

  <section class="product-tab-part position-r pb-100 renpos-icon-desigin">
    <div class="container">
      <div class="product-tab-inner">
        <div class="row">
          <div class="col-12">
            <!-- ========= START LIST REVIEW ============= -->
            <? if (!empty($product_reviews->row())) { ?>
              <div id="tabs">

                <ul class="nav nav-tabs" style="display: flex; justify-content: space-between;">
                  <a class="tab-Description selected" style="padding: 10px 0px; color: #c68fa6;       font-weight: bold;" title="Description">Review</a>
                  <a href="Review.html" class="tab-Description selected" title="Description" style="color: #c68fa6;  font-weight: bold; "> View All</a>
                </ul>
              </div>
              <? foreach ($product_reviews->result() as $reviews) { ?>
                <div class="comment_block" style="border-bottom:  1px solid rgb(215, 214, 214);">
                  <div class="rating_wrap d-flex" style="justify-content: space-between; ">
                    <div>
                      <p class="customer_meta">
                        <span class="review_author"><?= $reviews->name ?></span> <br>
                        <span class="comment-date"> <i><? $newdate = new DateTime($reviews->date);
                                                        echo $newdate->format('F j, Y'); ?></i> </span>
                      </p>
                    </div>
                    <div>
                      <div class="star_rating">
                        <? for ($r = 1; $r <= $reviews->star_rating; $r++) { ?>
                          <i class="fa fa-star" style="color: #f68a03;;"></i>
                        <? } ?>
                      </div>
                    </div>
                  </div>

                  <div class="description" style=" text-align: justify;">
                    <p> <?= $reviews->review ?></p>
                  </div>
                </div>
            <? }
            } ?>
            <!-- ========= END LIST REVIEW ============= -->

            <!-- ========= START ADD REVIEW ============= -->

            <div class="items-Description selected" id="scrollHere">
              <form class="row mt-3" method="POST" action="<?= base_url() ?>Home/product_review" enctype="multipart/form-data">
                <div class="leave-comment-part " style="padding-top: 20px;">
                  <h3 class="head-three">Leave A Comment</h3>
                  <div class="comment-part">
                    <div class="course-overview-card pt-4">
                      <div class="leave-rating-wrap pb-4">
                        <div class="leave-rating leave--rating">
                          <input type="radio" name="star_rating" value="5" id="star5">
                          <label for="star5"></label>
                          <input type="radio" name="star_rating" value="4" id="star4" data-gtm-form-interact-field-id="0">
                          <label for="star4"></label>
                          <input type="radio" name="star_rating" value="3" id="star3">
                          <label for="star3"></label>
                          <input type="radio" name="star_rating" value="2" id="star2">
                          <label for="star2"></label>
                          <input type="radio" name="star_rating" value="1" id="star1">
                          <label for="star1"></label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="main-form">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group mb-30">
                          <input type="text" placeholder="Name" name="name" required="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group mb-30">
                          <input name="email" type="email" placeholder="Email" required="">
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group mb-30">
                          <textarea rows="5" required="" placeholder="Your review *" name="message"></textarea>
                        </div>
                      </div>
                      <div class="col-12">
                        <button type="submit" class="btn-color">Post
                          Comment</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <!-- ========= END ADD REVIEW ============= -->

          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- ========= START BUY WITH US ============= -->
  <? if (!empty($buy_with_it)) { ?>
    <section class="product-section pb-100">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="heading-part text-center mb-30 mb-sm-20">
              <h2 class="main_title">Buy With Us</h2>
            </div>
          </div>
        </div>
        <div class="position-r">
          <div class="row">
            <div class="product-slider owl-carousel position-initial">
              <? foreach ($buy_with_it as $buy_with) {
                $type_mrp = 0;
                $type_spgst = 0;
                $type_datas = $this->db->get_where('tbl_type', array('product_id = ' => $buy_with->id, 'is_active' => 1));
                $type_data = $type_datas->result();
                if (!empty($type_data)) {
                  if ($buy_with->product_view == 3) {
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
                  } elseif ($buy_with->product_view == 2) {
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

                  <div class="item">
                    <div class="product-item">
                      <div class="product-image">
                        <? if ($buy_with->exclusive == 1) { ?> <div class="sale-label"><span>Sale</span></div> <? } ?>
                        <a href="<?= base_url() ?>product_detail/<?= $buy_with->url ?>?type=<?= base64_encode($type_data[0]->id) ?>">
                          <img src="<?= base_url() . $type_data[0]->image ?>" alt=" ">
                        </a>
                      </div>
                      <div class="product-details-outer">
                        <div class="product-details">
                          <div class="product-title">
                            <a href="<?= base_url() ?>product_detail/<?= $buy_with->url ?>?type=<?= base64_encode($type_data[0]->id) ?>"><?= $buy_with->name ?></a>
                          </div>
                          <div class="price-box">
                            <span class="price">₹<?= $type_spgst ?></span>
                            <? if ($type_mrp > $type_spgst) { ?><del class="price old-price">₹<?= $type_mrp ?></del> <? } ?>
                            <? if ($percent > 0) { ?><span class="on-sic"> <?= round($percent) ?>% off </span> <? } ?>

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
                                    array_push($size_arr, $size_data->id);
                            ?>
                                    <li class="icon  cart-icon">
                                      <a href="<?= base_url() ?>product_detail/<?= $buy_with->url ?>?type=<?= base64_encode($type_size->id) ?>"><?= $size_data->name ?><p style="margin-bottom:0; padding: 0px 10px;">|</p></a>
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
                                  <a href="<?= base_url() ?>product_detail/<?= $buy_with->url ?>?type=<?= base64_encode($type_data[0]->id) ?>"> +<?= $more ?></a>
                                </li>
                            <? }
                            } ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
              <?php }
              }  ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  <? } ?>
  <!-- ========= END BUY WITH US ============= -->
  <div class="container banner">
    <div class="row">
      <div class="col-12 mb-3 mt-2 d-flex justify-content-center">
        <img src="<?= base_url() ?>assets/frontend/img/add.gif" alt="" class="img-fluid">
      </div>
    </div>
  </div>

  <!-- ========= START RELATED PRODUCTS ============= -->
  <? if (!empty($related_data->row())) { ?>
    <section class="product-section pb-100">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="heading-part text-center mb-30 mb-sm-20">
              <h2 class="main_title">Related Product</h2>
            </div>
          </div>
        </div>
        <div class="position-r">
          <div class="row">
            <div class="product-slider owl-carousel position-initial">
              <? foreach ($related_data->result() as $buy_with) {
                $type_mrp = 0;
                $type_spgst = 0;
                $type_datas = $this->db->get_where('tbl_type', array('product_id = ' => $buy_with->id, 'is_active' => 1));
                $type_data = $type_datas->result();
                if (!empty($type_data)) {
                  if ($buy_with->product_view == 3) {
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
                  } elseif ($buy_with->product_view == 2) {
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

                  <div class="item">
                    <div class="product-item">
                      <div class="product-image">
                        <? if ($buy_with->exclusive == 1) { ?> <div class="sale-label"><span>Sale</span></div> <? } ?>
                        <a href="<?= base_url() ?>product_detail/<?= $buy_with->url ?>?type=<?= base64_encode($type_data[0]->id) ?>">
                          <img src="<?= base_url() . $type_data[0]->image ?>" alt=" ">
                        </a>
                      </div>
                      <div class="product-details-outer">
                        <div class="product-details">
                          <div class="product-title">
                            <a href="<?= base_url() ?>product_detail/<?= $buy_with->url ?>?type=<?= base64_encode($type_data[0]->id) ?>"><?= $buy_with->name ?></a>
                          </div>
                          <div class="price-box">
                            <span class="price">₹<?= $type_spgst ?></span>
                            <? if ($type_mrp > $type_spgst) { ?><del class="price old-price">₹<?= $type_mrp ?></del> <? } ?>
                            <? if ($percent > 0) { ?><span class="on-sic"> <?= round($percent) ?>% off </span> <? } ?>

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
                                    array_push($size_arr, $size_data->id);
                            ?>
                                    <li class="icon  cart-icon">
                                      <a href="<?= base_url() ?>product_detail/<?= $buy_with->url ?>?type=<?= base64_encode($type_size->id) ?>"><?= $size_data->name ?><p style="margin-bottom:0; padding: 0px 10px;">|</p></a>
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
                                  <a href="<?= base_url() ?>product_detail/<?= $buy_with->url ?>?type=<?= base64_encode($type_data[0]->id) ?>"> +<?= $more ?></a>
                                </li>
                            <? }
                            } ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
              <?php }
              }  ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  <? } ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.1/jquery-migrate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>
  <script>
    function scrollMe() {
      $('html,body').animate({
          scrollTop: $("#scrollHere").offset().top - 100
        },
        'slow');
    };
  </script>
  <script>
    /*--------------*/



    // Main/Product image slider for product page
    $('#detail .main-img-slider').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      infinite: true,
      arrows: true,
      fade: true,
      autoplay: true,
      autoplaySpeed: 4000,
      speed: 300,
      lazyLoad: 'ondemand',
      asNavFor: '.thumb-nav',
      prevArrow: '<div class="slick-prev"><i class="i-prev"></i><span class="sr-only sr-only-focusable">Previous</span></div>',
      nextArrow: '<div class="slick-next"><i class="i-next"></i><span class="sr-only sr-only-focusable">Next</span></div>'
    });
    // Thumbnail/alternates slider for product page
    $('.thumb-nav').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      infinite: true,
      centerPadding: '0px',
      asNavFor: '.main-img-slider',
      dots: false,
      centerMode: false,
      draggable: true,
      speed: 200,
      focusOnSelect: true,
      prevArrow: '<div class="slick-prev"><i class="i-prev"></i><span class="sr-only sr-only-focusable">Previous</span></div>',
      nextArrow: '<div class="slick-next"><i class="i-next"></i><span class="sr-only sr-only-focusable">Next</span></div>'
    });


    //keeps thumbnails active when changing main image, via mouse/touch drag/swipe
    $('.main-img-slider').on('afterChange', function(event, slick, currentSlide, nextSlide) {
      //remove all active class
      $('.thumb-nav .slick-slide').removeClass('slick-current');
      //set active class for current slide
      $('.thumb-nav .slick-slide:not(.slick-cloned)').eq(currentSlide).addClass('slick-current');
    });
  </script>


  <script>
    $(".show-more a").on("click", function() {
      var $this = $(this);
      var $content = $this.parent().prev("div.content");
      var linkText = $this.text().toUpperCase();

      if (linkText === "SHOW MORE") {
        linkText = "Show less";
        $content.switchClass("hideContent", "showContent", 400);
      } else {
        linkText = "Show more";
        $content.switchClass("showContent", "hideContent", 400);
      };

      $this.text(linkText);
    });
  </script>

  <!-- ========= START RELATED PRODUCTS ============= -->