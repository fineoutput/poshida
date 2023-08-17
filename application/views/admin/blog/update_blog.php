<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Update Blog
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
            <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Update Blog </h3>
          </div>

          <?php if (!empty($this->session->flashdata('smessage'))) {  ?>
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            <?php echo $this->session->flashdata('smessage');  ?>
          </div>
          <?php }
                               if (!empty($this->session->flashdata('emessage'))) {  ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            <?php echo $this->session->flashdata('emessage');  ?>
          </div>
          <?php }  ?>


          <div class="panel-body">
            <div class="col-lg-10">
              <form action=" <?php echo base_url(); ?>dcadmin/Blog/add_blog_data/<?php echo base64_encode(2); ?>/<?=$id;?>" method="POST" id="slide_frm" enctype="multipart/form-data">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <!-- <tr>
                      <td> <strong>Article Date</strong> <span style="color:red;">*</span></strong> </td>
                      <td> <input type="text" name="article_date" class="form-control" placeholder="" required value="<?=$blog_data->article_date;?>" /> </td>
                    </tr> -->
                    <tr>
                      <td> <strong>Heading</strong> <span style="color:red;">*</span></strong> </td>
                      <td> <input type="text" name="heading" class="form-control" placeholder="" required value="<?=$blog_data->heading;?>" /> </td>
                    </tr>
                    <tr>
                      <td> <strong>Description</strong> <span style="color:red;">*</span></strong> </td>
                      <td> <input type="text" name="description" class="form-control" placeholder="" required value="<?=$blog_data->description;?>" /> </td>
                    </tr>
                    <tr>
                      <td> <strong>Full Description</strong> <span style="color:red;">*</span></strong> </td>
                      <td>
                        <textarea name="full_description" class="form-control" placeholder="" required id="editor1"><?=$blog_data->full_description;?></textarea>
                         </td>
                    </tr>

                    
                    <tr>
                      <td> <strong>Image</strong> <span style="color:red;">*</span></strong> </td>
                      <td> <input type="file" name="image" class="form-control" placeholder="" value"<?=$blog_data->image;?>"/>
                        <?php if ($blog_data->image!="") { ?> <img id="slide_img_path" height=200 width=300 src="<?php echo base_url().$blog_data->image; ?> "> <?php } else { ?> Sorry No File Found <?php } ?>
                        <label style="color:red;">Size 1024*640</label>
                      </td>
                    </tr>

                    <tr>
                      <td> <strong>Title</strong> <span style="color:red;">*</span></strong> </td>
                      <td> <input type="text" name="title" class="form-control" placeholder="" required value="<?=$blog_data->title;?>" /> </td>
                    </tr>

                    <tr>
                      <td> <strong>Keyword</strong> <span style="color:red;">*</span></strong> </td>
                      <td>
                        <textarea name="keyword" class="form-control" placeholder="" required id="editor1"><?=$blog_data->keyword;?></textarea>
                         </td>
                    </tr>

                    <tr>
                      <td> <strong>Meta Description</strong> <span style="color:red;">*</span></strong> </td>
                      <td>
                        <textarea name="dsc" class="form-control" placeholder="" required id="editor1"><?=$blog_data->dsc;?></textarea>
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


<script type="text/javascript" src=" <?php echo base_url()  ?>assets/slider/ajaxupload.3.5.js"></script>
<link href=" <?php echo base_url()  ?>assets/cowadmin/css/jqvmap.css" rel='stylesheet' type='text/css' />
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace('editor1');
</script>
