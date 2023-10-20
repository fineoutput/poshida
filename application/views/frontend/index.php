  <!-- ===================== Start Mobile Category =================================== -->
  <div style="margin-top: 79px;" class="product-sliders owl-carousel position-initial d-scs">
  	<?php $i = 1;
		foreach ($category_data->result() as $category) { ?>
  		<div class="item">
  			<a href="<?= base_url() ?>Home/all_products/<?= $category->url ?>/1"><img src="<?= base_url() . $category->image2 ?>" alt=""> </a>
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
  				<a href="<?= $slider->link; ?>"><img class="d-none d-md-block " src="<?= base_url() . $slider->image ?>" alt="Image not found"></a>
  				<a href="<?= $slider->link; ?>"><img class="d-block d-md-none fb" src="<?= base_url() . $slider->image2 ?>" alt="Image not found"></a>
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
  										<a href="<?= base_url() ?>Home/product_detail/<?= $whats->url ?>?type=<?= base64_encode($type_data[0]->id) ?>">
  											<img src="<?= base_url() . $type_data[0]->image ?>" alt=" ">
  										</a>
  									</div>
  									<div class="product-details-outer">
  										<div class="product-details">
  											<div class="product-title">
  												<a href="#"><?= $whats->name ?></a>
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
  																	<a href="<?= base_url() ?>Home/product_detail/<?= $whats->url ?>?type=<?= base64_encode($type_size->id) ?>"> <?= $size_data->name ?> <p style="margin-bottom:0; padding: 0px 10px;">|</p> </a>
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
  														<a href="<?= base_url() ?>Home/product_detail/<?= $whats->url ?>?type=<?= base64_encode($type_data[0]->id) ?>"> +<?= $more ?></a>
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
  							<a href="<?= $banner->link ?>">
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
  							<a href="<?= $category->link ?>"><img src="<?= base_url() . $category->image ?>" alt="<?= $category->name ?>" alt="Broken Image">
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
  										<a href="<?= base_url() ?>Home/product_detail/<?= $whats->url ?>?type=<?= base64_encode($type_data[0]->id) ?>">
  											<img src="<?= base_url() . $type_data[0]->image ?>" alt=" ">
  										</a>
  									</div>
  									<div class="product-details-outer">
  										<div class="product-details">
  											<div class="product-title">
  												<a href="#"><?= $whats->name ?></a>
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
  																	<a href="<?= base_url() ?>Home/product_detail/<?= $whats->url ?>?type=<?= base64_encode($type_size->id) ?>"> <?= $size_data->name ?> <p style="margin-bottom:0; padding: 0px 10px;">|</p></a>
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
  														<a href="<?= base_url() ?>Home/product_detail/<?= $whats->url ?>?type=<?= base64_encode($type_data[0]->id) ?>"> +<?= $more ?></a>
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


  <!-- ======================= START SECOND BIG BANNER SECTION  ======================== -->
  <?if(!empty($banner_data[$numItems - 1]) && $numItems>1){?>
  <section class="pb-100 " data-aos="fade-right"> 
  	<div>
  		<img src="<?= base_url() . $banner_data[$numItems - 1]->image ?>" alt="">
  	</div>
  </section>
  <?}?>
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
  							<a href="<?= $banner->link ?>">
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
  							<img alt="Xpoge" src="<?= base_url() . $testimonials->image ?>">
  						</div>
  						<div class="quote-img">
  							<img src="https://themes.templatescoder.com/xpoge/html/demo/1-0/01_FASHION/images/quote-img.png" alt="Xpoge">
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
  											<a href="<?= base_url() ?>Home/blog_details/<?= base64_encode($blog->id) ?>">
  												<img src="<?= base_url() . $blog->image ?>" alt="Broken Image">
  											</a>
  										</div>
  										<div class="blog-detail">
  											<span class="bloger-date mt-1"><? $newdate = new DateTime($blog->date);
																				echo $newdate->format('d-M-Y'); ?></span>
  											<h3 class="head-three mb-10"><a href="<?= base_url() ?>Home/blog_details/<?= base64_encode($blog->id) ?>"><?= $blog->heading ?></a>
  											</h3>
  											<p> <?= $blog->description ?></p>
  										</div>
  									</div>
  								</div>
  							<?php $i++;
								} ?>
  						</div>
  						<div class="w-100 text-center">
  							<a href="<?= base_url() ?>Home/all_blogs" class="readmore-btn">View All Blogs</a>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  </section>
  <!-- ========================= END OUR BLOGS ========================= -->


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