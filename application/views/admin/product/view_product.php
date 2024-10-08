<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?=$category_name." > ".$subcategory_name?>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url() ?>dcadmin/Home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="<?php echo base_url() ?>dcadmin/Product/view_product/<?=base64_encode($subcategory_id)?>"><i class="fa fa-undo" aria-hidden="true"></i> View Product </a></li>
      <!-- <li class="active"></li> -->
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-lg-12">
        <?if ($this->session->userdata('position')!='Manager') {?>
        <a class="btn custom_btn" href="<?php echo base_url() ?>dcadmin/Product/add_product/<?=base64_encode($category_id)?>/<?=base64_encode($subcategory_id)?>" role="button" style="margin-bottom:12px;"> Add Product</a>
        <?}?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <div style="margin-bottom:1rem;display:flex;justify-content: space-between;">
              <?php date_default_timezone_set("Asia/Calcutta");
                $cur_date=date("d-m-Y");?>
              <a href="<?=base_url()?>assets/admin/type_dummy.xlsx" download="Type Dummy (<?=$cur_date?>)"><button type="button" class="btn custom_btn">Download Type Excel</button></a>
              <div style="display:flex;border:1px solid grey;padding:2px">
                <form method="post" action="<?=base_url()?>dcadmin/Type/import_type_data" enctype="multipart/form-data" style="display:flex">
                  <input type="file" name="uploadFile" class="form-control" required />
                  <button type="submit" class="btn custom_btn">Upload Types</button>
                </form>
              </div>
            </div>
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
                      <th>Category Name</th>
                      <th>SubCategory Name</th>
                      <th>Product ID</th>
                      <th>Product Name</th>
                      <th>Size-chart Image</th>
                      <th>SKU</th>
                      <th>HSN Code</th>
                      <th>Vendor Code</th>
                      <!-- <th>Product Type</th> -->
                      <th>Product View</th>
                      <th>Short Description</th>
                      <th>Description</th>
                      <th>Exclusive Product</th>
                      <!-- <th>Inventory</th> -->
                      <th>Tags</th>
                      <th>Weight</th>
                      <th>Trending</th>
                      <th>Title</th>
                      <th>Keyword</th>
                      <th>Meta Discription</th>
                      <th>Status</th>
                      <?if ($this->session->userdata('position')!='Manager') {?>
                      <th>Action</th>
                      <?}?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; foreach ($product_data->result() as $data) { ?>
                    <tr>

                      <td><?=$i?></td>
                      <td><?php                    $this->db->select('*');
                            $this->db->from('tbl_category');
                            $this->db->where('id', $data->category_id);
                            $category_data= $this->db->get()->row();

                            if ($category_data !== null) {
                                echo $category_data->name;
                            } else {
                                echo 'Category not found'; 
                            }
                            
                            ?></td>
                      <td><?php
               $this->db->select('*');
                            $this->db->from('tbl_subcategory');
                            $this->db->where('id', $data->subcategory_id);
                            $subcategory_data= $this->db->get()->row();
                            echo $subcategory_data->name;?></td>
                      <td><?php echo $data->id ?></td>
                      <td><?php echo $data->name ?></td>

                      <td>
                        <?php if ($data->image1!="") {  ?>
                        <img id="slide_img_path" height=50 width=100 src="<?php echo base_url().$data->image1 ?>">
                        <?php } else {  ?>
                        Sorry No image Found
                        <?php } ?>
                      </td>

                      <td><?php echo $data->sku ?></td>
                      <td><?php echo $data->hsn_code ?></td>
                      <td><?php echo $data->vendor_code ?></td>

                      <!-- <td><?php
if ($data->product_type==1) {
                                echo"Online";
                            } if ($data->product_type==2) {
                                echo"Offline";
                            } if ($data->product_type==3) {
                                echo"Both";
                            }
?></td> -->
                      <td><?php
if ($data->product_view==1) {
    echo"Retailer";
} if ($data->product_view==2) {
    echo"Reseller";
} if ($data->product_view==3) {
    echo"Both";
}
?></td>

                      <td><?php
                         $string = $data->short_description !== null ? strip_tags($data->short_description) : '';
                       if (strlen($string) > 100) {
                      
                           // truncate string
                           $stringCut = substr($string, 0, 100);
                           $endPoint = strrpos($stringCut, ' ');
                      
                           //if the string doesn't contain any space then it will cut without word basis.
                           $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                           $string .= '...';
                       }
                       echo $string; ?></td>
                      <td><?php
                         $string = $data->description !== null ? strip_tags($data->description) : '';
                       if (strlen($string) > 100) {
                      
                           // truncate string
                           $stringCut = substr($string, 0, 100);
                           $endPoint = strrpos($stringCut, ' ');
                      
                           //if the string doesn't contain any space then it will cut without word basis.
                           $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                           $string .= '...';
                       }
                       echo $string; ?></td>
                      <td><?php
if ($data->exclusive==1) {
    echo"yes";
} else {
    echo"No";
}
?></td>

                      <td><?php echo $data->tags ?></td>
                      <td><?php echo $data->weight ?></td>
                      <td><?php
if ($data->trending==1) {
    echo"yes";
} else {
    echo"No";
}
?></td>
        <td><?php echo $data->title ?></td>
        <td><?php
                       $string = $data->keyword !== null ?strip_tags($data->keyword) : '';
                       if (strlen($string) > 100) {
                      
                           // truncate string
                           $stringCut = substr($string, 0, 100);
                           $endPoint = strrpos($stringCut, ' ');
                      
                           //if the string doesn't contain any space then it will cut without word basis.
                           $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                           $string .= '...';
                       }
                       echo $string; ?></td>
                       <td><?php
                       $string = $data->dsc !== null ? strip_tags($data->dsc) : '';
                       if (strlen($string) > 100) {
                      
                           // truncate string
                           $stringCut = substr($string, 0, 100);
                           $endPoint = strrpos($stringCut, ' ');
                      
                           //if the string doesn't contain any space then it will cut without word basis.
                           $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                           $string .= '...';
                       }
                       echo $string; ?></td>

                      <td><?php if ($data->is_active==1) { ?>
                        <p class="label bg-green">Active</p>

                        <?php } else { ?>
                        <p class="label bg-yellow">Inactive</p>


                        <?php		}   ?>
                      </td>
                      <?if ($this->session->userdata('position')!='Manager') {?>
                      <td>
                        <div class="btn-group" id="btns<?php echo $i ?>">
                          <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu">

                              <?php if ($data->is_active==1) { ?>
                              <li><a href="<?php echo base_url() ?>dcadmin/Product/updateproductStatus/<?php echo base64_encode($data->id) ?>/inactive">Inactive</a></li>
                              <?php } else { ?>
                              <li><a href="<?php echo base_url() ?>dcadmin/Product/updateproductStatus/<?php echo base64_encode($data->id) ?>/active">Active</a></li>
                              <?php		}   ?>
                              <li><a href="<?php echo base_url() ?>dcadmin/Product/update_product/<?php echo base64_encode($data->id) ?>">Edit</a></li>
                              <li><a href="<?php echo base_url() ?>dcadmin/Type/view_type/<?php echo base64_encode($data->id) ?>">Type</a></li>
                              <li><a href="<?php echo base_url() ?>dcadmin/Product/view_buy_with_it/<?php echo base64_encode($data->id) ?>">Buy With It</a></li>
                              <?if ($this->session->userdata('position')=='Super Admin') {?>
                              <li><a href="javascript:;" class="dCnf" mydata="<?php echo $i ?>">Delete</a></li>
                              <?}?>
                            </ul>
                          </div>
                        </div>

                        <div style="display:none" id="cnfbox<?php echo $i ?>">
                          <p> Are you sure delete this </p>
                          <a href="<?php echo base_url() ?>dcadmin/Product/delete_product/<?php echo base64_encode($data->id); ?>" class="btn btn-danger">Yes</a>
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
            columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18] //number of columns, excluding # column
          }
        },
        {
          extend: 'csvHtml5',
          exportOptions: {
            columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18]
          }
        },
        {
          extend: 'excelHtml5',
          exportOptions: {
            columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18]
          }
        },
        {
          extend: 'pdfHtml5',
          exportOptions: {
            columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18]
          }
        },
        {
          extend: 'print',
          exportOptions: {
            columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18]
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
