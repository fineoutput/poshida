<div class="content-wrapper">
<section class="content-header">
<h1>
View Blog
</h1>
<ol class="breadcrumb">
  <li><a href="<?php echo base_url() ?>dcadmin/Home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
  <li><a href="<?php echo base_url() ?>dcadmin/Blog/view_blog"><i class="fa fa-undo" aria-hidden="true"></i> View Blog </a></li>
</ol>
</section>
<section class="content">
<div class="row">
<div class="col-lg-12">
      <?if($this->session->userdata('position')!='Manager'){?>
<a class="btn custom_btn" href="<?php echo base_url() ?>dcadmin/Blog/add_blog" role="button" style="margin-bottom:12px;"> Add Blog</a>
    <?}?>
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title"><i class="fa fa-money fa-fw"></i>View Blog</h3>
</div>
<div class="panel panel-default">

<?php if (!empty($this->session->flashdata('smessage'))) { ?>
<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4><i class="icon fa fa-check"></i> Alert!</h4>
<?php echo $this->session->flashdata('smessage'); ?>
</div>
<?php }
if (!empty($this->session->flashdata('emessage'))) { ?>
<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
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

        <!-- <th>Article Date</th> -->
        <th>Heading</th>
        <th>Short Description</th>
        <th>Full Description</th>
        <th>image</th>
        <th>Title</th>
        <th>Keyword</th>
        <th>Meta Description</th>
        <th>Status</th>
          <?if($this->session->userdata('position')!='Manager'){?>
        <th>Action</th>
        <?}?>
      </tr>
    </thead>
    <tbody>
      <?php $i=1; foreach ($blog_data->result() as $data) { ?>
      <tr>
        <td><?php echo $i ?> </td>

        <!-- <td><?php echo $data->article_date ?></td> -->
        <td><?php echo $data->heading ?></td>
        <td><?php
        $description = strip_tags($data->description);
        if (strlen($description) > 100) {

            // truncate string
            $stringCut = substr($description, 0, 100);
            $endPoint = strrpos($stringCut, ' ');

            //if the string doesn't contain any space then it will cut without word basis.
            $description = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
            $description .= '...';
        }
        echo $description;?></td>
        <td><?php
        $full_description = strip_tags($data->full_description);
        if (strlen($full_description) > 100) {

            // truncate string
            $stringCut = substr($full_description, 0, 100);
            $endPoint = strrpos($stringCut, ' ');

            //if the string doesn't contain any space then it will cut without word basis.
            $full_description = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
            $full_description .= '...';
        }
        echo $full_description;?></td>
        


        <td>
          <?php if ($data->image!="") {  ?>
          <img id="slide_img_path" height=50 width=100 src="<?php echo base_url().$data->image ?>">
          <?php } else {  ?>
          Sorry No image Found
          <?php } ?>
        </td>
        <td><?php echo $data->title ?></td>
        <td><?php echo $data->keyword ?></td>
        <td><?php echo $data->dsc ?></td>        
       
        <td><?php if ($data->is_active==1) { ?>
          <p class="label bg-green">Active</p>

          <?php } else { ?>
          <p class="label bg-yellow">Inactive</p>


          <?php } ?>
        </td>
      <?  if($this->session->userdata('position')!='Manager'){?>
        <td>
          <div class="btn-group" id="btns<?php echo $i ?>">
            <div class="btn-group">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                Action <span class="caret"></span></button>
              <ul class="dropdown-menu" role="menu">
                <?php if ($data->is_active==1) { ?>
                <li><a href="<?php echo base_url() ?>dcadmin/blog/updateblogStatus/<?php echo
base64_encode($data->id) ?>/inactive">Inactive</a></li>
                <?php } else { ?>
                <li><a href="<?php echo base_url() ?>dcadmin/blog/updateblogStatus/<?php echo
base64_encode($data->id) ?>/active">Active</a></li>
                <?php } ?>
                <li><a href="<?php echo base_url() ?>dcadmin/blog/update_blog/<?php echo
base64_encode($data->id) ?>">Edit</a></li>
  <?if($this->session->userdata('position')=='Super Admin'){?>
                <li><a href="javascript:;" class="dCnf" mydata="<?php echo $i ?>">Delete</a></li>
              <?}?>
              </ul>

            </div>
          </div>

          <div style="display:none" id="cnfbox<?php echo $i ?>">
            <p> Are you sure delete this </p>
            <a href="<?php echo base_url() ?>dcadmin/blog/delete_blog/<?php echo
base64_encode($data->id); ?>" class="btn btn-danger">Yes</a>
            <a href="javasript:;" class="cans btn btn-default" mydatas="<?php echo $i ?>">No</a>
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
<!-- <script type="text/javascript" src="<?php echo base_url()
?>assets/slider/ajaxupload.3.5.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/slider/rs.js"></script> -->
