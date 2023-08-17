<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Replacement Orders
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url() ?>dcadmin/Home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="<?php echo base_url() ?>dcadmin/Replacement_order/view_replacement_order"><i class="fa fa-undo" aria-hidden="true"></i> Replacement Order </a></li>
      <!-- <li class="active"></li> -->
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-lg-12">
        <? if ($this->session->userdata('position') != 'Manager') { ?>
          <!-- <a class="btn custom_btn" href="<?php echo base_url() ?>dcadmin/order/Add_order" role="button" style="margin-bottom:12px;"></a> -->
        <? } ?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-money fa-fw"></i>View Replacement Order</h3>
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
                <table class="table table-bordered table-hover table-striped" id="orderTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Order Id</th>
                      <th>Product Name</th>
                      <th>Size</th>
                      <th>Color</th>
                      <th>Quantity</th>
                      <th>Reason</th>
                      <th>Message</th>
                      <th>Image-1</th>
                      <th>Image-2</th>
                      <th>Image-3</th>
                      <th>Image-4</th>
                      <th>Image-5</th>
                      <th>Image-6</th>
                      <th>Date</th>
                      <th>Replace/Return Status</th>
                      <? if ($this->session->userdata('position') != 'Manager') { ?>
                        <th>Action</th>
                      <? } ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    foreach ($replacement_order_data->result() as $data) {
                      $order2_data = $this->db->get_where('tbl_order2', array('id' => $data->order2_id))->result();
                      $pro_data = $this->db->get_where('tbl_product', array('id' => $order2_data[0]->product_id))->result();
                      $type_data = $this->db->get_where('tbl_type', array('id = ' => $order2_data[0]->type_id))->result();
                      if (!empty($type_data)) {
                        $sizeOfType = $this->db->get_where('tbl_size', array('id = ' => $type_data[0]->size_id))->result();
                        $colorOfType = $this->db->get_where('tbl_colour', array('id = ' => $type_data[0]->colour_id))->result();
                      } else {
                        $sizeOfType = [];
                        $colorOfType = [];
                      }
                    ?>
                      <tr>
                        <td><?= $i ?></td>
                        <td>
                          <a href="<?php echo base_url() ?>dcadmin/order/order_detail/<?php echo base64_encode($data->order1_id) ?>"><?= $data->order1_id ?></a>
                        </td>
                        <td><?= $pro_data[0]->name ? $pro_data[0]->name : ''; ?></td>
                        <td> <? if (!empty($sizeOfType)) {
                                echo $sizeOfType[0]->name;
                              } else {
                                echo "NA";
                              } ?> </td>
                        <td> <? if (!empty($colorOfType)) { ?><span style="background-color:<?php echo $colorOfType[0]->name ?>;border-radius:50%">&nbsp&nbsp&nbsp&nbsp</span>
                          <? echo $colorOfType[0]->colour_name;
                              } else {
                                echo "NA";
                              } ?> </td>
                        <td><?= $data->quantity; ?></td>
                        <td><?php echo $data->reason ?></td>
                        <td><?php echo $data->message ?></td>
                        <td>
                          <?php if ($data->image != "") {  ?>
                            <img id="slide_img_path" height=50 width=100 src="<?php echo base_url() . $data->image ?>">
                          <?php } else {  ?>
                            Sorry No image Found
                          <?php } ?>
                        </td>
                        <td>
                          <?php if ($data->image2 != "") {  ?>
                            <img id="slide_img_path" height=50 width=100 src="<?php echo base_url() . $data->image2 ?>">
                          <?php } else {  ?>
                            Sorry No image Found
                          <?php } ?>
                        </td>
                        <td>
                          <?php if ($data->image3 != "") {  ?>
                            <img id="slide_img_path" height=50 width=100 src="<?php echo base_url() . $data->image3 ?>">
                          <?php } else {  ?>
                            Sorry No image Found
                          <?php } ?>
                        </td>
                        <td>
                          <?php if ($data->image4 != "") {  ?>
                            <img id="slide_img_path" height=50 width=100 src="<?php echo base_url() . $data->image4 ?>">
                          <?php } else {  ?>
                            Sorry No image Found
                          <?php } ?>
                        </td>
                        <td>
                          <?php if ($data->image5 != "") {  ?>
                            <img id="slide_img_path" height=50 width=100 src="<?php echo base_url() . $data->image5 ?>">
                          <?php } else {  ?>
                            Sorry No image Found
                          <?php } ?>
                        </td>
                        <td>
                          <?php if ($data->image6 != "") {  ?>
                            <img id="slide_img_path" height=50 width=100 src="<?php echo base_url() . $data->image6 ?>">
                          <?php } else {  ?>
                            Sorry No image Found
                          <?php } ?>
                        </td>
                        <td>
                          <?php
                          $newdate = new DateTime($data->date);
                          echo $newdate->format('F j, Y, g:i a');   #d-m-Y  // March 10, 2001, 5:16 pm
                          ?>
                        </td>
                        <td><?php
                            if ($data->replace_status == 0) { ?>
                            <p class="label bg-yellow">Pending</p>
                          <? } elseif ($data->replace_status == 1) { ?>
                            <p class="label bg-blue">Accepted</p>
                          <? } elseif ($data->replace_status == 2) { ?>
                            <p class="label bg-green">Completed</p>
                          <? } else { ?>
                            <p class="label bg-red">Rejected</p>
                          <? }
                          ?>
                        <td>
                          <? if ($this->session->userdata('position') != 'Manager') { ?>
                            <div class="btn-group" id="btns<?php echo $i ?>">
                              <div class="btn-group">
                                <?php if ($data->replace_status == 0) { ?>
                                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span></button>
                                  <ul class="dropdown-menu" role="menu">
                                    <? if ($this->session->userdata('position') == 'Super Admin') { ?>
                                      <?php if ($data->replace_status == 0) { ?>
                                        <li><a href="<?php echo base_url() ?>dcadmin/Replacement_order/updatereplacement_orderStatus/<?php echo base64_encode($data->id) ?>/accept">Accept</a></li>
                                        <li><a href="<?php echo base_url() ?>dcadmin/Replacement_order/updatereplacement_orderStatus/<?php echo base64_encode($data->id) ?>/reject">Reject</a></li>
                                      <? } else if ($data->replace_status == 1) { ?>
                                        <li><a href="<?php echo base_url() ?>dcadmin/Replacement_order/updatereplacement_orderStatus/<?php echo base64_encode($data->id) ?>/complete">Complete</a></li>
                                    <? }
                                    } ?>
                                  </ul>
                                <? } ?>
                              </div>
                            <? } ?>
                            </div>
                        </td>
                      </tr>
                    <?php $i++;
                    } ?>
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
<!-- //===========================order excel====================================\\ -->
<script src="<?php echo base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<!-- <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> -->
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
<script type="text/javascript">
  // buttons: [
  //     'copy', 'csv', 'excel', 'pdf', 'print'
  // ]
  $(document).ready(function() {
    $('#orderTable').DataTable({
      responsive: true,
      "bStateSave": true,
      "fnStateSave": function(oSettings, oData) {
        localStorage.setItem('offersDataTables', JSON.stringify(oData));
      },
      "fnStateLoad": function(oSettings) {
        return JSON.parse(localStorage.getItem('offersDataTables'));
      },
      dom: 'Bfrtip',
      buttons: [{
          extend: 'copyHtml5',
          exportOptions: {
            columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12] //number of columns, excluding # column
          }
        },
        {
          extend: 'csvHtml5',
          exportOptions: {
            columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
          }
        },
        {
          extend: 'excelHtml5',
          exportOptions: {
            columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
          }
        },
        {
          extend: 'pdfHtml5',
          exportOptions: {
            columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
          }
        },
        {
          extend: 'print',
          exportOptions: {
            columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
          }
        },
      ]
    });
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