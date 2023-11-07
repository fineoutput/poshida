<!-- Footer section start -->
<style>
	img.width-custem {
		width: 28px !important;
		position: relative;
		left: 10px;
	}

	.coko-mar {
		margin-top: 0px !important;
	}

	.mfp-wrap.mfp-close-btn-in.mfp-auto-cursor.mfp-ready {
		z-index: 9999999999;
	}

	.popup-text.redsp {
		margin-bottom: 18px;
		font-weight: 700;
		font-size: 23px;

	}

	footer .social-media {
		padding: 0px 0 1px 0px;
	}

	#newslater-popup .newsletter-inner input {
		border: none;
		width: 100%;
		padding: 10px;
		margin-bottom: 0px;
	}

	.social-media.mt-3 ul.iconn li a i {
		color: #c68fa6;
		font-size: 20px;
	}

	.social-media.mt-3 ul.iconn li a i:hover {
		color: white;
	}

	@media(max-width:381px) {
		.text-footer-p {
			margin-left: 0px !important;
		}
	}
	.sdgsdggsd{
		display: none;
	}

  @media(max-width:982px){
    .sdgsdggsd{
		display: block !important;
    margin: 1rem;
	}
  }

</style>

<footer class="footer-part">
	<div class="container">
		<div class="footer-top ptb-100">
			<div class="mb_-30">
				<div class="row" style="align-items: baseline;">
					<div class="col-12 col-lg-3 col-md-6">
						<div class="footer-about mb-sm-30">
							<div class="footer-logo">
								<a href="<?= base_url() ?>">
									<img src="<?= base_url() ?>assets/frontend/img/Poshida.jpg" alt="logo">
								</a>
							</div>

							<p class="footer-p text-footer-p " style="   
										font-size: 17px;
										font-weight: 600;
										margin-left :18px;
									">Grace In Every Stitch </p>
						</div>
						
						<div id="google_translate_element"  class=" sdgsdggsd ms-2"><div class="skiptranslate goog-te-gadget" dir="ltr" style=""><div id=":0.targetLanguage" class="goog-te-gadget-simple" style="white-space: nowrap;"><img src="https://www.google.com/images/cleardot.gif" class="goog-te-gadget-icon" alt="" style="background-image: url(&quot;https://translate.googleapis.com/translate_static/img/te_ctrl3.gif&quot;); background-position: -65px 0px;"><span style="vertical-align: middle;"><a aria-haspopup="true" class="VIpgJd-ZVi9od-xl07Ob-lTBxed" href="#"><span>Select Language</span><img src="https://www.google.com/images/cleardot.gif" alt="" width="1" height="1"><span style="border-left: 1px solid rgb(187, 187, 187);">​</span><img src="https://www.google.com/images/cleardot.gif" alt="" width="1" height="1"><span aria-hidden="true" style="color: rgb(118, 118, 118);">▼</span></a></span></div></div></div>
					</div>
					<div class="col-12 col-lg-3 col-md-6">
						<div class="footer-static-block">
							<span class="opener plus"></span>
							<h3 class="head-three">Quick Help</h3>
							<ul class="footer-menu footer-block-contant">
								<li><a href="<?= base_url() ?>Home/privacy_policy">Privacy & Policy</a></li>
								<li><a href="<?= base_url() ?>Home/return_and_replace">Returns, Replace & Exchanges</a></li>
								<li><a href="<?= base_url() ?>Home/shipping_and_delivery">Shipping & Delivery</a></li>
								<li><a href="<?= base_url() ?>Home/terms_and_conditions">Terms & Conditions</a></li>
							</ul>
						</div>
					</div>
					<? if (!empty($this->session->userdata('user_data'))) { ?>
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
					<? } else { ?>
						<div class="col-12 col-lg-3 col-md-6">
							<div class="footer-static-block">
								<span class="opener plus"></span>
								<h3 class="head-three">My Account</h3>
								<ul class="footer-menu footer-block-contant">
									<li><a href="javascript:void(0)" data-toggle="modal" data-target="#LoginModel">Login</a></li>
									<li><a href="<?= base_url() ?>Home/about_us">About Us</a></li>
									<li><a href="<?= base_url() ?>Home/career">Career</a></li>
									<li><a  href="<?= base_url() ?>Home/reseller_register" >Partner with us</a></li>
								</ul>
							</div>
						</div>
					<? } ?>
					<div class="col-12 col-lg-3 col-md-6">
						<div class="footer-static-block">
							<span class="opener plus"></span>
							<h3 class="head-three">Contact us</h3>
							<div class="contact-box footer-block-contant">
								<ul>
									<li>
										<div class="contact-thumb">
											<img src="<?= base_url() ?>assets/frontend/img/address-icon.svg" alt=" ">
										</div>
										<div class="contact-box-detail">
											<p>Plot No. 81, Nandpuri-B, Near Mahima Panache , Jagatpura, Jaipur</p>
										</div>
									</li>
									<li>
										<div class="contact-thumb">
											<img src="<?= base_url() ?>assets/frontend/img/phone-icon.svg" alt=" ">
										</div>
										<div class="contact-box-detail" style="cursor: pointer;">
											<p>
												<a href="tel:+91-6377898988">+91-6377898988</a>
											</p>

											<p>
												<a href="tel:+0141-2988751">0141-2988751</a>
											</p>



										</div>
									</li>
									<li>
										<div class="contact-thumb">
											<img src="<?= base_url() ?>assets/frontend/img/mail-icon.svg" alt=" ">
										</div>
										<div class="contact-box-detail" style="cursor: pointer;">
											<p> <a href="mailto:info@poshida.in">info@poshida.in</a></p>
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

					</div>
				</div>
				<div class="col-12">
					<div class="social-media mt-3">
						<ul class="iconn">
							<li><a href="https://www.facebook.com/profile.php?id=61551728737337" target="_blank"><i class="fa fa-facebook"></i></a></li>
							<li><a href="https://www.pinterest.com/Poshida_/" target="_blank"><i class="fa fa-pinterest"></i></a></li>
							<li><a href="https://www.instagram.com/poshi.da/" target="_blank"><i class="fa fa-instagram"></i></a></li>
							<li><a href="https://www.linkedin.com/company/poshida/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="https://www.youtube.com/@Poshida_" target="_blank"><i class="fa fa-youtube"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>




	<div class="container">
		<div class="row copyright_text">
			<div class="col-md-12" style="text-align: center;
    align-items: center;
    display: flex;
    justify-content: center;">
				<p class="mt-2 mset">
					Copyright © <script>
						document.write(new Date().getFullYear())
					</script> <a href="poshida.in" style="text-transform: lowercase;"> POSHIDA.IN.ALL RIGHTS RESERVED.</a>
				</p>
			</div>
	
			<!-- <div class="col-md-4" style="text-align: center;
    align-items: center;
    display: flex;
    justify-content: center;">
				<p class="mb-0" style="margin-right: 5px;">Design & Developed by </p><a href="https://www.fineoutput.com"><b>
						Fineoutput
					</b> </a>
			</div>


			<div class="col-md-4" style="text-align: center;
    align-items: center;
    display: flex;
    justify-content: center;">
				<p class="mb-0" style="margin-right: 5px;">Marketing by </p><a href="https://digitaldukandaari.com/"><b>
						Digitaldukandaari
					</b> </a>
			</div> -->

		</div>

	</div>

	<a href="https://wa.me/+916377898988/" target="_blank" rel="noopener noreferrer" class="btn btn-success white fgdfdfgdf btn-lg mt-3 button-fixed-right green  desktopwhatsapp ">
		<i class="bi bi-whatsapp" style="font-size:30px;"></i>
	</a>
</footer>
<!-- //=================== Start Bottom Tabs ========================== -->
<div class="container-fluid mobilebottom" style="position:sticky; bottom: 0;background:#f2f2f2;z-index: 9999;" id="footerCount">
	<div class="row" style="justify-content: space-between;">

		<div class="col-2 text-center mt-2 p-0"><a href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/frontend/img/home.png"></a>
			<h6>Home</h6>
		</div>
		<? if (!empty($this->session->userdata('user_data'))) {
			$wishCount = $this->db->get_where('tbl_wishlist', array('user_id = ' => $this->session->userdata('user_id'), 'user_type', $this->session->userdata('user_type')))->num_rows(); ?>
			<div class="col-2 text-center mt-2 p-0"><a href="<?= base_url() ?>Home/my_profile"><img src="<?= base_url() ?>assets/frontend/img/user(3).png"></a>
				<h6>Account</h6>
			</div>
			<div class="col-2 text-center mt-2 p-0"><a href="<?= base_url() ?>Home/my_wishlist"><img src="<?= base_url() ?>assets/frontend/img/heart (6).png" class="width-custem"></a><span class="wishlist_count"><?= $wishCount; ?></span></a>
				<h6 class="coko-mar">Wishlist</h6>
			</div>
		<?
		} else { ?>
			<div class="col-2 text-center mt-2 p-0"><a href="javascript:void(0)" data-toggle="modal" data-target="#LoginModel"><img src="<?= base_url() ?>assets/frontend/img/user(3).png"></a>
				<h6>Login</h6>
			</div>
			<div class="col-2 text-center mt-2 p-0"><a href="javascript:void(0)" data-toggle="modal" data-target="#LoginModel"><img src="<?= base_url() ?>assets/frontend/img/heart (6).png" class="width-custem"></a><span class="wishlist_count">0</span></a>
				<h6 class="coko-mar">Wishlist</h6>
			</div>
		<? } ?>
		<?php $cartCount = 0;
		if (!empty($this->session->userdata('user_data'))) {
			$cartCount = $this->db->get_where('tbl_cart', array('user_id = ' => $this->session->userdata('user_id'), 'user_type' => $this->session->userdata('user_type')))->num_rows();
		} else {
			if (!empty($this->session->userdata('cart_data'))) {
				$cartCount = count($this->session->userdata('cart_data'));
			}
		}
		?>
		<div class="col-2 text-center mt-2 p-0"><a href="<?= base_url() ?>Home/my_bag">&nbsp;<img src="<?= base_url() ?>assets/frontend/img/bag.png" class=""></i><span class="cart_count" style="    top: -6px;
    left: -3px;"><?= $cartCount; ?></span></a>
			<h6>Bag</h6>
		</div>
		<div class="col-2 text-center mt-2 p-0"><a href="https://wa.me/+916377898988/" target="_blank" rel="noopener noreferrer" rel="noopener noreferrer"> <img src="<?= base_url() ?>assets/frontend/img/whatsapp.png"></a>
			<h6 style="margin-left:-10px;">Connect</h6>
		</div>
	</div>
</div>
<!-- //=================== End Bottom Tabs ========================== -->

<!-- ============================ Start login Model ========================================-->
<div class="modal fade" id="LoginModel" tabindex="-1" role="dialog" aria-labelledby="LoginModel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="popup_content pl-0 pr-0 pt-0">
				<button type="button" class="close p-2" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<div class="row text-left">
					<div class="col-sm-12 text-center mb-2">
						<img alt="Broken Image" src="<?= base_url() ?>assets/frontend/img/Poshida.jpg" class="logo-imah-1 qwd">

					</div>
				</div>
				<div class="popup-text" style="padding-left: 20px;padding-right: 20px;">
					<div class="heading_s1">
						<h4 class="text-center">LOG IN TO CONTINUE</h4>
					</div>
				</div>
				<!-- <form method="post" action="javascript:void(0)" id="loginForm" enctype="multipart/form-data" style="padding-left: 20px;padding-right: 20px;"> -->
				<form method="post" action="<?= base_url() ?>User/email_login" enctype="multipart/form-data" style="padding-left: 20px;padding-right: 20px;">
					<!-- <div class="form-group">
						<input name="number" required="" type="text" id="loginPhone" class="form-control rounded-0" onkeypress="return isNumberKey(event)" maxlength="10" minlength="10" placeholder="Enter Your Number">
						<input type="hidden" id="loginverify" value="0" name="loginverify">
					</div>
					<div class="form-group hidden-OTP-field">
						<input name="OTP" id="loginOTP" class="form-control rounded-0" type="text" onkeypress="return isNumberKey(event)" maxlength="6" minlength="6" placeholder="Enter OTP">
					</div> -->
					<div class="form-group">
						<input name="email" required="" type="email" class="form-control rounded-0" placeholder="Enter Your Email">
					</div>
					<div class="form-group">
						<input name="password" class="form-control rounded-0" type="password" placeholder="Enter Password">
					</div>
					<div class="container">
						<div class="row">
							<div class="col">
								<p style="margin-bottom: 3px;">By Continuing, I agree to the <a href="<?= base_url() ?>Home/terms_and_conditions" style="color: #c68fa6;">Terms of use</a>
									&amp; <a href="<?= base_url() ?>Home/privacy_policy" style="color: #c68fa6;">Privacy
										Policy</a></p>
							</div>
						</div>
					</div>
					<div class="form-group">
						<button class="btn btn-fill-out btn-block text-uppercase mt-2 rounded-0 btn-color " style="padding: 14px 18px;" type="submit">Submit</button>
					</div>
					<div class="text-center mb-3"><span class="mt-3 ">New Here?<a href="javascript:;" data-toggle="modal" data-target="#SignUpModel" style="color:#c68fa6;">&nbsp;Sign Up</a></span>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- ============================ End login Model ========================================-->
<!-- ============================ Start Sign Model ========================================-->

<div class="modal fade" id="SignUpModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
									<img alt="Broken Image" src="<?= base_url() ?>assets/frontend/img/Poshida.jpg" class="logo-imah-1 qwd">
								</div>
							</div>
							<div class="popup-text" style="padding-left: 20px;padding-right: 20px;">
								<div class="heading_s1">
									<h4 class="text-center">SIGN UP TO CONTINUE</h4>
								</div>
							</div>
							<!-- <form method="post" action="javascript:void(0)" id="registerForm" enctype="multipart/form-data" style="padding-left: 20px;padding-right: 20px;"> -->
							<form method="post" action="<?= base_url() ?>User/email_register" enctype="multipart/form-data" style="padding-left: 20px;padding-right: 20px;">
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
								<!-- <div class="form-group hidden-OTP-field">
									<input name="otp" type="text" id="signinOTP" class="form-control rounded-0" placeholder="Enter OTP">
								</div> -->
								<div class="form-group hidden-OTP-field">
									<input name="email" type="email" required class="form-control rounded-0" placeholder="Enter Email">
								</div>
								<div class="form-group hidden-OTP-field">
									<input name="password" type="password" required class="form-control rounded-0" placeholder="Enter Password">
								</div>
								<div class="container">
									<div class="row">
										<div class="col">
											<p style="margin-bottom: 3px;">By Continuing, I agree to the <a href="#" style="color: #c68fa6;">Terms of use</a> &amp; <a href="#" style="color: #c68fa6;">Privacy Policy</a></p>
										</div>
									</div>
								</div>
								<div class="form-group">
									<button class="btn btn-fill-out btn-block  btn-color  mt-2 text-uppercase rounded-0" style="padding: 14px 18px; " type="submit">Submit</button>
								</div>
								<div class="text-center"><span class="mt-3">Already have an Account?<a href="#" data-target="#onload-popup1" data-toggle="modal" data-dismiss="modal" style="color:#ed6f36;">&nbsp;Log In</a></span>
								</div>
								<p class="text-center" style="margin-bottom: 0px;">Or</p>
								<div class="text-center"><span class="mt-3"><a href="<?= base_url() ?>Home/reseller_register" style="color:#ed6f36;">Partner with us</a></span>
								</div>

							</form>
						</div>
					</div>
				</div>
			</div>


		</div>
	</div>
</div>
<!-- ============================ START POP MODEL ========================================-->
<? $popup_data = $this->db->get_where('tbl_popup_image', array('is_active = ' => 1))->result();
if (!empty($popup_data)) {
?>
	<div id="newslater-popup" class="mfp-hide white-popup-block open align-center">
		<div class="nl-popup-main" style="display: block;">
			<div class="nl-popup-inner">
				<div class="newsletter-inner">
					<div class="row" style="    justify-content: space-around;">
						<div class="col-md-5">
							<!-- <div class="background_bg h-100" data-img-src="<?= base_url() . $popup_data[0]->image ?>"></div> -->
							<img src="<?= base_url() . $popup_data[0]->image ?>" class="img-fluid image-respo" />
						</div>
						<div class="col-md-6">
							<div class="mtb-30" style="margin-top: 10px;">
								<div class="popup-text redsp">
									<?= $popup_data[0]->text; ?>
								</div>
								<form method="POST" action="<?= base_url() ?>Home/subscribe_to_popup" enctype="multipart/form-data">
									<div class="form-group">
										<input name="name" required type="text" placeholder="Enter Your Name">
									</div>
									<div class="form-group">
										<input name="phone" required type="text" maxlength="10" minlength="10" onkeypress="return isNumberKey(event)" placeholder="Enter Your Mobile Number">
									</div>
									<div class="form-group">
										<input name="email" type="email" required placeholder="Enter Your Email">
									</div>
									<div class="form-group">
										<button class="btn-color big-width btn" title="Subscribe" type="submit">Subscribe</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ============================ END POP MODEL ========================================-->
	</div>
<? } ?>

<!-- Footer section end -->
</div>
<script src="<?= base_url() ?>assets/frontend/js/jquery-3.4.1.min.js"></script>
<script src="<?= base_url() ?>assets/frontend/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/frontend/js/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>assets/frontend/js/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url() ?>assets/frontend/js/custom.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
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
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script src="<?= base_url() ?>assets/frontend/customJS/mixed.js"></script>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script>

<script>
	function isNumberKey(evt) {
		var charCode = (evt.which) ? evt.which : evt.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
		return true;
	}
</script>
<script>
	AOS.init();
</script>

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
	// AOS.init();
	var base_url = "<?= base_url() ?>"
</script>
<script>
	<? $popup_data = $this->db->get_where('tbl_popup_image', array('is_active = ' => 1))->result();
	if (!empty($popup_data)) {
	?>
		$(window).on('load', function() {
			var pageURL = $(location).attr("href");
			if (pageURL == base_url) {
				var visited = localStorage.getItem('visited');
				const now = new Date();
				if (visited === null) {
					const newD = now.getTime() + 1440 * 60000; // local storage set with plus 24 hours
					localStorage.setItem('visited', newD)
					jQuery.magnificPopup.open({
						items: {
							src: '#newslater-popup'
						},
						type: 'inline'
					}, 0);
				} else {
					if (now.getTime() > visited) {
						const newD = now.getTime() + 1440 * 60000; // local storage set with plus 24 hours
						localStorage.setItem('visited', newD)
						jQuery.magnificPopup.open({
							items: {
								src: '#newslater-popup'
							},
							type: 'inline'
						}, 0);
					}
				}
			}
		});

		// $(window).on('load', function() {
		// 	setTimeout(function() {
		// 		jQuery.magnificPopup.open({
		// 			items: {
		// 				src: '#newslater-popup'
		// 			},
		// 			type: 'inline'
		// 		}, 0);
		// 	}, 6000)
		// });
	<? } ?>
</script>

<script>
	function hello() {
		let element = document.getElementById("toggle");
		element.classList.toggle("no");
	}
</script>
<script src="<?= base_url() ?>assets/frontend/js/wow.min.js"></script>
<script src="<?= base_url() ?>assets/frontend/js/scripts.js"></script>
<script src="<?= base_url() ?>assets/frontend/js/bootstrap-notify.min.js"></script>
<script>
	new WOW().init();
</script>
</body>



</html>