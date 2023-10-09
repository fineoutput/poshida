<!-- wishlist contant start -->
<div class="contant">
  <!-- ========================= START SECTION BREADCRUMB ==========================-->
  <div id="banner-part" class="banner inner-banner">
    <div class="container">
      <div class="bread-crumb-main">
        <h1 class="banner-title">Wishlist</h1>
        <div class="breadcrumb">
          <ul class="inline">
            <li><a href="<?= base_url() ?>">Home</a>
            </li>
            <li>Wishlist</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- ========================= END SECTION BREADCRUMB ==========================-->

  <div class="ptb-100" style="padding-top: 40px !important;">
    <? if (!empty($wishlist_data)) { ?>
      <div class="container">
        <div class="row">
          <?php $i = 1;
          foreach ($wishlist_data as $wishlist) { ?>
            <div class="col-lg-3 col-6 col-md-6 ">
              <div class="product-item">
                <div class="product-image">
                  <div class="sale-label">
                    <a href="javascript:void(0)" product_id="<?= base64_encode($wishlist['product_id']) ?>" type_id="<?= base64_encode($wishlist['type_id']) ?>" status="remove" onclick="wishlist(this)">
                      <i class="fa fa-times" style="color: #bf6d6d;
										font-size: 13px;"></i></a>
                  </div>
                  <a href="<?= base_url() ?>Home/product_detail/<?= $wishlist['url'] ?>?type=<?= base64_encode($wishlist['type_id']) ?>">
                    <img src="<?= $wishlist['image'] ?>" alt="broken image">
                  </a>
                </div>
                <div class="product-details-outer">
                  <div class="product-details">
                    <div class="product-title">
                      <a href="#"><?= $wishlist['product_name'] ?></a>
                    </div>
                    <div class="price-box">
                      <span class="price"><?= $wishlist['price'] ?></span>
                      <del class="price old-price">₹100.00</del>
                      <? if ($wishlist['mrp'] > $wishlist['price']) { ?><del class="price old-price">₹<?= $wishlist['mrp'] ?></del> <? } ?>
                      <? if ($percent > 0) { ?>
                        <span class="on-sic"> <?= round($wishlist['percent']) ?>% off </span>
                      <? } ?>

                    </div>
                  </div>
                  <div class="product-details-btn">
                    <ul>
                      <li class="icon  cart-icon">
                        <p class="m-0">Size :<?= $wishlist['size'] ?></p>
                      </li> |
                      <li class="icon ivo-ho wishlist-icon">
                        <a href="javascript:void(0);" class="btn btn-fill-out" product_id="<?= base64_encode($wishlist['product_id']) ?>" type_id="<?= base64_encode($wishlist['type_id']) ?>" status="move" onclick="wishlist(this)" class="btn-color-H"> Move to Cart</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          <?php $i++;
          } ?>
        </div>
      </div>
    <? } else { ?>
      <div class="text-center">
        <img src="<?= base_url() ?>assets/frontend/images/wishlist_empty.jpg" alt="Empty Wishlist" class="img-fluid">
      </div>
    <? } ?>
  </div>
</div>