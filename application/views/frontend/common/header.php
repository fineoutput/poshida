<!DOCTYPE html>

<html lang="en">
<!-- //================ START HEAD ============================= -->

<head>
  <!-- Basic Page Needs -->
  <meta charset="utf-8">
  <title>Poshida</title>

  <!-- Mobile Specific Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link type="image/x-icon" href="<?= base_url() ?>assets/frontend/img/Poshida Logo (2)_page-0001.jpg" rel="icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/css/xpoge.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/frontend/css/responsive.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/frontend/css/animate.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">



</head>
<!-- //================ END HEAD ============================= -->

<style>
  .product-details-btn ul {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .witbgt {
    width: 100% !important;
  }


  .owl-carousel .owl-nav button.owl-prev {
    left: 35px;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
    -o-transform: translate(-50%, -50%);
  }

  .owl-carousel .owl-nav button.owl-next {
    right: 33px;
    transform: translate(50%, -50%);
    -ms-transform: translate(50%, -50%);
    -webkit-transform: translate(50%, -50%);
    -o-transform: translate(50%, -50%);
  }


  .cart_count,
  .wishlist_count {
    position: relative;
    top: -8px;
    left: 0;
    font-size: 11px;
    background-color: #c68fa6;
    border-radius: 50px;
    height: 16px;
    line-height: 16px;
    color: #fff;
    min-width: 16px;
    text-align: center;
    padding: 0 5px;
    display: inline-block;
    vertical-align: top;
    margin-left: -5px;
    margin-right: -5px;
  }

  .d-scs {
    display: none !important;
  }

  .icon {
    margin-bottom: 15px;
  }

  @media (min-width:991px) {
    .mobilebottom {
      display: none;
    }

    .banner {
      margin-top: 90px;
    }
  }

  @media only screen and (max-width: 991px) {

    .cart_count,
    .wishlist_count {
      top: -8;
    }

    .heig {
      display: none !important;
    }


  }

  @media only screen and (max-width: 767px) {
    .d-scs {
      display: block !important;
    }
  }

  @media only screen and (max-width: 758px) {
    .banner {
      margin-top: 2px !important;
    }
  }


  @media only screen and (max-width: 480px) {
    h6 {
      font-size: 11px;
      margin-top: 5px;
    }
  }

  @media only screen and (max-width: 425px) {
    .product-sliders.owl-carousel.position-initial.d-scs.owl-loaded.owl-drag {
      margin-top: 102px !important;
    }
  }

  @media only screen and (max-width: 375px) {
    .product-sliders.owl-carousel.position-initial.d-scs.owl-loaded.owl-drag {
      margin-top: 93px !important;
    }
  }

  @media only screen and (max-width: 320px) {
    .product-sliders.owl-carousel.position-initial.d-scs.owl-loaded.owl-drag {
      margin-top: 84px !important;
    }
  }
</style>
<!-- //================ START BODY ============================= -->
<? $headerMiniCart = [];
$this->load->library('custom/Cart');
if (!empty($this->session->userdata('user_data'))) {
  $headerMiniCart = $this->cart->ViewCartOnline();
} else {
  $headerMiniCart = $this->cart->ViewCartOffline();
}
?>

<body>
  <!-- Start preloader -->
  <div id="preloader"></div>

  <div class="main">
    <!-- //================ START HEADER ============================= -->

    <header id="header " style="    padding-bottom: 10px !important; ">
      <div class="container position-r header-class  pb-3">
        <div class="row m-0">
          <div class="col-lg-4 col-md-3 col-3 p-0 " style="display: flex;
						align-items: center;">
            <div class="newsletter-input-1 newsletter-input mob  " style="width: 70%;">
              <form action="<?= base_url() ?>Home/search" method="GET" enctype="multipart/form-data">
                <div class="form-group m-0">
                  <input type="search" placeholder="Search Products... " name="search" required="">
                </div>
                <button type="submit" class="btn  btn--1"> <i class="bi bi-search" style="color: #c68fa6;"></i></button>
              </form>
            </div>

            <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle d-block d-lg-none d-xl-none" type="button"><i class="fa fa-bars"></i>
            </button>
          </div>
          <div class="col-lg-4 col-md-6 col-6 p-0 position-initial icon-bar-center">
            <div class="right-side">
              <div class="navbar-header">
                <a class="navbar-brand page-scroll" href="<?= base_url() ?>">
                  <img alt="xpoge" src="<?= base_url() ?>assets/frontend/img/Poshida Logo (2)_page-0001.jpg" class="logo-imah-1">
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-3 col-3 p-0 icon-bar" style="display: flex;
						align-items: center;">
            <div class="header-right-link">
              <ul>
                <li class="search-box  search_box " onclick="hello()">
                  <a href="#"><span></span></a>
                </li>
                <li class="account-icon heig show-icon" style="position: inherit;">
                  <a href="#"><span></span></a>
                  <div class="header-link-dropdown account-link-dropdown">
                    <ul class="link-dropdown-list">
                      <!-- <li> <span class="dropdown-title">Default welcome msg!</span> -->
                      <ul class="hrb">
                        <? if (empty($this->session->userdata('user_data'))) { ?>
                          <li><a href="#" class="p-1" data-toggle="modal" data-target="#exampleModalCenter">Log In </a></li>
                          <li><a href="#" class="p-1" data-toggle="modal" data-target="#exampleModalCenter2"> Register </a></li>
                        <? } else { ?>
                          <li><a href="<?= base_url() ?>Home/my_profile" class="p-1">My Account </a></li>
                          <li><a href="<?= base_url() ?>Home/my_profile/order" class="p-1">My Orders </a></li>
                          <li><a href="<?= base_url() ?>User/logout" class="p-1">Log Out </a></li>
                        <? } ?>
                      </ul>
                </li>
              </ul>
            </div>
            </li>
            <?
            $cartCount = 0;
            $wishCount = 0;
            if (!empty($this->session->userdata('user_data'))) {
              $cartCount = $this->db->get_where('tbl_cart', array('user_id = ' => $this->session->userdata('user_id'), 'user_type' => $this->session->userdata('user_type')))->num_rows();
            } else {
              if (!empty($this->session->userdata('cart_data'))) {
                $cartCount = count($this->session->userdata('cart_data'));
              }
            }
            ?>

            <li class="cart-icon heig show-icon ">
              <? if (!empty($this->session->userdata('user_data'))) { ?>
                <a href="#"> <span> <small class="cart-notification"><?= $cartCount ?></small> </span> </a>
              <? } else { ?>
                <a href="#"> <span> <small class="cart-notification"><?= $cartCount ?></small> </span> </a>
              <? } ?>
              <div class="cart-dropdown header-link-dropdown">
                <ul class="cart-list link-dropdown-list">
                  <? if (!empty($headerMiniCart['cart_data'])) { ?>
                    <ul class="cart_list">
                      <? foreach ($headerMiniCart['cart_data'] as $miniCart) { ?>
                        <li> <a class="close-cart"><i class="fa fa-times-circle"></i></a>
                          <figure> <a href="javascript:;" class="pull-left"> <img alt="Xpoge" src="<?= $miniCart['image'] ?>"></a>
                            <figcaption> <span><a href="#"><?= $miniCart['product_name'] ?></a></span>
                              <p class="cart-price m-0">₹<?= $miniCart['price'] ?></p>
                              <p class="m-0"> Color : Red</p>
                              <p class="m-0">Size : XXL</p>
                              <div class="product-qty">
                                <label>Qty:</label>
                                <div class="custom-qty">
                                  <p class="m-0"><?= $miniCart['quantity'] ?></p>
                                </div>
                              </div>
                            </figcaption>
                          </figure>
                        </li>
                      <? } ?>
                    </ul>
                    <p class="cart-sub-totle"> <span class="pull-left">Cart Subtotal</span> <span class="pull-right"><strong class="price-box">₹<?= $headerMiniCart['sub_total'] ?></strong></span> </p>
                    <div class="clearfix"></div>
                    <div class="mt-20 d-flex justify-content-center"> <a href="<?= base_url() ?>Home/my_bag" class="btn-color btn"> View Cart</a>
                      <!-- <a href="checkout.html"
										class="btn-color btn right-side">Checkout</a> -->
                    </div>
                  <? } else { ?>
                    <img src="<?= base_url() ?>assets/frontend/img/cart_empty.jpg" alt="Empty Cart" class="img-fluid" style="width:70%">
                  <? } ?>
                </ul>
              </div>
            </li>
            <? if (!empty($this->session->userdata('user_data'))) {
              $wishCount = $this->db->get_where('tbl_wishlist', array('user_id = ' => $this->session->userdata('user_id'), 'user_type', $this->session->userdata('user_type')))->num_rows();
            ?>
              <li class="cart-icon  heig show-icon dx">
                <a href="<?= base_url() ?>Home/my_wishlist"> <span> <small class="cart-notification"><?= $wishCount; ?></small> </span> </a>
              </li>
            <? } else { ?>
              <li class="cart-icon  heig show-icon dx">
                <a href="javascript:void(0);"> <span> <small class="cart-notification"><?= $wishCount; ?></small> </span> </a>
              </li>
            <? } ?>
            </ul>
          </div>
        </div>
      </div>





      <div id="toggle" class="no ">
        <form action="<?= base_url() ?>Home/search" method="GET" enctype="multipart/form-data">
          <div class="form-group m-0 sty">
            <input type="search" placeholder="Search Products... " required="" name="search">
          </div>
          <button type="submit" class="btn " style="position: absolute;
						right: 38px;     padding: 18px 3px;"> <i class="bi bi-search"></i></button>
        </form>
      </div>
      <div class="container position-r animate__animated animate__bounce">
        <div class="row m-0">
        </div>
        <div class="col-lg-12 col-md-8 col-8 p-0 position-initial" style="justify-content: center;
					display: flex;">
          <div class="right-side">
            <div class="overlay"></div>
            <div id="menu" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <div class="navbar-header dfghddgd">
                  <a class="navbar-brand page-scroll" href="<?= base_url() ?>">
                    <img alt="xpoge" src="<?= base_url() ?>assets/frontend/img/Poshida Logo (2)_page-0001.jpg" class="logo-imah-1">
                  </a>
                </div>
                <li class="level">
                  <a href="<?= base_url() ?>" class="nav-link">Home</a>
                </li>
                <?php $i = 1;
                $this->db->select('*');
                $this->db->from('tbl_category');
                $this->db->where('is_active', 1);
                $this->db->order_by('seq', 'asc');
                $category_data = $this->db->get();
                foreach ($category_data->result() as $category) {
                  $this->db->select('*');
                  $this->db->from('tbl_subcategory');
                  $this->db->where('category_id', $category->id);
                  $this->db->where('is_active', 1);
                  $subcategory_data = $this->db->get(); ?>
                  <li class="level dropdown">
                    <a href="<?= base_url() ?>Home/all_products/<?= $category->url ?>/1" class=" nav-link"><?= $category->name ?></a>
                    <span class="opener plus"><i class="bi bi-chevron-down" style="color:white"></i></span>
                    <div class="megamenu full mobile-sub-menu">
                      <div class="megamenu-inner-top">
                        <div class="row sub-menu-level1">
                          <div class="col-lg-5 level2 ">
                            <ul class="sub-menu-level2">
                              <?php $i = 2;
                              foreach ($subcategory_data->result() as $subcat) {
                                if ($i % 2 == 0) {
                              ?>
                                  <li class="level3"><a href="<?= base_url() ?>Home/all_products/<?= $subcat->url ?>/1"><span>■</span><?= $subcat->name ?></a></li>
                              <?php }$i++;
                                
                              } ?>
                            </ul>
                          </div>
                          <div class="col-lg-4 level2">
                            <ul class="sub-menu-level2">
                              <?php $i = 2;
                              foreach ($subcategory_data->result() as $subcat) {
                                if ($i  % 2 != 0) {
                              ?>
                                  <li class="level3"><a href="<?= base_url() ?>Home/all_products/<?= $subcat->url ?>/1"><span>■</span><?= $subcat->name ?></a></li>
                              <?php } $i++;
                                
                              } ?>
                            </ul>
                          </div>
                          <div class="col-lg-3 mt-30 d-none d-lg-block matgin-image" style="display: flex !important;
												justify-content: center;">
                            <div class="sub-menu-img" style="width: 80%;">
                              <a href="<?= base_url() ?>Home/all_products/<?= $category->url ?>/1">
                                <img src="<?= base_url() . $category->image ?>" alt="Xpoge" style="width: 100%;">
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                <?php $i++;
                } ?>

                <li class="level "><a href="<?= base_url() ?>Home/all_blogs" class="nav-link">Blog</a></li>
                <li class="level "><a href="<?= base_url() ?>Home/contact" class="nav-link">Contact</a></li>

              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>
  </div>
  <!-- Header end -->