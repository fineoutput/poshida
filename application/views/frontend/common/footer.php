<!-- =================================== START FOOTER ========================================-->
<footer class="footer" style="background-color:#fff1f1;">
  <div class="footer_top">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-12">
          <div class="widget text-center">
            <div class="footer_logo">
              <a href="<?=base_url()?>"><img src="<?=base_url()?>assets/frontend\images\logo2.png" alt="Tiara Logo" style="width:40%;"></a>
            </div>
            <ul class="widget_links d-block mt-3">
              <li><a href="<?=base_url()?>Home/about_us">About Us</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-6">
          <div class="widget">
            <h6 class="widget_title mob_title">BUYING GUIDE</h6>
            <ul class="widget_links">
              <li><a href="<?=base_url()?>Home/return_and_replace">Returns, Replace & Exchanges</a></li>
              <li><a href="<?=base_url()?>Home/shipping_and_delivery">Shipping & Delivery</a></li>
            </ul>
          </div>
        </div>
        <?if(!empty($this->session->userdata('user_data'))){?>
        <div class="col-lg-2 col-md-3 col-sm-6">
          <div class="widget">
            <h6 class="widget_title mob_title">ACCOUNT</h6>
            <ul class="widget_links">
              <li><a href="<?=base_url()?>Home/my_profile/order">Orders & Returns</a></li>
              <li><a href="<?=base_url()?>Home/my_profile">Account Details</a></li>
              <!-- <li><a class="nav-link nav_item" href="#onload-popup1" data-toggle="modal" data-target="#onload-popup1">Login</a></li> -->
            </ul>
          </div>
        </div>
        <?}?>
        <div class="col-lg-2 col-md-6 col-sm-6">
          <div class="widget">
            <h6 class="widget_title mob_title">POLICIES</h6>
            <ul class="widget_links">
              <li><a href="<?=base_url()?>Home/terms_and_conditions">Terms & Conditions</a></li>
              <li><a href="<?=base_url()?>Home/privacy_policy">Privacy & Policy</a></li>
            </ul>
          </div>
          <div class="widget gta">
            <ul class="social_icons social_white">
              <li style="width:40px;background: #1b74e4; text-align: center;border-radius: 50%;padding: 3px 0px 0px 1px;  margin-right: 3px;"><a href="https://www.facebook.com/tiarastore.co.in" target="_blank" rel="noopener noreferrer" ><i class="ion-social-facebook"></i></a></li>
              <li style="width:40px;background: #1da1f2; text-align: center;border-radius: 50%;padding: 3px 0px 0px 1px; margin-right: 3px;"><a href="https://twitter.com/TIARASTORE2710" target="_blank" rel="noopener noreferrer" ><i class="ion-social-twitter"></i></a></li>
              <li style="width:40px;background:  #dd4d42; text-align: center;border-radius: 50%;padding: 3px 0px 0px 1px; margin-right: 3px;"><a href="https://youtube.com/channel/UC8UL2rXUvV6w_mRuJDjITiw" target="_blank" rel="noopener noreferrer"><i class="ion-social-youtube"></i></a></li>
              <li style="width:40px;background: #d33d87; text-align: center;border-radius: 50%;padding: 3px 0px 0px 1px; margin-right: 3px;"><a href="https://instagram.com/tiarastore.co.in?igshid=YmMyMTA2M2Y=" target="_blank" rel="noopener noreferrer" ><i class="ion-social-instagram-outline"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="widget">
            <h6 class="widget_title mob_title">CONTACT US</h6>
            <ul class="contact_info contact_info_light widget_links">
              <li>
                <i class="ti-location-pin"></i>
                <p>Plot no. C-2, Shop No B-14,15,16,17, Saurav Tower, Gautam Marg,  Vaishali Nagar,  Jaipur, Rajasthan, 302021</p>
              </li>
              <li>
                <i class="ti-email"></i>
                <a href="mailto:contactus@tiarastore.co.in">contactus@tiarastore.co.in</a>
              </li>
              <li>
                <i class="ti-mobile"></i>
                <a href="tel:+919511351606"><p>+919511351606</p></a>
              </li>
            </ul>
          </div>
          <!-- ======================================= START SOCIAL ========================================== -->
          <div class="widget gta1 text-center d-lg-none">
            <ul class="social_icons social_white">
              <li style="width:40px;background: #1b74e4; text-align: center;border-radius: 50%;padding: 3px 0px 0px 1px;  margin-right: 3px;"><a href="https://www.facebook.com/tiarastore.co.in" target="_blank" rel="noopener noreferrer" ><i class="ion-social-facebook"></i></a></li>
              <li style="width:40px;background: #1da1f2; text-align: center;border-radius: 50%;padding: 3px 0px 0px 1px; margin-right: 3px;"><a href="https://twitter.com/TIARASTORE2710" target="_blank" rel="noopener noreferrer" ><i class="ion-social-twitter"></i></a></li>
              <li style="width:40px;background:  #dd4d42; text-align: center;border-radius: 50%;padding: 3px 0px 0px 1px; margin-right: 3px;"><a href="https://youtube.com/channel/UC8UL2rXUvV6w_mRuJDjITiw" target="_blank" rel="noopener noreferrer"><i class="ion-social-youtube"></i></a></li>
              <li style="width:40px;background: #d33d87; text-align: center;border-radius: 50%;padding: 3px 0px 0px 1px; margin-right: 3px;"><a href="https://instagram.com/tiarastore.co.in?igshid=YmMyMTA2M2Y=" target="_blank" rel="noopener noreferrer" ><i class="ion-social-instagram-outline"></i></a></li>
            </ul>
          </div>
          <!-- ======================================= END SOCIAL ========================================== -->
        </div>
      </div>
    </div>
  </div>
  <div class="bottom_footer border-top-tran">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <p class="mb-md-0 text-center text-md-left">© 2022 All Rights Reserved by Tiara</p>
        </div>
      </div>
    </div>
  </div>
</footer>

<!-- ======================================= END FOOTER ========================================== -->

<!-- ======================================= START BOTTOM BAR ========================================== -->
<div class="container-fluid mobilebottom" style="position:sticky; bottom: 0;background:#f2f2f2;z-index: 9999;" id="footerCount">
  <div class="row" style="justify-content: space-between;">

    <div class="col-2 text-center mt-2 p-0"><a href="<?=base_url()?>"><i class="linearicons-home" style="font-size: 20px;"></i></a>
      <h6>Home</h6>
    </div>
    <?if (!empty($this->session->userdata('user_data'))) {
    $wishcount = $this->db->get_where('tbl_wishlist', array('user_id = ' => $this->session->userdata('user_id'), 'user_type', $this->session->userdata('user_type')))->num_rows(); ?>
    <div class="col-2 text-center mt-2 p-0"><a href="<?=base_url()?>Home/my_profile"><i class="linearicons-user" style="font-size: 20px;"></i></a>
      <h6>Account</h6>
    </div>
    <div class="col-2 text-center mt-2 p-0"><a href="<?=base_url()?>Home/my_wishlist"><i class="linearicons-heart" style="font-size: 20px;"></i><span class="wishlist_count"><?=$wishcount; ?></span></a>
      <h6>Wishlist</h6>
    </div>
    <?
}else{?>
  <div class="col-2 text-center mt-2 p-0"><a href="javascript:;" data-target="#onload-popup1" data-toggle="modal" data-dismiss="modal"><i class="linearicons-user" style="font-size: 20px;"></i></a>
    <h6>Login</h6>
  </div>
  <div class="col-2 text-center mt-2 p-0"><a href="javascript:;" data-target="#onload-popup1" data-toggle="modal" data-dismiss="modal"><i class="linearicons-heart" style="font-size: 20px;"></i><span class="wishlist_count">0</span></a>
    <h6>Wishlist</h6>
  </div>
  <?}?>
    <?php $cartcount = 0;
    if (!empty($this->session->userdata('user_data'))) {
        $cartcount = $this->db->get_where('tbl_cart', array('user_id = ' => $this->session->userdata('user_id'), 'user_type'=>$this->session->userdata('user_type')))->num_rows();
    } else {
        if (!empty($this->session->userdata('cart_data'))) {
            $cartcount = count($this->session->userdata('cart_data'));
        }
    }
    ?>
    <div class="col-2 text-center mt-2 p-0"><a href="<?=base_url()?>Home/my_bag">&nbsp;<i class="linearicons-bag2" style="font-size: 20px;"></i><span class="cart_count"><?=$cartcount;?></span></a>
      <h6>Bag</h6>
    </div>
    <div class="col-2 text-center mt-2 p-0"><a href="https://wa.me/+919511351606/" target="_blank" rel="noopener noreferrer"> <i class="icon ion-social-whatsapp" style="font-size:17px;color:green;"></i></a>
      <h6 style="margin-left:-10px;">Connect</h6>
    </div>
  </div>
</div>
<!-- ======================================= END BOTTOM BAR ========================================== -->

<a  href="https://wa.me/+919511351606/" target="_blank" rel="noopener noreferrer"  class="btn btn-success white btn-lg mt-3 button-fixed-right green  desktopwhatsapp ">
  <i class="icon ion-social-whatsapp" style="font-size:30px;"></i>
</a>

<!-- Latest jQuery -->
<script src="<?=base_url()?>assets/frontend/js/jquery-3.6.0.min.js"></script>
<script>
//============= NUMBER VALIDATION =============
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
//================================== NOTIFY  ======================================
$(document).ready(function() {
<?php if (!empty($this->session->flashdata('emessage'))) { ?>
 var fail_message = '<?php echo $this->session->flashdata('emessage')?>';
 loadErrorNotify(fail_message);
<?php  } ?>

<?php  if (!empty($this->session->flashdata('validationemessage'))) {
        $valid_errors = $this->session->flashdata('validationemessage');
        $valid_errors = substr($valid_errors, 0, -1); ?>
loadErrorNotify("<?=$valid_errors?>");
<?php
    } ?>

<?php if (!empty($this->session->flashdata('smessage'))) { ?>
  var succ_message = '<?php echo $this->session->flashdata('smessage');?>';
  loadSuccessNotify(succ_message);
 <?php  } ?>

});
//================================== SUCCESS NOTIFY  ======================================

function loadSuccessNotify(succ_message){
  notifySuccess(succ_message);
}
//================================== FAIL NOTIFY  ======================================
    function loadErrorNotify(message){
       notifyError(message);
    }

  $(".mob_title").click(function() {
    if (window.matchMedia('(max-width: 991px)').matches) {
      $(this).next("ul").slideToggle()();
    }
  });

  $(".searchshow").click(function() {
    $('.mobiledisplay').slideToggle()();
  });

  function pro_change(obj) {
    var img2 = $(obj).attr("img2");
    $(obj).attr("src", img2);
  }


  function pro_default(obj) {
    var img = $(obj).attr("img");
    $(obj).attr("src", img);
  }


  $(".carousel").carousel({
    interval: 3000
  });

  //scroll slides on swipe for touch enabled devices
  $(".carousel").on("touchstart", function(event) {
    var yClick = event.originalEvent.touches[0].pageY;
    $(this).one("touchmove", function(event) {
      var yMove = event.originalEvent.touches[0].pageY;
      if (Math.floor(yClick - yMove) > 1) {
        $(".carousel").carousel("next");
      } else if (Math.floor(yClick - yMove) < -1) {
        $(".carousel").carousel("prev");
      }
    });
    $(".carousel").on("touchend", function() {
      $(this).off("touchmove");
    });
  });
</script>

<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i> </a>
<!-- Base URL -->
<script type="text/javascript">
var base_url = "<?=base_url()?>"
var api_key = "<?=API_KEY?>"
</script>
<!-- Razorpay js -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<!-- Alert Notification js -->
<script src="<?=base_url()?>assets/frontend/customJS/notificationMessage.js"></script>
<!-- Login Signup js -->
<script src="<?=base_url()?>assets/frontend/customJS/loginSignup.js"></script>
<!-- Cart functions js -->
<script src="<?=base_url()?>assets/frontend/customJS/cartOfflineOnline.js"></script>
<!-- Wishlist js -->
<script src="<?=base_url()?>assets/frontend/customJS/wishlist.js"></script>
<!-- Promocode js -->
<script src="<?=base_url()?>assets/frontend/customJS/promoCode.js"></script>
<!-- Place Order js -->
<script src="<?=base_url()?>assets/frontend/customJS/placeOrder.js"></script>
<!-- // - mixed js  -->
<script src="<?=base_url()?>assets/frontend/customJS/mixed.js"></script>

<!-- popper min js -->
<script src="<?=base_url()?>assets/frontend/js/popper.min.js"></script>
<!-- Latest compiled and minified Bootstrap -->
<script src="<?=base_url()?>assets/frontend/bootstrap/js/bootstrap.min.js"></script>
<!-- owl-carousel min js  -->
<script src="<?=base_url()?>assets/frontend/owlcarousel/js/owl.carousel.min.js"></script>
<!-- magnific-popup min js  -->
<script src="<?=base_url()?>assets/frontend/js/magnific-popup.min.js"></script>
<!-- waypoints min js  -->
<script src="<?=base_url()?>assets/frontend/js/waypoints.min.js"></script>
<!-- parallax js  -->
<script src="<?=base_url()?>assets/frontend/js/parallax.js"></script>
<!-- countdown js  -->
<script src="<?=base_url()?>assets/frontend/js/jquery.countdown.min.js"></script>
<!-- imagesloaded js -->
<script src="<?=base_url()?>assets/frontend/js/imagesloaded.pkgd.min.js"></script>
<!-- isotope min js -->
<script src="<?=base_url()?>assets/frontend/js/isotope.min.js"></script>
<!-- jquery.dd.min js -->
<script src="<?=base_url()?>assets/frontend/js/jquery.dd.min.js"></script>
<!-- slick js -->
<script src="<?=base_url()?>assets/frontend/js/slick.min.js"></script>
<!-- elevatezoom js -->
<script src="<?=base_url()?>assets/frontend/js/jquery.elevatezoom.js"></script>
<!-- scripts js -->
<script src="<?=base_url()?>assets/frontend/js/scripts.js"></script>
<script src="<?=base_url()?>assets/frontend/js/bootstrap-notify.min.js"></script>
<!-- on load popup -->
<script>
$(window).on('load',function(){
  var pageURL = $(location).attr("href");
  if(pageURL==base_url){
    var visited = localStorage.getItem('visited');
    const now = new Date();
    if(visited===null){
      const newD = now.getTime() + 1440*60000;// local storage set with plus 24 hours
	     localStorage.setItem('visited', newD)
      $('#onload-popup-my').modal('show')
    }else{
    if(now.getTime() > visited){
    const newD = now.getTime() + 1440*60000;// local storage set with plus 24 hours
     localStorage.setItem('visited', newD)
    $('#onload-popup-my').modal('show')
  }
  }
}
});
</script>

</body>

</html>
