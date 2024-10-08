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

	.sdgsdggsd {
		display: none;
	}

	@media(max-width:982px) {
		.sdgsdggsd {
			display: block !important;
			margin: 1rem;
		}
	}
</style>

<footer class="footer-part">
	<div class="container">
		<div class="footer-top ptb-60">
			<div class="mb_-30">
				<div class="row" style="align-items: baseline;">
					<div class="col-12 col-lg-3 col-md-6">
						<div class="footer-about mb-sm-30">
							<div class="footer-logo">
								<a rel="canonical" href="<?= base_url() ?>">
									<img src="<?= base_url() ?>assets/frontend/img/logo_update.jpg" alt="logo">
								</a>
							</div>

							<p class="footer-p text-footer-p " style="   
										font-size: 17px;
										font-weight: 600;
										margin-left :18px;
									">Grace In Every Stitch </p>
						</div>

						<div id="google_translate_element2" class=" sdgsdggsd ms-2"></div>
					</div>
					<div class="col-12 col-lg-3 col-md-6">
						<div class="footer-static-block">
							<span class="opener plus"></span>
							<h3 class="head-three">Quick Help</h3>
							<ul class="footer-menu footer-block-contant">
								<li><a rel="canonical" href="<?= base_url() ?>privacy_policy">Privacy & Policy</a></li>
								<li><a rel="canonical" href="<?= base_url() ?>return_and_replace">Returns, Replace & Exchanges</a></li>
								<li><a rel="canonical" href="<?= base_url() ?>shipping_and_delivery">Shipping & Delivery</a></li>
								<li><a rel="canonical" href="<?= base_url() ?>terms_and_conditions">Terms & Conditions</a></li>
							</ul>
						</div>
					</div>
					<? if (!empty($this->session->userdata('user_data'))) { ?>
						<div class="col-12 col-lg-3 col-md-6">
							<div class="footer-static-block">
								<span class="opener plus"></span>
								<h3 class="head-three">My Account</h3>
								<ul class="footer-menu footer-block-contant">
									<li><a rel="canonical" href="<?= base_url() ?>my_profile/order">Orders & Returns</a></li>
									<li><a rel="canonical" href="<?= base_url() ?>my_profile">Account Details</a></li>

								</ul>
							</div>
						</div>
					<? } else { ?>
						<div class="col-12 col-lg-3 col-md-6">
							<div class="footer-static-block">
								<span class="opener plus"></span>
								<h3 class="head-three">My Account</h3>
								<ul class="footer-menu footer-block-contant">
									<li><a rel="canonical" href="javascript:void(0)" data-toggle="modal" data-target="#LoginModel">Login</a></li>
									<li><a rel="canonical" href="<?= base_url() ?>about_us">About Us</a></li>
									<li><a rel="canonical" href="<?= base_url() ?>career">Career</a></li>
									<li><a rel="canonical" href="<?= base_url() ?>reseller_register">Partner With Us</a></li>
									<li class="level "><a rel="canonical" href="<?= base_url() ?>contact" class="nav-link">Contact</a></li>
									<li class="level "><a rel="canonical" href="<?= base_url() ?>blogs" class="nav-link">Blog</a></li>
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
											<p>Plot No. 81, Nandpuri- B, Near Mahima Panache, Jagatpura, Jaipur,
Rajasthan, 302017</p>
										</div>
									</li>
									<li>
										<div class="contact-thumb">
											<img src="<?= base_url() ?>assets/frontend/img/phone-icon.svg" alt=" ">
										</div>
										<div class="contact-box-detail" style="cursor: pointer;">
											<p>
												<a rel="canonical" href="tel:+916377898988">+91-6377898988</a>
											</p>
											<p>
												<a rel="canonical" href="tel:01412988751">01412988751</a>
											</p>
										</div>
									</li>
									<li>
										<div class="contact-thumb">
											<img src="<?= base_url() ?>assets/frontend/img/mail-icon.svg" alt=" ">
										</div>
										<div class="contact-box-detail" style="cursor: pointer;">
											<p> <a rel="canonical" href="mailto:merchandiser.ronaktextiles@gmail.com">merchandiser.ronaktextiles@gmail.com</a></p>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- <div class="mt-50" style="text-align: justify;">
				<p style="color: #c68fa6 !important; font-size: 16px;"><b> Popular Pages </b></p>
				<p>
					<a rel="canonical" href="<?= base_url() ?>" class="">Home</a>
					| <a rel="canonical" href="<?= base_url() ?>products/Womens-and-Girls/1" class=""> Women and Girls</a>
					| <a rel="canonical" href="<?= base_url() ?>products/A--LINE-KURTA/1" class=""> A-Line Kurta </a>
					|<a rel="canonical" href="<?= base_url() ?>products/ALIYA-CUT-KURTI/1" class="">Aliya Cut Kurtis</a>
					|<a rel="canonical" href="<?= base_url() ?>products/EMBROIDERY-KURTA/1" class="">Embroidery </a>
					| <a rel="canonical" href="<?= base_url() ?>products/EMBROIDERY-KURTA/1" class="">Kurta For Women </a>
					| <a rel="canonical" href="<?= base_url() ?>products/FLOOR-LENGTH-GOWN/1" class=""> Floor Length Gown For Women </a>
					| <a rel="canonical" href="<?= base_url() ?>products/KURTA-PANT-DUPATTA-SETS/1" class=""> Kurta Pant Dupatta </a>
					| <a rel="canonical" href="<?= base_url() ?>products/KURTA-PANT-DUPATTA-SETS/1" class=""> Sets </a>
					| <a rel="canonical" href="<?= base_url() ?>products/REGULAR-KURTI/1" class=""> Regular Kurti </a>
					| <a rel="canonical" href="<?= base_url() ?>products/Plazo/1" class=""> Plazo</a>
					| <a rel="canonical" href="<?= base_url() ?>products/Accessories/1" class=""> Accessories </a>
					| <a rel="canonical" href="<?= base_url() ?>products/Kids/1" class=""> Kids</a>
					| <a rel="canonical" href="<?= base_url() ?>products/Mens/1" class=""> Mens </a>
					| <a rel="canonical" href="<?= base_url() ?>products/Dresses/1" class=""> Dresses </a>
					| <a rel="canonical" href="<?= base_url() ?>reseller_register" class=""> Partner With Us </a>
					| <a rel="canonical" href="<?= base_url() ?>contact" class=""> Contact </a>
					| <a rel="canonical" href="<?= base_url() ?>return_and_replace" class=""> Return & Replace Shipping & Delivery </a>
					| <a rel="canonical" href="<?= base_url() ?>terms_and_conditions" class=""> Terms & Conditions </a>
					| <a rel="canonical" href="<?= base_url() ?>about_us" class=""> About Us</a>
					| <a rel="canonical" href="<?= base_url() ?>career" class=""> Career </a>
					| <a rel="canonical" href="<?= base_url() ?>blogs" class=""> Blog</a>
				</p>

			</div>
			<div class="mt-30" style="text-align: justify;">
				<p style="color: #c68fa6 !important; font-size: 16px;"><b> Popular Searches </b></p>
				<p>
					<a rel="canonical" href="<?= base_url() ?>" class="">Designer Kurta for Women</a>
					| <a rel="canonical" href="<?= base_url() ?>products/Womens-and-Girls/1" class=""> Kurti Designs for Women </a>
					| <a rel="canonical" href="<?= base_url() ?>products/Womens-and-Girls/1" class=""> jaipur kurti A Line Kurta for Women </a>
					| <a rel="canonical" href="<?= base_url() ?>products/A--LINE-KURTA/1" class=""> A Line Kurta for Women </a>
					|<a rel="canonical" href="<?= base_url() ?>products/Womens-and-Girls/1" class="">Stylish Kurti for Women</a>
					| <a rel="canonical" href="<?= base_url() ?>products/FLOOR-LENGTH-GOWN/1" class="">Foor Length Gown for Women</a>
					| <a rel="canonical" href="<?= base_url() ?>blogs" class="">Cotton Kurtis for Women </a>
					| <a rel="canonical" href="<?= base_url() ?>blogs" class=""> Cotton Kurtis for Daily Wear </a>
					| <a rel="canonical" href="<?= base_url() ?>products/KURTA-PANT-DUPATTA-SETS/1" class=""> Latest Kurti design </a>
					| <a rel="canonical" href="<?= base_url() ?>products/A--LINE-KURTA/1" class=""> Festival Kurta for Women </a>
					| <a rel="canonical" href="<?= base_url() ?>blogs" class=""> Casual Kurti for Women</a>
					| <a rel="canonical" href="<?= base_url() ?>products/EMBROIDERY-KURTA/1" class="">Cotton Embroidery Kurta</a>
					| <a rel="canonical" href="<?= base_url() ?>products/FLOOR-LENGTH-GOWN/1" class=""> Stylish Gown for Women</a>
					| <a rel="canonical" href="<?= base_url() ?>products/Womens-and-Girls/1" class=""> Kurtis Online Designer Kurta</a>
					| <a rel="canonical" href="<?= base_url() ?>products/A--LINE-KURTA/1" class=""> A Line Kurta</a>
					| <a rel="canonical" href="<?= base_url() ?>products/A--LINE-KURTA/1" class=""> Buy Kurta Online</a>
					| <a rel="canonical" href="<?= base_url() ?>products/FLOOR-LENGTH-GOWN/1" class=""> Floor Length Gown</a>
					| <a rel="canonical" href="<?= base_url() ?>products/FLOOR-LENGTH-GOWN/1" class=""> Printed Kurti</a>
					| <a rel="canonical" href="<?= base_url() ?>products/EMBROIDERY-KURTA/1" class=""> Embroidery Kurta for Women</a>
					| <a rel="canonical" href="<?= base_url() ?>products/FLOOR-LENGTH-GOWN/1" class=""> Latest Gown Design</a>
					| <a rel="canonical" href="<?= base_url() ?>products/FLOOR-LENGTH-GOWN/1" class=""> Festival Wear Gown</a>
					| <a rel="canonical" href="<?= base_url() ?>" class=""> Designer Gown for Women</a>
					| <a rel="canonical" href="<?= base_url() ?>products/ALIYA-CUT-KURTI/1" class=""> Aliya Cut Kurtis</a>
				</p>

			</div>
			<div class="mt-10" style="text-align: justify;">
				<p style="color: #c68fa6 !important; font-size: 16px;"><b> Popular Products </b></p>
				<p>
					<a rel="canonical" href="<?= base_url() ?>products/A--LINE-KURTA/1" class=""><b> A Line Kurta </b></a>
					<br>

					<a rel="canonical" href="<?= base_url() ?>products/A--LINE-KURTA/1" class="">AQUA FESTIVAL WEAR KURTA</a>
					| <a rel="canonical" href="<?= base_url() ?>products/A--LINE-KURTA/1" class=""> MUSTARD FESTIVAL WEAR KURTA </a>
					| <a rel="canonical" href="<?= base_url() ?>product_detail/PEACH-FESTIVAL-WEAR-KURTA?type=NjUw" class=""> PEACH FESTIVAL WEAR KURTA </a>
					| <a rel="canonical" href="<?= base_url() ?>product_detail/FUSCHIA-AMIRA--EMBROIDERY-KURTA?type=NjU1" class=""> FUSCHIA AMIRA EMBROIDERY KURTA </a>
				</p>

			</div>
			<div class="mt-10" style="text-align: justify;">

				<a rel="canonical" href="<?= base_url() ?>products/ALIYA-CUT-KURTI/1" class=""><b> Aliya Cut Kurtis </b></a>
				<br>

				<a rel="canonical" href="<?= base_url() ?>product_detail/BLACK-ALIYA-KURTI?type=NTc1" class="">BLACK ALIYA KURTI</a>
				| <a rel="canonical" href="<?= base_url() ?>product_detail/RED-ALIYA-KURTI?type=NTgw" class=""> RED ALIYA KURTI </a>
				| <a rel="canonical" href="<?= base_url() ?>product_detail/AQUA-ALIYA-KURTI?type=NTg1" class=""> AQUA ALIYA CUT KURTI</a>
				| <a rel="canonical" href="<?= base_url() ?>product_detail/PEACH-ALIYA-KURTI?type=NTkw" class=""> PEACH ALIYA CUT KURTI </a>
				| <a rel="canonical" href="<?= base_url() ?>product_detail/NAVY-BLUE-ALIYA-KURTI?type=NTk1" class=""> NAVY BLUE ALIYA CUT KURTI</a>
				| <a rel="canonical" href="<?= base_url() ?>product_detail/TEAL-BLUE-ALIYA-KURTI?type=NjAw" class=""> LEMON ALIYA CUT KURTI </a>
				</p>

			</div>
			<div class="mt-10" style="text-align: justify;">

				<a rel="canonical" href="<?= base_url() ?>products/EMBROIDERY-KURTA/1" class=""><b>Embroidery Kurta</b></a>
				<br>
				<a rel="canonical" href="<?= base_url() ?>product_detail/GREEN-ELEGANT-KURTA?type=NTUw" class="">GREEN ELEGANT KURTA</a>
				| <a rel="canonical" href="<?= base_url() ?>product_detail/MUSTARD-ELEGANT-KURTA?type=NTU1" class=""> MUSTARD ELEGANT KURTA</a>
				| <a rel="canonical" href="<?= base_url() ?>product_detail/PEACH-ELEGANT-KURTA?type=NTYw" class=""> PEACH ELEGANT KURTA</a>

				</p>

			</div>
			<div class="mt-20" style="text-align: justify;">
				<p style="color: #c68fa6 !important; font-size: 20px;"><b> Best Online Kurti Shopping Site in India </b></p>
				<p style="
					text-align: justify;">
					Welcome to<a rel="canonical" href="<?= base_url() ?>" class="" style="color: #c68fa6 !important; "> Poshida By Ronak Textiles </a> – Your Premier Destination for the Best Online Kurti
					Shopping Experience in India! At Poshida By Ronak Textiles, we blend tradition and style seamlessly,
					offering a diverse collection of kurtis designed for the modern woman who appreciates
					elegance and comfort.
				</p>

			</div>
			<div class="mt-20" style="text-align: justify;">
				<p style="color: #c68fa6 !important; font-size: 16px;"><b>Embrace Tradition with Poshida By Ronak Textiles Kurtis:</b></p>
				<p style="display: flex;
				text-align: justify;">
					Immerse yourself in the rich tapestry of Indian tradition with Poshida By Ronak Textiles. Our
					curated kurtis collection pays homage to India's cultural heritage, featuring exquisite designs
					that reflect the timeless beauty of traditional craftsmanship. Embrace the essence of tradition
					with every kurti from Poshida By Ronak Textiles.
				</p>

			</div>
			<div class="mt-20" style="text-align: justify;">
				<p style="color: #c68fa6 !important; font-size: 16px;"><b>
						Elevate Your Wardrobe with Exclusive Designs:</b></p>
				<p style="
						text-align: justify;">
					Discover a world of exclusive designs that elevate your wardrobe to new heights. At Poshida
					Fashions LLP, we take pride in offering kurtis that are not just pieces of clothing but
					expressions of individuality. From Jaipur kurtis to <a rel="canonical" href="<?= base_url() ?>" class="" style="color: #c68fa6 !important; "> Stylish kurtis for women</a> , each design is
					crafted to make you stand out, ensuring your wardrobe is a testament to your unique style.
				</p>

			</div>
			<div class="mt-20" style="text-align: justify;">
				<p style="color: #c68fa6 !important; font-size: 16px;"><b>
						Seamless Shopping at Your Fingertips:</b></p>
				<p style="
					text-align: justify;">
					Experience the convenience of seamless shopping with Poshida By Ronak Textiles. Our user-friendly website ensures that exploring our extensive collection, featuring <a rel="canonical" href="<?= base_url() ?>" class="" style="color: #c68fa6 !important; "> kurti designs for
						women </a> , cotton kurtis for daily wear, and the latest kurti designs, is a breeze. With just a few
					clicks, you can have your favourite kurtis delivered to your doorstep, making fashion
					effortlessly accessible.
				</p>

			</div>
			<div class="mt-20" style="text-align: justify;">
				<p style="color: #c68fa6 !important; font-size: 16px;"><b>
						Quality Assurance for Your Style:</b></p>
				<p style="display: flex;
						text-align: justify;">
					Poshida By Ronak Textiles is synonymous with quality assurance. Our kurtis are crafted with
					precision and attention to detail because your style deserves the best. From the selection of
					fabrics to the final stitch, our commitment to quality ensures that each piece you choose is a
					testament to enduring style and comfort.
				</p>

			</div>
			<div class="mt-20" style="text-align: justify;">
				<p style="color: #c68fa6 !important; font-size: 16px;"><b>
						Support Creativity and Get Rewarded:</b></p>
				<p style="
						text-align: justify;">
					At Poshida By Ronak Textiles, we believe in supporting creativity. When you choose our kurtis,
					you not only enhance your style but also contribute to the promotion of traditional
					craftsmanship. As a token of appreciation, we offer rewards that reflect our gratitude for
					supporting the creative spirit behind each meticulously designed kurti in our collection.
					Poshida By Ronak Textiles invites you to explore the world of <a rel="canonical" href="<?= base_url() ?>" class="" style="color: #c68fa6 !important; "> kurtis online </a> , where tradition
					meets contemporary style, and every piece tells a story. Elevate your wardrobe with our
					exclusive designs, experience the ease of seamless shopping, and support creativity with
					every purchase. Embrace tradition and elevate your style – choose Poshida By Ronak Textiles for
					a genuinely exceptional kurti shopping experience.
				</p>

			</div> -->
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
							<li><a rel="canonical" href="https://www.facebook.com/profile.php?id=61551728737337" target="_blank"><i class="fa fa-facebook"></i></a></li>
							<li><a rel="canonical" href="https://www.pinterest.com/Poshida_/" target="_blank"><i class="fa fa-pinterest"></i></a></li>
							<li><a rel="canonical" href="https://www.instagram.com/poshida_in/?igsh=enBlZ3U0eWI5amRp" target="_blank"><i class="fa fa-instagram"></i></a></li>
							<li><a rel="canonical" href="https://www.linkedin.com/company/poshida/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
							<li><a rel="canonical" href="https://www.youtube.com/@Poshida_" target="_blank"><i class="fa fa-youtube"></i></a></li>
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
					</script> <a rel="canonical" href="poshida.in" style="text-transform: lowercase;"> POSHIDA.IN.ALL RIGHTS RESERVED.</a>
				</p>
			</div>

			<!-- <div class="col-md-4" style="text-align: center;
    align-items: center;
    display: flex;
    justify-content: center;">
				<p class="mb-0" style="margin-right: 5px;">Design & Developed by </p><a rel="canonical" href="https://www.fineoutput.com"><b>
						Fineoutput
					</b> </a>
			</div>


			<div class="col-md-4" style="text-align: center;
    align-items: center;
    display: flex;
    justify-content: center;">
				<p class="mb-0" style="margin-right: 5px;">Marketing by </p><a rel="canonical" href="https://digitaldukandaari.com/"><b>
						Digitaldukandaari
					</b> </a>
			</div> -->

		</div>

	</div>

	<a rel="canonical" href="https://wa.me/+916377898988/" target="_blank" rel="noopener noreferrer" class="btn btn-success white fgdfdfgdf btn-lg mt-3 button-fixed-right green  desktopwhatsapp ">
		<i class="bi bi-whatsapp" style="font-size:30px;"></i>
	</a>
</footer>
<!-- //=================== Start Bottom Tabs ========================== -->
<div class="container-fluid mobilebottom" style="position:sticky; bottom: 0;background:#f2f2f2;z-index: 9999;" id="footerCount">
	<div class="row" style="justify-content: space-between;">

		<div class="col-2 text-center mt-2 p-0"><a rel="canonical" href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/frontend/img/home.png"></a>
			<h6>Home</h6>
		</div>
		<? if (!empty($this->session->userdata('user_data'))) {
			$wishCount = $this->db->get_where('tbl_wishlist', array('user_id = ' => $this->session->userdata('user_id'), 'user_type', $this->session->userdata('user_type')))->num_rows(); ?>
			<div class="col-2 text-center mt-2 p-0"><a rel="canonical" href="<?= base_url() ?>my_profile"><img src="<?= base_url() ?>assets/frontend/img/user(3).png"></a>
				<h6>Account</h6>
			</div>
			<div class="col-2 text-center mt-2 p-0"><a rel="canonical" href="<?= base_url() ?>my_wishlist"><img src="<?= base_url() ?>assets/frontend/img/heart (6).png" class="width-custem"></a><span class="wishlist_count"><?= $wishCount; ?></span></a>
				<h6 class="coko-mar">Wishlist</h6>
			</div>
		<?
		} else { ?>
			<div class="col-2 text-center mt-2 p-0"><a rel="canonical" href="javascript:void(0)" data-toggle="modal" data-target="#LoginModel"><img src="<?= base_url() ?>assets/frontend/img/user(3).png"></a>
				<h6>Login</h6>
			</div>
			<div class="col-2 text-center mt-2 p-0"><a rel="canonical" href="javascript:void(0)" data-toggle="modal" data-target="#LoginModel"><img src="<?= base_url() ?>assets/frontend/img/heart (6).png" class="width-custem"></a><span class="wishlist_count">0</span></a>
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
		<div class="col-2 text-center mt-2 p-0"><a rel="canonical" href="<?= base_url() ?>my_bag">&nbsp;<img src="<?= base_url() ?>assets/frontend/img/bag.png" class=""></i><span class="cart_count" style="    top: -6px;
    left: -3px;"><?= $cartCount; ?></span></a>
			<h6>Bag</h6>
		</div>
		<div class="col-2 text-center mt-2 p-0"><a rel="canonical" href="https://wa.me/+916377898988/" target="_blank" rel="noopener noreferrer" rel="noopener noreferrer"> <img src="<?= base_url() ?>assets/frontend/img/whatsapp.png"></a>
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
						<img alt="Broken Image" src="<?= base_url() ?>assets/frontend/img/logo_update.jpg" class="logo-imah-1 qwd">

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
								<p style="margin-bottom: 3px;">By Continuing, I agree to the <a rel="canonical" href="<?= base_url() ?>terms_and_conditions" style="color: #c68fa6;">Terms of use</a>
									&amp; <a rel="canonical" href="<?= base_url() ?>privacy_policy" style="color: #c68fa6;">Privacy
										Policy</a></p>
							</div>
						</div>
					</div>
					<div class="form-group">
						<button class="btn btn-fill-out btn-block text-uppercase mt-2 rounded-0 btn-color " style="padding: 14px 18px;" type="submit">Submit</button>
					</div>
					<div class="text-center">
						<a rel="canonical" href="javascript:void(0);" data-toggle="modal" data-dismiss="modal" data-target="#ForgotModel" style="color:#c68fa6;">&nbsp;Forgot Password</a>
					</div>
					<div class="text-center mb-3"><span class="mt-3 ">New Here?<a rel="canonical" href="javascript:;" data-toggle="modal" data-dismiss="modal" data-target="#SignUpModel" style="color:#c68fa6;">&nbsp;Sign Up</a></span>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- ============================ End login Model ========================================-->

<!-- ============================ Start Forgot Model ========================================-->
<div class="modal fade" id="ForgotModel" tabindex="-1" role="dialog" aria-labelledby="ForgotModel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="popup_content pl-0 pr-0 pt-0">
				<button type="button" class="close p-2" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<div class="row text-left">
					<div class="col-sm-12 text-center mb-2">
						<img alt="Broken Image" src="<?= base_url() ?>assets/frontend/img/logo_update.jpg" class="logo-imah-1 qwd">

					</div>
				</div>
				<div class="popup-text" style="padding-left: 20px;padding-right: 20px;">
					<div class="heading_s1">
						<h4 class="text-center">FORGOT PASSWORD</h4>
					</div>
				</div>
				<!-- <form method="post" action="javascript:void(0)" id="loginForm" enctype="multipart/form-data" style="padding-left: 20px;padding-right: 20px;"> -->
				<form method="post" action="<?= base_url() ?>User/form_submit_forgot_password" enctype="multipart/form-data" style="padding-left: 20px;padding-right: 20px;">
					<div class="form-group">
						<input name="reset_email" required="" type="email" class="form-control rounded-0" placeholder="Enter Your Email">
					</div>
					<div class="form-group">
						<button class="btn btn-fill-out btn-block text-uppercase mt-2 rounded-0 btn-color " style="padding: 14px 18px;" type="submit">Forgot Password</button>
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
									<img alt="Broken Image" src="<?= base_url() ?>assets/frontend/img/logo_update.jpg" class="logo-imah-1 qwd">
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
											<p style="margin-bottom: 3px;">By Continuing, I agree to the <a rel="canonical" href="#" style="color: #c68fa6;">Terms of use</a> &amp; <a rel="canonical" href="#" style="color: #c68fa6;">Privacy Policy</a></p>
										</div>
									</div>
								</div>
								<div class="form-group">
									<button class="btn btn-fill-out btn-block  btn-color  mt-2 text-uppercase rounded-0" style="padding: 14px 18px; " type="submit">Submit</button>
								</div>
								<div class="text-center"><span class="mt-3">Already have an Account?<a rel="canonical" href="#" data-target="#onload-popup1" data-toggle="modal" data-dismiss="modal" data-dismiss="modal" style="color:#ed6f36;">&nbsp;Log In</a></span>
								</div>
								<p class="text-center" style="margin-bottom: 0px;">Or</p>
								<div class="text-center"><span class="mt-3"><a rel="canonical" href="<?= base_url() ?>reseller_register" style="color:#ed6f36;">Partner With Us</a></span>
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
<script src="<?= base_url() ?>assets/frontend/js/bootstrap-notify.min.js"></script>
<!-- <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> -->

<!-- <script type="text/javascript">
	var x = window.matchMedia("(max-width: 700px)")
	if (x.matches) { // If media query matches
		function googleTranslateElementInit() {
			new google.translate.TranslateElement({
				pageLanguage: 'en'
			}, 'google_translate_element2');
		}
	} else {
		function googleTranslateElementInit() {
			new google.translate.TranslateElement({
				pageLanguage: 'en',
				layout: google.translate.TranslateElement.InlineLayout.SIMPLE
			}, 'google_translate_element');
		}
	}
</script> -->

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

	function hello2() {
		let element = document.getElementById("toggle2");
		element.classList.toggle("no");
	}
</script>
<script src="<?= base_url() ?>assets/frontend/js/wow.min.js"></script>
<script src="<?= base_url() ?>assets/frontend/js/scripts.js"></script>
<script>
	new WOW().init();
</script>
<script type="text/javascript" id="zsiqchat">
	var $zoho = $zoho || {};
	$zoho.salesiq = $zoho.salesiq || {
		widgetcode: "siq5343e55130ae0e3fdad07478dd8ae4afb9394aa9a93c6a25ea9bb16bce3c9011",
		values: {},
		ready: function() {}
	};
	var d = document;
	s = d.createElement("script");
	s.type = "text/javascript";
	s.id = "zsiqscript";
	s.defer = true;
	s.src = "https://salesiq.zohopublic.in/widget";
	t = d.getElementsByTagName("script")[0];
	t.parentNode.insertBefore(s, t);
</script>
</body>



</html>