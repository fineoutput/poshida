<div class="banner-21">
  <div id="banner-part  " class="banner inner-banner inner-banner mb-3">
    <div class="container">
      <div class="bread-crumb-main">
        <h1 class="banner-title">Blog</h1>
        <div class="breadcrumb">
          <ul class="inline">
            <li><a href="<?= base_url() ?>">Home</a>
            </li>
            <li>Blog</li>

          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="blog-contant list-view mb_-30">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <?php $i = 1;
              foreach ($blog_data->result() as $blog) { ?>
                  <div class="fsx owl-carousel col-lg-4 col-md-6 col-12 p-0" style="display: block;">
                <div class=" m-3 item  ">
                  <div class="blog-item">
                    <div class="blog-image blog-image1">
                      <a href="<?= base_url() ?>blog?q=<?= urlencode($blog->heading) ?>">
                        <img src="<?= base_url() . $blog->image ?>" alt="<?= $blog->heading ?>" alt="broken image">
                      </a>
                    </div>
                    <div class="blog-detail">
                      <span class="bloger-date"><? $newdate = new DateTime($blog->date);
																		echo $newdate->format('d-M-Y'); ?></span>
                      <h3 class="head-three mb-10"><a href="<?= base_url() ?>blog?q=<?= urlencode($blog->heading) ?>"><?= $blog->heading ?></a>
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
                      <a href="<?= base_url() ?>blog?q=<?= urlencode($blog->heading) ?>" class="readmore-btn re">Read More</a>
                    </div>
                  </div>
                </div>

                </div>
              
              <?php $i++;
              } ?>
          </div>
          <div class="row">
            <?php echo $links; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>