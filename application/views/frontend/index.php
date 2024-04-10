
  <!-- ===================== Start Mobile Category =================================== -->
  <div style="margin-top: 79px;" class="product-sliders owl-carousel position-initial d-scs">
  	<?php $i = 1;
		foreach ($category_data->result() as $category) { ?>
  		<div class="item">
  			<a rel="canonical" href="<?= base_url() ?>products/<?= $category->url ?>/1"><img src="<?= base_url() . $category->image2 ?>" alt=""> </a>
  		</div>
  	<? } ?>
  </div>
  <!-- ================== End Mobile Category ===================================== -->
  <!-- ============================= START SLIDER  =================================== -->
  <section id="banner-part" class="menu-section pb-100">
  	<div class="banner  owl-loaded owl-drag main-banner owl-carousel main-baner ">
  		<?php $a = 0;
			foreach ($slider_data->result() as $slider) { ?>
  			<div class="banner-1 bhbh">
  				<a rel="canonical" href="<?= $slider->link; ?>"><img class="d-none d-md-block " src="<?= base_url() . $slider->image ?>" alt="Image not found"></a>
  				<a rel="canonical" href="<?= $slider->link; ?>"><img class="d-block d-md-none fb" src="<?= base_url() . $slider->image2 ?>" alt="Image not found"></a>
  			</div>
  		<?php $a++;
			} ?>
  	</div>
  </section>
  <!-- ============================= END SLIDER  =================================== -->

  <!-- =========================== START WHATS NEW  =================================== -->

  <section class="product-section pb-100">
  	<div class="container">
  		<div class="row">
  			<div class="col-12">
  				<div class="heading-part text-center mb-30 mb-sm-20">
  					<h2 class="main_title">What's New</h2>
  				</div>
  			</div>
  		</div>
  		<div class="position-r mb-5">
  			<div class="row">
  				<div class="product-slider owl-carousel position-initial">

  					<?php $i = 1;
						foreach ($whats_data->result() as $whats) {
							$type_datas = $this->db->get_where('tbl_type', array('product_id = ' => $whats->id, 'is_active' => 1, 'color_active' => 1, 'size_active' => 1));
							$type_data = $type_datas->result();
							if (!empty($type_data)) {
								if ($whats->product_view == 3) {
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
								} elseif ($whats->product_view == 2) {
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
  										<? if ($whats->exclusive == 1) { ?><div class="sale-label"><span>Exclusive</span></div><? } ?>
  										<a rel="canonical" href="<?= base_url() ?>product_detail/<?= $whats->url ?>?type=<?= base64_encode($type_data[0]->id) ?>">
  											<img src="<?= base_url() . $type_data[0]->image ?>" alt=" ">
  										</a>
  									</div>
  									<div class="product-details-outer">
  										<div class="product-details">
  											<div class="product-title">
  												<a rel="canonical" href="#"><?= $whats->name ?></a>
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
													$more = 0;
													$size_arr = [];
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
  																	<a rel="canonical" href="<?= base_url() ?>product_detail/<?= $whats->url ?>?type=<?= base64_encode($type_size->id) ?>"> <?= $size_data->name ?> <p style="margin-bottom:0; padding: 0px 10px;">|</p> </a>
  																</li>
  													<?php }
															}
														} else {
															$more++;
														}
														$i++;
													}
													if ($more > 0) {
														?>
  													<li class="icon ivo-ho compare-icon">
  														<a rel="canonical" href="<?= base_url() ?>product_detail/<?= $whats->url ?>?type=<?= base64_encode($type_data[0]->id) ?>"> +<?= $more ?></a>
  													</li>
  												<? } ?>
  											</ul>
  										</div>
  									</div>
  								</div>
  							</div>
  					<?php }
							$i++;
						}  ?>

  				</div>
  			</div>
  		</div>
  	</div>
  </section>

  <!-- =========================== END WHATS NEW  =================================== -->

  <!-- <div class="container mb-2">
  	<div class="row" style="justify-content: center;">
  		<img src="<?= base_url() ?>assets/frontend/img/add.gif" alt="">
  	</div>
  </div> -->

  <!-- ======================= START FIRST BIG BANNER SECTION  ======================== -->
  <? if (!empty($banner_data[0])) { ?>
  	<section class="pb-100 ">
  		<div>
  			<img src="<?= base_url() . $banner_data[0]->image ?>" alt="">
  		</div>
  	</section>
  <? } ?>
  <!-- ======================= END FIRST BIG BANNER SECTION  ======================== -->
  <!-- ======================= START  BANNER SECTION  ======================== -->

  <div class="sub-banner-part pb-100">
  	<div class="container-fluid">
  		<div class="row">
  			<?php $i = 0;
				$a = 0;
				$numItems = count($banner_data);
				foreach ($banner_data as $key => $banner) {
					if ($i != 0 && $i != ($numItems - 1) && $a <= 11) {
				?>
  					<div class="col-lg-3 col-4 col-md-4 p-0">
  						<div class="sub-banner-box wow bounceInLeft mb-0">
  							<a rel="canonical" href="<?= $banner->link ?>">
  								<img class=" witbgt" src="<?= base_url() . $banner->image ?>" alt="Broken Image">
  							</a>
  						</div>
  					</div>
  			<?php $a++;
					}
					$i++;
				} ?>
  		</div>
  	</div>
  </div>
  <!-- ======================= END BANNER SECTION  ======================== -->


  <!-- ======================= START SHOP BY CATEGORIES  ======================== -->

  <section class="product-section pb-100">
  	<div class="container">
  		<div class="row">
  			<div class="col-12">

  				<div class="heading-part text-center mb-30 mb-sm-20">
  					<h2 class="main_title">Shop By Categories</h2>
  				</div>
  			</div>
  		</div>
  		<div class="position-r mb-5">
  			<div>
  				<div class="row catrty owl-carousel">
  					<?php $i = 1;
						foreach ($shop_by_category_data->result() as $category) { ?>
  						<div class=" item">
  							<a rel="canonical" href="<?= $category->link ?>"><img src="<?= base_url() . $category->image ?>" alt="<?= $category->name ?>" alt="Broken Image">
  								<!-- <div class="product-title hellooo">
  									<?= $category->name ?>
  								</div> -->
  							</a>
  						</div>
  					<?php $i++;
						} ?>
  				</div>
  			</div>
  		</div>
  	</div>
  </section>
  <!-- ======================= END SHOP BY CATEGORIES  ======================== -->
  
  <!-- ======================== START TRENDING PRODUCTS ====================== -->
  <section class="product-section pb-100">
  	<div class="container">
  		<div class="row">
  			<div class="col-12">
  				<div class="heading-part text-center mb-30 mb-sm-20">
  					<h2 class="main_title">Trending Products</h2>
  				</div>
  			</div>
  		</div>
  		<div class="position-r mb-5">
  			<div class="row">
  				<div class="product-slider owl-carousel position-initial">

  					<?php $i = 1;
						foreach ($trending_data->result() as $whats) {
							$type_datas = $this->db->get_where('tbl_type', array('product_id = ' => $whats->id, 'is_active' => 1, 'color_active' => 1, 'size_active' => 1));
							$type_data = $type_datas->result();
							if (!empty($type_data)) {
								if ($whats->product_view == 3) {
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
								} elseif ($whats->product_view == 2) {
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
  										<? if ($whats->exclusive == 1) { ?><div class="sale-label"><span>Exclusive</span></div><? } ?>
  										<a rel="canonical" href="<?= base_url() ?>product_detail/<?= $whats->url ?>?type=<?= base64_encode($type_data[0]->id) ?>">
  											<img src="<?= base_url() . $type_data[0]->image ?>" alt=" ">
  										</a>
  									</div>
  									<div class="product-details-outer">
  										<div class="product-details">
  											<div class="product-title">
  												<a rel="canonical" href="#"><?= $whats->name ?></a>
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
													$more = 0;
													$size_arr = [];
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
  																	<a rel="canonical" href="<?= base_url() ?>product_detail/<?= $whats->url ?>?type=<?= base64_encode($type_size->id) ?>"> <?= $size_data->name ?> <p style="margin-bottom:0; padding: 0px 10px;">|</p></a>
  																</li>
  													<?php }
															}
														} else {
															$more++;
														}
														$i++;
													}
													if ($more > 0) {
														?>
  													<li class="icon ivo-ho compare-icon">
  														<a rel="canonical" href="<?= base_url() ?>product_detail/<?= $whats->url ?>?type=<?= base64_encode($type_data[0]->id) ?>"> +<?= $more ?></a>
  													</li>
  												<? } ?>
  											</ul>
  										</div>
  									</div>
  								</div>
  							</div>
  					<?php }
							$i++;
						}  ?>
  				</div>
  			</div>
  		</div>
  	</div>
  </section>
  <!-- ======================== END TRENDING PRODUCTS ====================== -->

 <!--========================================== START SECTION gif image ============================================-->
 <div class="container">
    <div class="row">
      <div class="col-12 d-flex justify-content-center">
        <img src="<?= base_url() ?>assets/frontend/img/about.gif" alt="" class="img-fluid">
      </div>
    </div>
  </div>

  <!--========================================== end SECTION gif image ============================================-->

  <!-- ======================= START SECOND BIG BANNER SECTION  ======================== -->
  <? if (!empty($banner_data[$numItems - 1]) && $numItems > 1) { ?>
  	<section class="pb-100 " data-aos="fade-right">
  		<div>
  			<img src="<?= base_url() . $banner_data[$numItems - 1]->image ?>" alt="">
  		</div>
  	</section>
  <? } ?>
  <!-- ======================= END SECOND BIG BANNER SECTION  ======================== -->
  <!-- ======================= START  BANNER SECTION  ======================== -->

  <div class="sub-banner-part pb-100">
  	<div class="container-fluid">
  		<div class="row">
  			<?php $i = 0;
				$a = 0;
				$numItems = count($banner_data);
				foreach ($banner_data as $key => $banner) {
					if ($i != 0 && $i != ($numItems - 1) && $i > 11) {
				?>
  					<div class="col-lg-3 col-4 col-md-4 p-0">
  						<div class="sub-banner-box wow bounceInLeft mb-0">
  							<a rel="canonical" href="<?= $banner->link ?>">
  								<img class=" witbgt" src="<?= base_url() . $banner->image ?>" alt="Broken Image">
  							</a>
  						</div>
  					</div>
  			<?php $a++;
					}
					$i++;
				} ?>
  		</div>
  	</div>
  </div>
  <!-- ======================= END BANNER SECTION  ======================== -->
  <!-- ======================== START TESTIMONIAL PRODUCTS ====================== -->

  <section class="testimonial-section position-r  pb-100">
  	<div class="container">
  		<div class="row">
  			<div class="col-12">
  				<div class=" text-center mb-30 mb-sm-20">
  					<div class="heading-part text-center mb-30 mb-sm-20">
  						<h2 class="main_title">Testimonial</h2>
  					</div>
  				</div>
  			</div>
  		</div>
  		<div class="testimonial-slider fv owl-carousel position-initial">

  			<?php $i = 1;
				foreach ($testimonials_data->result() as $testimonials) { ?>
  				<div class="item testimonial-main">
  					<div class="client-img-main">
  						<div class="client-img">
  							<img alt=" " src="<?= base_url() . $testimonials->image ?>">
  						</div>
  						<div class="quote-img">
  							<img src="<?=base_url()?>assets/frontend/img/quote-img.png" alt=" ">
  						</div>
  					</div>
  					<div class="clear-fix"></div>
  					<div class="client-detail">
  						<p>
  							<i class="fa fa-quote-left icon-top1" aria-hidden="true"></i> <?= $testimonials->text ?><i class="fa fa-quote-right icon-top" aria-hidden="true"></i>
  						</p>
  						<h4 class="sub-title client-title">- <?= $testimonials->name ?>- </h4>
  					</div>
  				</div>
  			<?php $i++;
				} ?>
  		</div>
  	</div>
  </section>
  <!-- ======================== END TESTIMONIAL PRODUCTS ====================== -->

  <!-- ========================= START OUR BLOGS ========================= -->
  <section class="blog-section pb-100">
  	<div class="container">
  		<div class="row">
  			<div class="col-12">
  				<div class="heading-part text-center mb-30 mb-sm-20">
  					<h2 class="main_title">Latest blog</h2>
  				</div>
  			</div>
  		</div>
  		<div class="blog-contant list-view mb_-30">
  			<div class="row">
  				<div class="col-lg-12">
  					<div class="row">
  						<div class="fvsx owl-carousel">
  							<?php $i = 1;
								foreach ($blog_data->result() as $blog) { ?>
  								<div class=" m-3 item">
  									<div class="blog-item">
  										<div class="blog-image blog-image1">
  											<a rel="canonical" href="<?= base_url() ?>blog?q=<?= urlencode($blog->heading) ?>">
  												<img src="<?= base_url() . $blog->image ?>" alt="Broken Image">
  											</a>
  										</div>
  										<div class="blog-detail">
  											<span class="bloger-date mt-1"><? $newdate = new DateTime($blog->date);
																				echo $newdate->format('d-M-Y'); ?></span>
  											<h3 class="head-three mb-10"><a rel="canonical" href="<?= base_url() ?>blog?q=<?= urlencode($blog->heading) ?>"><?= $blog->heading ?></a>
  											</h3>
  											<p class="text-justify">
  												<?
													$string = strip_tags($blog->description);
													if (strlen($string) > 230) {

														// truncate string
														$stringCut = substr($string, 0, 230);
														$endPoint = strrpos($stringCut, ' ');

														//if the string doesn't contain any space then it will cut without word basis.
														$string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
														$string .= '...';
													}
													echo $string; ?></p>
  										</div>
  									</div>
  								</div>
  							<?php $i++;
								} ?>
  						</div>
  						<div class="w-100 text-center">
  							<a rel="canonical" href="<?= base_url() ?>blogs" class="readmore-btn">View All Blogs</a>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  </section>
  <!-- ========================= END OUR BLOGS ========================= -->
  <div style="width: 70%; margin: auto;">
  	<img alt=" " src="<?= base_url() ?>assets/frontend/img/bannnerrr-compressed.jpg">
  </div>

  <section class="accordian-sect ">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12 col-sm-12">
      <div class="accordion">
  <div class="accordion-item">
  <div class="accordion-header"><h4 class="main-title">Poshida: One-Stop Destination of Ethnic & Western Wear for 
Women</h4><span class="accordion-toggle">+</span></div>
    <div class="accordion-content">
      <p>
	  Welcome to Poshida, your premier destination for exquisite ethnic and western 
wear designed exclusively for women. With a commitment to quality, style, and 
innovation, Poshida offers a diverse range of clothing options to suit every 
occasion, taste, and preference. From traditional ethnic wear to chic western 
outfits, Poshida is your one-stop shop for all your fashion needs. 
	  </p>
	  <h4>Discover Our Wide Range of Ethnic Wear Options for Women </h4>
	  <p>
	  At Poshida, we take pride in curating a stunning collection of ethnic wear for 
women that celebrates the rich heritage and cultural diversity of India. Our range 
of ethnic attire is meticulously designed to blend traditional craftsmanship with 
contemporary aesthetics, resulting in pieces that are both timeless and trendy. 
Whether you're looking for stylish kurtis, designer kurtas, festival wear, or 
embroidered masterpieces, Poshida has something for every discerning woman.
	  </p>
	  <h4>
	  Stylish Kurtis for Women:
	  </h4>
	  <p>Elevate your everyday look with our trendy kurtis 
crafted from high-quality fabrics and adorned with exquisite embellishments. Our 
kurtis come in a variety of designs, patterns, and colors to suit your individual 
style and preference. Whether you prefer classic solids or vibrant prints, you'll 
find the perfect kurti to complement your wardrobe at Poshida. </p>
<h4>Designer Kurtas for Women:</h4>
<p>Make a statement with our designer kurtas that 
blend traditional elegance with contemporary flair. Our collection features a 
range of silhouettes, from flowy Anarkalis to sleek straight-cut kurtas, all 
meticulously crafted to enhance your natural beauty. Whether you're attending a 
wedding, a festive celebration, or a formal event, our designer kurtas are sure to 
turn heads wherever you go. </p>
<h4>Festival Wear for Women:</h4>
<p> Embrace the spirit of celebration with our festive 
wear collection, featuring vibrant colors, intricate embroidery, and impeccable 
detailing. From elegant salwar suits to opulent lehengas, our festival wear is 
designed to make you feel like royalty on special occasions. With Poshida, you 
can make a lasting impression at every event with our exquisite festival wear for 
women.</p>
<h4>Embroidered Masterpieces: </h4>
<p>Add a touch of elegance to your wardrobe with our 
intricately embroidered masterpieces that exude timeless charm and 
sophistication. Our collection includes a variety of embroidered garments, from 
delicate chikankari to bold zardozi work, all meticulously crafted by skilled 
artisans. Whether you're looking for a statement piece for a formal event or an 
everyday outfit with a touch of elegance, you'll find it at Poshida. </p>
<h4>Discover Our Trendsetting Western Wear for Women</h4>
<p>In addition to our stunning collection of ethnic wear, Poshida also offers a wide 
range of trendsetting western wear for women. From casual tops and dresses to 
stylish cord sets and palazzo pants, our western wear collection is designed to 
cater to the modern woman's dynamic lifestyle. Whether you're heading to the 
office, meeting friends for brunch, or hitting the town for a night out, Poshida has 
the perfect outfit for every occasion. </p>
<h4>Trending Dresses for Women:</h4>
<p> Stay ahead of the fashion curve with our 
collection of trendy dresses that range from casual daywear to elegant evening 
attire. Whether you prefer classic silhouettes or contemporary designs, our 
dresses are crafted from high-quality fabrics and tailored to perfection to ensure a 
flattering fit.</p>
<h4>Designer Tops for Women: </h4>
<p> Elevate your everyday wardrobe with our collection 
of designer tops crafted from premium fabrics and featuring contemporary 
designs. From sleek blouses to flowy tunics, our tops are versatile enough to take 
you from day to night with ease.</p>
<h4>Floral Tops for Women:</h4>
<p>Embrace your feminine side with our selection of 
floral tops that exude charm and grace. Perfect for any casual outing or social 
gathering, our floral tops are designed to add a touch of romance to your look.</p>
<h4>Palazzo Pants for Women: </h4>
<p>Experience comfort and style with our chic palazzo 
pants that offer effortless elegance and versatility for any occasion. Whether you 
pair them with a crop top for a boho-chic look or a fitted blouse for a more 
polished ensemble, our palazzo pants are sure to become a staple in your 
wardrobe. </p>
<h4>Stylish Floor Length Gowns for Women:</h4>
<p> Make a glamorous statement with 
our collection of floor-length gowns that are perfect for special occasions and 
formal events. Whether you prefer classic black or bold colors, our gowns are 
designed to make you look and feel like a million bucks. </p>
<h4>Elevate Your Wardrobe with Poshida: Your Trusted Destination for 
Women's Fashion </h4>
<p>At Poshida, we understand that fashion is more than just clothing – it's a form of 
self-expression and empowerment. That's why we're committed to providing 
exceptional quality, unparalleled style, and unmatched customer service to 
women everywhere. With a dedication to craftsmanship and attention to detail, 
we strive to create clothing that not only looks beautiful but also feels luxurious 
to wear. Whether you're shopping for ethnic wear or western wear, our extensive 
collection ensures that you find the perfect pieces to complement your wardrobe 
and elevate your style. 
As your trusted destination for women's fashion, Poshida is here to help you look 
and feel your best, every day. From the moment you step into our store or visit 
our website, you'll experience the ultimate in shopping convenience, with a wide 
range of styles, sizes, and colors to choose from. Whether you're shopping for 
yourself or looking for the perfect gift for a loved one, Poshida has everything 
you need to elevate your wardrobe and express your unique sense of style. 
Experience the difference with Poshida and discover a world of timeless 
elegance, modern sophistication, and effortless glamour. Shop with us today and 
experience the magic of Poshida for yourself! </p>
<h4>Popular Searches –  
</h4>
<p>
	<a href="https://www.poshida.in/products/A--LINE-KURTA/1">A Line Kurta</a> |
<a href="https://www.poshida.in/products/FLOOR-LENGTH-GOWN/1">Aliya Cut Kurtis</a> |
<a href="https://www.poshida.in/products/EMBROIDERY-KURTA/1">Embroidery Kurta for Women</a> |
<a href="https://www.poshida.in/products/FLOOR-LENGTH-GOWN/1">Floor Length Gown for Women</a> |
<a href="https://www.poshida.in/products/WOMEN-ETHNIC-KURTAS-SETS/1">Ethnic Kurti for Women</a> |
<a href="https://www.poshida.in/products/WOMEN-STRAIGHT-KURTI-and-KURTAS/1">Women Straight Kurti</a> |

<a href="https://www.poshida.in/products/Women-Westerns/1">Western Wear for Women</a> |
<a href="https://www.poshida.in/products/Women-Ethnics/1">Ethnic Wear for Women</a> |
<a href="https://www.poshida.in/products/Tops/1">Designer Tops for Women</a> |
<a href="https://www.poshida.in/products/Dresses/1">Trending Dresses for Women</a> |
<a href="https://www.poshida.in/products/Coord-Sets/1">Western Cord Sets</a> |
<a href="https://www.poshida.in/products/Bottoms/1">Bottom Wear for Women</a> |
</div>


	</div>
</p>
    </div>
  </div>
</div>
      </div>
    </div>
  </div>
</section>


  <!-- ==================== START SECTION SUBSCRIBE NEWSLETTER ================== -->
  <section class="newsletter-section align-center " style="padding-top: 44px; padding-bottom: 50px;">
  	<div class="container">
  		<div class="row justify-content-center">
  			<div class="col-xl-7 col-lg-9 col-12">
  				<div class="newsletter-title">
  					<h2 class="main_title">Sign up for Newsletter </h2>
  					<p>Wants to get latest updates! sign up for Free </p>
  				</div>
  				<div class="newsletter-input">
  					<form action="<?= base_url() ?>Home/subscribe_data" method="POST" enctype="multipart/form-data">
  						<div class="form-group m-0">
  							<input type="email" name="email" placeholder="Your email address" required="">
  						</div>
  						<button type="submit" class="btn btn-color"><span class="d-none d-sm-block">Subscribe</span>
  							<i class="fa fa-send d-block d-sm-none"></i></button>
  					</form>
  				</div>
  			</div>
  		</div>
  	</div>
  </section>
  <!-- =================== END SECTION SUBSCRIBE NEWSLETTER ==================== -->
  

<script>
	document.addEventListener("DOMContentLoaded", function() {
  const accordions = document.querySelectorAll(".accordion-item");

  accordions.forEach((accordion) => {
    const header = accordion.querySelector(".accordion-header");
    const content = accordion.querySelector(".accordion-content");
    const toggle = header.querySelector(".accordion-toggle");

    header.addEventListener("click", () => {
      accordion.classList.toggle("active");
      if (accordion.classList.contains("active")) {
        content.style.display = "block";
        toggle.textContent = "-";
      } else {
        content.style.display = "none";
        toggle.textContent = "+";
      }
    });
  });
});

</script>

<script>
    $(document).ready(function(){
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
			autoplay:true,
            autoplayTimeout: 3000,
            responsive:{
                0:{
                    items: 1
                },
                768:{
                    items: 2
                },
                992:{
                    items: 3
                },
                1200:{
                    items: 3
                }
            }
        });
    });
</script>
