<!-- ==================================================== START SLIDER  ===================================================== -->

<!-- ============================= Web Slider ================================== -->
<div id="webslider" class="carousel slide  vertical" data-ride="carousel">
  <ol class="carousel-indicators">
    <?php $a=0; foreach ($slider_data->result() as $li) { ?>
    <li data-target="#webslider" data-slide-to="<?=$a?>" class="<?if ($a==0) {
    echo 'active';
}?>"></li>
    <?php $a++; } ?>
  </ol>
  <div class="carousel-inner" role="listbox">
    <?php $i=1; foreach ($slider_data->result() as $slider) { ?>
    <div onclick="location.href='<?=$slider->link;?>'" class="carousel-item <?if ($i==1) {
    echo 'active';
}?>" style="cursor: pointer;">
      <img src="<?=base_url().$slider->image?>" class="img-fluid" />
    </div>
    <?php $i++; } ?>
  </div>
  <!-- <div class="carousel-inner" role="listbox" id="mobileSlider">
    <?php $i=1; foreach ($slider_data->result() as $slider) { ?>
    <div onclick="location.href='<?=$slider->link;?>'" class="carousel-item <?if ($i==1) {
    echo 'active';
}?>">
    <img src="<?=base_url().$slider->image2?>" class="img-fluid" />
    </div>
    <?php $i++; } ?>
  </div> -->
</div>
<!-- ============================= Mobile Slider ================================== -->

<div id="mobileSlider" class="carousel slide  vertical" data-ride="carousel">
  <ol class="carousel-indicators">
    <?php $a=0; foreach ($slider_data->result() as $li) { ?>
    <li data-target="#mobileSlider" data-slide-to="<?=$a?>" class="<?if ($a==0) {
    echo 'active';
}?>"></li>
    <?php $a++; } ?>
  </ol>
  <div class="carousel-inner" role="listbox">
    <?php $i=1; foreach ($slider_data->result() as $slider) { ?>
    <div onclick="location.href='<?=$slider->link;?>'" class="carousel-item <?if ($i==1) {
    echo 'active';
}?>">
    <img src="<?=base_url().$slider->image2?>" class="img-fluid" />
    </div>
    <?php $i++; } ?>
  </div>
</div>
<!-- ==================================================== END SLIDER  ===================================================== -->

<!-- Start MAIN CONTENT -->
<div class="main_content" style="margin-bottom: 8rem;">

  <!-- ==================================================== START WHATS NEW  ===================================================== -->

  <div class="section">
    <div class="container-fluid" >
      <div class="row justify-content-center">
        <div class="heading_s1 text-center">
          <h2 class="mt-2">What's New</h2>
          <img src="<?=base_url()?>assets/frontend/images/under.png" alt="" class="img-fluid">
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="product_slider carousel_slider owl-carousel owl-theme nav_style1" data-loop="true" data-dots="false" data-nav="true" data-autoplay="" data-margin="20"
            data-responsive='{"0":{"items": "2"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "5"}}'>
            <?php $i=1; foreach($whats_data->result() as $whats) {
              $type_datas = $this->db->get_where('tbl_type', array('product_id = ' => $whats->id, 'is_active'=>1, 'color_active'=>1, 'size_active'=>1));
              $type_data = $type_datas->result();
              if(!empty($type_data)){
                if($whats->product_view == 3){
                  if(!empty($this->session->userdata('user_type'))){
                    if($this->session->userdata('user_type')==2){
                      $type_mrp = $type_data[0]->reseller_mrp;
                      $type_spgst = $type_data[0]->reseller_spgst;
                    }else{
                      $type_mrp = $type_data[0]->retailer_mrp;
                      $type_spgst = $type_data[0]->retailer_spgst;
                    }
                  }else{
                    $type_mrp = $type_data[0]->retailer_mrp;
                    $type_spgst = $type_data[0]->retailer_spgst;
                  }
                }elseif($whats->product_view == 2){
                  $type_mrp = $type_data[0]->reseller_mrp;
                  $type_spgst = $type_data[0]->reseller_spgst;
                }else{
                  $type_mrp = $type_data[0]->retailer_mrp;
                  $type_spgst = $type_data[0]->retailer_spgst;
                }
              $discount = $type_mrp - $type_spgst;
              $percent=0;
              if($discount>0){
              $percent=$discount/$type_mrp*100;
              $percent  = round($percent, 2);
              }
              if(!empty($type_data[0]->image2)){
                $image1 = $type_data[0]->image2;
              }else{
                $image1 = $type_data[0]->image;
              }
               ?>
            <div class="item">
              <div class="product">
                <?if($whats->exclusive==1){?><span class="pr_flash">Exclusive</span>
                <?}
                $user_id=$this->session->userdata('user_id');
                if(!empty($user_id)){
                $wihslist = $this->db->get_where('tbl_wishlist', array('user_id'=> $user_id,'product_id'=> $whats->id,'type_id'=> $type_data[0]->id))->result();
                if(!empty($wihslist)){
                ?>
                <span class="htc float-right iWish<?=$type_data[0]->id?>">
                  <a href="javascript:void(0)" product_id="<?=base64_encode($whats->id)?>" type_id="<?=base64_encode($type_data[0]->id)?>" status="remove"  onclick="wishlistWithFilter(this)"><i class="fa fa-heart float-right" style="color:red;"></i></a>
                </li></span>
                <?}else{?>
                  <span class="htc float-right iWish<?=$type_data[0]->id?>">
                    <a href="javascript:void(0)"product_id="<?=base64_encode($whats->id)?>" type_id="<?=base64_encode($type_data[0]->id)?>" status="add"  onclick="wishlistWithFilter(this)"><i class="icon-heart float-right" style="color:red;"></i></a>
                  </li></span>
                <?}
              }else{?>
                <span class="htc float-right iWish<?=$type_data[0]->id?>">
                  <a href="javascript:void(0)" data-target="#onload-popup1" data-toggle="modal" data-dismiss="modal"><i class="icon-heart float-right" style="color:red;"></i></a>
                </li></span>
                <?}?>
                <div class="product_img">
                  <a href="<?=base_url()?>Home/product_detail/<?=$whats->url?>?type=<?=base64_encode($type_data[0]->id)?>">
                    <img src="<?=base_url().$type_data[0]->image?>" onmouseover="pro_change(this)" onmouseout="pro_default(this)" img="<?=base_url().$type_data[0]->image?>" img2="<?=base_url().$image1?>" alt="<?=$whats->name?>">
                  </a>
                  <div class="product_action_box">
                    <ul class="list_none pr_action_btn">
                      <?php $i=1; $more=0;
                      $size_arr=[];
                       foreach($type_datas->result() as $type_size) {
                        $status=0;
                    if($i<5){
                        $this->db->select('*');
                        $this->db->from('tbl_size');
                        $this->db->where('id',$type_size->size_id);
                        $this->db->where('is_active',1);
                        $size_data= $this->db->get()->row();
                        if(!empty($size_data)){
                        if($i==1){
                          array_push($size_arr,$size_data->id);
                          $status=0;
                        }else{
                          foreach ($size_arr as $key) {
                          if($key==$size_data->id){
                            $status=1;
                            break;
                          }
                          }
                        }
                        if($status==0){
                          array_push($size_arr,$size_data->id);
                        ?>
                      <li class="add-to-cart"><a href="<?=base_url()?>Home/product_detail/<?=$whats->url?>?type=<?=base64_encode($type_size->id)?>" class="popup-ajax"><?=$size_data->name?></a></li>
                    <?php }}}else{$more++;}$i++; }
                    if($more > 0){
                    ?>
                      <li><a href="<?=base_url()?>Home/product_detail/<?=$whats->url?>?type=<?=base64_encode($type_data[0]->id)?>" class="popup-ajax" style="background:transparent; color:white;">+<?=$more?></a></li>
                      <?}?>
                    </ul>
                  </div>
                </div>
                <div class="product_info">
                  <h6 class="product_title"><a href="<?=base_url()?>Home/product_detail/<?=$whats->url?>?type=<?=base64_encode($type_data[0]->id)?>"><?=$whats->name?></a></h6>
                  <div class="product_price">
                    <span class="price">₹<?=$type_spgst?></span>
                    <?if($type_mrp > $type_spgst){?><del>₹<?=$type_mrp?></del>
                    <?}?>
                    <?if($percent>0){?>
                    <div class="on_sale">
                      <span><?=round($percent)?>% Off</span>
                    </div>
                    <?}?>
                  </div>
                </div>
              </div>
            </div>
            <?php }$i++; }  ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ==================================================== END WHATS NEW  ===================================================== -->


  <!-- ====================================== START BANNER  ============================================== -->
  <!--==== START FIRST BIG BANNER ========= -->
  <?php $i=1; foreach ($banner_data->result() as $fbig) {
    if ($fbig->id==1) { ?>
  <div>
    <a href="<?=$fbig->link?>">
      <img src="<?=base_url().$fbig->image?>" class="img-fluid" alt="First Big Banner" style="width: 100%;" />
    </a>
  </div>
  <?php }break;} ?>

  <!--==== END FIRST BIG BANNER ========= -->

  <!--==== START EIGHT BANNER ========= -->
  <div class="section pb_20 small_pt">
    <div class="container-fluid px-2">
      <div class="row no-gutters">
        <?php $i=1; foreach ($banner_data->result() as $banner) {
    if (($banner->id >= 2) && ($banner->id <= 9)) { ?>
        <div class="col-md-3 col-6">
          <div class="sale_banner">
            <a class="hover_effect1" href="<?=$banner->link?>" >
              <img src="<?=base_url().$banner->image?>" alt="Banner_<?=$i?>">
            </a>
          </div>
        </div>
        <?php }$i++;} ?>
      </div>
    </div>
  </div>
  <!--==== END EIGHT BANNER ========= -->

  <!--==== START SECOND BIG BANNER ========= -->
  <?php $i=1; foreach ($banner_data->result() as $sbig) {
    if ($sbig->id==10) {?>
  <div>
    <a href="<?=$sbig->link?>" >
      <img src="<?=base_url().$sbig->image?>" class="img-fluid" alt="Second Big Banner" style="width: 100%;" />
    </a>
  </div>
  <?php }  $i++;} ?>

  <!--==== END SECOND BIG BANNER ========= -->
  <!-- ============================================== END BANNER  ============================================== -->



  <!-- ============================================= START SHOP BY CATEGORIES ========================================== -->

  <div class="section pb-0">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="heading_s4 text-center">
            <h2 class="mt-2">Shop By Categories</h2>
            <img src="<?=base_url()?>assets/frontend/images/under.png" alt="" class="img-fluid">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="product_slider carousel_slider owl-carousel owl-theme nav_style1" data-loop="true" data-dots="false" data-nav="true" data-autoplay="true" data-margin="20"
            data-responsive='{"0":{"items": "2"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "5"}}'>
            <?php $i=1; foreach ($shop_by_category_data->result() as $category) { ?>
            <div class="item">
              <div class="product card_change">
                <a href="<?=$category->link?>">
                  <img src="<?=base_url().$category->image?>" alt="<?=$category->name?>" class="mb-2" />
                  <span><?=$category->name?></span>
                </a>
              </div>
            </div>
            <?php $i++; } ?>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- ===================================== END SHOP BY CATEGORIES ====================================== -->


  <!-- ===================================== START TRENDING PRODUCTS ====================================== -->
  <div class="section">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="heading_s1 text-center">
            <h2>Trending Products</h2>
            <img src="<?=base_url()?>assets/frontend/images/under.png" alt="" class="img-fluid">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="product_slider carousel_slider owl-carousel owl-theme nav_style1" data-loop="true" data-dots="false" data-nav="true" data-autoplay="true" data-margin="20"
            data-responsive='{"0":{"items": "2"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
            <?php $i=1; foreach($trending_data->result() as $trending) {
              $this->db->select('*');
              $this->db->from('tbl_type');
              $this->db->where('product_id',$trending->id);
              $this->db->where('is_active',1);
              $this->db->where('color_active',1);
              $this->db->where('size_active',1);
              $type_datas= $this->db->get();
              $type_data = $type_datas->row();
              if(!empty($type_data)){
                if($trending->product_view == 3){
                  if(!empty($this->session->userdata('user_type'))){
                    if($this->session->userdata('user_type')==2){
                      $type_mrp = $type_data->reseller_mrp;
                      $type_spgst = $type_data->reseller_spgst;
                    }else{
                      $type_mrp = $type_data->retailer_mrp;
                      $type_spgst = $type_data->retailer_spgst;
                    }
                  }else{
                    $type_mrp = $type_data->retailer_mrp;
                    $type_spgst = $type_data->retailer_spgst;
                  }
                }elseif($trending->product_view == 2){
                  $type_mrp = $type_data->reseller_mrp;
                  $type_spgst = $type_data->reseller_spgst;
                }else{
                  $type_mrp = $type_data->retailer_mrp;
                  $type_spgst = $type_data->retailer_spgst;
                }
              $discount = $type_mrp - $type_spgst;
              $percent=0;
              if($discount>0){
              $percent=$discount/$type_mrp*100;
              $percent  = round($percent, 2);
              }
              if(!empty($type_data->image2)){
                $image1 = $type_data->image2;
              }else{
                $image1 = $type_data->image;
              }
               ?>
            <div class="item">
              <div class="product">
                <?if($trending->exclusive==1){?><span class="pr_flash">Exclusive</span>
                <?}
                $user_id=$this->session->userdata('user_id');
                if(!empty($user_id)){
                $wihslist = $this->db->get_where('tbl_wishlist', array('user_id'=> $user_id,'product_id'=> $trending->id,'type_id'=> $type_data->id))->result();
                if(!empty($wihslist)){
                ?>
                <span class="htc float-right iWish<?=$type_data->id?>">
                  <a href="javascript:void(0)" product_id="<?=base64_encode($trending->id)?>" type_id="<?=base64_encode($type_data->id)?>" status="remove"  onclick="wishlistWithFilter(this)"><i class="fa fa-heart float-right" style="color:red;"></i></a>
                </li></span>
                <?}else{?>
                  <span class="htc float-right iWish<?=$type_data->id?>">
                    <a href="javascript:void(0)"product_id="<?=base64_encode($trending->id)?>" type_id="<?=base64_encode($type_data->id)?>" status="add"  onclick="wishlistWithFilter(this)"><i class="icon-heart float-right" style="color:red;"></i></a>
                  </li></span>
                <?}
              }else{?>
                <span class="htc float-right iWish<?=$type_data->id?>">
                  <a href="javascript:void(0)" data-target="#onload-popup1" data-toggle="modal" data-dismiss="modal"><i class="icon-heart float-right" style="color:red;"></i></a>
                </li></span>
                <?}?>
                <div class="product_img">
                  <a href="<?=base_url()?>Home/product_detail/<?=$trending->url?>?type=<?=base64_encode($type_data->id)?>">
                    <img src="<?=base_url().$type_data->image?>" onmouseover="pro_change(this)" onmouseout="pro_default(this)" img="<?=base_url().$type_data->image?>" img2="<?=base_url().$image1?>" alt="<?=$trending->name?>">
                  </a>
                  <div class="product_action_box">
                    <ul class="list_none pr_action_btn">
                      <?php $i=1; $more=0;
                      $size_arr=[];
                      foreach($type_datas->result() as $type_size) {
                           $status=0;
                    if($i<5){
                        $this->db->select('*');
                        $this->db->from('tbl_size');
                        $this->db->where('id',$type_size->size_id);
                        $this->db->where('is_active',1);
                        $size_data= $this->db->get()->row();
                        if(!empty($size_data)){
                        if($i==1){
                          array_push($size_arr,$size_data->id);
                          $status=0;
                        }else{
                          foreach ($size_arr as $key) {
                          if($key==$size_data->id){
                            $status=1;
                            break;
                          }
                          }
                        }
                        if($status==0){
                          array_push($size_arr,$size_data->id);
                        ?>
                      <li class="add-to-cart"><a href="<?=base_url()?>Home/product_detail/<?=$trending->url?>?type=<?=base64_encode($type_size->id)?>" class="popup-ajax"><?=$size_data->name?></a></li>
                    <?php }}}else{$more++;}$i++; }
                    if($more > 0){
                    ?>
                      <li><a href="<?=base_url()?>Home/product_detail/<?=$trending->url?>?type=<?=base64_encode($type_data->id)?>" class="popup-ajax" style="background:transparent; color:white;">+<?=$more?></a></li>
                      <?}?>
                    </ul>
                  </div>
                </div>
                <div class="product_info">
                  <h6 class="product_title"><a href="<?=base_url()?>Home/product_detail/<?=$trending->url?>?type=<?=base64_encode($type_data->id)?>"><?=$trending->name?></a></h6>
                  <div class="product_price">
                    <span class="price">₹<?=$type_spgst?></span>
                    <?if($type_mrp > $type_spgst){?><del>₹<?=$type_mrp?></del>
                    <?}?>
                    <?if($percent>0){?>
                    <div class="on_sale">
                      <span><?=round($percent)?>% Off</span>
                    </div>
                    <?}?>
                  </div>
                </div>
              </div>
            </div>
            <?php }$i++; }  ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ===================================== START TRENDING PRODUCTS ====================================== -->


  <!-- ===================================== START OUR CLIENT SAY ====================================== -->

  <div class="section bg_redon">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="heading_s1 text-center">
            <h2>Our Client Say!</h2>
            <img src="<?=base_url()?>assets/frontend/images/under.png" alt="" class="img-fluid">
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="testimonial_wrap testimonial_style1 carousel_slider owl-carousel owl-theme nav_style2" data-nav="true" data-dots="false" data-center="true" data-loop="true" data-autoplay="true"
            data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "3"}}'>
            <?php $i=1; foreach ($testimonials_data->result() as $testimonials) { ?>
            <div class="testimonial_box px-4 col-12">
              <div class="testimonial_desc">
                <p style="text-align: justify;"><?=$testimonials->text?></p>
              </div>
              <div class="author_wrap">
                <div class="author_img">
                  <img src="<?=base_url().$testimonials->image?>" alt="<?=$testimonials->name?>" />
                </div>
                <div class="author_name">
                  <h6><?=$testimonials->name?></h6>
                </div>
              </div>
            </div>
            <?php $i++; } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ===================================== END OUR CLIENT SAY ====================================== -->


  <!-- ===================================== START OUR BLOGS ====================================== -->
  <div class="section">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="heading_s1 text-center">
            <h2>Our Blogs</h2>
            <img src="<?=base_url()?>assets/frontend/images/under.png" alt="" class="img-fluid">
            <p class="mt-1">A Curated set of blog article from Tiara's in-house experts</p>
          </div>
        </div>
      </div>
      <div class="row grid_container masonry">
        <div class="col-xl-3 col-lg-3 col-md-6 col-6 grid-sizer"></div>
        <?php $i=1; foreach ($blog_data->result() as $blog) { ?>
        <div class="col-xl-3 col-lg-3 col-md-6 col-6 grid_item">
          <div class="blog_post blog_style2 box_shadow1">
            <div class="blog_img">
              <a href="<?=base_url()?>Home/blog_details/<?=base64_encode($blog->id)?>">
                <img src="<?=base_url().$blog->image?>" alt="<?=$blog->heading?>">
              </a>
            </div>
            <div class="blog_content bg-white">
              <div class="blog_text">
                <h5 class="blog_title text-2"><a href="<?=base_url()?>Home/blog_details/<?=base64_encode($blog->id)?>"><?=$blog->heading?></a></h5>
                <p class="text-4">
                  <?=$blog->description?></p>
              </div>
            </div>
          </div>
        </div>
        <?php $i++; } ?>
      </div>
    </div>
    <div class="text-center">
      <a style="padding:6px 35px" class="btn btn-fill-out rounded-0 " href="<?=base_url()?>Home/all_blogs" data-animation="slideInLeft" data-animation-delay="1.5s">View All Blogs</a>
    </div>
  </div>
  <!-- ===================================== END OUR BLOGS ====================================== -->


  <!-- ===================================== START SECTION SUBSCRIBE NEWSLETTER =============================== -->
  <div class="container mb-5 mt-5 text-center">
    <h2 class="mb-0">Join Us</h2>
    <img src="<?=base_url()?>assets/frontend/images/under.png" alt="" class="img-fluid">
    <p class="mt-1">Subscribe our newsletter and stay and upto date about the company!</p>
    <form action="<?=base_url()?>Home/subscribe_data" method="POST" enctype="multipart/form-data">
      <div class="input-field mt-3 mb-5" style="display: flex;">
        <input type="email" id="email" required class="myinput" name="email">
        <label for="email" class="mylabel">Enter Email Id To Subscribe</label>
        <button type="submit" id="submit" class="btnn">Submit</button>
      </div>
    </form>
  </div>
  <!-- ===================================== END SECTION SUBSCRIBE NEWSLETTER =============================== -->
</div>
<!-- ======================================  END MAIN CONTENT   ======================================== -->
<script>
 $(window).load (function(){
  alert('hi')
  // $('.cart_dropdown').addClass('show');
 });
</script>
