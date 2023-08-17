    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          Payments Request
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url() ?>admin/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="<?php echo base_url() ?>admin/college"><i class="fa fa-undo" aria-hidden="true"></i> All Payments Request </a></li>
          <li class="active">View Payments Request</li>
        </ol>
      </section>
      <section class="content">
        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i>View Payments Request</h3>
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
                          <th>Model Name</th>
                          <th>Phone</th>
                          <th>Reference Code</th>
                          <th>Available Points</th>
                          <th>Requested Points</th>
                          <th>Requested Date</th>
                          <th>Compeleted Date</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=1; foreach ($payment_data->result() as $data) {
                                      $this->db->select('*');
                          $this->db->from('tbl_users');
                          $this->db->where('id',$data->model_id);
                          $modeldata= $this->db->get()->row();
                          if(!empty($modeldata)){

                          ?>
                        <tr>
                          <td><?php echo $i ?> </td>
                          <td><?php echo $modeldata->f_name." ".$modeldata->l_name ?></td>
                          <td><?php echo $modeldata->phone?></td>
                          <td><?php echo $modeldata->reference_code?></td>
                          <td><?php echo $data->available_points?></td>
                          <td><?php echo $data->req_points?></td>
                          <td>
                        <?
                          $newdate = new DateTime($data->date);
                          echo $newdate->format('F j, Y, g:i a');   #d-m-Y  // March 10, 2001, 5:16 pm
                          ?>
                        </td>
                          <td>
                        <?
                        if(!empty($data->completed_date)){
                          $newdate = new DateTime($data->completed_date);
                          echo $newdate->format('F j, Y, g:i a');   #d-m-Y  // March 10, 2001, 5:16 pm
                        }else{
                        echo  'NA';
                        }
                          ?>
                        </td>
                        <td><?php if($data->status==1){ ?>
                        <p class="label bg-green" >Completed</p>

                      <?php } else if($data->status==0) { ?>
                        <p class="label bg-yellow" >Pending</p>
                      <?php		}else{  ?>
                        <p class="label bg-red" >Rejected</p>

                        <?}?>
                      </td>
                          <td>
                            <?  if($this->session->userdata('position')!='Manager'){?>
                              <?php if($data->status==0){ ?>
                            <div class="btn-group" id="btns<?php echo $i ?>">
                              <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span></button>
                                <ul class="dropdown-menu" role="menu">
                                  <?php if ($data->status==0) { ?>
                                  <li><a href="<?php echo base_url() ?>dcadmin/Payment_requests/updatePaymentStatus/<?php echo base64_encode($data->id) ?>/complete">Complete</a></li>
                                    <li><a href="<?php echo base_url() ?>dcadmin/Payment_requests/updatePaymentStatus/<?php echo base64_encode($data->id) ?>/reject">Reject</a></li>
                                  <?php } ?>
                                </ul>
                              </div>
                            </div>
                            <?}}?>
                            <div style="display:none" id="cnfbox<?php echo $i ?>">
                              <p> Are you sure delete this </p>
                              <a href="<?php echo base_url() ?>admin/home/delete_team/<?php echo base64_encode($data->id); ?>" class="btn btn-danger">Yes</a>
                              <a href="javasript:;" class="cans btn btn-default" mydatas="<?php echo $i ?>">No</a>
                            </div>
                          </td>
                        </tr>
                      <?php }
                         $i++; } ?>
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
