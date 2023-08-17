<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Add New Blog
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url() ?>dcadmin/Home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="<?php echo base_url() ?>dcadmin/Blog/view_blog"><i class="fa fa-undo" aria-hidden="true"></i> View Blog </a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-lg-12">

        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Add New Blog</h3>
          </div>

          <? if(!empty($this->session->flashdata('smessage'))){  ?>
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            <? echo $this->session->flashdata('smessage');  ?>
          </div>
          <? }
                                              if(!empty($this->session->flashdata('emessage'))){  ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            <? echo $this->session->flashdata('emessage');  ?>
          </div>
          <? }  ?>

          <div class="panel-body">
            <div class="col-lg-10">
              <form action=" <?php echo base_url()  ?>dcadmin/Blog/add_blog_data/<? echo base64_encode(1);  ?>" method="POST" id="slide_frm" enctype="multipart/form-data">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <!-- <tr>
                      <td> <strong>Article Date</strong> <span style="color:red;">*</span></strong> </td>
                      <td> <input type="text" name="article_date" class="form-control" placeholder="" required value="" /> </td>
                    </tr> -->
                    <tr>
                      <td> <strong>Heading</strong> <span style="color:red;">*</span></strong> </td>
                      <td> <input type="text" name="heading" class="form-control" placeholder="" required value="" /> </td>
                    </tr>
                    <tr>
                      <td> <strong>Short Description</strong> <span style="color:red;">*</span></strong> </td>
                      <td> <input type="text" name="description" class="form-control" placeholder="" required value="" /> </td>
                    </tr>
                    <tr>
                      <td> <strong>Full Description</strong> <span style="color:red;">*</span></strong> </td>
                      <td><textarea name="full_description" class="form-control" placeholder="" required id="editor1"></textarea>
                          </td>
                    </tr>
                    <tr>
                      <td> <strong>Image</strong> <span style="color:red;">*</span></strong> </td>
                      <td> <input type="file" name="image" class="form-control" placeholder="" required value="" />
                        <label style="color:red;">Size 1024*640</label>
                       </td>
                    </tr>

                    <tr>
                      <td> <strong>Title</strong> <span style="color:red;">*</span></strong> </td>
                      <td> <input type="text" name="title" class="form-control" placeholder="" required value="" /> </td>
                    </tr>
                    <tr>


                    <tr>
                      <td> <strong>Keywords</strong> <span style="color:red;">*</span></strong> </td>
                      <td><textarea name="keyword" cols="20" rows="5" class="form-control" placeholder="" required id="editor1"></textarea>

                    </tr>
                    <tr>

                    <tr>
                      <td> <strong>Meta Discription</strong> <span style="color:red;">*</span></strong> </td>
                      <td><textarea name="dsc" cols="20" rows="5" class="form-control" placeholder="" required id="editor1"></textarea>
                    </tr>
                    <tr>
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


<script type="text/javascript" src=" <?php echo base_url()  ?>assets/slider/ajaxupload.3.5.js"></script>
<link href=" <? echo base_url()  ?>assets/cowadmin/css/jqvmap.css" rel='stylesheet' type='text/css' />
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace('editor1');
</script>
