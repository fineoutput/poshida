<div class="content-wrapper">
<section class="content-header">
<h1>
Model Products
</h1>
<ol class="breadcrumb">
<li><a href="<?php echo base_url() ?>dcadmin/Home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li><a href="<?php echo base_url() ?>dcadmin/Model/view_model"><i class="fa fa-undo" aria-hidden="true"></i> View Model </a></li>
</ol>
</section>
<section class="content">
<div class="row">
<div class="col-lg-12">
  <?if($this->session->userdata('position')!='Manager'){?>
<a class="btn custom_btn" href="<?php echo base_url() ?>dcadmin/Model/add_model_products/<?=$id?>" role="button" style="margin-bottom:12px;"> Add Model Products</a>
<? } ?>
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title"><i class="fa fa-money fa-fw"></i>View Model Products</h3>
</div>
<div class="panel panel-default">

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
<div class="box-body table-responsive no-padding">
<table class="table table-bordered table-hover table-striped" id="userTable">
<thead>
<tr>
<th>#</th>
<th>User Name</th>
<th>Product Name</th>
<!-- <th>Reference Code</th> -->
<!-- <th>Status</th> -->
<?if($this->session->userdata('position')!='Manager'){?>
  <th>Action</th>
  <?}?>
</tr>
</thead>
<tbody>
<?php $i=1; foreach($model_products_data->result() as $data) { ?>
<tr>
<td><?php echo $i ?> </td>
<td><?php                    $this->db->select('*');
                            $this->db->from('tbl_users');
                            $this->db->where('id', $data->user_id);
                            $users_data= $this->db->get()->row();
                            echo $users_data->f_name;?><?=$users_data->l_name;?></td>
<td><?php
               $this->db->select('*');
                            $this->db->from('tbl_product');
                            $this->db->where('id', $data->product_id);
                            $product_data= $this->db->get()->row();
                            echo $product_data->name;?></td>

</td>
<?if($this->session->userdata('position')!='Manager'){?>
<?if($this->session->userdata('position')=='Super Admin'){?>
<td>
<div class="btn-group" id="btns<?php echo $i ?>">
<div class="btn-group">
<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span></button>
<ul class="dropdown-menu" role="menu">

<li><a href="javascript:;" class="dCnf" mydata="<?php echo $i ?>">Delete</a></li>
<?}?>
</ul>
</div>
</div>

<div style="display:none" id="cnfbox<?php echo $i ?>">
<p> Are you sure delete this </p>
<a href="<?php echo base_url() ?>dcadmin/Model/delete_model_product/<?php echo base64_encode($data->id); ?>" class="btn btn-danger" >Yes</a>
<a href="javasript:;" class="cans btn btn-default" mydatas="<?php echo $i ?>" >No</a>
</div>
</td>
  <?}?>
</tr>
<?php $i++; } ?>
</tbody>
</table>






</div>
</div>
</div>

</div>

</div>
</div>
</section>
</div>


<style>
label{
margin:5px;
}
</style>
<script src="<?php echo base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap.js"></script>
<script type="text/javascript">

$(document).ready(function(){
// $('#userTable').DataTable({
// responsive: true,
// // bSort: true
// });

$(document.body).on('click', '.dCnf', function() {
var i=$(this).attr("mydata");
console.log(i);

$("#btns"+i).hide();
$("#cnfbox"+i).show();

});

$(document.body).on('click', '.cans', function() {
var i=$(this).attr("mydatas");
console.log(i);

$("#btns"+i).show();
$("#cnfbox"+i).hide();
})

});

</script>
<!-- <script type="text/javascript" src="<?php echo base_url() ?>assets/slider/ajaxupload.3.5.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/slider/rs.js"></script>	  -->
