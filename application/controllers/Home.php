<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/login_model");
        $this->load->model("admin/base_model");
        $this->load->library('pagination');
        $this->load->library('custom/Products');
        $this->load->library('custom/Cart');
        $this->load->library('custom/Wishlist');
        $this->load->library('custom/Login');
        $this->load->library('custom/Forms');
        $this->load->library("custom/Shiprocket");
    }
    //=============================================== Index ==============================================================
    public function index()
    {
        if (!empty($this->session->userdata('user_type'))) {
            if ($this->session->userdata('user_type') == 2) {
                $user_type = 1;
            } else {
                $user_type = 2;
            }
        } else {
            $user_type = 2;
        }
        $this->db->select('*');
        $this->db->from('tbl_slider');
        $this->db->order_by('id', 'desc');
        $this->db->where('is_active', 1);
        $data['slider_data'] = $this->db->get();
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('is_active', 1);
        $data['category_data'] = $this->db->get();
        $this->db->select('*');
        $this->db->from('tbl_shop_by_category');
        $this->db->where('is_active', 1);
        $data['shop_by_category_data'] = $this->db->get();
        $this->db->select('*');
        $this->db->from('tbl_banner');
        $this->db->where('is_active', 1);
        $data['banner_data'] = $this->db->get()->result();
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('is_active', 1);
        $this->db->where('product_type !=', 2);
        $this->db->where('product_view !=', $user_type);
        $this->db->where('trending', 1);
        $data['trending_data'] = $this->db->get();
        $this->db->select('*');
        $this->db->from('tbl_testimonials');
        $this->db->where('is_active', 1);
        $data['testimonials_data'] = $this->db->get();
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->order_by('id', 'desc');
        $this->db->where('is_active', 1);
        $this->db->limit(3);
        $data['blog_data'] = $this->db->get();
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('is_active', 1);
        $this->db->where('product_type !=', 2);
        $this->db->where('product_view !=', $user_type);
        $this->db->order_by('rand()');
        $this->db->limit(15);
        $data['whats_data'] = $this->db->get();
        if (!empty($this->session->userdata('user_data'))) {
            $data['cart_data'] = $this->cart->ViewCartOnline();
        } else {
            $data['cart_data'] = $this->cart->ViewCartOffline();
        }
        $data['title'] = 'Buy Kurta Online | Designer Kurta & Kurti For Women | Poshida';
        $data['dsc'] = 'Buy Designer Kurta & Kurti for Women Online in India at
        Best Price. Shop for Latest Designer Kurta & Kurti Online✔️Free
        Shipping✔️Cash On Delivery.';
        $data['keyword'] = 'Designer Kurta & Kurti for Women, Latest Designer Kurta,
        Poshida By Ronak Textiles';

        $this->load->view('frontend/common/header', $data);
        $this->load->view('frontend/index');
        $this->load->view('frontend/common/footer');
    }
    //================================================= ALL PRODUCTS ======================================
    public function all_products($url, $sort = "", $page_index = "")
    {
        $product = $this->products->all_products($url, $sort, $page_index);
        if (!empty($product['category_name'] || $product['subcategory_name'])) {
            $data['product'] = $product['product_data'];
            $data['all_data'] = $product['all_data'];
            $data['links'] = $product['links'];
            $data['category_name'] = $product['category_name'];
            $data['subcategory_name'] = $product['subcategory_name'];
            $data['url'] = $url;
            $data['sort'] = $sort;
            $data['page_index'] = $page_index;
            $data['id'] = $product['id'];
            $data['t'] = $product['t'];
            $data['filter_category'] = $this->db->get_where('tbl_category', array('is_active = ' => 1));
            $data['filter_main'] = $this->db->get_where('tbl_filters', array('is_active = ' => 1));
            $color = [];
            foreach ($data['all_data'] as $pro) {
                $this->db->distinct();
                $this->db->select('colour_id');
                $this->db->where('product_id', $pro->id);
                $query = $this->db->get('tbl_type');
                $temp = $query->result();
                foreach ($temp as $c) {
                    $color[] = $c->colour_id;
                }
            }
            $data['filter_color'] = array_merge(array_unique($color));
            $size = [];
            foreach ($data['all_data'] as $pro) {
                $this->db->distinct();
                $this->db->select('size_id');
                $this->db->where('product_id', $pro->id);
                $query = $this->db->get('tbl_type');
                $temp2 = $query->result();
                foreach ($temp2 as $c) {
                    $size[] = $c->size_id;
                }
            }
            $data['filter_size'] = array_merge(array_unique($size));
            if ($url == 'Womens') {
                $data['title'] = 'Buy Stylish Kurti For Women | Kurtis Online Shopping in India';
                $data['dsc'] = 'Buy Stylish Kurtis For Women. Explore the latest kurti
                designs & Kurtis online shopping in India At Poshida. Order today
                ✔️Great Deals✔️Best Collection';
                $data['keyword'] = 'Stylish Kurtis For Women, Jaipur Kurti, Latest Kurti
                Designs, Poshida By Ronak Textiles';
            } else if ($url == 'A--LINE-KURTA') {
                $data['title'] = 'Buy A- Line Kurtas | Festival Kurta For Women | Poshida';
                $data['dsc'] = "Get ready for the festivities with Poshida A-line kurtas –
                the perfect festival kurtas for women. Elevate your style with
                Poshida.✔️COD✔️Free Shipping.";
                $data['keyword'] = 'A- Line Kurta, A-Line Kurta for Women, Festival Kurta For
                Women, Poshida By Ronak Textiles';
            } else if ($url == 'EMBROIDERY-KURTA') {
                $data['title'] = 'Buy Embroidery Kurta & Kurti for Women Online | Ethnic Kurta';
                $data['dsc'] = "Stand out from the crowd with our Ethnic Embroidery
                Kurta & Kurti for women online.✔️Free Shipping✔️Premium Quality
                ✔️COD Available.";
                $data['keyword'] = 'Embroidery Kurta, Embroidery Kurta for Women, Ethnic
                Kurta, Poshida By Ronak Textiles';
            } else if ($url == 'FLOOR-LENGTH-GOWN') {
                $data['title'] = 'Buy Floor Length Gown | Stylish Gown for Women Online |
                Poshida';
                $data['dsc'] = "Explore our collection of stylish floor length gowns for
                women online and find the perfect style to make a great
                impression.✔️Premium Quality✔️COD.";
                $data['keyword'] = 'Floor Length Gown, Stylish Gown for Women, Festival
                Wear Gown, Latest Gown Design, Poshida By Ronak Textiles';
            } else if ($url == 'SKD-SETS') {
                $data['title'] = 'Buy Latest Kurti Designs For Women & Kurti Sets Online';
                $data['dsc'] = "Shop high-quality and stylish designer kurtis online. Our latest kurti designs for women will empower you to embrace your own unique style with our wide selection of the latest kurti designs. Don't let this exciting opportunity pass you by!";
            } else if ($url == 'ALIYA-CUT-KURTI') {
                $data['title'] = 'Buy Aliya Cut Kurtis | Stylish Designer Kurtis | Poshida';
                $data['dsc'] = "Explore the great selection of Stylish Designer Aliya Cut
                Kurtis from Poshida.✔️Great Deals✔️Free Shipping✔️Premium
                Quality✔️COD Available.";
                $data['keyword'] = 'Aliya Cut Kurtis, Jaipur Kurtis, Stylish Designer Kurtis,
                Poshida By Ronak Textiles';
            } else if ($url == 'KURTA-PANT-DUPATTA-SETS') {
                $data['title'] = 'Buy Latest Kurti Designs For Women & Kurti Sets Online';
                $data['dsc'] = "Shop high-quality and stylish designer kurtis online. Our latest kurti designs for women will empower you to embrace your own unique style with our wide selection of the latest kurti designs. Don't let this exciting opportunity pass you by!";
            } else if ($url == 'WOMEN-ETHNIC-KURTAS-SETS') {
                $data['title'] = 'Buy Women Ethnic Kurtas Sets | Kurta Set with Dupatta for
                Women';
                $data['dsc'] = "Shop now and explore our remarkable collection of
                women ethnic kurtas sets with dupatta for women.✔️Great
                Deals✔️Premium Quality✔️COD.";
                $data['keyword'] = 'Women Ethnic Kurtas Sets, Kurta Set with Dupatta for
                Women';
            } else if ($url == 'WOMEN-STRAIGHT-KURTI-and-KURTAS') {
                $data['title'] = 'Buy Women Straight Kurti & Kurtas | Straight Kurta & Kurti
                Designs';
                $data['dsc'] = "Are you looking for stylish and trendy women's straight
                kurti & kurtas? Explore our irresistible collection.✔️Great
                Deals✔️Premium Quality✔️COD.";
                $data['keyword'] = 'Women Straight Kurti & Kurtas, Straight Kurta & Kurti
                Designs';
            } else if ($url == 'WOMEN-PLAZO-PANTS') {
                $data['title'] = 'Buy Women Plazo Pants Online | Palazzo Pants for Women';
                $data['dsc'] = "Fuel your fashion obsession with our wide range of
                palazzo pants for women. Step out in confidence and style with
                Poshida.✔️Premium Quality✔️COD.";
                $data['keyword'] = 'Women Plazo Pants Online, Palazzo Pants for Women';
            }
            else if ($url == 'Women-Ethnics') {
                $data['title'] = 'Buy Latest Collection of Women Ethnic Wear Online at Poshida';
                $data['dsc'] = "Shop online for women's ethnic wear at Poshida! We offer a wide
                range of Kurtas, Kurtis, Straight Kurtis, Floor-length gowns, and more.";
                $data['keyword'] = 'Buy Latest Collection of Women Ethnic Wear Online at Poshida';
            }
            else if ($url == 'Bottoms') {
                $data['title'] = 'Shop Women Bottom Wear Online in India | Stylish Bottom Wear';
                $data['dsc'] = "Explore our stylish women's bottom wear collection online.
                Elevate your wardrobe with Poshida trendy designs. Shop now!";
                $data['keyword'] = 'Shop Women Bottom Wear Online in India | Stylish Bottom Wear';
            }
            else if ($url == 'New-Arrivals') {
                $data['title'] = 'New Arrivals | Buy Latest Ethnic & Western Wear Online in India';
                $data['dsc'] = "Hurry and grab the best deals on new arrivals of ethnic & western
                wear before they sell out. Shop today!";
                $data['keyword'] = 'New Arrivals | Buy Latest Ethnic & Western Wear Online in India';
            }
            else if ($url == 'Tops') {
                $data['title'] = 'Buy Cotton Tops for Women | Floral Tops for Women | Poshida';
                $data['dsc'] = "Be ready to turn heads with our eye-catching floral tops for
                women. We guarantee the highest quality and unconditional satisfaction with
                every purchase.";
                $data['keyword'] = 'Buy Cotton Tops for Women | Floral Tops for Women | Poshida';
            }
            else if ($url == 'Dresses') {
                $data['title'] = 'Buy Women Dresses Online | Cotton Maxi Dress | Poshida';
                $data['dsc'] = "Elevate your wardrobe with trendy women dresses online and
                enjoy the convenience of free shipping. Upgrade your style effortlessly.";
                $data['keyword'] = 'Buy Women Dresses Online | Cotton Maxi Dress | Poshida';
            }
            else if ($url == 'Coord-Sets') {
                $data['title'] = 'Buy Trendy Co-ord Sets for Women Online in India | Poshida';
                $data['dsc'] = "Experience the remarkable transformation with our trendy Co-ord
                Sets made for women. Shop Now at Poshida and make a fashion statement!";
                $data['keyword'] = 'Buy Trendy Co-ord Sets for Women Online in India | Poshida';
            }
            else if ($url == 'Palazzo') {
                $data['title'] = 'Buy Palazzo Pants for Women Online - Poshida';
                $data['dsc'] = "Uncover the secrets of comfortable and stylish Palazzo Pants for
                women available exclusively online at Poshida. Upgrade your wardrobe with confidence!";
                $data['keyword'] = 'Buy Palazzo Pants for Women Online - Poshida';
            }
            else if ($url == 'Straight-Pants') {
                $data['title'] = "Shop Women's Straight Pants Online In India";
                $data['dsc'] = "Step into a world of confidence and style with our exclusive range of
                women's straight pants. Don't miss this opportunity to enhance your look effortlessly.";
                $data['keyword'] = "Shop Women's Straight Pants Online In India";
            }
            else if ($url == 'Kurta-set-of-2') {
                $data['title'] = 'Buy Two Piece Kurta Set For Women Online in India';
                $data['dsc'] = "Explore the incredible selection of two piece kurta sets online in India,
                designed to make you stand out. Take advantage of the special promotions!";
                $data['keyword'] = 'Buy Two Piece Kurta Set For Women Online in India';
            }
            $this->load->view('frontend/common/header2', $data);
            $this->load->view('frontend/all_products');
            $this->load->view('frontend/common/footer2');
        } else {
            $this->session->set_flashdata('emessage', 'Product not found');
            redirect("/", "refresh");
        }
    }
    // ============================================ ABOUT =================================================
    public function about_us()
    {
        $this->db->select('*');
        $this->db->from('tbl_testimonials');
        $this->db->where('is_active', 1);
        $data['testimonials_data'] = $this->db->get();
        $data['title'] = 'About Us - Poshida';
        $data['dsc'] = "We proudly stand as one of India's foremost fashion retailers, offering an extensive array of high-quality products that cater to diverse tastes. With a strong presence both online and in our brick-and-mortar stores, we have firmly established ourselves as an industry leader";
        $this->load->view('frontend/common/header2', $data);
        $this->load->view('frontend/about');
        $this->load->view('frontend/common/footer2');
    }
    // ============================================ career =================================================
    public function career()
    {
        $data['title'] = 'Career - Poshida';
        $data['dsc'] = 'Explore exciting career opportunities at Poshida, where innovation meets passion. Join our dynamic team and be part of a workplace that fosters growth, creativity, and collaboration';
        $this->load->view('frontend/common/header2', $data);
        $this->load->view('frontend/career');
        $this->load->view('frontend/common/footer2');
    }
    //================================================= FILTERS ON ALL PRODUCTS ======================================
    public function apply_filter()
    {
        if (isset($_GET['size'])) {
            $size_arr = $_GET["size"];
        } else {
            $size_arr = '';
        }
        if (isset($_GET['color'])) {
            $color_arr = $_GET["color"];
        } else {
            $color_arr = '';
        }
        if (isset($_GET['attribute'])) {
            $attribute_arr = $_GET["attribute"];
        } else {
            $attribute_arr = '';
        }
        $minprice = $_GET["minprice"];
        $maxprice = $_GET["maxprice"];
        $sort_by = $_GET["sort_by"];
        $url = $_GET["url"];
        $page_index = '';
        $filtered = $this->products->all_products2($url, $page_index, $sort_by, $size_arr, $color_arr, $attribute_arr, $minprice, $maxprice, $sort_by);
        if (!empty($filtered['category_name'] || $filtered['subcategory_name'])) {
            $data['sort'] = $sort_by;
            $data['url'] = $url;
            $data['sized'] = $size_arr;
            $data['color'] = $color_arr;
            $data['attribute'] = $attribute_arr;
            $data['product'] = $filtered['product_data'];
            $data['minprice'] = $minprice;
            $data['maxprice'] = $maxprice;
            $data['category_name'] = $filtered['category_name'];
            $data['subcategory_name'] = $filtered['subcategory_name'];
            $data['id'] = $filtered['id'];
            $data['t'] = $filtered['t'];
            $data['filter_category'] = $this->db->get_where('tbl_category', array('is_active = ' => 1));
            // $data['filter_size'] = $this->db->get_where('tbl_size', array('is_active = ' => 1));
            // $data['filter_color'] = $this->db->get_where('tbl_colour', array('is_active = ' => 1));
            $data['filter_main'] = $this->db->get_where('tbl_filters', array('is_active = ' => 1));
            $sort = "";
            $page_index = "";
            $product = $this->products->all_products($url, $sort, $page_index);
            $data['product_data'] = $product['product_data'];
            $color = [];
            foreach ($data['product_data'] as $pro) {
                $this->db->distinct();
                $this->db->select('colour_id');
                $this->db->where('product_id', $pro->id);
                $query = $this->db->get('tbl_type');
                $temp = $query->result();
                foreach ($temp as $c) {
                    $color[] = $c->colour_id;
                }
            }
            $data['filter_color'] = array_merge(array_unique($color));
            $size = [];
            foreach ($data['product_data'] as $pro) {
                $this->db->distinct();
                $this->db->select('size_id');
                $this->db->where('product_id', $pro->id);
                $query = $this->db->get('tbl_type');
                $temp2 = $query->result();
                foreach ($temp2 as $c) {
                    $size[] = $c->size_id;
                }
            }
            $data['filter_size'] = array_merge(array_unique($size));
            $this->load->view('frontend/common/header2', $data);
            $this->load->view('frontend/filter_products');
            $this->load->view('frontend/common/footer2');
        } else {
            $this->session->set_flashdata('emessage', 'Product not found');
            redirect("/", "refresh");
        }
    }
    // =========================================== MY PROFILE ===============================================
    public function my_profile()
    {
        if (!empty($this->session->userdata('user_type'))) {
            if ($this->session->userdata('user_type') == 2) {
                $data['user_data'] = $this->db->get_where('tbl_reseller', array('id = ' => $this->session->userdata('user_id')))->result();
            } else {
                $data['user_data'] = $this->db->get_where('tbl_users', array('id = ' => $this->session->userdata('user_id')))->result();
            }
            if (!empty($data['user_data'])) {
                if ($data['user_data'][0]->is_active == 1) {
                    if ($this->session->userdata('user_type') == 2) {
                        $data['order1_dataa'] = $this->db->order_by('id', 'desc')->get_where('tbl_order1', array('reseller_id = ' => $this->session->userdata('user_id'), 'order_status != ' => 0));
                    } else {
                        $data['order1_dataa'] = $this->db->order_by('id', 'desc')->get_where('tbl_order1', array('user_id = ' => $this->session->userdata('user_id'), 'order_status != ' => 0));
                    }
                    $data['model_table'] = $this->db->get_where('tbl_model_products', array('user_id = ' => $this->session->userdata('user_id')));
                    $data['model_points'] = $this->db->get_where('tbl_points_transation', array('model_id = ' => $this->session->userdata('user_id')));
                    $data['model_data_exists'] = $data['model_table']->result();
                    $user_id = $this->session->userdata('user_id');
                    $user_type = $this->session->userdata('user_type');
                    $data['address_data'] = $this->db->order_by('is_default', 'asc')->get_where('tbl_user_address', array('user_id' => $user_id, 'user_type' => $user_type, 'is_active' => 1))->result();
                    $this->load->view('frontend/common/header2', $data);
                    $this->load->view('frontend/my_profile');
                    $this->load->view('frontend/common/footer2');
                } else {
                    $Logout = $this->login->UserOtpLogout();
                    $this->session->set_flashdata('emessage', 'Your account is inactive! Please contact admin');
                    redirect("/", "refresh");
                }
            } else {
                $Logout = $this->login->UserOtpLogout();
                $this->session->set_flashdata('emessage', 'User not found');
                redirect("/", "refresh");
            }
        } else {
            redirect("/", "refresh");
        }
    }
    // ============================ ORDER DETAILS ======================================
    public function order_details($idd)
    {
        if (!empty($this->session->userdata('user_data'))) {
            $id = base64_decode($idd);
            $data['order_data'] = $this->db->get_where('tbl_order1', array('id' => $id))->result();
            $data['order_detail'] = $this->db->get_where('tbl_order2', array('main_id' => $id));
            $this->load->view('frontend/common/header2', $data);
            $this->load->view('frontend/order_details');
            $this->load->view('frontend/common/footer2');
        } else {
            redirect("/", "refresh");
        }
    }
    // ============================ Track Order ======================================
    public function track_order($idd)
    {
        if (!empty($this->session->userdata('user_data'))) {
            $id = base64_decode($idd);
            $order1_data = $this->db->get_where('tbl_order1', array('id = ' => $id))->result();
            $track_data = $this->shiprocket->trackOrderAWB($order1_data[0]->awb_code);
            if (!empty($track_data->tracking_data->track_status)) {
                $data['track_data'] = $track_data->tracking_data;
                $data['order1_data'] = $order1_data;
            } else {
                $data['track_data'] = [];
                $data['order1_data'] = $order1_data;
            }
            $this->load->view('frontend/common/header2', $data);
            $this->load->view('frontend/track_order');
            $this->load->view('frontend/common/footer2');
        } else {
            redirect("/", "refresh");
        }
    }
    //============================================= VIEW CART ========================================================
    public function my_bag()
    {
        if (!empty($this->session->userdata('user_data'))) {
            $cart_fetch = $this->cart->ViewCartOnline();
        } else {
            $cart_fetch = $this->cart->ViewCartOffline();
        }
        $this->load->view('frontend/common/header2', $cart_fetch);
        $this->load->view('frontend/cart');
        $this->load->view('frontend/common/footer2');
    }
    public function contact_form_submit()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'name', 'required|xss_clean|trim');
            $this->form_validation->set_rules('message', 'message', 'required|xss_clean|trim');
            $this->form_validation->set_rules('email', 'email', 'required|xss_clean|trim');
            if ($this->form_validation->run() == true) {
                $name = $this->input->post('name');
                $message = $this->input->post('message');
                $email = $this->input->post('email');
                $response_entry = $this->forms->contactFormSubmit($name, $message, $email);
                redirect("/", "refresh");
            } else {
                $this->session->set_flashdata('emessage', validation_errors());
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata('emessage', 'Please insert some data, No data available');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function carrier_form_submit()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'name', 'required|xss_clean|trim');
            $this->form_validation->set_rules('phone', 'phone', 'required|xss_clean|trim');
            $this->form_validation->set_rules('email', 'email', 'required|xss_clean|trim');
            if ($this->form_validation->run() == true) {
                $name = $this->input->post('name');
                $phone = $this->input->post('phone');
                $email = $this->input->post('email');
                $ip = $this->input->ip_address();
                date_default_timezone_set("Asia/Calcutta");
                $cur_date = date("Y-m-d H:i:s");
                //-----------UPLOAD FILE INTO SERVER --------
                $this->load->library('upload');
                $img1 = 'cv';
                $file_check = ($_FILES['cv']['error']);
                if ($file_check != 4) {
                    $image_upload_folder = FCPATH . "assets/uploads/carrier/cv";
                    if (!file_exists($image_upload_folder)) {
                        mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                    }
                    $new_file_name = "cv" . date("YmdHis");
                    $this->upload_config = array(
                        'upload_path'   => $image_upload_folder,
                        'file_name' => $new_file_name,
                        'allowed_types' => 'pdf|jpg|png|jpeg',
                        'max_size'      => 25000
                    );
                    $this->upload->initialize($this->upload_config);
                    if (!$this->upload->do_upload($img1)) {
                        $upload_error = $this->upload->display_errors();
                        $this->session->set_flashdata('emessage', $upload_error);
                        redirect($_SERVER['HTTP_REFERER']);
                    } else {
                        $file_info = $this->upload->data();
                        $videoNAmePath = "assets/uploads/carrier/cv/" . $new_file_name . $file_info['file_ext'];
                        $inputFileName = $videoNAmePath;
                    }
                }
                $data_insert = array(
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'cv' => $inputFileName,
                    'ip' => $ip,
                    'date' => $cur_date
                );
                $last_id = $this->base_model->insert_table("tbl_carrier", $data_insert, 1);
                if ($last_id != 0) {
                    $this->session->set_flashdata('smessage', 'Thank you for contacting us! We will get back to you soon');
                    redirect($_SERVER['HTTP_REFERER']);
                } else {
                    $this->session->set_flashdata('emessage', 'Some unknown error occurred');
                    redirect($_SERVER['HTTP_REFERER']);
                }
            } else {
                $this->session->set_flashdata('emessage', validation_errors());
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata('emessage', 'Please insert some data, No data available');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    //================================== SUBCRIBED TO NEWSLETTER =====================================
    public function subscribe_data()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('email', 'email', 'required|valid_email|xss_clean');
            if ($this->form_validation->run() == true) {
                $email = $this->input->post('email');
                $subscribeentry = $this->forms->subscribeToUs($email);
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->session->set_flashdata('emessage', validation_errors());
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata('emessage', 'Please insert some data, No data available');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    // ============================================== POPUP FORM SUBMIT ==================================================
    public function subscribe_to_popup()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'name', 'required|xss_clean|trim');
            $this->form_validation->set_rules('phone', 'phone', 'required|xss_clean|trim');
            $this->form_validation->set_rules('email', 'email', 'required|xss_clean|trim');
            if ($this->form_validation->run() == true) {
                $name = $this->input->post('name');
                $phone = $this->input->post('phone');
                $email = $this->input->post('email');
                $submit_popup = $this->forms->popupFormSubmit($email, $name, $phone);
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->session->set_flashdata('emessage', validation_errors());
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata('emessage', 'Please insert some data, No data available');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function reseller_register()
    {
        if (empty($this->session->userdata('user_data'))) {
            $data['title'] = 'Register As Reseller - Poshida';
            $data['dsc'] = 'Unlock a world of possibilities by becoming a Poshida Reseller. Join our network and enjoy exclusive benefits, lucrative opportunities, and the support to thrive in the fashion industry. Register today and embark on a rewarding journey as a valued partner in style and success with Poshida';
            $data['state_data'] = $this->db->from('all_states')->get();
            $this->load->view('frontend/common/header2', $data);
            $this->load->view('frontend/register');
            $this->load->view('frontend/common/footer2');
        } else {
            redirect('/', 'refresh');
        }
    }
    // ======================================= SEARCH ==================================================
    public function search()
    {
        $string = $this->input->get('search');
        // $da = explode("/", $string);
        // echo $da[1];die();
        // if(!empty($index)){
        //     $index=$da[1];
        // }
        $search_results = $this->products->searchForProducts($string);
        $data['product'] = $search_results['product_data'];
        $data['links'] = '';
        // $data['links'] = $search_results['links'];
        $data['category_name'] = $search_results['category_name'];
        $data['subcategory_name'] = $search_results['subcategory_name'];
        $data['url'] = 'search';
        $data['string'] = $string;
        $data['filter_category'] = $this->db->get_where('tbl_category', array('is_active = ' => 1));
        $this->load->view('frontend/common/header2', $data);
        $this->load->view('frontend/search_products');
        $this->load->view('frontend/common/footer2');
    }
    public function product_detail($url)
    {
        $data['type_id'] = base64_decode($this->input->get('type'));
        // echo $data['type_id'];die();
        $returnarray = $this->products->product_detail($url);
        if (!empty($returnarray['product_data'])) {
            $data['title'] = $returnarray['product_data'][0]->title;
            $data['keyword'] = $returnarray['product_data'][0]->keyword;
            $data['dsc'] = $returnarray['product_data'][0]->dsc;
            $related_products = $this->products->related_products($url, $returnarray['product_data'][0]->category_id);
            $buy_with_it = $this->products->buy_with_it($url);
            $product_reviews = $this->products->productReviews($url);
            $type_datas = $this->db->get_where('tbl_type', array('product_id = ' => $returnarray['product_data'][0]->id, 'is_active = ' => 1));
            $type_data = $type_datas->result();
            $type_datass = $this->db->get_where('tbl_type', array('id = ' => $data['type_id'], 'is_active = ' => 1))->result();
            $type_dataSize = $this->db->get_where('tbl_type', array('id = ' => $data['type_id']))->result();
            // print_r($type_data);die();
            $color_arr = $this->products->unique_multidim_array($type_data, 'colour_id');
            if (!empty($type_datass[0])) {
                $size_arr = $this->products->getColorSize($type_datass[0]->product_id, $type_datass[0]->colour_id);
            } else {
                $this->session->set_flashdata('emessage', 'Product not found');
            redirect("/");
            }
            $data['buy_with_it'] = $buy_with_it;
            $data['related_data'] = $related_products;
            $data['product_reviews'] = $product_reviews;
            $data['product_data'] = $returnarray['product_data'];
            $data['color_arr'] = $color_arr;
            $data['size_arr'] = $size_arr;
            // ----------------- start  for meta -----------------
            $data['meta'] = 1;
            $type_datas = $this->db->get_where('tbl_type', array('product_id = ' => $data['product_data'][0]->id, 'is_active = ' => 1, 'color_active' => 1, 'size_active' => 1));
            $type_data = $this->db->get_where('tbl_type', array('id = ' => $data['type_id']))->result();
            if (!empty($type_data[0]->image)) {
                $image = base_url() . $type_data[0]->image;
            } else {
                $image = '';
            }
            $data['type_spgst'] = $type_data[0]->retailer_spgst;
            $data['image'] = $image;
            if ($type_data[0]->inventory > 0) {
                $data['stock'] = 'in stock';
            } else {
                $data['stock'] = 'out of stock';
            }
            if ($data['product_data'][0]->exclusive == 1) {
                $data['condition'] = 'exclusive';
            } else {
                $data['condition'] = '';
            }
            $cat = $this->db->get_where('tbl_category', array('id = ' => $data['product_data'][0]->category_id))->row();
            $data['category_name'] = $cat->name;
            // ----------------- end  for meta -----------------

            if (!empty($returnarray['type_exists'])) {
                $this->load->view('frontend/common/header2', $data);
                $this->load->view('frontend/product_details');
                $this->load->view('frontend/common/footer2');
            } else {
                $this->session->set_flashdata('emessage', 'Product not found');
                redirect("/", "refresh");
            }
        } else {
            $this->session->set_flashdata('emessage', 'Product not found');
            redirect("/", "refresh");
        }
    }
    public function my_wishlist()
    {
        $wishlist_data = $this->wishlist->ViewWishlist();
        $this->load->view('frontend/common/header2', $wishlist_data);
        $this->load->view('frontend/wishlist');
        $this->load->view('frontend/common/footer2');
    }
    public function error404()
    {
        $this->load->view('frontend/common/header2');
        $this->load->view('errors/error404');
        $this->load->view('frontend/common/footer2');
    }
    public function privacy_policy()
    {
        $data['title'] = 'Privacy Policy - Poshida';
        $data['dsc'] = "We take privacy and security concerns seriously. At the same time, we would like to give you the best possible experience when visiting our websites. Please read the following policy to understand how your personal information will be treated as you make full use of our Site. If you visit us at https://poshida.co.in (Website) you accept these terms and conditions";
        $this->load->view('frontend/common/header2', $data);
        $this->load->view('frontend/privacy_policy');
        $this->load->view('frontend/common/footer2');
    }
    public function return_and_replace()
    {
        $data['title'] = 'Poshida - Replacement or Exchange Policy';
        $data['dsc'] = "Products can be replaced within 7 days from the date of delivery. Payment Refunds are applicable only in case of damaged products. In all other cases, replacement or e-voucher (3 months validity) is available";
        $this->load->view('frontend/common/header2', $data);
        $this->load->view('frontend/return_and_replace');
        $this->load->view('frontend/common/footer2');
    }
    public function shipping_and_delivery()
    {
        $data['title'] = 'Shipping & Delivery Policy - Poshida';
        $data['dsc'] = "We offer free shipping on all our products throughout India! Free bags are sent on all orders above Rs. 2499.Usually, orders are dispatched within 2-4 working days of the customer after placing the order";
        $this->load->view('frontend/common/header2', $data);
        $this->load->view('frontend/shipping_and_delivery');
        $this->load->view('frontend/common/footer2');
    }
    //==================================================== ALL BLOGS ====================================================
    public function all_blogs($page_index = "")
    {
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->where('is_active', 1);
        $this->db->order_by('id', 'DESC');
        $count = $this->db->count_all_results();
        //--------- pagination config ----------------------
        $config['base_url'] = base_url() . 'Home/all_blogs/';
        $per_page = 15;
        $config['total_rows'] = $count;
        $config['per_page'] = $per_page;
        $config['num_links'] = 5;
        $config['full_tag_open'] = '<ul class="pagination mt-3 justify-content-center pagination_style1">';
        $config['full_tag_close'] = '</ul>';
        $config['use_page_numbers'] = true;
        $config['next_link'] = 'First';
        $config['first_tag_open'] = '<li class="first page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="last page">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li class="page-item nextpage">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = ' Previous';
        $config['prev_tag_open'] = '<li class="page-item prevpage">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active page-link"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item page-link">';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        if (!empty($page_index)) {
            // $i = $per_page * ($page - 1) + 1;
            $start = ($page_index - 1) * $config['per_page'];
        } else {
            $page_index = 0;
            $start = 0;
        }
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->where('is_active', 1);
        $this->db->order_by('id', 'DESC');
        $this->db->limit($config["per_page"], $start);
        $data['blog_data'] = $this->db->get();
        $data['links'] = $this->pagination->create_links();
        $data['title'] = 'Explore Fashion and Style Tips | Poshida Blogs';
        $data['dsc'] = "Dive into the world of fashion and style with Poshida's blogs. Discover expert tips, trend insights, and inspiration to elevate your wardrobe and express your unique style. Explore our collection of engaging and informative blogs to stay ahead in the fashion game";
        $this->load->view('frontend/common/header2', $data);
        $this->load->view('frontend/all_blogs');
        $this->load->view('frontend/common/footer2');
    }
    //==================================================== BLOG DETAILS ====================================================
    public function blog_details()
    {
        $id = urldecode($_GET['q']);
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->where('heading', $id);
        $this->db->where('is_active', 1);
        $data['blog_data'] = $this->db->get()->row();
        $data['title'] = $data['blog_data']->title;
        $data['keyword'] = $data['blog_data']->keyword;
        $data['dsc'] = $data['blog_data']->dsc;
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->where('heading !=', $id);
        $this->db->where('is_active', 1);
        $this->db->limit(10);
        $data['related_data'] = $this->db->get();
        $this->load->view('frontend/common/header2', $data);
        $this->load->view('frontend/blog_details');
        $this->load->view('frontend/common/footer2');
    }
    // ==================================== SUBMIT PRODUCT REVIEW ===================================================
    public function product_review()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('product_data', 'product_data', 'required|xss_clean|trim');
            $this->form_validation->set_rules('message', 'message', 'required|xss_clean|trim');
            $this->form_validation->set_rules('name', 'name', 'required|xss_clean|trim');
            $this->form_validation->set_rules('email', 'email', 'required|xss_clean|trim');
            $this->form_validation->set_rules('star_rating', 'star_rating', 'xss_clean|trim');
            if ($this->form_validation->run() == true) {
                $product_data = $this->input->post('product_data');
                $message = $this->input->post('message');
                $name = $this->input->post('name');
                $email = $this->input->post('email');
                $star_rating = $this->input->post('star_rating');
                $submit_review = $this->forms->submitProductReview($product_data, $message, $name, $email, $star_rating);
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->session->set_flashdata('emessage', validation_errors());
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata('emessage', 'Please insert some data, No data available');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function contact()
    {
        $data['title'] = 'Contact Us - Poshida';
        $data['dsc'] = "Get in touch with Poshida through our Contact Us page. Whether you have inquiries about our products, need assistance with orders, or wish to explore partnership opportunities, our team is here to assist you. Experience exceptional customer service and seamless communication with Poshida";
        $this->load->view('frontend/common/header2', $data);
        $this->load->view('frontend/contact');
        $this->load->view('frontend/common/footer2');
    }
    public function terms_and_conditions()
    {

        $data['title'] = 'Terms & Conditions - Poshida';
        $data['dsc'] = 'Please read the following terms and conditions very carefully as your use of the service is subject to your acceptance of and compliance with the following terms and conditions ("Terms"). By subscribing to or using any of our services you agree that you have read, understood, and are bound by the Terms, regardless of how you subscribe to or use the services. If you do not want to be bound by the Terms, you must not subscribe to or use our services';
        $this->load->view('frontend/common/header2', $data);
        $this->load->view('frontend/terms_and_conditions');
        $this->load->view('frontend/common/footer2');
    }
    public function terms_and_conditions2()
    {
        $data['title'] = 'Terms & Conditions - Poshida';
        $data['dsc'] = 'Please read the following terms and conditions very carefully as your use of the service is subject to your acceptance of and compliance with the following terms and conditions ("Terms"). By subscribing to or using any of our services you agree that you have read, understood, and are bound by the Terms, regardless of how you subscribe to or use the services. If you do not want to be bound by the Terms, you must not subscribe to or use our services';
        $data['hide'] = 1;
        $this->load->view('frontend/common/header2', $data);
        $this->load->view('frontend/terms_and_conditions');
        $this->load->view('frontend/common/footer2');
    }
    public function sign_in()
    {
        $this->load->view('frontend/common/header2');
        $this->load->view('frontend/login');
        $this->load->view('frontend/common/footer2');
    }
    ///=============================== GET SIZE BY COLOR =======================
    public function GetSize()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('color_id', 'color_id', 'required|xss_clean|trim');
            $this->form_validation->set_rules('product_id', 'product_id', 'required|xss_clean|trim');
            if ($this->form_validation->run() == true) {
                $color_id = $this->input->post('color_id');
                $product_id = $this->input->post('product_id');
                $size_arr = $this->products->getColorSize($product_id, $color_id);
                $respone['status'] = true;
                $respone['data'] = $size_arr;
                echo json_encode($respone);
            } else {
                $respone['status'] = false;
                $respone['message'] = validation_errors();
                echo json_encode($respone);
            }
        } else {
            $respone['status'] = false;
            $respone['message'] = "Please insert some data, No data available";
            echo json_encode($respone);
        }
    }
    ///=============================== Edit Address =======================

    public function edit_address($idd, $t = 2)
    {
        if (!empty($this->session->userdata('user_id'))) {
            $id = base64_decode($idd);
            $data['id'] = $idd;
            $data['t'] = $t;
            $data['address_data'] = $this->db->get_where('tbl_user_address', array('id' => $id))->row();
            $data['state_data'] = $this->db->get('all_states');
            $this->load->view('frontend/common/header2', $data);
            $this->load->view('frontend/edit_address');
            $this->load->view('frontend/common/footer2');
        } else {
            redirect("/", "refresh");
        }
    }
    ///=============================== Add Address =======================

    public function add_address()
    {
        if (!empty($this->session->userdata('user_id'))) {
            $data['state_data'] = $this->db->get('all_states');
            $this->load->view('frontend/common/header2', $data);
            $this->load->view('frontend/add_new_address');
            $this->load->view('frontend/common/footer2');
        } else {
            redirect("/", "refresh");
        }
    }
    ///=============================== Edit Address data =======================
    public function edit_address_data()
    {

        if (!empty($this->session->userdata('user_data'))) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->helper('security');
            if ($this->input->post()) {
                $this->form_validation->set_rules('address_id', 'address_id', 'required|xss_clean|trim');
                $this->form_validation->set_rules('fname', 'fname', 'required|xss_clean|trim');
                $this->form_validation->set_rules('lname', 'lname', 'required|xss_clean|trim');
                $this->form_validation->set_rules('email', 'email', 'xss_clean|trim');
                $this->form_validation->set_rules('phonenumber', 'phonenumber', 'required|xss_clean|trim');
                $this->form_validation->set_rules('state', 'state', 'required|xss_clean|trim');
                $this->form_validation->set_rules('city', 'city', 'required|xss_clean|trim');
                $this->form_validation->set_rules('address', 'address', 'required|xss_clean|trim');
                $this->form_validation->set_rules('pincode', 'pincode', 'required|xss_clean|trim');
                $this->form_validation->set_rules('t', 't', 'required|xss_clean|trim');
                if ($this->form_validation->run() == true) {
                    $address_id = $this->input->post('address_id');
                    $t = $this->input->post('t');
                    $fname = $this->input->post('fname');
                    $lname = $this->input->post('lname');
                    $email = $this->input->post('email');
                    $phone = $this->input->post('phonenumber');
                    $state = $this->input->post('state');
                    $city = $this->input->post('city');
                    $address = $this->input->post('address');
                    $pincode = $this->input->post('pincode');
                    date_default_timezone_set("Asia/Calcutta");

                    $data_insert = array(
                        'f_name' => $fname,
                        'l_name' => $lname,
                        'email' => $email,
                        'phone' => $phone,
                        'state' => $state,
                        'city' => $city,
                        'address' => $address,
                        'pincode' => $pincode,
                    );

                    $this->db->where('id', $address_id);
                    $zapak = $this->db->update('tbl_user_address', $data_insert);
                    if (!empty($zapak)) {
                        $this->session->set_flashdata('smessage', 'Address updated successfully!');
                        if ($t == 1) {
                            redirect('Order/add_address', 'refresh');
                        } else {
                            redirect('my_profile/ordes', 'refresh');
                        }
                    } else {
                        $this->session->set_flashdata('emessage', 'Some error occurred!');
                        redirect($_SERVER['HTTP_REFERER']);
                    }
                } else {
                    $this->session->set_flashdata('emessage', validation_errors());
                    redirect($_SERVER['HTTP_REFERER']);
                }
            } else {
                $this->session->set_flashdata('emessage', 'Please insert some data, No data available');
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            redirect('/', 'refresh');
        }
    }
    ///=============================== Delete Address =======================

    public function delete_address($idd)
    {

        if (!empty($this->session->userdata('user_id'))) {

            $id = base64_decode($idd);
            $user_id = $this->session->userdata('user_id');
            $user_type = $this->session->userdata('user_type');

            $this->db->select('id');
            $this->db->from('tbl_user_address');
            $this->db->where('id', $id);
            $this->db->where('user_id', $user_id);
            $this->db->where('user_type', $user_type);
            $da = $this->db->get()->row();

            if (!empty($da)) {
                $data_update = array(
                    'is_active' => 0,
                );
                $this->db->where('id', $id);
                $zapak = $this->db->update('tbl_user_address', $data_update);
                if ($zapak != 0) {
                    $this->session->set_flashdata('smessage', 'Address successfully deleted!');
                    redirect('my_profile/ordes', 'refresh');
                } else {
                    $this->session->set_flashdata('emessage', 'Sorry error occured');
                    redirect($_SERVER['HTTP_REFERER']);
                }
            } else {
                $this->session->set_flashdata('emessage', 'Sorry error occured');
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            redirect("Home/login", "refresh");
        }
    }
    ///=============================== Delete Address =======================

    public function add_address_data()
    {

        if (!empty($this->session->userdata('user_data'))) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->helper('security');
            if ($this->input->post()) {
                $this->form_validation->set_rules('fname', 'fname', 'required|xss_clean|trim');
                $this->form_validation->set_rules('lname', 'lname', 'required|xss_clean|trim');
                $this->form_validation->set_rules('email', 'email', 'xss_clean|trim');
                $this->form_validation->set_rules('phonenumber', 'phonenumber', 'required|xss_clean|trim');
                $this->form_validation->set_rules('state', 'state', 'required|xss_clean|trim');
                $this->form_validation->set_rules('city', 'city', 'required|xss_clean|trim');
                $this->form_validation->set_rules('address', 'address', 'required|xss_clean|trim');
                $this->form_validation->set_rules('pincode', 'pincode', 'required|xss_clean|trim');
                if ($this->form_validation->run() == true) {
                    $fname = $this->input->post('fname');
                    $lname = $this->input->post('lname');
                    $email = $this->input->post('email');
                    $phone = $this->input->post('phonenumber');
                    $state = $this->input->post('state');
                    $city = $this->input->post('city');
                    $address = $this->input->post('address');
                    $pincode = $this->input->post('pincode');
                    date_default_timezone_set("Asia/Calcutta");
                    $cur_date = date("Y-m-d H:i:s");
                    $user_id = $this->session->userdata('user_id');
                    $user_type = $this->session->userdata('user_type');
                    $data_insert = array(
                        'user_id' => $user_id,
                        'user_type' => $user_type,
                        'f_name' => $fname,
                        'l_name' => $lname,
                        'email' => $email,
                        'phone' => $phone,
                        'state' => $state,
                        'city' => $city,
                        'address' => $address,
                        'pincode' => $pincode,
                        'is_default' => 0,
                        'date' => $cur_date
                    );

                    $last_id = $this->base_model->insert_table("tbl_user_address", $data_insert, 1);
                    if (!empty($last_id)) {
                        $this->session->set_flashdata('smessage', 'Address added successfully!');
                        redirect('my_profile/ordes', 'refresh');
                    } else {
                        $this->session->set_flashdata('emessage', 'Some error occurred!');
                        redirect($_SERVER['HTTP_REFERER']);
                    }
                } else {
                    $this->session->set_flashdata('emessage', validation_errors());
                    redirect($_SERVER['HTTP_REFERER']);
                }
            } else {
                $this->session->set_flashdata('emessage', 'Please insert some data, No data available');
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            redirect('/', 'refresh');
        }
    }
}
