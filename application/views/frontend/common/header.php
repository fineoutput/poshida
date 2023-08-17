<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Meta -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="Anil z" name="author">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- SITE TITLE -->
  <title>Tiara</title>
  <!-- Favicon Icon -->
  <link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>assets/frontend/images/fav.png">
  <!-- Animation CSS -->
  <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/animate.css">
  <!-- 4.6 Bootstrap min CSS -->
  <link rel="stylesheet" href="<?=base_url()?>assets/frontend/bootstrap/css/bootstrap.min.css">
  <!-- 5.0 Bootstrap min CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
  <!-- Icon Font CSS -->
  <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/all.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/ionicons.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/themify-icons.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/linearicons.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/flaticon.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/simple-line-icons.css">
  <!--- owl carousel CSS-->
  <link rel="stylesheet" href="<?=base_url()?>assets/frontend/owlcarousel/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/frontend/owlcarousel/css/owl.theme.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/frontend/owlcarousel/css/owl.theme.default.min.css">
  <!-- Magnific Popup CSS -->
  <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/magnific-popup.css">
  <!-- Slick CSS -->
  <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/slick.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/slick-theme.css">
  <!-- Style CSS -->
  <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/style.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/responsive.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/frontend/js/bootstrap-notify.min.js"></script>
  <link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/jquery-ui.css">
<!-- Google tag (gtag.js) --> <script async src="https://www.googletagmanager.com/gtag/js?id=G-J1KS0D9189"></script> <script>   window.dataLayer = window.dataLayer || [];   function gtag(){dataLayer.push(arguments);}   gtag('js', new Date());   gtag('config', 'G-J1KS0D9189'); </script>
<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '225405823602309');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=225405823602309&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->
</head>
<body>
  <?	$headerMiniCart = [];
  $this->load->library('custom/Cart');
  if (!empty($this->session->userdata('user_data'))) {
      $headerMiniCart = $this->cart->ViewCartOnline();
  } else {
      $headerMiniCart = $this->cart->ViewCartOffline();
  }
  ?>
<style>
@media only screen and (max-width: 780px) {
.mob-show{
display: flex !important;
}
}
</style>
<!-- Home Popup Section -->
<? $popup_data = $this->db->get_where('tbl_popup_image', array('is_active = ' => 1))->result();
if(!empty($popup_data)){
?>
<div class="modal fade subscribe_popup" id="onload-popup-my" tabindex="-1" role="dialog" style="overflow: hidden;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered mediadevice" role="document" style="margin-top:85px;">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="ion-ios-close-empty"></i></span>
                </button>
                <div class="row no-gutters">
                    <div class="col-sm-5">
                    	<div class="background_bg h-100" data-img-src="<?=base_url().$popup_data[0]->image?>"></div>
                    </div>
                    <div class="col-sm-7">
                        <div class="popup_content">
                            <div class="popup-text">
                                <?=$popup_data[0]->text;?>
                            </div>
                            <form method="POST" action="<?=base_url()?>Home/subscribe_to_popup" enctype="multipart/form-data">
                            	<div class="form-group">
                                	<input name="name" required type="text" class="form-control rounded-0" placeholder="Enter Your Name">
                                </div>
                            	<div class="form-group">
                                	<input name="phone" required type="text" maxlength="10" minlength="10" onkeypress="return isNumberKey(event)" class="form-control rounded-0" placeholder="Enter Your Mobile Number">
                                </div>
                                <div class="form-group">
                                	<input name="email" type="email" class="form-control rounded-0" required placeholder="Enter Your Email">
                                </div>
                                <div class="form-group">
                                	<button class="btn btn-fill-line btn-block text-uppercase rounded-0" title="Subscribe" type="submit">Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    	</div>
    </div>
</div>
<?}?>
<!-- End Screen Load Popup Section -->
  <!-- =================================== Start login Popup Section ============================================-->
  <div class="modal fade subscribe_popup" id="onload-popup1" tabindex="-1" role="dialog" aria-hidden="true" style="top: 13%;">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="row no-gutters">
            <div class="col-sm-12">
              <div class="popup_content pl-0 pr-0 pt-0">
                <div class="row text-left">
                  <div class="col-sm-12">
                    <?$offer_data = $this->db->get_where('tbl_offer', array('is_active'=> 1))->result();
                    if (!empty($offer_data)) {
                        ?>
                    <img src="<?=base_url().$offer_data[0]->image?>" alt="Offer">
                    <?}?>
                  </div>
                </div>
                <div class="popup-text" style="padding-left: 50px;padding-right: 50px;">
                  <div class="heading_s1">
                    <h6 style="margin-top:10px;">LOG IN TO CONTINUE</h6>
                  </div>
                </div>
                <form method="post" action="javascript:void(0)" id="loginForm" enctype="multipart/form-data" style="padding-left: 50px;padding-right: 50px;">
                  <div class="form-group">
                    <input name="number" required type="text" id="loginPhone" class="form-control rounded-0" onkeypress="return isNumberKey(event)" maxlength="10" minlength="10" placeholder="Enter Your Number">
                    <input type="hidden" id="loginverify" value="0" name="loginverify" />
                  </div>
                  <div class="form-group hidden-OTP-field">
                    <input name="OTP" id="loginOTP" class="form-control rounded-0" type="text" onkeypress="return isNumberKey(event)" maxlength="6" minlength="6" placeholder="Enter OTP">
                  </div>
                  <div class="container">
                    <div class="row">
                      <p style="margin-bottom: 3px;">By Continuing, I agree to the <a href="term-condition.html" style="color: #FF324D;">Terms of use</a> & <a href="privacy_policy.html" style="color: #FF324D;">Privacy Policy</a></p>
                    </div>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-fill-out btn-block text-uppercase rounded-0" type="submit">Submit</button>
                  </div>
                  <div class="text-center"><span class="mt-3">New Here?<a href="javascript:;" data-target="#onload-popup2" data-toggle="modal" data-dismiss="modal" style="color:#ff324d;">&nbsp;Sign Up</a></span>
                  </div>
                  <!-- <p style="margin-bottom: 0px;">Or</p>
                  <div class="text-center"><span class="mt-3"><a href="<?=base_url()?>Home/reseller_register" style="color:#ff324d;">Sign up as a Reseller</a></span>
                  </div> -->
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- =================================== END login Popup Section ============================================-->
  <!-- =================================== Start Sign up Popup Section ============================================-->
  <div class="modal fade subscribe_popup signupmodal" id="onload-popup2" tabindex="-1" role="dialog" aria-hidden="true" style="top: 13%;overflow-y:scroll;margin-bottom: 30px;">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="row no-gutters">
            <div class="col-sm-12">
              <div class="popup_content pl-0 pr-0 pt-0">
                <div class="row text-left">
                  <div class="col-sm-12">
                    <?$offer_data = $this->db->get_where('tbl_offer', array('is_active'=> 1))->result();
                    if (!empty($offer_data)) {
                        ?>
                    <img src="<?=base_url().$offer_data[0]->image?>" alt="Offer">
                    <?}?>
                  </div>
                </div>
                <div class="popup-text" style="padding-left: 50px;padding-right: 50px;">
                  <div class="heading_s1 mt-1">
                    <h6>SIGN UP TO CONTINUE</h6>
                  </div>
                </div>
                <form method="post" action="javascript:void(0)" id="registerForm" enctype="multipart/form-data" style="padding-left: 50px;padding-right: 50px;">
                  <div class="row">
                    <div class="form-group col-lg-6">
                      <input name="fname" required type="text" id="signinFname" class="form-control rounded-0" placeholder="First Name">
                    </div>
                    <div class="form-group col-lg-6">
                      <input name="lname" required type="text" id="signinLname" class="form-control rounded-0" placeholder="Last Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <input name="phone" required type="text" id="signinPhone" class="form-control rounded-0" placeholder="Enter Phone Number"  onkeypress="return isNumberKey(event)" maxlength="10" minlength="10">
                    <input type="hidden" id="signinverify" value="0" name="signinverify" />
                    <input type="hidden" id="signintype" value="0" name="signinverify" />
                  </div>
                  <div class="form-group hidden-OTP-field">
                    <input name="otp" type="text" id="signinOTP" class="form-control rounded-0" placeholder="Enter OTP">
                  </div>
                  <div class="container">
                    <div class="row">
                      <p style="margin-bottom: 3px;">By Continuing, I agree to the <a href="term-condition.html" style="color: #FF324D;">Terms of use</a> & <a href="privacy_policy.html" style="color: #ff324d;">Privacy Policy</a></p>
                    </div>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-fill-out btn-block text-uppercase rounded-0" type="submit">Submit</button>
                  </div>
                  <div class="text-center"><span class="mt-3">Already have an Account?<a href="#" data-target="#onload-popup1" data-toggle="modal" data-dismiss="modal" style="color:#ed6f36;">&nbsp;Log In</a></span>
                  </div>
                  <!-- <p style="margin-bottom: 0px;">Or</p>
                  <div class="text-center"><span class="mt-3"><a href="<?=base_url()?>Home/reseller_register" style="color:#ff324d;">Sign up as a Reseller</a></span>
                  </div> -->
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- =================================== END Sign up Popup Section ============================================-->
  <!-- ======================================= START HEADER  =============================================================-->
  <header class="header_wrap" style="position: sticky; top: 0; z-index: 99999;box-shadow: 5px 1px 5px grey;">
    <div class="middle-header dark_skin">
      <div class="container-fluid">
        <button class="navbar-toggler side_navbar_toggler" type="button" data-toggle="collapse" data-target="#navbarSidetoggle" aria-expanded="false" style="float: left;">
          <span class="ion-android-menu"></span>
        </button>
        <div class="nav_block ">
          <a class="desktoplogo" href="<?=base_url()?>" style="margin-left:-10px;">
            <img class="logo_light d-block " src="<?=base_url()?>assets/frontend/images/logo2.png" alt="Tiara Logo" width="40%">
          </a>
          <a class="mobilelogo" href="<?=base_url()?>" style="display: flex;justify-content: center;">
            <img class="logo_light d-block" src="<?=base_url()?>assets/frontend/images/logo2.png" alt="logo" width="45%">
          </a>
          <div class="product_search_form radius_input search_form_btn" style="margin-left:-100px;">
            <form action="<?=base_url()?>Home/search" method="GET" enctype="multipart/form-data">
              <div class="input-group">
                <input class="form-control" placeholder="Search Product..." required="" name="search" type="text" style="height: 35px;">
                <button type="submit" class="search_btn3" style="padding-top: 8px;"><i class="linearicons-magnifier" style="color:grey; font-size: 25px;"></i></button>
              </div>
            </form>
          </div>
          <!-- <div class="text-center ktm">
            <a style="padding:4px 14px" class="btn btn-fill-out rounded-0 " href="#" data-animation="slideInLeft" data-animation-delay="1.5s">TRACK ORDER</a>
          </div> -->
          <ul class="navbar-nav attr-nav align-items-center" id="headerCount">
            <li style="font-size: 12px;padding: 0px 10px;" class="dropdown cart_dropdown topicon">
              <?if(empty($this->session->userdata('user_data'))){?>
                <a ref="#onload-popup1" data-toggle="modal" data-target="#onload-popup1"class="nav-link cart_trigger" style="padding:0px 10px;">
                  <i class="linearicons-user"></i></a>
                	<a href="#onload-popup1" data-toggle="modal" data-target="#onload-popup1">&nbsp;Login</a>
                <?}else{?>
                  <a href="#" class="nav-link cart_trigger" data-toggle="dropdown" style="padding:0px 10px;">
                    <i class="linearicons-user"></i></a>
                <?echo $this->session->userdata('name');
                }?>
              <div class="cart_box  dropdown-menu accountanimation" style="width: 40%;min-width: 150px;">
                <ul class="cart_list">
                  <?if(empty($this->session->userdata('user_data'))){?>
                  <!-- <li> <a href="#onload-popup1" data-toggle="modal" data-target="#onload-popup1">Log In </a> </li> -->
                  <?}else{?>
                  <li> <a href="<?=base_url()?>Home/my_profile">My Account </a> </li>
                  <li> <a href="<?=base_url()?>Home/my_profile/order">My Orders </a> </li>
                  <li> <a href="<?=base_url()?>User/logout">Log Out </a> </li>
                  <?}?>
                </ul>
              </div>
            </li>
            <li style="font-size: 12px;" class="searchshow onclick"><a href="#" class="nav-link" style="padding:0px 10px;"><i class="linearicons-magnifier" style="font-weight: bold;"></i></a><span class="sm_none">Search</span></li>
            <?$wishcount = 0; $cartcount = 0;
            if(!empty($this->session->userdata('user_data'))){
              $wishcount = $this->db->get_where('tbl_wishlist', array('user_id = ' => $this->session->userdata('user_id'), 'user_type', $this->session->userdata('user_type')))->num_rows();
              ?>
            <li style="font-size: 12px;padding: 0px 10px;" class="topicon"><a href="<?=base_url()?>Home/my_wishlist" class="nav-link" style="padding:0px 10px;"><i class="linearicons-heart"></i><span class="wishlist_count"><?=$wishcount;?></span></a>Wishlist</li>
            <?}else{?>
              <li style="font-size: 12px;padding: 0px 10px;" class="topicon"><a href="javascript:;" class="nav-link" data-target="#onload-popup1" data-toggle="modal" data-dismiss="modal" style="padding:0px 10px;"><i class="linearicons-heart"></i><span class="wishlist_count"><?=$wishcount;?></span></a>Wishlist</li>
              <?}?>
            <li class="dropdown cart_dropdown topicon" style="position:inherit;font-size: 12px;padding-left:15px;">
              <? if(!empty($this->session->userdata('user_data'))){
              $cartcount = $this->db->get_where('tbl_cart', array('user_id = ' => $this->session->userdata('user_id'), 'user_type'=>$this->session->userdata('user_type')))->num_rows();
            }else{
              if(!empty($this->session->userdata('cart_data'))){
              $cartcount = count($this->session->userdata('cart_data'));
              }
            }
              ?>
              <a class="nav-link cart_trigger" href="#" data-toggle="dropdown" style="padding:0px; padding-left: 3px;">
              <i class="linearicons-bag2"></i><span class="cart_count"><?=$cartcount?></span></a> Bag
              <!-- ======================= START WEB MINI CART ====================  -->
              <div class="cart_box cart_right dropdown-menu dropdown-menu-right">
                <?if(!empty($headerMiniCart['cart_data'])){?>
                <ul class="cart_list">
                  <?foreach($headerMiniCart['cart_data'] as $miniCart){?>
                  <li>
                    <a href="javascript:;" product_id="<?=base64_encode($miniCart['product_id'])?>" type_id="<?=base64_encode($miniCart['type_id'])?>" onclick="deleteCart(this)" class="item_remove"><i class="ion-close"></i></a>
                    <a href="javascript:;"><img src="<?=$miniCart['image']?>" alt="cart_thumb1"><?=$miniCart['product_name']?></a>
                    <span class="cart_quantity"> <?=$miniCart['quantity']?> x <span class="cart_amount"> <span class="price_symbole">₹</span></span><?=$miniCart['price']?></span>
                  </li>
                  <?}?>
                </ul>
                <div class="cart_footer">
                  <p class="cart_total"><strong>Subtotal:</strong> <span class="cart_price"> <span class="price_symbole">₹</span></span><?=$headerMiniCart['sub_total']?></p>
                  <p class="cart_buttons"><a href="<?=base_url()?>Home/my_bag" class="btn btn-fill-line view-cart"> View Bag</i></a></p>
                </div>
                <?}else{?>
                    <img src="<?=base_url()?>assets/frontend/images/cart_empty.jpg" alt="Empty Cart" class="img-fluid">
                  <?}?>
              </div>
              <!-- ======================= END WEB MINI CART ====================  -->
            </li>
            <!-- <li class="dropdown cart_dropdown" style="position:inherit;font-size: 12px;padding: 0px 10px;"><a class="nav-link cart_trigger" href="#" data-toggle="dropdown"  style="padding:0px; padding-left: 8px;"><i class="linearicons-truck" style="font-size :22px!important;"></i></a> Track</li> -->
            <!-- <li class="dropdown cart_dropdown"style="position:inherit;font-size: 12px;padding: 0px 10px;"><a href="#" class="nav-link" style="padding:0px"><i class="linearicons-truck" ></i></a>Track Order</li> -->
            <!-- <li style="margin-top: -5px;"><a href="#" class="nav-link" style="padding:0px 10px;"><i class="linearicons-truck" ></i></a>Track Order</li> -->
          </ul>
        </div>
      </div>
      <!-- //==================================== START MOBILE SEARCH =============================== -->
      <div class="container-fluid mobiledisplay">
        <form action="<?=base_url()?>Home/search" method="GET" enctype="multipart/form-data">
        <div class="input-group">
          <input class="form-control" name="search" placeholder="Search Product..." required="" type="text" style="height: 35px;">
          <button type="submit" class="search_btn3"><i class="linearicons-magnifier" style="color:grey;"></i></button>
        </div>
      </form>
      </div>
      <!-- //==================================== END MOBILE SEARCH =============================== -->
    </div>
    <!-- //==================================== START WEB HEADER =============================== -->
    <div class="bottom_header dark_skin main_menu_uppercase mob2 ">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-12 col-md-8 col-sm-6 col-9">
            <nav class="navbar navbar-expand-lg" style="height:40px;">
              <div class="collapse navbar-collapse mobile_side_menu justify-content-center" id="navbarSidetoggle">
                <ul class="navbar-nav navv">
                  <li style="padding:10px 10px; display: none;">User Name</li>
                  <li class="dropdown mobdrop" style="padding-left:5px;">
                    <a class="nav-link  active" href="<?=base_url()?>">Home</a>
                  </li>
                  <?php $i=1;
                  $this->db->select('*');
                  $this->db->from('tbl_category');
                  $this->db->where('is_active', 1);
                  $this->db->order_by('seq', 'asc');
                  $category_data= $this->db->get();
                   foreach ($category_data->result() as $category) {
                  $this->db->select('*');
                  $this->db->from('tbl_subcategory');
                  $this->db->where('category_id', $category->id);
                  $this->db->where('is_active', 1);
                  $subcategory_data= $this->db->get(); ?>
                  <li class="dropdown dropdown-mega-menu mobdrop" style="padding-left:5px;">
                    <a class="dropdown-toggle nav-link" href="<?=base_url()?>Home/all_products/<?=$category->url?>/1" data-toggle="dropdown"><?=$category->name?></a>
                    <div class="dropdown-menu">
                      <ul class="mega-menu d-lg-flex">
                        <li class="mega-menu-col col-lg-9">
                          <ul class="d-lg-flex">
                            <li class="mega-menu-col col-lg-12">
                              <ul>
                                <?php $i=1;
                                foreach ($subcategory_data->result() as $subcat) { ?>
                                <li><a class="dropdown-item nav-link nav_item" href="<?=base_url()?>Home/all_products/<?=$subcat->url?>/1"><?=$subcat->name?> </a></li>
                                <?php $i++; } ?>
                              </ul>
                            </li>
                          </ul>
                        </li>
                        <li class="mega-menu-col col-lg-3">
                          <div class="header_banner">
                            <div class="header_banner_content">
                              <div class="shop_banner">
                                <div class="banner_img ">
                                  <img src="<?=base_url().$category->image?>" alt="shop_banner2" />
                                </div>
                              </div>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <?php $i++;} ?>
                  <li class="dropdown mobdrop" style="padding-left:5px;">
                    <a class="nav-link" href="<?=base_url()?>Home/all_blogs">Blog</a>
                  </li>
                  <li class=" mobdrop" style="padding-left:5px;"><a class="nav-link nav_item" href="<?=base_url()?>Home/contact">Contact</a></li>
                  <?if(empty($this->session->userdata('user_data'))){?>
                  <div class="justify-content-around mt-3 mob-show d-none">
                    <a href="javascript:;" id="sup" data-target="#onload-popup2" data-toggle="modal" data-bs-dismiss="modal" style="color:#ff324d;"><button class="btn btn-fill-out btn-addtocart">Sign Up</button></a>
                    	<a href="#onload-popup1" id="log" data-toggle="modal" data-target="#onload-popup1"><button  class="btn btn-fill-out btn-addtocart">Login</button></a>
                  </div>
                  <?}else{?>
                  <div class="justify-content-center mt-3 mob-show d-none">
                    <a href="<?=base_url()?>User/logout"><button class="btn btn-fill-out btn-addtocart">Logout</button></a>
                  </div>
                  <?}?>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <!-- //==================================== END WEB HEADER =============================== -->
  </header>
  <!-- ============================== Start Mobile Category ======================================================= -->
  <div style="display: flex;overflow: auto;margin-top: 10px;" class="topiconnav">
    <?php $i=1; foreach ($category_data->result() as $category) {?>
    <div class="col-2 imgwidthmanage p-0 text-center">
      <a href="<?=base_url()?>Home/all_products/<?=$category->url?>/1">
        <img src="<?=base_url().$category->image2?>" alt="" style="border-radius: 50%;">
        <p style="font-size:9px;" class="mb-0"><?=$category->name?></p>
      </a>
    </div>
    <?}?>
  </div>
  <!-- ============================== End Mobile Category ======================================================= -->
  <!-- =============================== END HEADER ================================================================-->
<script>
$( "#sup,#log" ).on( "click", function() {
  $('#navbarSidetoggle').removeClass('show');
});
</script>
