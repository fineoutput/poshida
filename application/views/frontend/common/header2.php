<!DOCTYPE html>
<html lang="en">


<head>
  <!-- Basic Page Needs -->
  <meta charset="utf-8">
  <!-- PAGE TITLE -->
  <? if (!empty($title)) { ?>
    <title><?= $title ?></title>
  <? } else { ?>
    <title>Poshida</title>
  <? } ?>
  <!-- //-------- PAGE KEYWORDS ------ -->
  <? if (!empty($keyword)) { ?>
    <meta name="keywords" content="<?= $keyword ?>">
  <? } ?>
  <!-- -------- PAGE DESCRIPTION ---------- -->
  <? if (!empty($dsc)) { ?>
    <meta name="description" content="<?= $dsc ?>">
  <? } ?>
  <link rel="canonical" href="https://www.poshida.in/">

  <meta name="google-site-verification" content="CuMy5Mu3gGOC41M6wxypzrV2jXpos0v_BD8NYcP0mAQ" />
  <!-- Mobile Specific Metas -->
  <!-- Meta Pixel Code -->
  <script>
    ! function(f, b, e, v, n, t, s) {
      if (f.fbq) return;
      n = f.fbq = function() {
        n.callMethod ?
          n.callMethod.apply(n, arguments) : n.queue.push(arguments)
      };
      if (!f._fbq) f._fbq = n;
      n.push = n;
      n.loaded = !0;
      n.version = '2.0';
      n.queue = [];
      t = b.createElement(e);
      t.async = !0;
      t.src = v;
      s = b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
      'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '2244723279195274');
    fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=2244723279195274&ev=PageView&noscript=1" /></noscript>
  <!-- End Meta Pixel Code -->
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "Poshida",
      "alternateName": "Poshida By Ronak Textiles",
      "url": "https://www.poshida.in/",
      "logo": "https://www.poshida.in/assets/frontend/img/logo_update.jpg",
      "sameAs": [
        "https://www.facebook.com/people/Poshida/61551728737337/",
        "https://www.instagram.com/poshi.da/",
        "https://www.linkedin.com/company/poshida/?viewAsMember=true",
        "https://www.youtube.com/@Poshida_",
        "https://www.poshida.in/",
        "https://in.pinterest.com/Poshida01/"
      ]
    }
  </script>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link type="image/x-icon" href="<?= base_url() ?>assets/frontend/img/logo_update.jpg" rel="icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/frontend/css/xpoge.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/frontend/css/responsive.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/frontend/css/ionicons.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url() ?>assets/frontend/css/responsive-addcartbtn.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-J79RWNFJXV"></script>

  <!-- <=======google font=====> -->
  <link href="https://fonts.cdnfonts.com/css/geometr415-blk-bt" rel="stylesheet">
  <link href="https://db.onlinewebfonts.com/c/1ba82d324736a8a9d4327d482c4627c4?family=Ebrima" rel="stylesheet">

  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-J79RWNFJXV');
  </script>
  <style>
    .product-details-btn ul {
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .nav>li {
      position: inherit;
      display: inline-block;
      padding: 0px 8px !important;
      font-size: 9px !important;
    }

    .megamenu .sub-menu-level2 li.level3>a {
      display: inline-block;
      padding: 4px 0;
      font-size: 13px;
    }



    .modal-content {
      border: 0px;
    }

    i.bi.bi-chevron-down {
      color: black !important;
      font-size: 15px;
    }

    .sidebar .sidebar-default {
      background: transparent;
      padding: 10px;
      margin-bottom: 0px !important;
      width: 100%;
    }

    .accordion.accordion_style1.mt-0.sidebar-default {
      /* border-bottom: 2px solid #c68fa6 !important; */
      margin-bottom: 2px !important;
      padding: 10px auto !important;
    }

    @media (min-width:991px) {
      .mobilebottom {
        display: none;
      }
    }

    .navbar-nav>li>a {
      padding: 14px 0px !important;
      display: inline-block;
      font-weight: 400;
      color: #333;
      font-size: 14px;
      position: relative;
    }

    /* .collapse:not(.show) {
			display: none;
		} */

    .card {
      position: relative;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-direction: column;
      flex-direction: column;
      min-width: 0;
      word-wrap: break-word;
      background-color: #cac6c6;
      background-clip: border-box;
      border: 1px solid rgba(0, 0, 0, .125);
      border-radius: .25rem;

    }

    .card-body {
      -ms-flex: 1 1 auto;
      flex: 1 1 auto;
      min-height: 1px;
      padding: 1.25rem;
    }

    .card-header {
      padding: .75rem 1.25rem;
      margin-bottom: 0;
      background-color: rgba(0, 0, 0, .03);
      border-bottom: 1px solid rgba(0, 0, 0, .125);
    }

    .card-header:first-child {
      border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
    }

    .accordion {
      overflow-anchor: none;
    }

    .accordion>.card {
      overflow: hidden;
    }

    .accordion>.card:not(:last-of-type) {
      border-bottom: 0;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }

    .accordion>.card:not(:first-of-type) {
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }

    .accordion>.card>.card-header {
      border-radius: 0;
      margin-bottom: -1px;
    }


    @media (min-width:992px) {
      .mt-lg-0 {
        margin-top: 0 !important;
      }

      .pt-lg-0 {
        padding-top: 0 !important;
      }
    }


    /*! CSS Used from: https://www.tiarastore.co.in/assets/frontend/css/jquery-ui.css */
    .ui-slider {
      position: relative;
      text-align: left;
    }

    .ui-slider .ui-slider-handle {
      position: absolute;
      z-index: 2;
      width: 1.2em;
      height: 1.2em;
      cursor: default;
      -ms-touch-action: none;
      touch-action: none;
    }

    .ui-slider .ui-slider-range {
      position: absolute;
      z-index: 1;
      font-size: .7em;
      display: block;
      border: 0;
      background-position: 0 0;
    }

    .ui-slider-horizontal {
      height: .8em;
    }

    .ui-slider-horizontal .ui-slider-handle {
      top: -.3em;
      margin-left: -.6em;
    }

    .ui-slider-horizontal .ui-slider-range {
      top: 0;
      height: 100%;
    }

    .ui-widget {

      font-size: 1em;
    }

    .ui-widget.ui-widget-content {
      border: 1px solid #c5c5c5;
    }

    .ui-widget-content {
      border: 1px solid #dddddd;
      background: #ffffff;
      color: #333333;
    }

    .ui-widget-header {
      border: 1px solid #dddddd;
      background: #e9e9e9;
      color: #333333;
      font-weight: bold;
    }

    .ui-state-default,
    .ui-widget-content .ui-state-default {
      border: 1px solid #c5c5c5;
      background: #f6f6f6;
      font-weight: normal;
      color: #454545;
    }

    .ui-corner-all {
      border-top-left-radius: 3px;
    }

    .ui-corner-all {
      border-top-right-radius: 3px;
    }

    .ui-corner-all {
      border-bottom-left-radius: 3px;
    }

    .ui-corner-all {
      border-bottom-right-radius: 3px;
    }

    .colorcheckboxes .colorspann::before {
      content: "";
      border: 2px solid #fff;
      position: absolute;
      left: 0;
      right: 0;
      top: 0;
      bottom: 0;
      margin: -3px;
      border-radius: 100%;
      box-shadow: 0 0 5px rgb(0 0 0 / 50%);
    }

    @media (max-width: 991px) {
      .desktopfilterlist {
        display: none;
      }
    }

    .scrollbarr::-webkit-scrollbar {
      width: 0.2125rem;
    }

    .scrollbarr::-webkit-scrollbar-track {
      background-color: transparent;
    }

    .scrollbarr::-webkit-scrollbar-thumb {
      background: #c68fa6;
    }

    .accordion .card .card-header {
      background-color: transparent;
      padding: 0px;
      margin: 0;
      border: 0px;
    }

    .accordion .card-header a {
      /* padding: 15px 40px 15px 15px; */
      display: block;
      line-height: normal;
    }

    .accordion .card-body p:last-child {
      margin: 0;
    }

    .card-body p {
      margin-bottom: 15px;
    }

    .accordion_style1.accordion .card {

      margin-bottom: 15px;
      border-radius: 0;
      border: 0;


      background: transparent;

    }

    .accordion_style1.accordion .card:last-child {
      margin-bottom: 0;
    }



    .accordion.accordion_style1 .card-header a {
      padding-left: 0;
      padding-top: 0;
      font-weight: 500 !important;
      text-transform: capitalize;
      font-family: 'Montserrat', sans-serif;
      font-size: 16px;
      line-height: 30px;
      margin-bottom: 0px !important;

      color: inherit !important;
    }

    .accordion_style1 .card-header a::after {
      content: "\f106";
      /* content: ""; */
      font-family: "FontAwesome";
      font-size: 16px;
      font-weight: normal;
      position: absolute;
      right: 15px;
      top: 1px;
    }

    .accordion_style1 .card-header a[aria-expanded="false"]::after {
      content: "\f107";
    }

    .product_color_switch span {
      height: 15px;
      width: 15px;
      display: inline-block;
      vertical-align: middle;
      margin: 5px;
      position: relative;
      cursor: pointer;
      border-radius: 100%;
    }

    .product_color_switch span:first-child {
      -webkit-transition: all 0.2s ease 0s;
      -o-transition: all 0.2s ease 0s;
      transition: all 0.2s ease 0s;
    }

    .product_color_switch span:nth-child(2) {
      -webkit-transition: all 0.3s ease 0s;
      -o-transition: all 0.3s ease 0s;
      transition: all 0.3s ease 0s;
    }

    .list_brand li {
      list-style: none;
      margin-bottom: 10px;
    }

    .list_brand li:last-child {
      margin-bottom: 0;
    }

    .list_brand .custome-checkbox .form-check-label {
      color: #292b2c;
    }

    .filter_price .ui-widget.ui-widget-content {
      border: 0;
      border-radius: 0;
      background-color: #ddd;
      height: 4px;
      margin-bottom: 20px;
    }

    .ui-slider-horizontal .ui-slider-range {
      top: 0;
      height: 100%;
    }

    .filter_price .ui-slider .ui-slider-range {
      background-color: #c68fa6;
      border-radius: 0;
    }

    .filter_price .ui-slider .ui-slider-handle {
      cursor: pointer;
      background-color: #fff;
      border-radius: 100%;
      border: 0;
      height: 18px;
      top: -8px;
      width: 18px;
      margin: 0;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .price_range {
      color: #292b2c;
    }

    #flt_price {
      margin-left: 5px;
      font-weight: 600;
    }

    .widget_title {
      margin-bottom: 25px;
      text-transform: capitalize;
      font-weight: 600;
      letter-spacing: 0.3px;
    }

    .custome-checkbox .form-check-label {
      position: relative;
      cursor: pointer;
      color: #687188;
      padding: 0;
      vertical-align: middle;
    }

    .custome-checkbox .form-check-input {
      display: none;
    }

    .custome-checkbox .form-check-label span {
      vertical-align: middle;
    }

    .custome-checkbox .form-check-label::before {
      content: "";
      border: 2px solid #ced4da;
      height: 17px;
      width: 17px;
      margin: 0px 8px 0 0;
      display: inline-block;
      vertical-align: middle;
    }

    .custome-checkbox input[type="checkbox"]:checked+.form-check-label::after {
      opacity: 1;
    }

    .custome-checkbox input[type="checkbox"]+.form-check-label::after {
      content: "";
      width: 11px;
      position: absolute;
      top: 50%;
      left: 3px;
      opacity: 0;
      height: 6px;
      border-left: 2px solid #fff;
      border-bottom: 2px solid #fff;
      -moz-transform: translateY(-65%) rotate(-45deg);
      -webkit-transform: translateY(-65%) rotate(-45deg);
      transform: translateY(-65%) rotate(-45deg);
    }

    .colorcheckboxess input[type="checkbox"]+.form-check-label::after {
      content: "";
      width: 11px;
      position: absolute;
      top: 40% !important;
      left: 3px;
      opacity: 0;
      height: 6px;
      border-left: 2px solid #fff;
      border-bottom: 2px solid #fff;
      -moz-transform: translateY(-65%) rotate(-45deg);
      -webkit-transform: translateY(-65%) rotate(-45deg);
      transform: translateY(-65%) rotate(-45deg);
    }

    .custome-checkbox input[type="checkbox"]:checked+.form-check-label::before {
      background-color: #c68fa6;
      border-color: #c68fa6;
    }

    .custome-checkbox .form-check-input {
      display: none;
    }

    .custome-checkbox .form-check-label {
      position: relative;
      cursor: pointer;
    }

    /*! CSS Used from: https://www.tiarastore.co.in/assets/frontend/css/responsive.css */
    @media only screen and (max-width: 575px) {
      p {
        margin-bottom: 15px;
      }

      .widget_title {
        margin-bottom: 20px;
      }
    }

    @media only screen and (max-width: 480px) {
      p {
        line-height: 24px;
      }

      h6 {
        font-size: 14px;
      }

      p {
        margin-bottom: 15px;
      }
    }


    @media (max-width:980px) {
      .contant {
        margin-top: 100px !important;
      }

      .inner-banner {
        padding: 26px 0 !important;
      }
    }

    @media (max-width:980px) {
      .contant {
        margin-top: 100px !important;
      }

      .inner-banner {
        padding: 1px 0 !important;
      }

      .inner-banner {
        padding: 2px 0 !important;
      }


      .banner-22 {
        height: 100%;
        position: relative;
        margin-top: 0px !important;
      }
    }

    @media (max-width: 768px) {
      .banner-21 {
        height: 100%;
        position: relative;
        margin-top: 91px !important;
      }

      .banner {
        margin-top: 90px !important;
      }

      .contant {
        margin-top: 81px !important;
      }
    }


    @media (max-width: 425px) {
      .banner {
        margin-top: 99px !important;
      }
    }

    @media (max-width: 375px) {
      .banner {
        margin-top: 91px !important;
      }
    }

    @media (max-width: 320px) {
      .banner-21 {
        height: 100%;
        position: relative;
        margin-top: 81px !important;
      }

      .banner {
        margin-top: 80px !important;
      }
    }

    div#google_translate_element span {

      font-size: 9px !important;
    }

    div#google_translate_element {
      margin-right: 10px;
    }

    @media(max-width:982px) {
      .hr {
        display: none;
      }
    }

    .nav>li {
      position: inherit;
      display: inline-block;
      padding: 0px 8px !important;
      font-size: 9px !important;
    }



    div#google_translate_element {
      margin-right: 10px;
    }

    @media(max-width:982px) {
      .hr {
        display: none;
      }
    }


    @media (max-width: 768px) {
      .vkmmkj {
        display: block !important;
        align-self: center;
        position: relative;
        left: -77px;
      }

      .header-right-link {
        float: left;
        position: relative;
        left: -61px;
      }

    }

    @media (max-width: 578px) {
      .vkmmkj {
        display: block !important;
        align-self: center;
        position: relative;
        left: -77px;
      }

      .dgsfgdfg {
        /* display: block !important; */
        align-self: center;
        position: relative;
        right: -77px;
      }

    }

    @media (max-width: 436px) {
      .vkmmkj {
        display: block !important;
        align-self: center;
        position: relative;
        left: -50px;
      }


    }

    @media (max-width: 425px) {
      .header-right-link {
        float: left;
        position: relative;
        left: -61px;
      }

      .vkmmkj {
        display: block !important;
        align-self: center;
        position: relative;
        left: -29px;
      }

    }

    @media (max-width: 375px) {
      .header-right-link {
        float: left;
        position: relative;
        left: -75px;
      }

      .vkmmkj {
        display: block !important;
        align-self: center;
        position: relative;
        left: -29px;
      }

    }

    @media (max-width: 338px) {
      .header-right-link {
        float: left;
        position: relative;
        left: -61px;
      }

      .vkmmkj {
        display: block !important;
        align-self: center;
        position: relative;
        left: -29px;
      }

    }



    @media (max-width: 598px) {
      .header-right-link {
        float: left;
        position: relative;
        left: -113px;
      }
    }

    @media (max-width: 542px) {
      .header-right-link {
        float: left;
        position: relative;
        left: -58px;
      }
    }

    @media (max-width: 426px) {
      .header-right-link {
        float: left;
        position: relative;
        left: -77px;
      }
    }

    @media (max-width: 338px) {
      .header-right-link {
        float: left;
        position: relative;
        left: -87px;
      }
    }

    .centar-list {
      display: none !important;
    }

    @media(max-width:991px) {
      .centar-list {
        display: block !important;
      }

      .responice-list-menu {
        display: none !important;
      }
    }


    @media(max-width:1199px) {
      .dcdsss {
        top: 8px !important;
      }
    }

    @media(max-width:1098px) {
      .dcdsss {
        top: 5px !important;
      }
    }



    .logo-imah-1 {
      width: 80%;
    }
  </style>
</head>

<body>
  <? $headerMiniCart = [];
  $this->load->library('custom/Cart');
  if (!empty($this->session->userdata('user_data'))) {
    $headerMiniCart = $this->cart->ViewCartOnline();
  } else {
    $headerMiniCart = $this->cart->ViewCartOffline();
  }
  ?>
  <!-- Start preloader -->
  <!-- <div id="preloader"></div> -->


  <div class="main">
    <!-- Header start style="    padding-bottom: 10px !important; "-->
    <header id="header ">

      <div class="container position-r header-class ">
        <div class="row m-0">
          <div class="col-lg-2 col-md-6 col-6 p-0 position-initial icon-bar-center  classssss-lo22">
            <div class="right-side">
              <div class="navbar-header">
                <a rel="canonical" class="navbar-brand page-scroll" href="<?= base_url() ?>">
                  <img alt=" " src="<?= base_url() ?>assets/frontend/img/logo_update.jpg" class="logo-imah-1">
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-3 col-3 p-0 vkmmkj " style="display: flex;
						align-items: center;">
            <div id="google_translate_element" class="hr"></div>

            <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle d-block d-lg-none d-xl-none" type="button"><i class="fa fa-bars"></i>
            </button>
          </div>
          <div class="col-lg-4 col-md-6 col-6 p-0 position-initial icon-bar-center  classssss-lo">
            <div class="right-side">
              <div class="navbar-header">
                <a rel="canonical" class="navbar-brand page-scroll" href="<?= base_url() ?>">
                  <img alt=" " src="<?= base_url() ?>assets/frontend/img/logo_update.jpg" class="logo-imah-1">
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-8 col-8 p-0 position-initial responice-list-menu " style="justify-content: center;
            display: flex;
            align-items: center; 
            ">
            <div class="right-side">
              <div class="overlay"></div>
              <div id="menu2" class="navbar-collapse collapse">

                <ul class="nav navbar-nav">
                  <div class="navbar-header dfghddgd">
                    <a rel="canonical" class="navbar-brand page-scroll" href="<?= base_url() ?>">
                      <img alt=" " src="<?= base_url() ?>assets/frontend/img/logo_update.jpg" class="logo-imah-1">
                    </a>
                  </div>
                  <!-- <li class="level">
                    <a rel="canonical" href="<?= base_url() ?>" class="nav-link">Home</a>
                  </li> -->

                  <!-- <li class="level">
                  <a rel="canonical" href="<?= base_url() ?>about_us">About Us</a>
                  </li> -->

                  <?php $i = 1;
                  $this->db->select('*');
                  $this->db->from('tbl_category');
                  $this->db->where('is_active', 1);
                  $this->db->order_by('seq', 'asc');
                  $category_data = $this->db->get();
                  foreach ($category_data->result() as $category) {
                    $this->db->select('*');
                    $this->db->from('tbl_subcategory');
                    $this->db->where('category_id', $category->id);
                    $this->db->where('is_active', 1);
                    $subcategory_data = $this->db->get(); ?>
                    <li class="level dropdown" style="    position: relative;">
                      <a rel="canonical" href="<?= base_url() ?>products/<?= $category->url ?>/1" class=" nav-link"><?= $category->name ?></a>
                      <span class="opener plus"><i class="bi bi-chevron-down" style="color:white"></i></span>
                      <div class="megamenu full mobile-sub-menu">
                        <div class="megamenu-inner-top">
                          <div class="row sub-menu-level1" style="display: block;">
                            <div class="col-l level2 ">
                              <ul class="sub-menu-level2">
                                <?php $i = 2;
                                foreach ($subcategory_data->result() as $subcat) {
                                  // if ($i % 2 == 0) {
                                ?>
                                  <li class="level3"><a rel="canonical" href="<?= base_url() ?>products/<?= $subcat->url ?>/1"><?= $subcat->name ?></a></li>
                                <?php
                                  // }
                                  $i++;
                                } ?>
                              </ul>
                            </div>
                            <!-- <div class="col-lg-4 level2">
                              <ul class="sub-menu-level2">
                                <?php $i = 2;
                                foreach ($subcategory_data->result() as $subcat) {
                                  if ($i  % 2 != 0) {
                                ?>
                                    <li class="level3"><a rel="canonical" href="<?= base_url() ?>products/<?= $subcat->url ?>/1"><?= $subcat->name ?></a></li>
                                <?php }
                                  $i++;
                                } ?>
                              </ul>
                            </div> -->
                            <!-- <div class="col-lg-3 mt-30 d-none d-lg-block matgin-image" style="display: flex !important;
                          justify-content: center;">
                              <div class="sub-menu-img" style="width: 80%;">
                                <a rel="canonical" href="<?= base_url() ?>products/<?= $category->url ?>/1">
                                  <img src="<?= base_url() . $category->image ?>" alt=" " style="width: 100%;">
                                </a>
                              </div>
                            </div> -->
                          </div>
                        </div>
                      </div>
                    </li>
                  <?php $i++;
                  } ?>



                </ul>

              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-3 p-0 icon-bar fgdfdghfh" style="display: flex;
						align-items: center;">
            <div id="google_translate_element"></div>
            <div class="header-right-link">
              <div class="newsletter-input-1  dcdsss newsletter-input mob no" id="toggle2" style="position: absolute;
                right: 200px;top: 14px;-webkit-transition: all 2s ease;  
              -moz-transition: all 2s ease;  
              -o-transition: all 2s ease;  
              -ms-transition: all 2s ease;  
              transition: all 2s ease;">
                <form action="<?= base_url() ?>find" method="GET" enctype="multipart/form-data">
                  <div class="form-group m-0">
                    <input type="text" style="width:100%" placeholder="Search Products... " name="search" required="">
                  </div>
                  <button type="submit" class="btn  btn--1"> <i class="bi bi-search" style="color: #c68fa6;"></i></button>
                </form>
              </div>
              <ul id="headerCount">

                <li class="search-box  search_box " onclick="hello2()">
                  <a rel="canonical" href="#"><span></span></a>
                </li>
                <li class="account-icon heig show-icon">
                  <a rel="canonical" href="#"><span></span></a>
                  <div class="header-link-dropdown account-link-dropdown hrlllll">
                    <ul class="hrb">
                      <? if (empty($this->session->userdata('user_data'))) { ?>
                        <li><a rel="canonical" href="#" class="p-1" data-toggle="modal" data-target="#LoginModel">Log In </a></li>
                        <li><a rel="canonical" href="#" class="p-1" data-toggle="modal" data-target="#SignUpModel"> Register </a></li>
                      <? } else { ?>
                        <li><a rel="canonical" href="<?= base_url() ?>my_profile" class="p-1">My Account </a></li>
                        <li><a rel="canonical" href="<?= base_url() ?>my_profile/order" class="p-1">My Orders </a></li>
                        <li><a rel="canonical" href="<?= base_url() ?>User/logout" class="p-1">Log Out </a></li>
                      <? } ?>
                    </ul>
                  </div>
                </li>
                <?
                $cartCount = 0;
                $wishCount = 0;
                if (!empty($this->session->userdata('user_data'))) {
                  $cartCount = $this->db->get_where('tbl_cart', array('user_id = ' => $this->session->userdata('user_id'), 'user_type' => $this->session->userdata('user_type')))->num_rows();
                } else {
                  if (!empty($this->session->userdata('cart_data'))) {
                    $cartCount = count($this->session->userdata('cart_data'));
                  }
                }
                ?>




                <li class="cart-icon heig show-icon bag--1 ">
                  <? if (!empty($this->session->userdata('user_data'))) { ?>
                    <a rel="canonical" href="<?= base_url() ?>my_bag"> <span> <small class="cart-notification"><?= $cartCount ?></small> </span> </a>
                  <? } else { ?>
                    <a rel="canonical" href="<?= base_url() ?>my_bag"> <span> <small class="cart-notification"><?= $cartCount ?></small> </span> </a>
                  <? } ?>
                  <div class="cart-dropdown header-link-dropdown scc">
                    <ul class="cart-list link-dropdown-list sdfsZ">
                      <? if (!empty($headerMiniCart['cart_data'])) { ?>
                        <ul class="cart_list" style="display: inline-block;">
                          <? foreach ($headerMiniCart['cart_data'] as $miniCart) {
                          ?>
                            <li> <a rel="canonical" href="javascript:void(0);" product_id="<?= base64_encode($miniCart['product_id']) ?>" type_id="<?= base64_encode($miniCart['type_id']) ?>" onclick="deleteCart(this)" class="close-cart"><i class="fa fa-times-circle"></i></a>
                              <figure> <a rel="canonical" href="javascript:;" class="pull-left"> <img alt=" " src="<?= $miniCart['image'] ?>"></a>
                                <figcaption> <span><a rel="canonical" href="#"><?= $miniCart['product_name'] ?></a></span>
                                  <p class="cart-price m-0">₹<?= $miniCart['price'] ?></p>
                                  <!-- <p class="m-0"> Color : Red</p>
                                  <p class="m-0">Size : XXL</p> -->
                                  <div class="product-qty">
                                    <label>Qty:</label>
                                    <div class="custom-qty">
                                      <p class="m-0"><?= $miniCart['quantity'] ?></p>
                                    </div>
                                  </div>
                                </figcaption>
                              </figure>
                            </li>
                          <? } ?>
                        </ul>
                        <p class="cart-sub-totle"> <span class="pull-left">Cart Subtotal</span> <span class="pull-right"><strong class="price-box">₹<?= $headerMiniCart['sub_total'] ?></strong></span> </p>
                        <div class="clearfix"></div>
                        <div class="mt-20 d-flex justify-content-center"> <a rel="canonical" href="<?= base_url() ?>my_bag" class="btn-color btn"> View Cart</a>
                          <!-- <a rel="canonical" href="checkout.html"
										class="btn-color btn right-side">Checkout</a> -->
                        </div>
                      <? } else { ?>
                        <img src="<?= base_url() ?>assets/frontend/img/cart_empty.jpg" alt="Empty Cart" class="img-fluid" style="width:70%">
                      <? } ?>
                    </ul>
                  </div>
                </li>




                <? if (!empty($this->session->userdata('user_data'))) {
                  $wishCount = $this->db->get_where('tbl_wishlist', array('user_id = ' => $this->session->userdata('user_id'), 'user_type', $this->session->userdata('user_type')))->num_rows();
                ?>
                  <li class="cart-icon  heig show-icon dx">
                    <a rel="canonical" href="<?= base_url() ?>my_wishlist"> <span> <small class="cart-notification"><?= $wishCount; ?></small> </span> </a>
                  </li>
                <? } else { ?>
                  <li class="cart-icon  heig show-icon dx">
                    <a rel="canonical" href="javascript:void(0);"> <span> <small class="cart-notification"><?= $wishCount; ?></small> </span> </a>
                  </li>
                <? } ?>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-3 col-3 p-0 icon-bar dgsfgdfg" style="display: flex;
						align-items: center;">
            <div id="google_translate_element"></div>
            <div class="header-right-link">
              <ul id="headerCount1" class="d-flex">
                <li class="search-box  search_box " onclick="hello()">
                  <a rel="canonical" href="#"><span></span></a>
                </li>
                <li class="account-icon heig show-icon">
                  <a rel="canonical" href="#"><span></span></a>
                  <div class="header-link-dropdown account-link-dropdown hrlllll">
                    <ul class="hrb">
                      <? if (empty($this->session->userdata('user_data'))) { ?>
                        <li><a rel="canonical" href="#" class="p-1" data-toggle="modal" data-target="#LoginModel">Log In </a></li>
                        <li><a rel="canonical" href="#" class="p-1" data-toggle="modal" data-target="#SignUpModel"> Register </a></li>
                      <? } else { ?>
                        <li><a rel="canonical" href="<?= base_url() ?>my_profile" class="p-1">My Account </a></li>
                        <li><a rel="canonical" href="<?= base_url() ?>my_profile/order" class="p-1">My Orders </a></li>
                        <li><a rel="canonical" href="<?= base_url() ?>User/logout" class="p-1">Log Out </a></li>
                      <? } ?>
                    </ul>
                  </div>
                </li>
                <?
                $cartCount = 0;
                $wishCount = 0;
                if (!empty($this->session->userdata('user_data'))) {
                  $cartCount = $this->db->get_where('tbl_cart', array('user_id = ' => $this->session->userdata('user_id'), 'user_type' => $this->session->userdata('user_type')))->num_rows();
                } else {
                  if (!empty($this->session->userdata('cart_data'))) {
                    $cartCount = count($this->session->userdata('cart_data'));
                  }
                }
                ?>

                <li class="cart-icon heig show-icon   ">
                  <? if (!empty($this->session->userdata('user_data'))) { ?>
                    <a rel="canonical" href="<?= base_url() ?>my_bag"> <span> <small class="cart-notification"><?= $cartCount ?></small> </span> </a>
                  <? } else { ?>
                    <a rel="canonical" href="<?= base_url() ?>my_bag"> <span> <small class="cart-notification"><?= $cartCount ?></small> </span> </a>
                  <? } ?>

                </li>
                <? if (!empty($this->session->userdata('user_data'))) {
                  $wishCount = $this->db->get_where('tbl_wishlist', array('user_id = ' => $this->session->userdata('user_id'), 'user_type', $this->session->userdata('user_type')))->num_rows();
                ?>
                  <li class="cart-icon  heig show-icon dx">
                    <a rel="canonical" href="<?= base_url() ?>my_wishlist"> <span> <small class="cart-notification"><?= $wishCount; ?></small> </span> </a>
                  </li>
                <? } else { ?>
                  <li class="cart-icon  heig show-icon dx">
                    <a rel="canonical" href="javascript:void(0);"> <span> <small class="cart-notification"><?= $wishCount; ?></small> </span> </a>
                  </li>
                <? } ?>
              </ul>
            </div>
          </div>
        </div>
        <div id="toggle" class="no mt-2">
          <form action="<?= base_url() ?>find" method="GET" enctype="multipart/form-data" class="toggil_form">
            <div class="form-group m-0 sty">
              <input type="searc" placeholder="Search Products... " required="" name="search">
            </div>
            <button type="submit" class="btn" style="position: absolute; right: 0px; bottom: -13px;"> <i class="bi bi-search"></i></button>
          </form>
        </div>
        <div class="container position-r animate__animated animate__bounce">
          <div class="row m-0">

          </div>
          <div class="col-lg-12 col-md-8 col-8 p-0 position-initial centar-list" style="justify-content: center;
            display: flex;">
            <div class="right-side">
              <!-- <button data-target=".navbar-collapse" data-toggle="collapse"
                  class="navbar-toggle d-block d-lg-none d-xl-none" type="button"><i class="fa fa-bars"></i>
                </button> -->
              <div class="overlay"></div>
              <div id="menu" class="navbar-collapse collapse">
                <!-- <div id="google_translate_element" class="hr"></div> -->
                <ul class="nav navbar-nav">
                  <div class="navbar-header dfghddgd">
                    <a rel="canonical" class="navbar-brand page-scroll" href="<?= base_url() ?>">
                      <img alt=" " src="<?= base_url() ?>assets/frontend/img/logo_update.jpg" class="logo-imah-1">
                    </a>
                  </div>
                  <li class="level">
                    <a rel="canonical" href="<?= base_url() ?>" class="nav-link">Home</a>
                  </li>
                  <!-- <li class="level">
                  <a rel="canonical" href="<?= base_url() ?>about_us">About Us</a>
                  </li> -->
                  <?php $i = 1;
                  $this->db->select('*');
                  $this->db->from('tbl_category');
                  $this->db->where('is_active', 1);
                  $this->db->order_by('seq', 'asc');
                  $category_data = $this->db->get();
                  foreach ($category_data->result() as $category) {
                    $this->db->select('*');
                    $this->db->from('tbl_subcategory');
                    $this->db->where('category_id', $category->id);
                    $this->db->where('is_active', 1);
                    $subcategory_data = $this->db->get(); ?>
                    <li class="level dropdown" style="position: relative;">
                      <a rel="canonical" href="<?= base_url() ?>products/<?= $category->url ?>/1"" class=" nav-link"><?= $category->name ?></a>
                      <span class="opener plus"><i class="bi bi-chevron-down" style="color:white"></i></span>
                      <div class="megamenu full mobile-sub-menu">
                        <div class="megamenu-inner-top">
                          <div class="row sub-menu-level1" style="display: block;">
                            <div class="col- level2 ">
                              <ul class="sub-menu-level2">
                                <?php $i = 2;
                                foreach ($subcategory_data->result() as $subcat) {
                                  // if ($i % 2 == 0) {
                                ?>
                                  <li class="level3"><a rel="canonical" href="<?= base_url() ?>products/<?= $subcat->url ?>/1"><?= $subcat->name ?></a></li>

                                <?php
                                  // }

                                  $i++;
                                } ?>
                              </ul>
                            </div>
                            <!-- <div class="col-lg-4 level2">
                                <ul class="sub-menu-level2">
                                  <?php $i = 2;
                                  foreach ($subcategory_data->result() as $subcat) {
                                    if ($i  % 2 != 0) {
                                  ?>
                                      <li class="level3"><a rel="canonical" href="<?= base_url() ?>products/<?= $subcat->url ?>/1"><?= $subcat->name ?></a></li>
                                  <?php }
                                    $i++;
                                  } ?>
                                </ul>
                              </div> -->
                            <!-- <div class="col-lg-3 mt-30 d-none d-lg-block matgin-image" style="display: flex !important;
                          justify-content: center;">
                                <div class="sub-menu-img" style="width: 80%;">
                                  <a rel="canonical" href="<?= base_url() ?>products/<?= $category->url ?>/1">
                                    <img src="<?= base_url() . $category->image ?>" alt=" " style="width: 100%;">
                                  </a>
                                </div>
                              </div> -->
                          </div>
                        </div>
                      </div>
                    </li>
                  <?php $i++;
                  } ?>

                  <li><a rel="canonical" href="<?= base_url() ?>reseller_register">Partner With Us</a></li>
                  <li class="level "><a rel="canonical" href="<?= base_url() ?>contact" class="nav-link">Contact</a></li>

                </ul>
              </div>

            </div>
          </div>
        </div>


    </header>
    <!-- Header end -->