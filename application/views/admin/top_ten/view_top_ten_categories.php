<div class="content-wrapper">
<section class="content-header">
  <h1>
    Top Ten Categories
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url() ?>dcadmin/home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="<?php echo base_url() ?>dcadmin/Top_ten/view_top_ten_categories"><i class="icon-undo"></i> View Top Ten Categories </a></li>
    <!-- <li class="active">View Top Ten Categories</li> -->
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-money fa-fw"></i>View Top Ten Categories</h3>
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
                    <th>Name</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; foreach ($category_data->result() as $data) { ?>
                  <tr>
                    <td><?php echo $i ?> </td>
                    <td><?php echo $data->name ?></td>
                    <td>
                      <?php if ($data->image!="") {  ?>
                      <img id="slide_img_path" height=50 width=100 src="<?php echo base_url().$data->image ?>">
                      <?php } else {  ?>
                      Sorry No image Found
                      <?php } ?>
                    </td>
                    <td>
                      <div class="btn-group" id="btns<?php echo $i ?>">
                        <div class="btn-group">
                          <button type="button" class="btn btn-default" onclick="window.location.href='<?=base_url()?>dcadmin/Top_ten/view_top_ten_sub_categories/<?=base64_encode($data->id)?>'"> View Subcategory </button>
                        </div>
                      </div>

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
