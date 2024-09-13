
  <!-- ===================== Start Mobile Category =================================== -->
  <div style="margin-top: 79px;" class="product-sliders owl-carousel position-initial d-scs">
  	<!-- <?php $i = 1;
		foreach ($category_data->result() as $category) { ?>
  		<div class="item">
  			<a rel="canonical" href="<?= base_url() ?>products/<?= $category->url ?>/1"><img src="<?= base_url() . $category->image2 ?>" alt=""> </a>
  		</div>
  	<? } ?> -->
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
		<!-- <div class="row">
			<div class="product-slider owl-carousel position-initial" id ="myslider" data-items="3"> <!-- Change data-items to 3 -->
				<!-- <?php $i = 1;
				foreach ($shop_by_category_data->result() as $category) { ?>
					<div class="item">
						<a rel="canonical" href="<?= $category->link ?>">
							<img src="<?= base_url() . $category->image ?>" alt="<?= $category->name ?>">
						</a>
					</div>
				<?php $i++;
				} ?> -->
			


			<div class="row catrty owl-carousel creeps" id="shops">
		<?php $i = 1;
				foreach ($shop_by_category_data->result() as $category) { ?>
    <div class="item needs">
        <a rel="canonical" href="<?= $category->link ?>">
		<img src="<?= base_url() . $category->image ?>" alt="<?= $category->name ?>">
        </a>
    </div>
	<?php $i++;
				} ?>
    <!-- <div class="item">
        <a rel="canonical" href="#">
		<img src="<?= base_url() ?>assets/uploads/shop_by_category/shop_by_category20231002133132.jpg" alt="logo">
        </a>
    </div> -->
    <!-- <div class="item">
        <a rel="canonical" href="#">
		<img src="<?= base_url() ?>assets/uploads/shop_by_category/shop_by_category20231002133132.jpg" alt="logo">
        </a>
    </div>
    <div class="item">
        <a rel="canonical" href="#">
		<img src="<?= base_url() ?>assets/uploads/shop_by_category/shop_by_category20231002133132.jpg" alt="logo">
        </a>
    </div>
    <div class="item">
        <a rel="canonical" href="#">
		<img src="<?= base_url() ?>assets/uploads/shop_by_category/shop_by_category20231002133132.jpg" alt="logo">
        </a>
    </div>
    <div class="item">
        <a rel="canonical" href="#">
		<img src="<?= base_url() ?>assets/uploads/shop_by_category/shop_by_category20231002133132.jpg" alt="logo">
        </a>
    </div> -->
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
  <div class="accordion-header"><h4 class="main-title">Poshida: One-Stop Destination For Men, Women &
  Kids Wear</h4><span class="accordion-toggle">+</span></div>
    <div class="accordion-content">
      <p>
	  In the current and rather busy world, it is rather difficult to stumble
upon one online store that offers a variety of fashionable clothes for
every member of the family. Stand Forward Poshida is a
groundbreaking online fashion store that is set to revolutionize the way
families shop for apparel. The company has an impressive range of
clothing in various categories, mainly Menswear, womenswear, and
Kids's wear, making Poshida the one-stop shop for all fashionable
clothing. 
	  </p>
	  <h4>Elevate Your Style with Women's Wear</h4>
	  <p>
	  Fashion-aware women are always in search of the latest fashion
clothes with more style statements that reveal their personalities.
Poshida women’s wear online store consists of a classy compilation of
beautiful apparel and accessories for women of all types of occasions.
From business casual to sleepwear, our website provides an assortment
of styles that will address the varying needs of today’s working ladies.
<br><br>
We offer stylish gowns for occasions such as weddings, birthdays, and
other events, trendy tops to adorn during informal occasions, flattering
fitted bottoms that include jeans, skirts to suit any occasion, and
comfortable wear to wear during informal occasions such as the
weekends. Every single piece is chosen with a lot of attention to detail
so that one can bet that they will find something that suits them.
<br><br>
Currently, when it comes to the purchase of ladies’ fashion, there is no
better place to shop than the Internet. The main page of Poshida’s
user-friendly website enables visitors to search through the store’s vast
offerings with no difficulty. It consists of simple-to-use filters by size,
color, style, and occasion, so when it comes to choosing your outfit for
the day, week, month, or any other event, it is a few clicks away. We
agree that well-elaborated product descriptions and high-quality
<br><br>
images that accompany each product enable you to make an informed
decision on the purchases you are to make.
Of course, everyone knows that every woman is an individual, and it
became a goal of the brand to create clothes for different types of
silhouettes and personalities. Thus, if you want to wear brilliant and
colorful prints or simple and elegant dresses, every woman will find
something to her taste in Poshida’s wardrobe.
	  </p>
	   <h4>
	   Dress Your Little Ones in Style: Kidswear Collection
	  </h4>
	  <p>For parents, it is a well-understood fact that shopping for clothes for
their ever-growing children can be a tedious exercise. To benefit from
the Dubai market, Poshida has therefore eased this process by
providing a pleasant variety of kidswear, which is not only comfortable,
durable, and fashionable. Through an online store, the parents do not
have to go through the tiresome task of having to take their children to
fashion clothing brands.</h4>
<p>As Poshida, we understand that dressing up should be a fun affair for
kids, and this site is living up to that very idea. We have cute prints,
colors that children like, and oh-so-soft fabrics that they enjoy putting
on. For infants, toddlers, school-going kids, and teenagers, playful,
trendy, and fashionable outfits are available in our kid's wear
collection.</p>

<p>Poshida boasts of making kids’ clothes that are made from quality
fabric that does not harm the skin but is strong enought to last through
stomping and washing. The quality aspect is well looked into to make
sure parents or caregivers can be comfortable shopping for their
children since the items are well made and relaxed on the child.</p>

<h4>Redefine Your Wardrobe with Men's Fashion</h4>

<p> It is about time that the modern man is offered a wardrobe by his
imaginative tailor that would suit him. The men’s clothes collection of
Poshida covers all the needs of contemporary men in the aspects of
style, comfort, and functionality.
<br><br>
Our basic line of men’s wear includes business and formal wear,
tailored suits, casual shirts and T-shirts, delight bottoms such as jeans
and trousers, wearable outerwear including formal and casual wear,
and fitness wear. It also guarantees a vast collection to ensure that
men can get versatile wear for any occasion in the modern world.
<br><br>
It clearly shows that today’s man is no longer restricted to any
particular type of shopping through the web. Poshida has thousands of
men's apparel at your beck and call, right from designer t-shirts to
jeans. A well-designed website is helpful in the way that one is able to
locate anything that one wants efficiently, there are size/fit guides and
product descriptions.
<br><br>
We know that men, as representatives of the strongest sex, have
different preferences regarding the choice of clothes. Thus, our
collection spread from those that may be considered standard and
eternal to those that are utterly fashionable and modern. Whether a
man fancies a posh image or a casual outfit, Poshida offers wear to fit
a man’s fashion desires.
</p>

<h4>The Poshida Advantage: Quality, Style, and Convenience</h4>
<p>Compared to the competitive advantage of other clothing brands,
Poshida has been able to maintain its standards and progress due to
the guiding principle that is to offering fashionable clothing for the
whole family. Being a brand under Poshida by Ronak Textiles, we have
more than years of experience in textile manufacturing for the online
marketplace. Thus, this unique position helps to keep strict control over
quality and provides customers with clothing that is not only stylish but
also durable.
<br><br>
Another valuable aspect that distinguishes Poshida from the
competitors is the abundance of size options that we offer. This is why
fashion should not differentiate itself towards skinny people only. This
policy makes it possible to meet the needs of every individual who is
into shopping for him or herself or even other members of the family.
<br><br>
Considering today’s focus towards sustainability Poshida is starting to
move more towards being more sustainable with their fashion
practices. We are gradually building green with new fabrics and
production processes and hoping to be environmentally conscious as
we provide style and quality to our clients.
<br><br>
Just like the company’s name suggests, shopping at Poshida is as easy
as possible. It is easy to navigate and search for what you need, as all
the necessary options are presented in the upper panel of the site.
Here, many of our items feature descriptions about the products as
well as extensive size information to guide the buyer’s choice.
<br><br>
To help you with the buying decision, we provide quality pictures of our
products so that you can look at the product from different angles
before buying it. It is for this reason that we provide uncompromised
security for any of your payments for respective products that you
made on our site.
<br><br>
A reliable shipping service is offered to make your fashion products
reach you as soon as possible and in good condition. And in case you’re
not fully convinced with any of the stuff that you have bought, our fair
return policies make it possible for you to exchange or even return the
product.
<br><br>
As for the principal at Poshida, we have always been convinced that
our customers are the center of attention. We have professional
customer support representing you with any questions and issues you
may have. Your opinions matter to us, and we always consider
customers’ feedback in making necessary improvements to the
products and services offered.
</p>

<h4>Your Fashion Journey Begins with Poshida by Ronak
Textiles</h4>
<p>In today’s ever-changing fashion trends, customers, or rather
consumers, can at least trust Poshida to provide all their fashion needs.
<br><br>
If you are updating your inventory, dressing your children, or doing
some gift shopping, we have all kinds of apparel for everyone.
<br><br>
Check yourself the possibility of buying trendy clothing for the whole
family without leaving home, choosing from the catalog of high-quality
products. As most of our buyers know, Poshida isn’t just a website that
sells clothes – it is a store of high quality and good style along with
your stylist.
<br><br>
Come to Poshida today and find an extensive range of fashionable
apparel that you need for yourself and your family. Allow us to assist
you to dress in your individuality and with regard to the stylish looks
you desire. This is where your transformation for a chic and
comfortable wardrobe starts.
</p>
<!-- <h4>Trending Dresses for Women:</h4>
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
experience the magic of Poshida for yourself! </p> --> 
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
        $('#shops').owlCarousel({
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
