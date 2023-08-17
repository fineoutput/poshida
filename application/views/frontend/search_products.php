<link rel="stylesheet" href="<?=base_url()?>assets/frontend/css/jquery-ui.css">
<!--========================================== START SECTION BREADCRUMB ============================================-->
<div class="breadcrumb_section  page-title-mini">
  <div class="container-fluid">
    <div class="row align-items-center px-4 roxy">
      <div class="col-md-6">
        <div class="page-title">
          <h1><?=$subcategory_name?></h1>
        </div>
      </div>
      <div class="col-md-6">
        <ol class="breadcrumb justify-content-md-end">
          <?$cat = explode(" ", $category_name);
            $caturl = implode("-", $cat);?>
          <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
          <!-- <li class="breadcrumb-item"><a href="<?=base_url()?>Home/all_products/<?=$caturl?>/1"><?=$category_name?></a></li> -->
          <li class="breadcrumb-item active"><?=$subcategory_name?></li>
        </ol>
      </div>
    </div>
  </div><!-- END CONTAINER-->
</div>
<!-- ========================================== END SECTION BREADCRUMB ====================================================-->

<!--============================================ START MAIN CONTENT =========================================================-->
<div class="main_content" id="wishlist">
  <!--=========================================== START SECTION SHOP ==========================================================-->
  <div class="section" style="padding-top: 10px;">
    <div class="container-fluid">
      <div class="row justify-content-center" style="">
        <div class="col-lg-10" style="">
          <!-- ===================================== START SORT BY ===========================================================   -->
          <!-- <div class="row align-items-center mb-4 pb-1 hidee">
            <div class="col-12">
              <div class="product_header">
                <div class="product_header_right" style="float: right;margin-right:20px; position: absolute; right: 21.5%;">
                  <li class="dropdown  sortbyhover" data-toggle="dropdown"><span style="font-size: 15px;">Sort By </span><span id="sort by">Price</span> <img src="<?=base_url()?>assets\frontend\images\down-arrow.png" alt=""
                      style="float: right;margin-top: 6px;">
                    <div class="cart_box cart_right dropdown-menu dropdown-menu-right" style="right: auto;margin-left: -10px;min-width: 14.3rem;">
                      <ul class="hovercolor">
                        <li  onclick="soryBy('ASC')" class="
                        <?
                        // if($sort=='ASC'){echo 'first';}
                        ?>
                        " style="color: black;">
                         Low to high
                        </li>
                        <li onclick="soryBy('DESC')" class="<?
                        // if($sort=='DESC'){echo 'first';}
                        ?>" style="color: black;">
                             High to low
                        </li>
                      </ul>
                    </div>
                  </li>
                </div>
              </div>
            </div>
          </div> -->
          <!-- ===================================== END SORT BY ===========================================================   -->

          <!-- ===================================== START ALL PRODUCTS ===========================================================   -->

          <div class="col-md-12 ppadding" style="padding-right: 0px;">
            <?if(!empty($product)){?>
            <div class="row m-0">

              <?foreach($product as $data){
                $type_mrp = 0;
                $type_spgst = 0;
                $type_datas = $this->db->get_where('tbl_type', array('product_id = ' => $data->id, 'is_active'=>1, 'color_active'=>1, 'size_active'=>1));
                $type_data = $type_datas->result();
                if(!empty($type_data)){
                  if($data->product_view == 3){
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
                  }elseif($data->product_view == 2){
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
              <div class="col-md-3 col-6 productpadding" style="justify:center">
                <div class="product">
                  <?if($data->exclusive==1){?><span class="pr_flash">Exclusive</span>
                  <?}
                  $user_id=$this->session->userdata('user_id');
                  if(!empty($user_id)){
                  $wihslist = $this->db->get_where('tbl_wishlist', array('user_id'=> $user_id,'product_id'=> $data->id,'type_id'=> $type_data[0]->id))->result();
                  if(!empty($wihslist)){
                  ?>
                  <span class="htc float-right">
                    <a href="javascript:void(0)" product_id="<?=base64_encode($data->id)?>" type_id="<?=base64_encode($type_data[0]->id)?>" status="remove" onclick="wishlist(this)"><i class="fa fa-heart float-right" style="color:red;"></i></a>
                    </li></span>
                  <?}else{?>
                  <span class="htc float-right">
                    <a href="javascript:void(0)" product_id="<?=base64_encode($data->id)?>" type_id="<?=base64_encode($type_data[0]->id)?>" status="add" onclick="wishlist(this)"><i class="icon-heart float-right" style="color:red;"></i></a>
                    </li></span>
                  <?}}?>
                  <div class="product_img">
                    <a href="<?=base_url()?>Home/product_detail/<?=$data->url?>?type=<?=base64_encode($type_data[0]->id)?>">
                      <img src="<?=base_url().$type_data[0]->image?>" onmouseover="pro_change(this)" onmouseout="pro_default(this)" img="<?=base_url().$type_data[0]->image?>" img2="<?=base_url().$image1?>" alt="">
                    </a>
                    <div class="product_action_box">
                      <ul class="list_none pr_action_btn">
                        <?php $i=1;
                        $size_arr=[];
                         $more=0; foreach($type_datas->result() as $type_size) {
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
                        <li class="add-to-cart"><a href="<?=base_url()?>Home/product_detail/<?=$data->url?>?type=<?=base64_encode($type_size->id)?>" class="popup-ajax"><?=$size_data->name?></a></li>
                        <?php
                      }}
                      }else{$more++;}$i++;  }
                      // print_r($size_arr);die();
                        if($more > 0){
                          if(!empty($size_data)){
                      ?>
                        <li><a href="<?=base_url()?>Home/product_detail/<?=$data->url?>?type=<?=base64_encode($type_data[0]->id)?>" class="popup-ajax" style="background:transparent; color:white;">+<?=$more?></a></li>
                        <?}
                      }?>
                      </ul>
                    </div>
                  </div>
                  <div class="product_info">
                    <h6 class="product_title"><a href="<?=base_url()?>Home/product_detail/<?=$data->url?>?type=<?=base64_encode($type_data[0]->id)?>"><?=$data->name?></a></h6>
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
                    <div class="pr_desc">
                      <p><?=$data->description?></p>
                    </div>
                  </div>
                </div>
              </div>
              <?}
            }?>
            </div>
            <?}else{?>
              <div>

              </div>
              <?}?>
          </div>
          <div class="row">
            <div class="col-12">
              <?php echo $links; ?>
            </div>
          </div>
        </div>

     


  <!-- ============================================= END BOTTOM FILTER ============================================= -->
  <!-- ============================================= START BOTTOM SORT BY ============================================= -->
  <!-- <div class="modal subscribe_popup" id="sortby" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg  m-0 modal-dialog12" role="document" style="width: 100%; min-width: -webkit-fill-available;">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="ion-ios-close-empty"></i></span>
          </button>
          <div class="row no-gutters">
            <div class="col-sm-12">
              <div class="popup_content">
                <div class="popup-text">
                  <div class="heading_s1">
                    <h6>SORT BY</h6>
                  </div>
                </div>
                <ul style="list-style-type: none;">
                  <li style="padding:15px 0px; border-bottom: 2px solid rgb(235, 232, 232);"> <a href="javascript:;" onclick="soryBy('ASC')">Sort by price: Low to High</a></li>
                  <li style="padding:15px 0px; border-bottom: 2px solid rgb(235, 232, 232);"> <a href="javascript:;" onclick="soryBy('DESC')">Sort by price: High to Low</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->
  <!-- ============================================= END BOTTOM SORT BY ============================================= -->


  <!-- ============================================= START BOTTOM BAR ============================================= -->
  <!-- <div class="container-fluid mobilefilter" style="position: sticky; bottom: 0; background: #fff;z-index:9999;">
    <div class="row text-center">
      <div class="col-6 p-2" style="border-right: 2px solid #dee2e6 ;">
        <a href="#" data-target="#sortby" data-toggle="modal" data-bs-dismiss="modal"> <img src="<?=base_url()?>assets\frontend\images\sort.png"> SORT BY</a>
      </div>
      <div class="col-6 p-2">
        <a href="#" data-target="#filter" data-toggle="modal" data-bs-dismiss="modal"> <img src="<?=base_url()?>assets\frontend\images\filter.png"> FILTER</a>
      </div>
    </div>
  </div> -->
  <!-- ============================================= END BOTTOM BAR ============================================= -->


</div>
<!-- END MAIN CONTENT -->
<script>
  function submitFilters() {
    document.getElementById("applyFilter").submit();
  }

  function submitMOB() {
    document.getElementById("applyFilteronMobile").submit();
  }

  function soryBy(sort) {
    if (sort == "ASC") {
      $('#sort_by').val('ASC')
      $('#sort_byWeb').val('ASC')
    } else {
      $('#sort_by').val('DESC')
      $('#sort_byWeb').val('DESC')
    }
    var width = screen.availWidth
    if(width > 446){
      submitFilters()
    }else{
      submitMOB()
    }
  }

  function selectAllFilters() {
    $('.form-check-input').attr("checked", "true")
  }

  function clearAllFilters() {
    $('.form-check-input').prop("checked", false)
  }

  function selectAttribute(i) {
    $('.attribute' + i).prop("checked", true)
  }
function removeAttributes(i){
  $('.attribute'+i).prop("checked", false)
}

  function LASTaTTR(i) {
    $('.attribute' + i).prop("checked", true)
  }

  function selectColor() {
    $('.colorCheck').prop("checked", true)
  }

  function clearColor() {
    $('.colorCheck').prop("checked", false)
  }



  function selectSize() {
    $('.sizeCheck').prop("checked", true)
  }

  function clearSize() {
    $('.sizeCheck').prop("checked", false)
  }

  function priceReset() {
    $('.reset-price').prop("data-min-value", "false")
    $('.reset-price').prop("data-max-value", "false")
  }
</script>
