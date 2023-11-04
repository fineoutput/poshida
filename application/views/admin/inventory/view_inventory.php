        <div class="content-wrapper">
          <section class="content-header">
            <h1>
              View All Inventory
            </h1>
          </section>
          <section class="content">
            <div class="row">
              <div class="col-lg-12">
                <a class="btn btn-info cticket" href="<?php echo base_url() ?>dcadmin/inventory/view_inventory" role="button" style="margin-bottom:12px;"> <i class="bi bi-chevron-left"></i> Back</a>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title">View inventory</h3>
                  </div>
                  <div class="panel panel-default">
                    <? if (!empty($this->session->flashdata('smessage'))) { ?>
                      <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Alert!</h4>
                        <? echo $this->session->flashdata('smessage'); ?>
                      </div>
                    <? }
                    if (!empty($this->session->flashdata('emessage'))) { ?>
                      <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                        <? echo $this->session->flashdata('emessage'); ?>
                      </div>
                    <? } ?>
                    <div class="panel-body">
                      <div class="box-body table-responsive no-padding">
                        <table class="table table-bordered table-hover table-striped" id="orderTable">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Category Name</th>
                              <th>SubCategory Name</th>
                              <th>Product Name</th>
                              <th>Size</th>
                              <th>Colour Name</th>
                              <th>SKU</th>
                              <th>Inventory</th>
                              <? if ($this->session->userdata('position') != 'Manager') { ?>
                                <th>Action</th>
                              <? } ?>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $i = 1;
                            foreach ($type_data->result() as $data) {
                              $this->db->select('*');
                              $this->db->from('tbl_product');
                              $this->db->where('id', $data->product_id);
                              $pro_da = $this->db->get()->row();
                            ?>
                              <tr>
                                <td><?= $i ?></td>
                                <td><?php $this->db->select('*');
                                    $this->db->from('tbl_category');
                                    $this->db->where('id', $pro_da->category_id);
                                    $category_data = $this->db->get()->row();
                                    echo $category_data->name; ?></td>
                                <td><?php
                                    $this->db->select('*');
                                    $this->db->from('tbl_subcategory');
                                    $this->db->where('id', $pro_da->subcategory_id);
                                    $subcategory_data = $this->db->get()->row();
                                    echo $subcategory_data->name; ?></td>
                                <td><?php echo $pro_da->name; ?></td>

                                <td><?php $this->db->select('*');
                                    $this->db->from('tbl_size');
                                    $this->db->where('id', $data->size_id);
                                    $size_data = $this->db->get()->row();
                                    echo $size_data->name;

                                    ?></td>
                                <td><?php $this->db->select('*');
                                    $this->db->from('tbl_colour');
                                    $this->db->where('id', $data->colour_id);
                                    $colour_data = $this->db->get()->row();
                                    if (!empty($colour_data)) {
                                    ?>
                                    <span style="background-color:<?php echo $colour_data->name ?>;border-radius:80%">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
                                    <? echo $colour_data->colour_name; ?>
                                  <? } else {
                                      echo "No Color Found";
                                    } ?>
                                </td>
                                <td><?php echo $pro_da->sku; ?></td>

                                <td><?php echo $data->inventory ?></td>
                                <? if ($this->session->userdata('position') != 'Manager') { ?>
                                  <td>
                                    <div class="btn-group" id="btns<?php echo $i ?>">
                                      <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span></button>
                                        <ul class="dropdown-menu" role="menu">
                                          <li><a href="<?php echo base_url() ?>dcadmin/Inventory/update_inventory/<?php echo base64_encode($data->id) ?>">Add Inventory</a></li>
                                          <li><a href="<?php echo base_url() ?>dcadmin/Inventory/view_inventory_transactions/<?php echo base64_encode($data->id) ?>">View Transactions</a></li>
                                        </ul>
                                      </div>
                                    </div>

                                    <div style="display:none" id="cnfbox<?php echo $i ?>">
                                      <p> Are you sure delete this </p>
                                      <a href="<?php echo base_url() ?>dcadmin/Product/delete_product/<?php echo base64_encode($data->id); ?>" class="btn btn-danger">Yes</a>
                                      <a href="javasript:;" class="cans btn btn-default" mydatas="<?php echo $i ?>">No</a>
                                    </div>
                                  </td>
                                <? } ?>
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
            columns: [1, 2, 3, 4, 5, 6, 7] //number of columns, excluding # column
          }
        },
        {
          extend: 'csvHtml5',
          exportOptions: {
            columns: [1, 2, 3, 4, 5, 6, 7]
          }
        },
        {
          extend: 'excelHtml5',
          exportOptions: {
            columns: [1, 2, 3, 4, 5, 6, 7]
          }
        },
        {
          extend: 'pdfHtml5',
          exportOptions: {
            columns: [1, 2, 3, 4, 5, 6, 7]
          }
        },
        {
          extend: 'print',
          exportOptions: {
            columns: [1, 2, 3, 4, 5, 6, 7]
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
        <!-- <script type="text/javascript" src="<?php echo base_url()
                                                  ?>assets/slider/ajaxupload.3.5.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/slider/rs.js"></script> -->