<!-- Blog detail start -->
<div class="contant">
  <div id="banner-part" class="banner inner-banner">
    <div class="container">
      <div class="bread-crumb-main">
        <h1 class="banner-title">BLOG</h1>
        <div class="breadcrumb">
          <ul class="inline">
            <li><a href="<?= base_url() ?>">Home</a></li>
            <li><a href="<?= base_url() ?>Home/all_blogs">All Blogs</a></li>
            <li><?= $blog_data->heading ?></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <style>
    p{
      text-align:'justify'
    }
  </style>
  <div class="ptb-100" style="padding-top: 30px;">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-12">
          <div class="blog-detail-part pb-md-60">
            <img src="<?= base_url() . $blog_data->image ?>" alt="broken image" class="blog-img" style="width: 100%;">
            <div class="blog-detail">
              <div class="blog-detail-inner">
                <span><? $newdate = new DateTime($blog_data->date);
                      echo $newdate->format('d-M-Y'); ?></span>
                <h2><?= $blog_data->heading ?></h2>
                <p><?= $blog_data->full_description ?></p>
                <div class="line"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Blog detail end -->