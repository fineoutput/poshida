<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title><?php echo SITE_NAME ?> | Admin <?php if (isset($headerTitle)) {
                                            echo "- " . $headerTitle;
                                          } ?></title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <link href="<?php echo base_url() ?>assets/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="https://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />


  <!-- icon   -->
  <link rel="shortcut icon" href="<?= base_url() ?>assets/logo.png" type="image/x-icon" />
  <!-- icon   -->


  <link href="<?php echo base_url() ?>assets/admin/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url() ?>assets/admin/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url() ?>assets/admin/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url() ?>assets/admin/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url() ?>assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url() ?>assets/admin/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url() ?>assets/admin/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url() ?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

  <!--start excel header cdn ------>
  <link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
  </script>
  <!--end excel ------>
  <style>
    /* ==============================Custom theme=========================================== */
    .custom_btn {
      color: white;
      background-color: #e3c4c5 !important;
    }

    .custom_btn:hover {
      color: #e99999;
      background-color: white !important;
    }

    .custom_header {
      color: white;
      background-color: #e3c4c5 !important;
    }

    .custom_sidebar {
      color: white;
      background-color: white !important;
    }

    /* .custom_header>a:hover {
      color: black;
      background: white !important;
      border-left-color: white;
    } */

    .custom_header>li>a:hover {
      color: #fff;
      background: #262626;
      border-left-color: hsl(353deg 91% 53%);
    }

    .active>a {
      color: #fff;
      background: #e3c4c5 !important;
      border-color: #f9cdcc !important;
    }

    .skin-blue .sidebar-menu>li>.treeview-menu {
      color: black !important;
      background-color: #f9cdcc;
    }

    .skin-blue .treeview-menu>li>a {
      color: black;
    }

    .skin-blue .treeview-menu>li>a:hover {
      color: #e3c4c5;
    }

    .skin-blue .sidebar-menu>li>a:hover {
      color: black;
      background: #e3c4c5 !important;
      border-left-color: black;
    }

    .skin-blue .sidebar a {
      color: black;
    }

    .skin-blue .wrapper,
    .sidebar {
      background-color: white !important;
    }

    .skin-blue .main-sidebar {
      color: #84c34d;
    }

    /* .skin-blue .main-header .logo:hover {
      background-color: #fff !important;
      color: #e3c4c5 !important;
      border-bottom: 0 solid #1e0c0c00;
    } */

    .skin-blue .main-header .logo {
      color: white !important;
    }

    .main-header .sidebar-toggle:hover {
      color: #e3c4c5 !important;
    }

    .main-header .sidebar-toggle {
      color: white !important;
    }

    .navbar-nav>.user-menu>.dropdown-menu>.user-footer .btn-default {
      color: #e3c4c5;
    }

    label {
      margin: 5px;
    }

    b {
      font-weight: 700;
    }

    i,
    em {
      font-style: italic;
    }

    .clear {
      border: 0;
      clear: both;
      height: 0;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p {
      font-weight: normal;
      margin: 0;
    }

    h1,
    h2,
    h3,
    h4,
    .my-jumbotron.jumbotron h1 {
      font-family: 'Roboto Slab', serif;
    }


    .popup {
      width: 100%;
      height: 100%;
      display: none;
      position: fixed;
      top: 0px;
      left: 0px;
      background: rgba(0, 0, 0, 0.75);
    }

    .popup {
      text-align: center;
    }

    .popup:before {
      content: '';
      display: inline-block;
      height: 100%;
      margin-right: -4px;
      vertical-align: middle;
    }

    .popup-inner {
      display: inline-block;
      text-align: left;
      vertical-align: middle;
      position: relative;
      max-width: 700px;
      width: 90%;
      padding: 40px;
      box-shadow: 0px 2px 6px rgba(0, 0, 0, 1);
      border-radius: 3px;
      background: #fff;
      text-align: center;
    }

    .popup-inner h1 {
      font-family: 'Roboto Slab', serif;
      font-weight: 700;
    }

    .popup-inner p {
      font-size: 24px;
      font-weight: 400;
    }

    .popup-close {
      width: 34px;
      height: 34px;
      padding-top: 4px;
      display: inline-block;
      position: absolute;
      top: 20px;
      right: 20px;
      -webkit-transform: translate(50%, -50%);
      transform: translate(50%, -50%);
      border-radius: 100%;
      background: transparent;
      border: solid 4px #808080;
    }

    .popup-close:after,
    .popup-close:before {
      content: "";
      position: absolute;
      top: 11px;
      left: 5px;
      height: 4px;
      width: 16px;
      border-radius: 30px;
      background: #808080;
      -webkit-transform: rotate(45deg);
      transform: rotate(45deg);
    }

    .popup-close:after {
      -webkit-transform: rotate(-45deg);
      transform: rotate(-45deg);
    }

    .popup-close:hover {
      -webkit-transform: translate(50%, -50%) rotate(180deg);
      transform: translate(50%, -50%) rotate(180deg);
      background: #f00;
      text-decoration: none;
      border-color: #f00;
    }

    .popup-close:hover:after,
    .popup-close:hover:before {
      background: #fff;
    }

    .dropdown-toggle:hover {
      background-color: #fff !important;
    }

    .skin-blue .main-header .navbar .nav>li>a:hover {
      color: #e3c4c5 !important;
    }

    .skin-blue .main-header .navbar .nav>li>a {
      color: white !important;
    }
  </style>



<style>
      /* Common styles for the arrow icon */
      .arrow {
        width: 0;
        height: 0;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
      }

      /* Default down arrow icon */
      .arrow::after {
        content: "\f0d7";
        display: inline-block;
        vertical-align: middle;
        font: normal normal normal 18px/1 FontAwesome;
      }

      /* Up arrow icon when the list item has the .active class */
      li.active .arrow::after {
        content: "\f0d8";

      }
    </style>
</head>

<body class="skin-blue">
  <div class="wrapper">

    <header class="main-header custom_header">
      <!-- Logo -->
      <a href="<?= base_url() ?>dcadmin/home" class="logo custom_header" style=" background: white !important;"><img src="<? echo base_url() ?>assets/frontend/img/logo_update.jpg"  style="width:37%;
      " alt="User Image" /></a>
      <!-- <h4 class="logo custom_header" style="background-color:white !important;  color: #e3c4c5 !important;
">Poshida</h4> -->
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top custom_header" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <li class="dropdown user user-menu">
           
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                <?
                if (!empty($image)) {
                ?>
                  <img src="<? echo base_url() ?><? echo $image; ?>" class="img-circle" style="width:30px;height:30px;" alt="User Image" />
                <?
                } else {
                ?>
                  <img src="<? echo base_url() ?>assets/admin/team/avatar.png" class="img-circle" style="width:20px;height:20px;" alt="User Image" />
                <?


                }
                ?>


                <span class="hidden-xs"> <? print_r($user_name); ?> </span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header custom_header">
                  <?
                  if (!empty($image)) {
                  ?>
                    <img src="<? echo base_url() . $image; ?>" class="img-circle" style="width:30px;height:30px;" alt="User Image" />
                  <?
                  } else {
                  ?>
                    <img src="<? echo base_url() ?>assets/admin/team/avatar.png" class="img-circle" style="width:70px;height:70px;" alt="User Image" />
                  <?


                  }
                  ?>

                  <p>
                    <? print_r($user_name); ?>
                    <small> <? print_r($position); ?> </small>
                  </p>
                </li>
                <!-- Menu Body -->
                <!-- <li class="user-body"> -->
                <!-- <div class="col-xs-4 text-center"> -->
                <!-- <a href="#">Followers</a> -->
                <!-- </div> -->
                <!-- <div class="col-xs-4 text-center"> -->
                <!-- <a href="#">Sales</a> -->
                <!-- </div> -->
                <!-- <div class="col-xs-4 text-center"> -->
                <!-- <a href="#">Friends</a> -->
                <!-- </div> -->
                <!-- </li> -->
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<? echo base_url() . ADMIN_URL ?>/system/profile" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<? echo base_url() ?>login/logout" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>



   
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar os-host-overflow">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <?
            if (!empty($imgr)) {
            ?>
              <img src="<? echo base_url() ?>assets/uploads/team/<? echo $imgr; ?>" class="img-circle" alt="User Image" />
            <?
            } else {
            ?>
              <img src="<? echo base_url() ?>assets/admin/team/avatar.png" class="img-circle" alt="User Image" />
            <?


            }
            ?>

          </div>
          <div class="pull-left info">
            <p> <? print_r($user_name); ?></p>

            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- search form -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form> -->
        <!-- /.search form -->

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu custom_header">
            <li class="header custom_header">MAIN NAVIGATION</li>
            <li class="treeview" style="font-size: 14px;"> <a href="<?=base_url()?>" target="_blank"><i class="fa fa-eye"></i>&nbsp;&nbsp; <span>View Site</span></a></li>

            <?
            // print_r($sidebar);
            // exit;
            foreach ($sidebar as $sd) {


              $currentURL = current_url();
              $urls = base_url() . ADMIN_URL . "/" . $sd['url'];
            ?>
              <li class="treeview">
                <a href="<?
                          $this->db->select('*');
                          $this->db->from('tbl_admin_sidebar2');
                          $this->db->where('main_id', $sd['id']);
                          $dsaww = $this->db->get();
                          $dawwa = $dsaww->row();
                          if (empty($dawwa)) {

                            echo base_url() . ADMIN_URL . "/" . $sd['url'] . '">'; ?>
            <span style=" <?php if ($currentURL == $urls) {
                              echo "color: #e3c4c5;";
                            } ?>"><i class="fa fa-circle"></i></span>&nbsp;
                  <span><? echo $sd['name'] ?></span>
                  <span class="label label-primary pull-right"></span>
                </a>

              </li>
              <?
                          } else {
                            $nam = "";
                            $contr_nam = "";
                            $a = uri_string();
                            $b = $this->uri->segment(2);
                            $n = $this->uri->segment(3);
                            $x = trim($b . "/" . $n);
                            $this->db->select('*');
                            $this->db->from('tbl_admin_sidebar2');
                            $this->db->where('url', $x);
                            $side2_dat = $this->db->get()->row();
                            // print_r($side2_dat); die();
                            if (!empty($side2_dat)) {
                              $m_id = $side2_dat->main_id;
                              $url_id = $side2_dat->url;
                              $var = explode('/', $url_id);
                              $contr_nam = $var[0];

                              $this->db->select('*');
                              $this->db->from('tbl_admin_sidebar');
                              $this->db->where('id', $m_id);
                              $side1_dat = $this->db->get()->row();
                              if (!empty($side1_dat)) {
                                $nam = $side1_dat->name;
                              }
                            }
                            // echo $x= $b."/".$n; die();
                            if ($nam == $sd['name']) {
                              // echo $m_id;
                              // if($contr_nam == $b){}
                              echo ''; ?>#"> <span style="color: #e3c4c5;"><i class="fa fa-circle"></i></span> &nbsp;
              <span><?= $sd['name'] ?></span>

              <span class="label label-primary pull-right"></span>



              </a>
              <ul class="treeview-menu" style="display:block;">
                <?
                            } else {
                              // echo $m_id;
                              echo '';  ?>#"> 
                              
                             
                              <div> <span style=""><i class="fa fa-circle"></i></span> &nbsp;
                <span><?= $sd['name']; ?></span> <div class="hell">
                <i class=" icon-arr arrow"></i>
                </div> </div> 
                
                
                 


                <span class="label label-primary pull-right"></span>
                </a>
                <ul class="treeview-menu">
                <?
                            }
                            $this->db->select('*');
                            $this->db->from('tbl_admin_sidebar2');
                            $this->db->where('main_id', $sd['id']);
                            $dsa = $this->db->get();
                            foreach ($dsa->result() as $data) {
                              $urlss = base_url() . ADMIN_URL . "/" . $data->url;
                ?>


                  <li><a href="<? echo base_url() . ADMIN_URL ?>/<? echo $data->url; ?>"><span style="<?php if ($currentURL == $urlss) {
            echo "color: #e3c4c5;";      
                } ?>"><i class="fa fa-circle-o"></i></span>&nbsp;<?php echo $data->name; ?></a></li>
                <?
                            }
                ?>
                </ul>
                </li>
              <?


                          }
              ?>




            <?
            }


            ?>


              </ul>

        </section>
      <!-- /.sidebar -->
    </aside>
    <script src="<?php echo base_url() ?>assets/admin/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      var base_url = "<?php echo base_url() ?>";
    </script>