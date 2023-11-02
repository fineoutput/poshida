<div class="content-wrapper">
  <section class="content-header">
    <h1>
      View Inventory Transactions
    </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">View Inventory Transactions</h3>
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
                <table class="table table-bordered table-hover table-striped" id="userTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Order Id</th>
                      <th>Product Name</th>
                      <th>Size</th>
                      <th>Colour Name</th>
                      <th>Before Inventory</th>
                      <th>After Inventory</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    foreach ($inventory_transactions_data->result() as $data) {
                      $this->db->select('*');
                      $this->db->from('tbl_product');
                      $this->db->where('id', $type_data->product_id);
                      $pro_da = $this->db->get()->row();
                    ?>
                      <tr>
                        <td><?php echo $i ?> </td>
                        <td>#<?php echo $data->order1_id; ?></td>
                        <td><?php echo $pro_da->name; ?></td>
                        <td><?php $this->db->select('*');
                            $this->db->from('tbl_size');
                            $this->db->where('id', $type_data->size_id);
                            $size_data = $this->db->get()->row();
                            echo $size_data->name;

                            ?></td>
                        <td><?php $this->db->select('*');
                            $this->db->from('tbl_colour');
                            $this->db->where('id', $type_data->colour_id);
                            $colour_data = $this->db->get()->row();
                            if (!empty($colour_data)) {
                            ?>
                            <span style="background-color:<?php echo $colour_data->name ?>;border-radius:80%">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
                            <? echo $colour_data->colour_name; ?>
                          <? } else {
                              echo "No Color Found";
                            } ?>
                        </td>
                        <td><?php echo $data->old_inventory; ?></td>
                        <td><?php echo $data->new_inventory; ?></td>
                        <td>
                        <?
                        $newdate = new DateTime($data->date);
                        echo $newdate->format('j F, Y, g:i a');   #d-m-Y  // March 10, 2001, 5:16 pm
                        ?>
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