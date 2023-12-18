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

  .owl-dots {
    display: none;
  }

  .itme-responsiv {
    width: 70%;
  }

  @media (max-width:971px) {
    .itme-responsiv {
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

  @media (max-width: 980px) {
    .contant {
      margin-top: 111px !important;
    }
  }

  @media (max-width: 747px) {
    .contant {
      margin-top: 97px !important;
    }
  }
</style>



<div class="contant">
  <!-- ============================================== START SECTION BREADCRUMB =========================================== -->
  <div class="breadcrumb_section bg_gray page-title-mini pt-2">
    <div class="container">
      <!-- STRART CONTAINER -->
      <div class="row align-items-center">

        <div class="col-md-12">
          <ol class="breadcrumb justify-content-md-start">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
            <li class="breadcrumb-item active">Replace</li>
          </ol>
        </div>
      </div>
    </div><!-- END CONTAINER-->
  </div>
  <!--=============================================== END SECTION BREADCRUMB ==================================================-->

  <!-- =============================================== START MAIN CONTENT ======================================================-->
  <div class="main_content">
    <!-- ========================================== START SECTION SHOP ========================================================-->
    <div class="section" style="padding-top: 20px;">
      <div class="container-fluid">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-12 text-center">
              <img src="<?= base_url() . $type_data[0]->image ?>" alt="blog_small_img2" width="50%">
              <h5 class="mt-3"><?= $pro_data[0]->name ?></h5>
              <h5> Qty: &nbsp;<?= $order2_data[0]->quantity ?></h5>
            </div>
            <div class="col-md-8 col-12">
              <form method="post" action="<?= base_url() ?>Order/insert_return_request" enctype="multipart/form-data">
                <input type="hidden" name="order1_id" value="<?= $order2_data[0]->main_id ?>">
                <input type="hidden" name="order2_id" value="<?= $order2_data[0]->id ?>">
                <div class="form-group">
                  <input type="radio" id="return" name="type" value="1" checked>
                  <label for="return">Return</label>
                  <input type="radio" id="replace" name="type" value="2">
                  <label for="replace">Replace</label>
                </div>
                <div class="form-group">
                  <div class="custom_select">
                    <select class="form-control" name='quantity' required>
                      <option value="">Quantity...</option>
                      <?php for ($i = 1; $i <= $order2_data[0]->quantity; $i++) { ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="custom_select">
                    <select class="form-control" name="reason" required>
                      <option value="">Reason...</option>
                      <option value="Defective product received">Defective product received</option>
                      <option value="Wrong product received">Wrong product received </option>
                      <option value="Wrong size received">Wrong size received</option>
                      <option value="Other">Other</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-12" style="padding:0px;">
                  <textarea name="message" cols="70" rows="5" style="width:100%; border:1px solid #ced4da;padding:10px;" placeholder="Enter Your Reason"></textarea>
                </div> <br>
                <h5>Select Your Product Images</h5><br>
                <div class="row">
                  <div class="col-md-4 mt-2"><input type="file" name="image1"></div>
                  <div class="col-md-4 mt-2"> <input type="file" name="image2"></div>
                  <div class="col-md-4 mt-2"> <input type="file" name="image3"></div>
                </div>
                <div class="row">
                  <div class="col-md-4 mt-2"><input type="file" name="image4"></div>
                  <div class="col-md-4 mt-2"> <input type="file" name="image5"></div>
                  <div class="col-md-4 mt-2"> <input type="file" name="image6"></div>
                </div>
                <div class="row mt-5 justify-content-center">
                  <div class="col-md-4">
                    <button type="submit" class="btn btn-fill-out btn-block">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ========================================================== END SECTION SHOP =======================================================-->
  </div>
</div>
<!-- ========================================================== END MAIN CONTENT =======================================================-->