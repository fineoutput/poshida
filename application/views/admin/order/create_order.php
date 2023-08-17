<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Create Order
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url() ?>dcadmin/Home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="<?php echo base_url() ?>dcadmin/Percentage_off/view_percentage_off"><i class="fa fa-undo" aria-hidden="true"></i> View Orders </a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Create Order</h3>
          </div>
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
            <div class="col-lg-10">
              <form action="<?php echo base_url() ?>dcadmin/Order/createOrder/<?php echo base64_encode(1); ?>" method="POST" id="slide_frm" enctype="multipart/form-data">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <input type="hidden" name="id" value="<?=$id?>"/>
                    <tr>
                      <td> <strong>Courier Provider</strong> <span style="color:red;">*</span></strong> </td>
                      <td>
                        <select name="courier_id" id="courier_id" class="form-control">
                          <option value="">----Select Courier Provider------</option>
                          <?php $i=1; foreach ($list as $courier) {
                             ?>
                          <option value="<?=$courier->courier_company_id?>" <?if($courier_id==$courier->courier_company_id){echo 'selected';}?>><?=$courier->courier_name?> (₹<?=$courier->freight_charge?>)</option>
                          <?php $i++; } ?>
                        </select>

                      </td>
                    </tr>
                    <tr>
                      <td> <strong>Length(in cm)</strong> <span style="color:red;">*</span></strong> </td>
                      <td>
                        <input type="text" name="length" class="form-control" placeholder="" required value="" onkeypress="return isNumberKey(event)" />
                      </td>
                    </tr>
                    <tr>
                      <td> <strong>Breadth(in cm)</strong> <span style="color:red;">*</span></strong> </td>
                      <td>
                        <input type="text" name="breadth" class="form-control" placeholder="" required value="" onkeypress="return isNumberKey(event)" />
                      </td>
                    </tr>
                    <tr>
                      <td> <strong>Height(in cm)</strong> <span style="color:red;">*</span></strong> </td>
                      <td>
                        <input type="text" name="height" class="form-control" placeholder="" required value="" onkeypress="return isNumberKey(event)" />
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
<script>
  function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
    return true;
  }
</script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/percentage/ajaxupload.3.5.js"></script>
<link href="<?php echo base_url() ?>assets/cowadmin/css/jqvmap.css" rel='stylesheet' type='text/css' />
