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
        $data['banner_data'] = $this->db->get();
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
        $this->db->where('is_active', 1);
        $this->db->limit(4);
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
        $this->load->view('frontend/common/header2', $data);
        $this->load->view('frontend/about');
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
            if (!empty($track_data->track_status)) {
                $data['track_data'] = $track_data;
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
            $this->form_validation->set_rules('name', 'name', 'xss_clean|trim');
            $this->form_validation->set_rules('message', 'message', 'xss_clean|trim');
            $this->form_validation->set_rules('email', 'email', 'xss_clean|trim');
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
                redirect('/', 'refresh');
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
            $related_products = $this->products->related_products($url,$returnarray['product_data'][0]->category_id);
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
                $size_arr = [];
            }
            $data['buy_with_it'] = $buy_with_it;
            $data['related_data'] = $related_products;
            $data['product_reviews'] = $product_reviews;
            $data['product_data'] = $returnarray['product_data'];
            $data['color_arr'] = $color_arr;
            $data['size_arr'] = $size_arr;
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
        $this->load->view('frontend/common/header2');
        $this->load->view('frontend/privacy_policy');
        $this->load->view('frontend/common/footer2');
    }
    public function return_and_replace()
    {
        $this->load->view('frontend/common/header2');
        $this->load->view('frontend/return_and_replace');
        $this->load->view('frontend/common/footer2');
    }
    public function shipping_and_delivery()
    {
        $this->load->view('frontend/common/header2');
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
        $this->load->view('frontend/common/header2', $data);
        $this->load->view('frontend/all_blogs');
        $this->load->view('frontend/common/footer2');
    }
    //==================================================== BLOG DETAILS ====================================================
    public function blog_details($idd)
    {
        $id = base64_decode($idd);
        $data['id'] = $idd;
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->where('id', $id);
        $this->db->where('is_active', 1);
        $data['blog_data'] = $this->db->get()->row();
        $data['title'] = $data['blog_data']->title;
        $data['keyword'] = $data['blog_data']->keyword;
        $data['dsc'] = $data['blog_data']->dsc;
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->where('id !=', $id);
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
        $this->load->view('frontend/common/header2');
        $this->load->view('frontend/contact');
        $this->load->view('frontend/common/footer2');
    }
    public function terms_and_conditions()
    {
        $this->load->view('frontend/common/header2');
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
}
