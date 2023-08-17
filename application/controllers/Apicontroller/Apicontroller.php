<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Apicontroller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/login_model");
        $this->load->model("admin/base_model");
        $this->load->library('pagination');
    }
    //======================================= EMPLOYEE LOGIN ===============================================
    public function employee_login()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('email', 'email', 'required|xss_clean|trim');
            $this->form_validation->set_rules('password', 'password', 'required|xss_clean|trim');
            if ($this->form_validation->run() == true) {
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $emp_data = $this->db->get_where('tbl_employee', array('is_active' => 1, 'email' => $email))->result();
                if (!empty($emp_data)) {
                    if ($emp_data[0]->pass == md5($password)) {
                        $auth = bin2hex(random_bytes(15)); // create auth
                        $data_update = array(
                            'authentication' => $auth,
                        );
                        $this->db->where('id', $emp_data[0]->id);
                        $zapak = $this->db->update('tbl_employee', $data_update);
                        $res = array(
                            'message' => "success",
                            'status' => 200,
                            'data' => $auth
                        );
                        echo json_encode($res);
                    } else {
                        $res = array(
                            'message' => "Wrong Password",
                            'status' => 201
                        );
                        echo json_encode($res);
                    }
                } else {
                    $res = array(
                        'message' => "Employee is not registered",
                        'status' => 201
                    );
                    echo json_encode($res);
                }
            } else {
                $res = array(
                    'message' => validation_errors(),
                    'status' => 201
                );
                echo json_encode($res);
            }
        } else {
            $res = array(
                'message' => "Please insert some data, No data available",
                'status' => 201
            );
            echo json_encode($res);
        }
    }
    //======================================= SCAN PRODUCT ===============================================
    public function scan_product()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('barcode', 'barcode', 'required|xss_clean|trim');
            $this->form_validation->set_rules('auth', 'auth', 'required|xss_clean|trim');
            if ($this->form_validation->run() == true) {
                $barcode = $this->input->post('barcode');
                $auth = $this->input->post('auth');
                $emp_check = $this->db->get_where('tbl_employee', array('is_active' => 1, 'authentication' => $auth))->result();
                if (!empty($emp_check)) {
                    $this->db->select('*');
                    $this->db->from('tbl_type');
                    $this->db->where('barcode', $barcode);
                    $type_data = $this->db->get()->row();
                    $this->db->select('*');
                    $this->db->from('tbl_product');
                    $this->db->where('id', $type_data->product_id);
                    $pro_data = $this->db->get()->row();
                    $this->db->select('*');
                    $this->db->from('tbl_colour');
                    $this->db->where('id', $type_data->colour_id);
                    $colour_data = $this->db->get()->row();
                    $this->db->select('*');
                    $this->db->from('tbl_size');
                    $this->db->where('id', $type_data->size_id);
                    $size_data = $this->db->get()->row();
                    $data_product[] = array(
                        'type_id' => $type_data->id,
                        'product_id' => $pro_data->id,
                        'product_name' => $pro_data->name,
                        'size_name' => $size_data->name,
                        'colour_name' => $colour_data->colour_name,
                        'image' => base_url() . $type_data->image,
                        'mrp' => $type_data->retailer_mrp,
                        'sp' => $type_data->retailer_spgst,
                    );
                    $res = array(
                        'message' => "success",
                        'status' => 200,
                        'data' => $data_product
                    );
                    echo json_encode($res);
                } else {
                    $res = array(
                        'message' => 'Permission Denied!',
                        'status' => 201
                    );
                    echo json_encode($res);
                }
            } else {
                $res = array(
                    'message' => validation_errors(),
                    'status' => 201
                );
                echo json_encode($res);
            }
        } else {
            $res = array(
                'message' => 'please insert data',
                'status' => 201
            );
            echo json_encode($res);
        }
    }
    //======================================= ADD TO CART ===============================================
    public function add_to_cart()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('auth', 'auth', 'required|xss_clean|trim');
            $this->form_validation->set_rules('product_id', 'product_id', 'required|xss_clean|trim');
            $this->form_validation->set_rules('type_id', 'type_id', 'required|xss_clean|trim');
            $this->form_validation->set_rules('quantity', 'quantity', 'required|xss_clean|trim');
            if ($this->form_validation->run() == true) {
                $auth = $this->input->post('auth');
                $product_id = $this->input->post('product_id');
                $type_id = $this->input->post('type_id');
                $quantity = $this->input->post('quantity');
                $emp_data = $this->db->get_where('tbl_employee', array('is_active' => 1, 'authentication' => $auth))->result();
                if (!empty($emp_data)) {
                    $cart_data = $this->db->get_where('tbl_cart2', array('employee_id' => $emp_data[0]->id, 'product_id' => $product_id, 'type_id' => $type_id))->result();
                    if (empty($cart_data)) {
                        $type_data = $this->db->get_where('tbl_type', array('id' => $type_id))->result();
                        if ($type_data[0]->inventory >= $quantity) {
                            date_default_timezone_set("Asia/Calcutta");
                            $cur_date = date("Y-m-d H:i:s");
                            $data_insert = array(
                                'employee_id' => $emp_data[0]->id,
                                'product_id' => $product_id,
                                'type_id' => $type_id,
                                'quantity' => $quantity,
                                'date' => $cur_date
                            );
                            $last_id = $this->base_model->insert_table("tbl_cart2", $data_insert, 1);
                            if (!empty($last_id)) {
                                $res = array(
                                    'message' => "Success!",
                                    'status' => 200
                                );
                                echo json_encode($res);
                            } else {
                                $res = array(
                                    'message' => "Some error occurred!",
                                    'status' => 201
                                );
                                echo json_encode($res);
                            }
                        } else {
                            $res = array(
                                'message' => "Product is out of stock!",
                                'status' => 201
                            );
                            echo json_encode($res);
                        }
                    } else {
                        $res = array(
                            'message' => "Product is already in your cart!",
                            'status' => 201
                        );
                        echo json_encode($res);
                    }
                } else {
                    $res = array(
                        'message' => "Permission Denied!",
                        'status' => 201
                    );
                    echo json_encode($res);
                }
            } else {
                $res = array(
                    'message' => validation_errors(),
                    'status' => 201
                );
                echo json_encode($res);
            }
        } else {
            $res = array(
                'message' => "Please insert some data, No data available",
                'status' => 201
            );
            echo json_encode($res);
        }
    }
    //======================================= VIEW CART ===============================================
    public function view_cart()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('auth', 'auth', 'required|xss_clean|trim');
            if ($this->form_validation->run() == true) {
                $auth = $this->input->post('auth');
                $emp_data = $this->db->get_where('tbl_employee', array('is_active' => 1, 'authentication' => $auth))->result();
                if (!empty($emp_data)) {
                    $cart_data = $this->db->get_where('tbl_cart2', array('employee_id' => $emp_data[0]->id));
                    $data_product = [];
                    $subtotal = 0;
                    $sub_percentage_discount = 0;
                    $i = 1;
                    foreach ($cart_data->result() as $cart) {
                        $total = 0;
                        $percentage_discount = 0;
                        $this->db->select('*');
                        $this->db->from('tbl_product');
                        $this->db->where('id', $cart->product_id);
                        $pro_data = $this->db->get()->row();
                        $this->db->select('*');
                        $this->db->from('tbl_type');
                        $this->db->where('id', $cart->type_id);
                        $type_data = $this->db->get()->row();
                        $this->db->select('*');
                        $this->db->from('tbl_colour');
                        $this->db->where('id', $type_data->colour_id);
                        $colour_data = $this->db->get()->row();
                        $this->db->select('*');
                        $this->db->from('tbl_size');
                        $this->db->where('id', $type_data->size_id);
                        $size_data = $this->db->get()->row();
                        $total = $type_data->retailer_spgst * $cart->quantity;
                        $percentage_data = $this->db->get_where('tbl_percentage', array('id' => $cart->percentage_id, 'is_active' => 1))->result();
                        if (!empty($percentage_data)) {
                            $percentage_discount = $total * $percentage_data[0]->percentage / 100;
                        }
                        $data_product[] = array(
                            'cart_id' => $cart->id,
                            'type_id' => $cart->type_id,
                            'product_id' => $cart->product_id,
                            'product_name' => $pro_data->name,
                            'size_name' => $size_data->name,
                            'colour_name' => $colour_data->colour_name,
                            'image' => base_url() . $type_data->image,
                            'mrp' => $type_data->retailer_mrp,
                            'sp' => $type_data->retailer_spgst,
                            'qty' => $cart->quantity,
                            'total' => round($total),
                            'percentage_id' => $cart->percentage_id,
                            'percentage_discount' => round($percentage_discount),
                        );
                        $sub_percentage_discount = $sub_percentage_discount + $percentage_discount;
                        $subtotal = $subtotal + $total;
                    }
                    //----- get percentage data ----
                    $percentage_data = $this->db->get_where('tbl_percentage')->result();
                    $percentages = [];
                    foreach ($percentage_data as $percentage) {
                        $percentages[] = array(
                            'percentage_id' => $percentage->id,
                            'percentage' => $percentage->percentage,
                        );
                    }
                    $res = array(
                        'message' => "success",
                        'status' => 200,
                        'data' => $data_product,
                        'sub_percentage_discount' => round($sub_percentage_discount),
                        'subtotal' => round($subtotal),
                        'final_amount' => round($subtotal - $sub_percentage_discount),
                        'percentages' => $percentages,
                    );
                    echo json_encode($res);
                } else {
                    $res = array(
                        'message' => "Permission Denied!",
                        'status' => 201
                    );
                    echo json_encode($res);
                }
            } else {
                $res = array(
                    'message' => validation_errors(),
                    'status' => 201
                );
                echo json_encode($res);
            }
        } else {
            $res = array(
                'message' => "Please insert some data, No data available",
                'status' => 201
            );
            echo json_encode($res);
        }
    }
    //======================================= UPDATE CART ===============================================
    public function update_cart()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('auth', 'auth', 'required|xss_clean|trim');
            $this->form_validation->set_rules('cart_id', 'cart_id', 'required|xss_clean|trim');
            $this->form_validation->set_rules('quantity', 'quantity', 'required|xss_clean|trim');
            $this->form_validation->set_rules('percentage_id', 'percentage_id', 'required|xss_clean|trim');
            if ($this->form_validation->run() == true) {
                $auth = $this->input->post('auth');
                $cart_id = $this->input->post('cart_id');
                $quantity = $this->input->post('quantity');
                $percentage_id = $this->input->post('percentage_id');
                $emp_data = $this->db->get_where('tbl_employee', array('is_active' => 1, 'authentication' => $auth))->result();
                if (!empty($emp_data)) {
                    $cart_data = $this->db->get_where('tbl_cart2', array('id' => $cart_id))->result();
                    if (!empty($cart_data)) {
                        $type_data = $this->db->get_where('tbl_type', array('id' => $cart_data[0]->type_id))->result();
                        //------ check inventory -----
                        if ($type_data[0]->inventory >= $quantity) {
                            $percentage_data = $this->db->get_where('tbl_percentage', array('id' => $percentage_id, 'is_active' => 1))->result();
                            if (!empty($percentage_data)) {
                                $data_update = array(
                                    'quantity' => $quantity,
                                    'percentage_id' => $percentage_id,
                                );
                            } else {
                                $data_update = array(
                                    'quantity' => $quantity,
                                );
                            }
                            $this->db->where('id', $cart_id);
                            $zapak = $this->db->update('tbl_cart2', $data_update);
                            if (!empty($zapak)) {
                                $res = array(
                                    'message' => "Success",
                                    'status' => 200
                                );
                                echo json_encode($res);
                            } else {
                                $res = array(
                                    'message' => "Some error occurred!",
                                    'status' => 201
                                );
                                echo json_encode($res);
                            }
                        } else {
                            $res = array(
                                'message' => "Product is out of stock!",
                                'status' => 201
                            );
                            echo json_encode($res);
                        }
                    } else {
                        $res = array(
                            'message' => "Product not found in your cart!",
                            'status' => 201
                        );
                        echo json_encode($res);
                    }
                } else {
                    $res = array(
                        'message' => "Permission Denied!",
                        'status' => 201
                    );
                    echo json_encode($res);
                }
            } else {
                $res = array(
                    'message' => validation_errors(),
                    'status' => 201
                );
                echo json_encode($res);
            }
        } else {
            $res = array(
                'message' => "Please insert some data, No data available",
                'status' => 201
            );
            echo json_encode($res);
        }
    }
    //======================================= REMOVE FROM CART ===============================================
    public function remove_from_cart()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('auth', 'auth', 'required|xss_clean|trim');
            $this->form_validation->set_rules('cart_id', 'cart_id', 'required|xss_clean|trim');
            if ($this->form_validation->run() == true) {
                $auth = $this->input->post('auth');
                $cart_id = $this->input->post('cart_id');
                $quantity = $this->input->post('quantity');
                $emp_data = $this->db->get_where('tbl_employee', array('is_active' => 1, 'authentication' => $auth))->result();
                if (!empty($emp_data)) {
                    $cart_data = $this->db->get_where('tbl_cart2', array('id' => $cart_id))->result();
                    if (!empty($cart_data)) {
                        $delete = $this->db->delete('tbl_cart2', array('id' => $cart_id));
                        if (!empty($delete)) {
                            $res = array(
                                'message' => "Success!",
                                'status' => 200
                            );
                            echo json_encode($res);
                        } else {
                            $res = array(
                                'message' => "Some error occurred!",
                                'status' => 201
                            );
                            echo json_encode($res);
                        }
                    } else {
                        $res = array(
                            'message' => "Product not found in your cart!",
                            'status' => 201
                        );
                        echo json_encode($res);
                    }
                } else {
                    $res = array(
                        'message' => "Permission Denied!",
                        'status' => 201
                    );
                    echo json_encode($res);
                }
            } else {
                $res = array(
                    'message' => validation_errors(),
                    'status' => 201
                );
                echo json_encode($res);
            }
        } else {
            $res = array(
                'message' => "Please insert some data, No data available",
                'status' => 201
            );
            echo json_encode($res);
        }
    }
    //======================================= PROMOCODE LIST ===============================================
    public function promocode_list()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('auth', 'auth', 'required|xss_clean|trim');
            if ($this->form_validation->run() == true) {
                $auth = $this->input->post('auth');
                $emp_data = $this->db->get_where('tbl_employee', array('is_active' => 1, 'authentication' => $auth))->result();
                date_default_timezone_set("Asia/Calcutta");
                $cur_date = date("Y-m-d");
                if (!empty($emp_data)) {
                    $promo_data = $this->db->get_where('tbl_promocode', array('is_active' => 1,));
                    $promo_list = [];
                    $i = 1;
                    foreach ($promo_data->result() as $promo) {
                        if (strtotime($promo->end_date) >= strtotime($cur_date) && strtotime($promo->start_date) <= strtotime($cur_date)) {
                            $promo_list[] = array(
                                'promocode_id' => $promo->id,
                                'name' => $promo->promocode,
                                'percentage' => $promo->percentage_amount,
                                'min_order' => $promo->minorder,
                                'max' => $promo->max,
                            );
                        }
                    }
                    $res = array(
                        'message' => "success",
                        'status' => 200,
                        'data' => $promo_list,
                    );
                    echo json_encode($res);
                } else {
                    $res = array(
                        'message' => "Permission Denied!",
                        'status' => 201
                    );
                    echo json_encode($res);
                }
            } else {
                $res = array(
                    'message' => validation_errors(),
                    'status' => 201
                );
                echo json_encode($res);
            }
        } else {
            $res = array(
                'message' => "Please insert some data, No data available",
                'status' => 201
            );
            echo json_encode($res);
        }
    }
    //======================================= PROMOCODE apply ===============================================
    public function apply_promocode()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('auth', 'auth', 'required|xss_clean|trim');
            $this->form_validation->set_rules('promocode_id', 'promocode_id', 'required|xss_clean|trim');
            if ($this->form_validation->run() == true) {
                $auth = $this->input->post('auth');
                $promocode_id = $this->input->post('promocode_id');
                $emp_data = $this->db->get_where('tbl_employee', array('is_active' => 1, 'authentication' => $auth))->result();
                date_default_timezone_set("Asia/Calcutta");
                $cur_date = date("Y-m-d");
                if (!empty($emp_data)) {
                    $promocode_data = $this->db->get_where('tbl_promocode', array('id' => $promocode_id))->result();
                    if (!empty($promocode_data)) {
                        $cart_data = $this->db->get_where('tbl_cart2', array('employee_id' => $emp_data[0]->id));
                        $subtotal = 0;
                        $sub_percentage_discount = 0;
                        $i = 1;
                        foreach ($cart_data->result() as $cart) {
                            $total = 0;
                            $this->db->select('*');
                            $this->db->from('tbl_product');
                            $this->db->where('id', $cart->product_id);
                            $pro_data = $this->db->get()->row();
                            $this->db->select('*');
                            $this->db->from('tbl_type');
                            $this->db->where('id', $cart->type_id);
                            $type_data = $this->db->get()->row();
                            $total = $type_data->retailer_spgst * $cart->quantity;
                            if ($type_data->inventory >= $cart->quantity) {
                                $percentage_data = $this->db->get_where('tbl_percentage', array('id' => $cart->percentage_id, 'is_active' => 1))->result();
                                if (!empty($percentage_data)) {
                                    $percentage_discount = $total * $percentage_data[0]->percentage / 100;
                                } else {
                                    $percentage_discount = 0;
                                }
                                $sub_percentage_discount = $sub_percentage_discount + $percentage_discount;
                                $subtotal = $subtotal + $total;
                            } else {
                                $res = array(
                                    'message' => $pro_data->name . " is out of stock!",
                                    'status' => 201
                                );
                                echo json_encode($res);
                                exit;
                            }
                        }
                        if ($promocode_data[0]->ptype == 1) {
                            $promocodeAlreadyUsed = $this->db->get_where('tbl_order1', array('user_id = ' => $user_id, 'promocode' => $promocode_data[0]->id, 'payment_status' => 1))->result();
                            if (empty($promocodeAlreadyUsed)) {
                                if (strtotime($promocode_data[0]->end_date) >= strtotime($cur_date) && strtotime($promocode_data[0]->start_date) <= strtotime($cur_date)) {
                                    if ($subtotal > $promocode_data[0]->minorder) {
                                        //----checking minorder for promocode
                                        if ($promocode_data[0]->type == 1) { //-- Discount in percentage
                                            $discount_amt = $subtotal * $promocode_data[0]->percentage_amount / 100;
                                            if ($discount_amt > $promocode_data[0]->max) {
                                                // will get max amount
                                                $promo_discount =  $promocode_data[0]->max;
                                            } else {
                                                $promo_discount =  $discount_amt;
                                            }
                                        } else {    //-- Discount in ₹
                                            $promo_discount = $promocode_data[0]->percentage_amount;
                                        }
                                    }   //endif of minorder
                                    else {
                                        $res = array(
                                            'message' => "The applicable promocode amount is greater than Rs" . $promocode_data[0]->minorder . "",
                                            'status' => 201
                                        );
                                        echo json_encode($res);
                                        exit;
                                        exit;
                                    }
                                } else {
                                    $res = array(
                                        'message' => "Invalid Promocode1",
                                        'status' => 201
                                    );
                                    echo json_encode($res);
                                    exit;
                                }
                            } else {
                                $res = array(
                                    'message' => "Promocode already used",
                                    'status' => 201
                                );
                                echo json_encode($res);
                                exit;
                            }
                        }
                        //-----every time promocode---
                        else {
                            if (strtotime($promocode_data[0]->end_date) >= strtotime($cur_date) && strtotime($promocode_data[0]->start_date) <= strtotime($cur_date)) {
                                if ($subtotal > $promocode_data[0]->minorder) { //----checking minorder for promocode
                                    if ($promocode_data[0]->type == 1) { //-- Discount in percentage
                                        $discount_amt = $subtotal * $promocode_data[0]->percentage_amount / 100;
                                        if ($discount_amt > $promocode_data[0]->max) {
                                            // will get max amount
                                            $promo_discount =  $promocode_data[0]->max;
                                        } else {
                                            $promo_discount =   $discount_amt;
                                        }
                                    } else {    //-- Discount in ₹
                                        $promo_discount = $promocode_data[0]->percentage_amount;
                                    }
                                } //endif of minorder
                                else {
                                    $res = array(
                                        'message' => "The applicable promocode amount is greater than Rs" . $promocode_data[0]->minorder . "",
                                        'status' => 201
                                    );
                                    echo json_encode($res);
                                    exit;
                                }
                            } else {
                                $res = array(
                                    'message' => "Invalid Promocode",
                                    'status' => 201
                                );
                                echo json_encode($res);
                                exit;
                            }
                        }
                        $subtotal = $subtotal - $sub_percentage_discount - $promo_discount;
                        $res = array(
                            'message' => "success",
                            'status' => 200,
                            'promo_discount' => round($promo_discount),
                            'final_amount' => round($subtotal),
                            'promo_name' => $promocode_data[0]->promocode,
                        );
                        echo json_encode($res);
                    } else {
                        $res = array(
                            'message' => "Invalid Promocode!",
                            'status' => 201
                        );
                        echo json_encode($res);
                    }
                } else {
                    $res = array(
                        'message' => "Permission Denied!",
                        'status' => 201
                    );
                    echo json_encode($res);
                }
            } else {
                $res = array(
                    'message' => validation_errors(),
                    'status' => 201
                );
                echo json_encode($res);
            }
        } else {
            $res = array(
                'message' => "Please insert some data, No data available",
                'status' => 201
            );
            echo json_encode($res);
        }
    }
    //======================================= CALCULATE ===============================================
    public function calculate()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('auth', 'auth', 'required|xss_clean|trim');
            $this->form_validation->set_rules('promocode_id', 'promocode_id', 'xss_clean|trim');
            if ($this->form_validation->run() == true) {
                $auth = $this->input->post('auth');
                $promocode_id = $this->input->post('promocode_id');
                $emp_data = $this->db->get_where('tbl_employee', array('is_active' => 1, 'authentication' => $auth))->result();
                date_default_timezone_set("Asia/Calcutta");
                $cur_date = date("Y-m-d");
                if (!empty($emp_data)) {
                    $promocode_data = $this->db->get_where('tbl_promocode', array('id' => $promocode_id))->result();
                    $cart_data = $this->db->get_where('tbl_cart2', array('employee_id' => $emp_data[0]->id));
                    $subtotal = 0;
                    $sub_percentage_discount = 0;
                    $i = 1;
                    foreach ($cart_data->result() as $cart) {
                        $total = 0;
                        $this->db->select('*');
                        $this->db->from('tbl_product');
                        $this->db->where('id', $cart->product_id);
                        $pro_data = $this->db->get()->row();
                        $this->db->select('*');
                        $this->db->from('tbl_type');
                        $this->db->where('id', $cart->type_id);
                        $type_data = $this->db->get()->row();
                        $total = $type_data->retailer_spgst * $cart->quantity;
                        if ($type_data->inventory >= $cart->quantity) {
                            $percentage_data = $this->db->get_where('tbl_percentage', array('id' => $cart->percentage_id, 'is_active' => 1))->result();
                            if (!empty($percentage_data)) {
                                $percentage_discount = $total * $percentage_data[0]->percentage / 100;
                            } else {
                                $percentage_discount = 0;
                            }
                            $sub_percentage_discount = $sub_percentage_discount + $percentage_discount;
                            $subtotal = $subtotal + $total;
                        } else {
                            $res = array(
                                'message' => $pro_data->name . " is out of stock!",
                                'status' => 201
                            );
                            echo json_encode($res);
                            exit;
                        }
                    }
                    if (!empty($promocode_data)) {
                        if ($promocode_data[0]->ptype == 1) {
                            $promocodeAlreadyUsed = $this->db->get_where('tbl_order1', array('user_id = ' => $user_id, 'promocode' => $promocode_data[0]->id, 'payment_status' => 1))->result();
                            if (empty($promocodeAlreadyUsed)) {
                                if (strtotime($promocode_data[0]->end_date) >= strtotime($cur_date) && strtotime($promocode_data[0]->start_date) <= strtotime($cur_date)) {
                                    if ($subtotal > $promocode_data[0]->minorder) {
                                        //----checking minorder for promocode
                                        if ($promocode_data[0]->type == 1) { //-- Discount in percentage
                                            $discount_amt = $subtotal * $promocode_data[0]->percentage_amount / 100;
                                            if ($discount_amt > $promocode_data[0]->max) {
                                                // will get max amount
                                                $promo_discount =  $promocode_data[0]->max;
                                            } else {
                                                $promo_discount =  $discount_amt;
                                            }
                                        } else {    //-- Discount in ₹
                                            $promo_discount = $promocode_data[0]->percentage_amount;
                                        }
                                    }   //endif of minorder
                                    else {
                                        $res = array(
                                            'message' => "The applicable promocode amount is greater than ₹" . $promocode_data[0]->minorder . "",
                                            'status' => 201
                                        );
                                        echo json_encode($res);
                                        exit;
                                        exit;
                                    }
                                } else {
                                    $res = array(
                                        'message' => "Invalid Promocode1",
                                        'status' => 201
                                    );
                                    echo json_encode($res);
                                    exit;
                                }
                            } else {
                                $res = array(
                                    'message' => "Promocode already used",
                                    'status' => 201
                                );
                                echo json_encode($res);
                                exit;
                            }
                        }
                        //-----every time promocode---
                        else {
                            if (strtotime($promocode_data[0]->end_date) >= strtotime($cur_date) && strtotime($promocode_data[0]->start_date) <= strtotime($cur_date)) {
                                if ($subtotal > $promocode_data[0]->minorder) { //----checking minorder for promocode
                                    if ($promocode_data[0]->type == 1) { //-- Discount in percentage
                                        $discount_amt = $subtotal * $promocode_data[0]->percentage_amount / 100;
                                        if ($discount_amt > $promocode_data[0]->max) {
                                            // will get max amount
                                            $promo_discount =  $promocode_data[0]->max;
                                        } else {
                                            $promo_discount =   $discount_amt;
                                        }
                                    } else {    //-- Discount in ₹
                                        $promo_discount = $promocode_data[0]->percentage_amount;
                                    }
                                } //endif of minorder
                                else {
                                    $res = array(
                                        'message' => "The applicable promocode amount is greater than ₹" . $promocode_data[0]->minorder . "",
                                        'status' => 201
                                    );
                                    echo json_encode($res);
                                    exit;
                                }
                            } else {
                                $res = array(
                                    'message' => "Invalid Promocode",
                                    'status' => 201
                                );
                                echo json_encode($res);
                                exit;
                            }
                        }
                    } else {
                        $promo_discount =  0;
                    }
                    $final_amount = $subtotal - $sub_percentage_discount - $promo_discount;
                    $txn = bin2hex(random_bytes(18));
                    //----order1 entry ------
                    $data_insert = array(
                        'employee_id' => $emp_data[0]->id,
                        'total_amount' => round($subtotal),
                        'promocode' => $promocode_id,
                        'promo_discount' => round($promo_discount),
                        'percentage_discount' => round($sub_percentage_discount),
                        'final_amount' => round($final_amount),
                        'order_type' => 2,
                        'txnid' => $txn,
                        'date' => $cur_date
                    );
                    $last_id = $this->base_model->insert_table("tbl_order1", $data_insert, 1);
                    if (!empty($last_id != 0)) {
                        //----order2 entry ------
                        foreach ($cart_data->result() as $cart) {
                            $total = 0;
                            $this->db->select('*');
                            $this->db->from('tbl_type');
                            $this->db->where('id', $cart->type_id);
                            $type_data = $this->db->get()->row();
                            $total = $type_data->retailer_spgst * $cart->quantity;
                            $percentage_data = $this->db->get_where('tbl_percentage', array('id' => $cart->percentage_id, 'is_active' => 1))->result();
                            if (!empty($percentage_data)) {
                                $percentage_discount = round($total * $percentage_data[0]->percentage / 100);
                                $percentage_id = $percentage_data[0]->id;
                            } else {
                                $percentage_discount = 0;
                                $percentage_id = '';
                            }
                            $sub_percentage_discount = $sub_percentage_discount + $percentage_discount;
                            $subtotal = $subtotal + $total;
                            $data_insert = array(
                                'main_id' => $last_id,
                                'product_id' => $cart->product_id,
                                'type_id' => $cart->type_id,
                                'quantity' => $cart->quantity,
                                'mrp' => $type_data->retailer_mrp,
                                'gst' => $type_data->retailer_gst,
                                'selling_price' => $type_data->retailer_sp,
                                'spgst' => $type_data->retailer_spgst,
                                'percentage_id' => $percentage_id,
                                'percentage_discount' => $percentage_discount,
                                'total_amount' => $total,
                                'date' => $cur_date
                            );
                            $last_id2 = $this->base_model->insert_table("tbl_order2", $data_insert, 1);
                        }
                        $res = array(
                            'message' => "success",
                            'status' => 200,
                            'txnid' => ($txn),
                        );
                        echo json_encode($res);
                    } else {
                        $res = array(
                            'message' => "Some Error Occurred!",
                            'status' => 201
                        );
                        echo json_encode($res);
                    }
                } else {
                    $res = array(
                        'message' => "Permission Denied!",
                        'status' => 201
                    );
                    echo json_encode($res);
                }
            } else {
                $res = array(
                    'message' => validation_errors(),
                    'status' => 201
                );
                echo json_encode($res);
            }
        } else {
            $res = array(
                'message' => "Please insert some data, No data available",
                'status' => 201
            );
            echo json_encode($res);
        }
    }
    //======================================= Checkout ===============================================
    public function checkout()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('auth', 'auth', 'required|xss_clean|trim');
            $this->form_validation->set_rules('txnid', 'txnid', 'required|xss_clean|trim');
            $this->form_validation->set_rules('name', 'name', 'required|xss_clean|trim');
            $this->form_validation->set_rules('email', 'email', 'xss_clean|trim');
            $this->form_validation->set_rules('phone', 'phone', 'required|xss_clean|trim');
            $this->form_validation->set_rules('address', 'address', 'required|xss_clean|trim');
            $this->form_validation->set_rules('state', 'state', 'required|xss_clean|trim');
            $this->form_validation->set_rules('city', 'city', 'required|xss_clean|trim');
            $this->form_validation->set_rules('pincode', 'pincode', 'required|xss_clean|trim');
            if ($this->form_validation->run() == true) {
                $auth = $this->input->post('auth');
                $txnid = $this->input->post('txnid');
                $name = $this->input->post('name');
                $email = $this->input->post('email');
                $phone = $this->input->post('phone');
                $address = $this->input->post('address');
                $state = $this->input->post('state');
                $city = $this->input->post('city');
                $pincode = $this->input->post('pincode');
                $emp_data = $this->db->get_where('tbl_employee', array('is_active' => 1, 'authentication' => $auth))->result();
                if (!empty($emp_data)) {
                    $order1_data = $this->db->get_where('tbl_order1', array('txnid' => $txnid))->result();
                    if (!empty($order1_data)) {
                        $order2_data = $this->db->get_where('tbl_order2', array('main_id' => $order1_data[0]->id));
                        //--- generate invoice no ------
                        $order1 = $this->db->order_by('id', 'desc')->get_where('tbl_order1', array('payment_status' => 1, 'order_status' => 1))->result();
                        if (empty($order1[0]->invoice_no)) {
                            $invoice_no = 1;
                        } else {
                            $invoice_no = $order1[0]->invoice_no + 1;
                        }
                        //------ update order 1 -----
                        $data_update = array(
                            'name' => $name,
                            'email' => $email,
                            'phone' => $phone,
                            'address' => $address,
                            'state' => $state,
                            'city' => $city,
                            'pincode' => $pincode,
                            'payment_type' => 1,
                            'payment_status' => 1,
                            'order_status' => 1,
                            'invoice_no' => $invoice_no,
                        );
                        $this->db->where('id', $order1_data[0]->id);
                        $zapak = $this->db->update('tbl_order1', $data_update);
                        //----- update inventory -----
                        foreach ($order2_data->result() as $order2) {
                            $this->db->select('*');
                            $this->db->from('tbl_type');
                            $this->db->where('id', $order2->type_id);
                            $type_data = $this->db->get()->row();
                            $new_invt = $type_data->inventory - $order2->quantity;
                            $data_update2 = array(
                                'inventory' => $new_invt,
                            );
                            $this->db->where('id', $order2->type_id);
                            $zapak2 = $this->db->update('tbl_type', $data_update2);
                        }
                        //------ Empty Cart ------
                        $delete = $this->db->delete('tbl_cart2', array('employee_id' => $emp_data[0]->id));
                        $res = array(
                            'message' => "Success!",
                            'status' => 200,
                            'order_id' => $order1_data[0]->id,
                            'Amount' => $order1_data[0]->final_amount
                        );
                        echo json_encode($res);
                    } else {
                        $res = array(
                            'message' => "Product not found in your cart!",
                            'status' => 201
                        );
                        echo json_encode($res);
                    }
                } else {
                    $res = array(
                        'message' => "Permission Denied!",
                        'status' => 201
                    );
                    echo json_encode($res);
                }
            } else {
                $res = array(
                    'message' => validation_errors(),
                    'status' => 201
                );
                echo json_encode($res);
            }
        } else {
            $res = array(
                'message' => "Please insert some data, No data available",
                'status' => 201
            );
            echo json_encode($res);
        }
    }
    //============= type edit ======
    public function editType()
    {
        $type_data = $this->db->get_where('tbl_type', array('is_active' => 1,))->result();
        foreach ($type_data as $value) {
            //----------generate barcode-------
            $this->load->library('zend');
            $code = rand(10000, 9999999999);
            //load in folder Zend
            $this->zend->load('Zend/Barcode');
            //generate barcode
            $this->load->library('upload');
            $path = $code . date("Ymdhms");
            $imageResource2 = Zend_Barcode::factory('Code128', 'image', array('text' => $value->barcode, 'factor' => 3.8, 'font' => 5, 'fontSize' => 30,), array())->draw();
            $path2 = $code . date("Ymdhms");
            imagepng($imageResource2, 'assets/uploads/barcodes/' . $path2 . '.png');
            $image2 = 'assets/uploads/barcodes/' . $path2 . '.png';
            print_r($image2);
            $data_insert = array(
                'barcode_tag_image' => $image2,
            );
            $this->db->where('id', $value->id);
            $last_id = $this->db->update('tbl_type', $data_insert);
        }
        if (!empty($last_id)) {
            $res = array(
                'message' => "Success",
                'status' => 200
            );
            echo json_encode($res);
        } else {
            $res = array(
                'message' => "Some error occurred",
                'status' => 201
            );
            echo json_encode($res);
        }
    }
    
}
