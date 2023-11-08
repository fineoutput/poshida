
<style>
  .blog-detail{
    text-align: start;
  }

  .breadcrumb_section.page-title-mini{
    margin-top: 10px;
  }
</style>

<div class="banner-21">
<!--  ============================ START SECTION BREADCRUMB ======================================================-->
<div class="breadcrumb_section page-title-mini">
<div id="banner-part  " class="banner inner-banner inner-banner mb-3">
    <div class="container">
      <div class="bread-crumb-main">
        <h1 class="banner-title">Blog</h1>
        <div class="breadcrumb">
          <ul class="inline">
            <li><a href="<?= base_url() ?>">Home</a>
            </li>
            <li>Blog Details</li>

          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ========================================== END SECTION BREADCRUMB =================================================-->

<!-- ========================================== START MAIN CONTENT ===================================================== -->
<div class="main_content">



  <!-- ==========================================  START SECTION BLOG  =================================================== -->
  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="single_post text-center">
            <h4 class="blog_title" style="text-align: start;"><?=$blog_data->heading?></h4>
            <div class="blog_img " >
              <img style="width: 100%;" src="<?=base_url().$blog_data->image?>" alt="blog_img1">
            </div>
            <div class="blog_content">
              <div class="blog_text text-justify">
                <p><?=$blog_data->full_description?></p>
              </div>
            </div>

            <!-- ========================================START RELATED BLOGS =================================================== -->
            <div class="related_post mt-5 mb-4">
              <div class="row justify-content-center">
                <div class="col-md-6">
                  <div class="heading_s1 text-center">
                    <h2>Related Blogs</h2>
                    <img src="<?=base_url()?>assets/frontend/images/under.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="product_slider carousel_slider owl-carousel owl-theme nav_style1" data-loop="false" data-dots="false" data-nav="true" data-autoplay="true" data-margin="20"
                    data-responsive='{"0":{"items": "2"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                    <?php $i=1; foreach($related_data->result() as $related) { ?>
                    <div class="item">
                      <div class="blog_post blog_style2 box_shadow1">
                        <div class="blog_img">
                          <a href="<?=base_url()?>Home/blog_details/<?=base64_encode($related->id)?>">
                            <img src="<?=base_url().$related->image?>" alt="<?=$related->heading?>">
                          </a>
                        </div>
                        <div class="blog_content bg-white">
                          <div class="blog_text">
                            <h5 class="blog_title text-2"><a href="<?=base_url()?>Home/blog_details/<?=base64_encode($related->id)?>"><?=$related->heading?></a></h5>
                            <p class="text-4"><?=$blog_data->description?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php $i++; }  ?>
                  </div>
                </div>
              </div>
            </div>
            <!-- ======================================== END RELATED BLOGS =================================================== -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

  <!-- END SECTION BLOG -->
