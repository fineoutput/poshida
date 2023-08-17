<div class="content-wrapper">
<section class="content-header">
<h1>
View Out of Stock Products
</h1>
<ol class="breadcrumb">
<li><a href="<?php echo base_url() ?>dcadmin/Home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
</section>
<section class="content">
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title"><i class="fa fa-money fa-fw"></i>View Out of Stock Products</h3>
</div>
<div class="panel panel-default">

<?php if (!empty($this->session->flashdata('smessage'))) { ?>
<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h4><i class="icon fa fa-check"></i> Alert!</h4>
<?php echo $this->session->flashdata('smessage'); ?>
</div>
<?php }
                            if (!empty($this->session->flashdata('emessage'))) { ?>
<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h4><i class="icon fa fa-ban"></i> Alert!</h4>
<?php echo $this->session->flashdata('emessage'); ?>
</div>
<?php } ?>


<div class="panel-body">
<div class="box-body table-responsive no-padding">
<table class="table table-bordered table-hover table-striped" id="userTable">
<thead>
<tr>
<th>#</th>
<th>Product Name</th>
<th>Size</th>
<th>Colour Name</th>
<th>Image-1</th>
<th>Image-2</th>
<th>Image-3</th>
<th>Image-4</th>
<th>Image-5</th>
<th>Image-6</th>
<th>Inventory</th>
<th>Status</th>
</tr>
</thead>
<tbody>
<?php $i=1; foreach ($type_data->result() as $data) { ?>
<tr>
<td><?=$i?></td>
<td><?php                    $this->db->select('*');
                                      $this->db->from('tbl_product');
                                      $this->db->where('id', $data->product_id);
                                      $type_data= $this->db->get()->row();
                                      echo $type_data->name;?></td>

<td><?php  $this->db->select('*');
$this->db->from('tbl_size');
$this->db->where('id', $data->size_id);
$size_data= $this->db->get()->row();
echo $size_data->name;

?></td>

<td><?php  $this->db->select('*');
$this->db->from('tbl_colour');
$this->db->where('id', $data->colour_id);
$colour_data= $this->db->get()->row();
if(!empty($colour_data)){
?>
<span style="background-color:<?php echo $colour_data->name ?>;border-radius:80%">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
<?echo $colour_data->colour_name;?>
<?}else{echo "No Color Found";}?>
</td>

<td>
                      <?php if ($data->image!="") {  ?>
                      <img id="slide_img_path" height=50 width=100 src="<?php echo base_url().$data->image ?>">
                      <?php } else {  ?>
                      Sorry No image Found
                      <?php } ?>
                    </td>
                    <td>
                      <?php if ($data->image2!="") {  ?>
                      <img id="slide_img_path" height=50 width=100 src="<?php echo base_url().$data->image2 ?>">
                      <?php } else {  ?>
                      Sorry No image Found
                      <?php } ?>
                    </td>
                    <td>
                      <?php if ($data->image3!="") {  ?>
                      <img id="slide_img_path" height=50 width=100 src="<?php echo base_url().$data->image3 ?>">
                      <?php } else {  ?>
                      Sorry No image Found
                      <?php } ?>
                    </td>
                    <td>
                      <?php if ($data->image4!="") {  ?>
                      <img id="slide_img_path" height=50 width=100 src="<?php echo base_url().$data->image4 ?>">
                      <?php } else {  ?>
                      Sorry No image Found
                      <?php } ?>
                    </td>
                    <td>
                      <?php if ($data->image5!="") {  ?>
                      <img id="slide_img_path" height=50 width=100 src="<?php echo base_url().$data->image5 ?>">
                      <?php } else {  ?>
                      Sorry No image Found
                      <?php } ?>
                    </td>
                    <td>
                      <?php if ($data->image6!="") {  ?>
                      <img id="slide_img_path" height=50 width=100 src="<?php echo base_url().$data->image6 ?>">
                      <?php } else {  ?>
                      Sorry No image Found
                      <?php } ?>
                    </td>

<td><?php echo $data->inventory ?></td>

<td><?php if ($data->is_active==1) { ?>
<p class="label bg-green">Active</p>

<?php } else { ?>
<p class="label bg-yellow">Inactive</p>


<?php		}   ?>
</td>
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
label {
margin: 5px;
}
</style>
<script src="<?php echo base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap.js"></script>
<script type="text/javascript">
$(document).ready(function() {


$(document.body).on('click', '.dCnf', function() {
var i = $(this).attr("mydata");
console.log(i);

$("#btns" + i).hide();
$("#cnfbox" + i).show();

});

$(document.body).on('click', '.cans', function() {
var i = $(this).attr("mydatas");
console.log(i);

$("#btns" + i).show();
$("#cnfbox" + i).hide();
})

});
</script>
<!-- <script type="text/javascript" src="<?php echo base_url() ?>assets/slider/ajaxupload.3.5.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/slider/rs.js"></script>	  -->
