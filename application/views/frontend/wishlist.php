<style>
		.table-users {
			/* border: 1px solid #327a81; */
			border-radius: 10px;
			box-shadow: 3px 3px 0 rgba(0, 0, 0, 0.1);
			max-width: calc(100% - 2em);
			margin: 1em auto;
			overflow: hidden;
			width: 800px;
		}
		a.btn-color-H {
    background: #c68fa6;
    color: white;
    padding: 7px 11px !important;
    border-radius: 6px;
}
		.sale-label {
			background: #ededed none repeat scroll 0 0 !important;
    border-radius: 2px;
    -moz-border-radius: 2px;
    -webkit-border-radius: 50px;
    -o-border-radius: 2px;
    color: #000000;
    font-size: 11px;
    line-height: 12px;
    padding: 8px 8px;
    position: absolute;
    text-transform: uppercase;
    top: 10px;
    right: 10px;
    z-index: 1;
	box-shadow: 10px -4px 31px -19px rgba(0,0,0,0.75);
}

.sale-label i.fa.fa-heart-o {
    font-size: 13px;
}
		table {
			width: 100%;
		}

		table td,
		table th {
			/* color: #2b686e; */
			padding: 10px;
			border: 0px !important;
		}

		table td:last-child {
			font-size: 0.95em;
			line-height: 1.4;
			text-align: left;
		}



		@media screen and (max-width: 700px) {

			table,
			tr,
			td {
				display: block;
			}

			td:first-child {
				position: absolute;
				top: 50%;
				transform: translateY(-50%);

			}

			td:not(:first-child) {
				clear: both;
				/* margin-left: 100px; */
				padding: 4px 20px 4px 90px;
				position: relative;
				text-align: left;
			}

			td:not(:first-child):before {
				/* color: #91ced4; */
				content: '';
				display: block;
				left: 0;
				position: absolute;
			}

			/* 
			td:nth-child(2):before {
				content: 'Name:';
			}
	
			td:nth-child(3):before {
				content: 'Price:';
			}
	
			td:nth-child(4):before {
				content: 'Qty:';
			}
	
	
			 */


			/* td:nth-child(5):before {
				content: 'Sub Total:';
			} */

			tr {
				padding: 10px 0;
				position: relative;
			}

			thead {
				display: none;
			}
		}

		@media (max-width:980px) {
			.contant {
				margin-top: 100px !important;
			}
			.inner-banner {
    padding: 1px 0 !important;
}
.inner-banner {
    padding: 2px 0 !important;
}

			
			.banner-22 {
    height: 100%;
    position: relative;
    margin-top: 0px !important;
}
		}
		@media (max-width: 768px){
			.banner-21 {
    height: 100%;
    position: relative;
    margin-top: 91px !important;
         }
		 .banner {
    margin-top: 90px !important;
}
.contant {
    margin-top: 90px !important;
}
		}  

		
		@media (max-width: 425px){
			.banner {
    margin-top: 99px !important;
}
		} 
				
		@media (max-width: 375px){
			.banner {
    margin-top: 91px !important;
}
		} 

		@media (max-width: 320px){
			.banner-21 {
    height: 100%;
    position: relative;
    margin-top: 81px !important;
}
.contant {
    margin-top: 81px !important;
}

.banner {
    margin-top: 81px !important;
}
		} 
	</style>
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

  <div class="ptb-100" style="padding-top: 40px !important;" id="wishlist">
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
                  <a href="<?= base_url() ?>product_detail/<?= $wishlist['url'] ?>?type=<?= base64_encode($wishlist['type_id']) ?>">
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
                      <? if ($wishlist['percent'] > 0) { ?>
                        <span class="on-sic"> <?= round($wishlist['percent']) ?>% off </span>
                      <? } ?>

                    </div>
                  </div>
                  <div class="product-details-btn">
                    <ul>
                      <li class="icon  cart-icon">
                        <p class="m-0">Size :<?= $wishlist['size'] ?> |  <span>Color :<?= $wishlist['color'] ?></span> </p>
                      </li> 
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