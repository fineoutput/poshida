<!-- Newslatter section start -->
<section class="newsletter-section align-center ptb-100">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-7 col-lg-9 col-12">
        <div class="newsletter-title">
          <h2 class="main_title">Sign up for Newsletter </h2>
          <p>Wants to get latest updates! sign up for Free </p>
        </div>
        <div class="newsletter-input">
          <form>
            <div class="form-group m-0">
              <input type="email" placeholder="Your email address" required="">
            </div>
            <button type="submit" class="btn btn-color"><span class="d-none d-sm-block">Subscribe</span>
              <i class="fa fa-send d-block d-sm-none"></i></button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Newslatter section end -->
<!-- Footer section start -->
<footer class="footer-part">
  <div class="container">
    <div class="footer-top ptb-100">
      <div class="mb_-30">
        <div class="row">
          <div class="col-12 col-lg-3 col-md-6">
            <div class="footer-about mb-sm-30">
              <div class="footer-logo">
                <a href="<?= base_url() ?>">
                  <img src="<?= base_url() ?>assets/frontend/img/Poshida Logo (2)_page-0001.jpg" alt="logo">
                </a>
              </div>
              <p class="footer-p">Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed
                fringilla mauris sit amet nibh mauris sit amet nibh. Donec sodales sagittis</p>
            </div>
          </div>
          <div class="col-12 col-lg-3 col-md-6">
            <div class="footer-static-block">
              <span class="opener plus"></span>
              <h3 class="head-three">Information</h3>
              <ul class="footer-menu footer-block-contant">
                <li><a href="<?= base_url() ?>Home/privacy_policy">Privacy & Policy</a></li>
                <li><a href="<?= base_url() ?>Home/return_and_replace">Returns, Replace & Exchanges</a></li>
                <li><a href="<?= base_url() ?>Home/shipping_and_delivery">Shipping & Delivery</a></li>
              </ul>
            </div>
          </div>
          <div class="col-12 col-lg-3 col-md-6">
            <div class="footer-static-block">
              <span class="opener plus"></span>
              <h3 class="head-three">My Account</h3>
              <ul class="footer-menu footer-block-contant">
                <li><a href="<?= base_url() ?>Home/my_profile/order">Orders & Returns</a></li>
                <li><a href="<?= base_url() ?>Home/my_profile">Account Details</a></li>
              </ul>
            </div>
          </div>
          <div class="col-12 col-lg-3 col-md-6">
            <div class="footer-static-block">
              <span class="opener plus"></span>
              <h3 class="head-three">Contact us</h3>
              <div class="contact-box footer-block-contant">
                <ul>
                  <li>
                    <div class="contact-thumb">
                      <img src="https://themes.templatescoder.com/xpoge/html/demo/1-0/01_FASHION/images/address-icon.svg" alt="xpoge">
                    </div>
                    <div class="contact-box-detail">
                      <p>869 Lexington Ave, New York, NY 10065, USA</p>
                    </div>
                  </li>
                  <li>
                    <div class="contact-thumb">
                      <img src="https://themes.templatescoder.com/xpoge/html/demo/1-0/01_FASHION/images/phone-icon.svg" alt="xpoge">
                    </div>
                    <div class="contact-box-detail">
                      <p>+91 123 456 789 0</p>
                    </div>
                  </li>
                  <li>
                    <div class="contact-thumb">
                      <img src="https://themes.templatescoder.com/xpoge/html/demo/1-0/01_FASHION/images/mail-icon.svg" alt="xpoge">
                    </div>
                    <div class="contact-box-detail">
                      <p>xpoge@hi123.com</p>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom align-center">
      <div class="row">
        <div class="col-12">
          <div class="w-100">
            <p class="mb-0"><a href="#" target="_blank" title="TemplatesCoder"></a></p>
            <!-- <p class="mb-0">© Xpoge all Rights Reserverd theme by <a href="https://templatescoder.com/"
									target="_blank" title="TemplatesCoder">TemplatesCoder</a></p> -->
          </div>
        </div>
        <div class="col-12">
          <div class="social-media">
            <ul>
              <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>
              <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>
              <li><a href="javascript:void(0)"><i class="fa fa-instagram"></i></a></li>
              <li><a href="javascript:void(0)"><i class="fa fa-youtube"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- =================================== Start login Popup Section ============================================-->
<div class="modal fade" id="LoginModel" tabindex="-1" role="dialog" aria-labelledby="LoginModelTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="popup_content pl-0 pr-0 pt-0">
        <button type="button" class="close p-2" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <div class="row text-left">
          <div class="col-sm-12 text-center mb-2">
            <img alt="xpoge" src="<?= base_url() ?>assets/frontend/img/Poshida Logo (2)_page-0001.jpg" class="logo-imah-1 qwd">

          </div>
        </div>
        <div class="popup-text" style="padding-left: 20px;padding-right: 20px;">
          <div class="heading_s1">
            <h4 class="text-center">LOG IN TO CONTINUE</h4>
          </div>
        </div>
        <form method="post" action="javascript:void(0)" id="loginForm" enctype="multipart/form-data" style="padding-left: 20px;padding-right: 20px;">
          <div class="form-group">
            <input name="number" required="" type="text" id="loginPhone" class="form-control rounded-0" onkeypress="return isNumberKey(event)" maxlength="10" minlength="10" placeholder="Enter Your Number">
            <input type="hidden" id="loginverify" value="0" name="loginverify">
          </div>
          <div class="form-group hidden-OTP-field">
            <input name="OTP" id="loginOTP" class="form-control rounded-0" type="text" onkeypress="return isNumberKey(event)" maxlength="6" minlength="6" placeholder="Enter OTP">
          </div>
          <div class="container">
            <div class="row">
              <p style="margin-bottom: 3px;">By Continuing, I agree to the <a href="<?= base_url() ?>Home/terms_and_conditions" style="color: #c68fa6;">Terms of use</a>
                &amp; <a href="<?= base_url() ?>Home/privacy_policy" style="color: #c68fa6;">Privacy
                  Policy</a></p>
            </div>
          </div>
          <div class="form-group">
            <button class="btn btn-fill-out btn-block text-uppercase mt-2 rounded-0 btn-color " style="padding: 14px 18px;" type="submit">Submit</button>
          </div>
          <div class="text-center"><span class="mt-3">New Here?<a href="javascript:;" data-toggle="modal" data-target="#exampleModalCenter2" style="color:#c68fa6;">&nbsp;Sign Up</a></span>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row no-gutters">
          <div class="col-sm-12">
            <div class="popup_content pl-0 pr-0 pt-0">
              <button type="button" class="close p-2" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>

              <div class="row text-left">
                <div class="col-sm-12 text-center mb-2">

                  <img alt="xpoge" src="<?= base_url() ?>assets/frontend/img/Poshida Logo (2)_page-0001.jpg" class="logo-imah-1 qwd">

                </div>
              </div>
              <div class="popup-text" style="padding-left: 20px;padding-right: 20px;">
                <div class="heading_s1">
                  <h4 class="text-center">SIGN UP TO CONTINUE</h4>
                </div>
              </div>
              <form method="post" action="javascript:void(0)" id="registerForm" enctype="multipart/form-data" style="padding-left: 20px;padding-right: 20px;">
                <div class="row">
                  <div class="form-group col-lg-6">
                    <input name="fname" required="" type="text" id="signinFname" class="form-control rounded-0" placeholder="First Name">
                  </div>
                  <div class="form-group col-lg-6">
                    <input name="lname" required="" type="text" id="signinLname" class="form-control rounded-0" placeholder="Last Name">
                  </div>
                </div>
                <div class="form-group">
                  <input name="phone" required="" type="text" id="signinPhone" class="form-control rounded-0" placeholder="Enter Phone Number" onkeypress="return isNumberKey(event)" maxlength="10" minlength="10">
                  <input type="hidden" id="signinverify" value="0" name="signinverify">
                  <input type="hidden" id="signintype" value="0" name="signinverify">
                </div>
                <div class="form-group hidden-OTP-field">
                  <input name="otp" type="text" id="signinOTP" class="form-control rounded-0" placeholder="Enter OTP">
                </div>
                <div class="container">
                  <div class="row">
                    <p style="margin-bottom: 3px;">By Continuing, I agree to the <a href="#" style="color: #c68fa6;">Terms of use</a> &amp; <a href="#" style="color: #c68fa6;">Privacy Policy</a></p>
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-fill-out btn-block  btn-color  mt-2 text-uppercase rounded-0" style="padding: 14px 18px; " type="submit">Submit</button>
                </div>
                <div class="text-center"><span class="mt-3">Already have an Account?<a href="#" data-target="#onload-popup1" data-toggle="modal" data-dismiss="modal" style="color:#ed6f36;">&nbsp;Log In</a></span>
                </div>
              </form>
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


<script src="<?= base_url() ?>assets/frontend/js/jquery-3.4.1.min.js"></script>
<script src="<?= base_url() ?>assets/frontend/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/frontend/js/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>assets/frontend/js/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url() ?>assets/frontend/js/custom.js"></script>
<script src="<?= base_url() ?>assets/frontend/js/modernizr.js"></script>
<!-- Alert Notification js -->
<script src="<?= base_url() ?>assets/frontend/customJS/notificationMessage.js"></script>
<!-- Login Signup js -->
<script src="<?= base_url() ?>assets/frontend/customJS/loginSignup.js"></script>
<!-- Cart functions js -->
<script src="<?= base_url() ?>assets/frontend/customJS/cartOfflineOnline.js"></script>
<!-- Wishlist js -->
<script src="<?= base_url() ?>assets/frontend/customJS/wishlist.js"></script>
<!-- Promocode js -->
<script src="<?= base_url() ?>assets/frontend/customJS/promoCode.js"></script>
<!-- Place Order js -->
<script src="<?= base_url() ?>assets/frontend/customJS/placeOrder.js"></script>
<!-- // - mixed js  -->
<script src="<?= base_url() ?>assets/frontend/customJS/mixed.js"></script>
<script>
  $(document).ready(function() {
    <?php if (!empty($this->session->flashdata('emessage'))) { ?>
      var fail_message = '<?php echo $this->session->flashdata('emessage') ?>';
      loadErrorNotify(fail_message);
    <?php  } ?>
    <?php if (!empty($this->session->flashdata('validationemessage'))) {
      $valid_errors = $this->session->flashdata('validationemessage');
      $valid_errors = substr($valid_errors, 0, -1); ?>
      loadErrorNotify("<?= $valid_errors ?>");
    <?php
    } ?>
    <?php if (!empty($this->session->flashdata('smessage'))) { ?>
      var succ_message = '<?php echo $this->session->flashdata('smessage'); ?>';
      loadSuccessNotify(succ_message);
    <?php  } ?>
  });
  //================================== SUCCESS NOTIFY  ======================================
  function loadSuccessNotify(succ_message) {
    notifySuccess(succ_message);
  }
  //================================== FAIL NOTIFY  ======================================
  function loadErrorNotify(message) {
    notifyError(message);
  }
  //If your <ul> has the id "glasscase"
  $('#glasscase').glassCase({
    'thumbsPosition': 'bottom',
    'widthDisplayPerc': 100,
    isDownloadEnabled: false,
  });

  $(function() {
    $('[data-toggle="tooltip"]').tooltip()
  })
  // AOS.init();
  var base_url = "<?= base_url() ?>"
</script>


<script>
  function hello() {
    let element = document.getElementById("toggle");
    element.classList.toggle("no");
  }
</script>
<!-- scripts js -->
<script src="<?= base_url() ?>assets/frontend/js/scripts.js"></script>
<script src="<?= base_url() ?>assets/frontend/js/bootstrap-notify.min.js"></script>
</body>