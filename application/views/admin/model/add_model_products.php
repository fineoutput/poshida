<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

<div class="content-wrapper">
<section class="content-header">
<h1>
Add New Model Products
</h1>
<ol class="breadcrumb">
<li><a href="<?php echo base_url() ?>dcadmin/Home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li><a href="<?php echo base_url() ?>dcadmin/Model/view_model_products/<?=base64_encode($id)?>"><i class="fa fa-undo" aria-hidden="true"></i> View Model Products </a></li>

</ol>
</section>
<section class="content">
<div class="row">
<div class="col-lg-12">

<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Add New Model Products</h3>
</div>

<? if(!empty($this->session->flashdata('smessage'))){ ?>
<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h4><i class="icon fa fa-check"></i> Alert!</h4>
<? echo $this->session->flashdata('smessage'); ?>
</div>
<? }
                			     if(!empty($this->session->flashdata('emessage'))){ ?>
<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h4><i class="icon fa fa-ban"></i> Alert!</h4>
<? echo $this->session->flashdata('emessage'); ?>
</div>
<? } ?>


<div class="panel-body">
<div class="col-lg-10">
  <form action="<?php echo base_url() ?>dcadmin/Model/add_model_products_data/<? echo base64_encode(1); ?>" method="POST" id="slide_frm" enctype="multipart/form-data">
    <div class="table-responsive">
      <table class="table table-hover">
<input type="hidden" name="user_id" value="<?=base64_decode($id)?>" />

        <tr>
          <td> <strong>Product Name</strong> <span style="color:red;">*</span></strong> </td>
          <td>
          <select name="product_id"  class="form-control select2" </select>
            <option value="">----select product------</option>
            <?php $i=1; foreach ($product_data->result() as $product) { ?>
            <option value="<?=$product->id?>"><?=$product->name?> - <?=$product->sku?></option>
            <?php $i++; } ?>
             </select>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <input type="submit" class="btn btn-success" value="save">
          </td>
        </tr>
      </table>
    </div>

  </form>

</div>



</div>

</div>

</div>
</div>
</section>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/slider/ajaxupload.3.5.js"></script>
<link href="<? echo base_url() ?>assets/cowadmin/css/jqvmap.css" rel='stylesheet' type='text/css' />
<script>
    $('.select2').select2();
</script>
