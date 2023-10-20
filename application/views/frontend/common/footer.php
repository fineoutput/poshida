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

	.popup-text.redsp{
		margin-bottom: 18px;
    font-weight: 700;
    font-size: 23px;

	}

	#newslater-popup .newsletter-inner input {
    border: none;
    width: 100%;
    padding: 10px;
    margin-bottom: 0px;
}


* {
	outline: none !important;
	list-style: none !important;
	text-decoration: none !important;
}

body,
html {
	height: 100%;
	margin: 0;
	padding: 0;
}

body {
	line-height: 24px;
	color: #464646;
	font-size: 14px;
	font-family: 'Montserrat', sans-serif !important;
	font-weight: 400;
	letter-spacing: 0px;
	position: relative;
}

.container {
	padding-left: 0;
	padding-right: 0;
}

.no-js #loader {
	display: none;
}


a:hover {
	color: #0056b3;
	text-decoration: underline;
}

.btn {
	display: inline-block;
	font-weight: 400;
	color: #212529;
	text-align: center;
	vertical-align: middle;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
	background-color: transparent;
	border: 1px solid transparent;
	padding: .375rem .75rem;
	font-size: 1rem;
	line-height: 1.5;
	border-radius: .25rem;
	transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}

@media (prefers-reduced-motion:reduce) {
	.btn {
		transition: none;
	}
}

.btn:hover {
	color: #212529;
	text-decoration: none;
}

.btn:focus {
	outline: 0;
	box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .25);
}

.btn:disabled {
	opacity: .65;
}

.btn:not(:disabled):not(.disabled) {
	cursor: pointer;
}

.btn-success {
	color: #fff;
	background-color: #28a745;
	border-color: #28a745;
}

.btn-success:hover {
	color: #fff;
	background-color: #218838;
	border-color: #1e7e34;
}

.btn-success:focus {
	color: #fff;
	background-color: #218838;
	border-color: #1e7e34;
	box-shadow: 0 0 0 .2rem rgba(72, 180, 97, .5);
}

.btn-success:disabled {
	color: #fff;
	background-color: #28a745;
	border-color: #28a745;
}

.btn-success:not(:disabled):not(.disabled):active {
	color: #fff;
	background-color: #1e7e34;
	border-color: #1c7430;
}

.btn-success:not(:disabled):not(.disabled):active:focus {
	box-shadow: 0 0 0 .2rem rgba(72, 180, 97, .5);
}

.btn-lg {
	padding: .5rem 1rem;
	font-size: 1.25rem;
	line-height: 1.5;
	border-radius: .3rem;
}


.ion-social-whatsapp:before {
	display: inline-block;
	font-family: "Ionicons";
	speak: none;
	font-style: normal;
	font-weight: normal;
	font-variant: normal;
	text-transform: none;
	text-rendering: auto;
	line-height: 1;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
}

.ion-social-whatsapp:before {
	content: "\f4f0";
}


a {
	color: #292b2c;
	text-decoration: none;
	-webkit-transition: all 0.3s ease-in-out;
	transition: all .3s ease-in-out;
}

a:hover {
	color: #FF324D;
	text-decoration: none;
}

a:focus {
	outline: none;
}

.btn:focus,
.btn:hover {
	box-shadow: none;
	outline: medium none;
}

.btn {
	border-width: 1px;
	cursor: pointer;
	line-height: normal;
	padding: 12px 35px;
	text-transform: capitalize;
	transition: all 0.3s ease-in-out;
}

.btn:active:focus {
	box-shadow: none !important;
}

.btn i {
	font-size: 16px;
	margin-right: 2px;
	vertical-align: middle;
	line-height: 1;
}

.btn-lg {
	padding: 16px 45px;
}

.btn.btn-lg i {
	font-size: 22px;
}

.icon {
	margin-bottom: 15px;
}

@media (max-width: 991px) {
	.desktopwhatsapp {
		display: none;
	}
}

.button-fixed-right {
	position: fixed;
	bottom: 20px;
	right: 10px;
	border-radius: 50% !important;
	padding: 7px 9px !important;
	z-index: 999;
}

.button-fixed-right {
	position: fixed;
	bottom: 20px;
	right: 28px;
	border-radius: 50% !important;
	padding: 7px 9px !important;
	z-index: 999;
}


@media only screen and (max-width: 575px) {
	.btn {
		padding: 10px 28px;
		font-size: 14px;
	}

	.btn-lg {
		padding: 14px 38px;
		font-size: 18px;
	}

	.btn.btn-lg i {
		font-size: 20px;
	}
}

@media only screen and (max-width: 380px) {
	.btn {
		padding: 8px 24px;
	}

	.btn-lg {
		padding: 12px 34px;
		font-size: 16px;
	}

	.btn.btn-lg i {
		font-size: 18px;
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
							
							<p class="footer-p " style="    text-align: center !important;
    font-size: 17px;
    font-weight: 600;
">Grace In Every Stitch </p>
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
											<img src="<?= base_url() ?>assets/frontend/img/address-icon.svg" alt="xpoge">
										</div>
										<div class="contact-box-detail">
											<p>Plot No. 81, Nandpuri-B, Near Mahima Panschap, Jagatpura, Jaipur</p>
										</div>
									</li>
									<li>
										<div class="contact-thumb">
											<img src="<?= base_url() ?>assets/frontend/img/phone-icon.svg" alt="xpoge">
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
											<img src="<?= base_url() ?>assets/frontend/img/mail-icon.svg" alt="xpoge">
										</div>
										<div class="contact-box-detail" style="cursor: pointer;">
											<p> <a href="mailto:Poshida.ronak@gmail.com">Poshida.ronak@gmail.com</a></p>
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
							<li><a href="https://www.facebook.com/profile.php?id=61551728737337" target="_blank"><i class="fa fa-facebook"></i></a></li>
							<li><a href="https://www.pinterest.com/Poshida_/" target="_blank"><i class="fa fa-pinterest"></i></a></li>
							<li><a href="https://www.instagram.com/poshi.da/" target="_blank"><i class="fa fa-instagram"></i></a></li>
							<li><a href="https://www.linkedin.com/company/poshida/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>




	<div class="container">
		<div class="row copyright_text">
			<div class="col-md-4" style="text-align: center;
    align-items: center;
    display: flex;
    justify-content: center;">
				<p class="mt-2 mset">
					Copyright © <script>
						document.write(new Date().getFullYear())
					</script> <a href="poshida.in" style="text-transform: lowercase;"> POSHIDA.IN.ALL RIGHTS RESERVED.</a>
				</p>
			</div>
			<div class="col-md-4" style="text-align: center;
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
			</div>

		</div>

	</div>

	<a href="https://wa.me/+916377898988/" target="_blank" rel="noopener noreferrer" class="btn btn-success white fgdfdfgdf btn-lg mt-3 button-fixed-right green  desktopwhatsapp ">
		<i class="icon ion-social-whatsapp" style="font-size:30px;"></i>
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
									<input name="email" type="email" class="form-control rounded-0" placeholder="Enter Email">
								</div>
								<div class="form-group hidden-OTP-field">
									<input name="password" type="password" class="form-control rounded-0" placeholder="Enter Password">
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
							<img src="<?= base_url() . $popup_data[0]->image ?>" class="img-fluid"/>
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
<script src="<?= base_url() ?>assets/frontend/customJS/mixed.js"></script>
<script>
	AOS.init();
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
	// 	}, 1000)
	// });
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