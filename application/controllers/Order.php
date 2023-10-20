<?php

ob_start();
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/login_model");
        $this->load->model("admin/base_model");
        $this->load->library("custom/Cart");
        $this->load->library("custom/Order");
        $this->load->library("custom/Promocode");
        $this->load->library("custom/Delhivery");
    }

    //-------------calculate--------------

    // public function calculate($pincode, $courier_id)
    // {
    //     if (!empty($this->session->userdata('user_data'))) {
    //         $calculate = $this->order->calculate($pincode, $courier_id);
    //         if ($calculate == 1) {
    //             redirect("Order/view_checkout");
    //         } else {
    //             redirect("Home/my_bag");
    //         }
    //     } else {
    //         redirect("/", "refresh");
    //     }
    // }
    public function calculate()
    {
        if (!empty($this->session->userdata('user_data'))) {
            $calculate = $this->order->calculate();
            if ($calculate == 1) {
                redirect("Order/view_checkout");
            } else {
                redirect("Home/my_bag");
            }
        } else {
            redirect("/", "refresh");
        }
    }

    //--------view checkout---------

    public function view_checkout()
    {
        if ((!empty($this->session->userdata('user_data')) && !empty($this->session->userdata('order_id')))) {
            $data['order_data'] = $this->db->get_where('tbl_order1', array('id' => base64_decode($this->session->userdata('order_id'))))->result();

            $data['state_data'] = $this->db->get('all_states');
            $cart_fetch = $this->cart->ViewCartOnline();
            $data['cart_fetch'] = $cart_fetch;
            $user_id = $this->session->userdata('user_id');
            $user_type = $this->session->userdata('user_type');
            $data['address_data'] = $this->db->order_by('id', 'desc')->get_where('tbl_user_address', array('user_id' => $user_id, 'user_type' => $user_type, 'is_default' => 1, 'is_active' => 1))->row();
            //---update order address ------

            if (!empty($data['address_data'])) {
                $data_update3 = array('address_id' => $data['address_data']->id);
                $this->db->where('id', base64_decode($this->session->userdata('order_id')));
                $zapak3 = $this->db->update('tbl_order1', $data_update3);
                // $update = $this->order->updateShipping($data['address_data'], $this->session->userdata('order_id'));
            }
            $data['order_data'] = $this->db->get_where('tbl_order1', array('id' => base64_decode($this->session->userdata('order_id'))))->result();


            $this->load->view('frontend/common/header2', $data);
            $this->load->view('frontend/checkout');
            $this->load->view('frontend/common/footer2');
        } else {
            redirect("/", "refresh");
        }
    }
    public function add_address()
    {
        if ((!empty($this->session->userdata('user_data')) && !empty($this->session->userdata('order_id')))) {
            $data['order_data'] = $this->db->get_where('tbl_order1', array('id' => base64_decode($this->session->userdata('order_id'))))->result();

            $data['state_data'] = $this->db->get('all_states');
            $user_id = $this->session->userdata('user_id');
            $user_type = $this->session->userdata('user_type');
            $data['address_data'] = $this->db->order_by('is_default', 'asc')->get_where('tbl_user_address', array('user_id' => $user_id, 'user_type' => $user_type, 'is_active' => 1))->result();
            $this->load->view('frontend/common/header2', $data);
            $this->load->view('frontend/add_address');
            $this->load->view('frontend/common/footer2');
        } else {
            redirect("/", "refresh");
        }
    }
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
                    $data_update = array('is_default' => 0,);
                    $this->db->where('user_id', $user_id);
                    $this->db->where('user_type', $user_type);
                    $zapak = $this->db->update('tbl_user_address', $data_update);
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
                        'is_default' => 1,
                        'date' => $cur_date
                    );

                    $last_id = $this->base_model->insert_table("tbl_user_address", $data_insert, 1);
                    if (!empty($last_id)) {
                        $this->session->set_flashdata('smessage', 'Address added successfully!');
                        redirect($_SERVER['HTTP_REFERER']);
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

    public function change_address()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('address_id', 'address_id', 'required|xss_clean|trim');
            if ($this->form_validation->run() == true) {
                $address_id = strtoupper($this->input->post('address_id'));
                $user_id = $this->session->userdata('user_id');
                $user_type = $this->session->userdata('user_type');
                //---remove all default address ------
                $data_update = array('is_default' => 0,);
                $this->db->where('user_id', $user_id);
                $this->db->where('user_type', $user_type);
                $zapak = $this->db->update('tbl_user_address', $data_update);
                //---update default address ------
                $data_update2 = array('is_default' => 1,);
                $this->db->where('id', $address_id);
                $zapak2 = $this->db->update('tbl_user_address', $data_update2);
                $user_id = $this->session->userdata('user_id');
                $user_type = $this->session->userdata('user_type');
                $data['address_data'] = $this->db->order_by('id', 'desc')->get_where('tbl_user_address', array('id' => $address_id))->row();
                if (!empty($data['address_data'])) {
                    // $update = $this->order->updateShipping($data['address_data'], $this->session->userdata('order_id'));
                }
                redirect("Order/view_checkout");
            } else {
                $respone['status'] = false;
                $respone['message'] = "Please insert some data, No data available";
                echo json_encode($respone);
            }
        } else {
            $respone['status'] = false;
            $respone['message'] = validation_errors();
            echo json_encode($respone);
        }
    }
    //-----------apply promocode---------
    public function apply_promocode()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('promocode', 'promocode', 'required|xss_clean|trim');
            if ($this->form_validation->run() == true) {
                $promocode = strtoupper($this->input->post('promocode'));
                $apply = $this->promocode->applyPromocode($promocode);
                echo $apply;
            } else {
                $respone['status'] = false;
                $respone['message'] = "Please insert some data, No data available";
                echo json_encode($respone);
            }
        } else {
            $respone['status'] = false;
            $respone['message'] = validation_errors();
            echo json_encode($respone);
        }
    }

    //------remove promocode--------
    public function remove_promocode()
    {
        $apply = $this->promocode->removePromocode();
        echo $apply;
    }

    //--------checkout----------------
    public function checkout()
    {
        if (!empty($this->session->userdata('user_data'))) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->helper('security');
            if ($this->input->post()) {
                $this->form_validation->set_rules('payment_method', 'payment_method', 'required|xss_clean|trim');
                $this->form_validation->set_rules('referalcode', 'referalcode', 'xss_clean|trim');

                if ($this->form_validation->run() == true) {
                    $payment_method = $this->input->post('payment_method');
                    $referalcode = $this->input->post('referalcode');
                    $order_id = base64_decode($this->session->userdata('order_id'));
                    $order1_data = $this->db->get_where('tbl_order1', array('id' => $order_id))->row();
                    if (!empty($order1_data->address_id)) {
                        $address_data = $this->db->get_where('tbl_user_address', array('id' => $order1_data->address_id))->row();
                        // if (!empty($address_data)) {
                        //     $update = $this->order->updateShipping($address_data, $this->session->userdata('order_id'), 1);
                        //     $shipping = json_decode($update);
                        //     if ($shipping->status == false) {
                        //         echo $update;
                        //         return;
                        //     }
                        // }
                    } else {
                        $respone['status'] = false;
                        $respone['message'] = 'Please add address before checkout';
                        echo json_encode($respone);
                        return;
                    }
                    if ($payment_method == 1) {
                        $order_array = array(
                            'referalcode' => $referalcode,
                            'payment_type' => $payment_method,
                        );
                        $placeOrder = $this->order->PlaceOrder($order_array);
                        echo $placeOrder;
                    } elseif ($payment_method == 2) {
                        $data_update = array(
                            'refererral_code' => $referalcode,
                            'payment_type' => $payment_method,
                        );
                        $this->db->where('id', $order_id);
                        $zapak = $this->db->update('tbl_order1', $data_update);
                        $respone['status'] = true;
                        echo json_encode($respone);
                    } else {
                        $respone['status'] = false;
                        $respone['message'] = 'Some unknown error occurred';
                        echo json_encode($respone);
                    }
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
        } else {
            $respone['status'] = false;
            $respone['message'] = "Some unknown error occurred";
            echo json_encode($respone);
        }
    }
    public function  open_cc_avenue()
    {
        $order_id = base64_decode($this->session->userdata('order_id'));

        $order_data = $this->db->get_where('tbl_order1', array('id' => $order_id))->row();
        $address_data = $this->db->get_where('tbl_user_address', array('id' => $order_data->address_id))->row();

        $txn_id = mt_rand(999999, 999999999999);
        $success = base_url() . 'Order/prepaid_payment_success';
        $fail = base_url() . 'Order/order_failed';

        $post = array(
            'txn_id' => $txn_id,
            'merchant_id' => MERCHANT_ID,
            'order_id' => $order_id,
            'amount' => $order_data->final_amount,
            'currency' => "INR",
            'redirect_url' => $success,
            'cancel_url' => $fail,
            'billing_name' => $address_data->f_name . ' ' . $address_data->l_name,
            'billing_address' => $address_data->address,
            'billing_city' => $address_data->city,
            'billing_state' => $address_data->state,
            'billing_zip' => $address_data->pincode,
            'billing_country' => 'India',
            'billing_tel' => $address_data->phone,
            'billing_email' => '',
        );
        $merchant_data = '';
        $working_key = WORKING_KEY; //Shared by CCAVENUES
        $access_code = ACCESS_CODE; //Shared by CCAVENUES
        foreach ($post as $key => $value) {
            $merchant_data .= $key . '=' . $value . '&';
        }
        $length = strlen(md5($working_key));
        $binString = "";
        $count = 0;
        while ($count < $length) {
            $subString = substr(md5($working_key), $count, 2);
            $packedString = pack("H*", $subString);
            if ($count == 0) {
                $binString = $packedString;
            } else {
                $binString .= $packedString;
            }
            $count += 2;
        }
        $key = $binString;
        $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
        $openMode = openssl_encrypt($merchant_data, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
        $encrypted_data = bin2hex($openMode);
        $send = array(
            'order_id' => $order_id,
            'access_code' => $access_code,
            'redirect_url' => $success,
            'cancel_url' => $fail,
            'encrypted_data' => $encrypted_data,
            'plain' => $merchant_data,
        );
        $this->load->view('frontend/cc_avenue', $send);
    }
    public function  prepaid_payment_success()
    {
        $encResponse = $this->input->post('encResp'); //This is the response sent by the CCAvenue Server
        log_message('error', $encResponse);
        $ip = $this->input->ip_address();
        date_default_timezone_set("Asia/Calcutta");
        $cur_date = date("Y-m-d H:i:s");
        error_reporting(0);
        $workingKey = WORKING_KEY;        //Working Key should be provided here.
        $rcvdString = $this->decrypt($encResponse, $workingKey);        //Crypto Decryption used as per the specified working key.
        $order_status = "";
        $order_id = "";
        $decryptValues = explode('&', $rcvdString);
        $dataSize = sizeof($decryptValues);
        for ($i = 0; $i < $dataSize; $i++) {
            $information = explode('=', $decryptValues[$i]);
            if ($i == 3)    $order_status = $information[1];
            if ($i == 0) $order_id = $information[1];
        }
        $data_insert = array(
            'body' => json_encode($decryptValues),
            'date' => $cur_date
        );
        $last_id = $this->base_model->insert_table("tbl_ccavenue_response", $data_insert, 1);
        // echo $order_status;die();
        if ($order_status === "Success") {
            $placeOrder = json_decode($this->order->PlacePrePaidOrder($order_id, json_encode($decryptValues)));
            if ($placeOrder == true) {
                redirect("Order/order_success");
            } else {
                redirect("Order/order_failed");
            }
        } else if ($order_status === "Failure") {
            echo 'Failure';
            exit;
        } else {
            echo 'Aborted';
        }
    }



    //-----------order success---------
    public function order_success()
    {
        if ((!empty($this->session->userdata('user_data')) && !empty($this->session->userdata('order_id'))) || (!empty($this->session->userdata('guest_data')) && !empty($this->session->userdata('order_id')))) {
            $user_id = $this->session->userdata('user_id');

            $this->db->select('*');
            $this->db->from('tbl_order1');
            $this->db->where('id', base64_decode($this->session->userdata('order_id')));
            $orderdata = $this->db->get()->row();

            $data['order_id'] = $orderdata->id;
            $data['amount'] = $orderdata->final_amount;
            $data['user_id'] = $user_id;

            $this->session->unset_userdata('order_id');

            $this->load->view('frontend/common/header2', $data);
            $this->load->view('frontend/order_success');
            $this->load->view('frontend/common/footer2');
        } else {
            redirect("/", "refresh");
        }
    }

    public function order_failed()
    {
        $encResponse = $this->input->post('encResp'); //This is the response sent by the CCAvenue Server
        log_message('error', $encResponse);
        $ip = $this->input->ip_address();
        date_default_timezone_set("Asia/Calcutta");
        $cur_date = date("Y-m-d H:i:s");
        error_reporting(0);
        $workingKey = WORKING_KEY;        //Working Key should be provided here.
        $rcvdString = $this->decrypt($encResponse, $workingKey);
        if (!empty($decryptValues)) {
            $data_insert = array(
                'body' => json_encode($decryptValues),
                'date' => $cur_date
            );
            $last_id = $this->base_model->insert_table("tbl_ccavenue_response", $data_insert, 1);
        }
        $this->load->view('frontend/common/header2');
        $this->load->view('frontend/order_failed');
        $this->load->view('frontend/common/footer2');
    }

    //===========View my orders=========================
    public function view_order()
    {
        if (!empty($this->session->userdata('user_data'))) {
            $user_id = $this->session->userdata('user_id');
            $this->db->select('*');
            $this->db->from('tbl_order1');
            $this->db->where('user_id', $user_id);
            $this->db->order_by('id', 'desc');
            $this->db->where('order_status!= ', 0);
            $data['order1_data'] = $this->db->get();
            $this->load->view('frontend/common/header2', $data);
            $this->load->view('frontend/my_orders');
            $this->load->view('frontend/common/footer2');
        } else {
            redirect("/", "refresh");
        }
    }

    //--------cancel order---------
    public function cancel_order($idd)
    {
        $id = base64_decode($idd);
        $cancel_order = $this->order->cancelOrder($id);
        if ($cancel_order == true) {
            $this->session->set_flashdata('smessage', 'Order cancelled successfully');
            redirect("Home/my_profile/order");
        } else {
            $this->session->set_flashdata('emessage', 'Some error occurred');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    //=================================== VIEW RETURN PAGE ======================================================
    public function return_replace($idd)
    {
        if (!empty($this->session->userdata('user_data'))) {
            $id = base64_decode($idd);
            $data['id'] = $idd;
            $return_data = $this->db->get_where('tbl_replacement_order', array('order2_id' => $id))->result();
            if (empty($return_data)) {
                $data['order2_data'] = $this->db->get_where('tbl_order2', array('id' => $id))->result();
                $data['pro_data'] = $this->db->get_where('tbl_product', array('id' => $data['order2_data'][0]->product_id))->result();
                $data['type_data'] = $this->db->get_where('tbl_type', array('id' => $data['order2_data'][0]->type_id))->result();
                $this->load->view('frontend/common/header2', $data);
                $this->load->view('frontend/return');
                $this->load->view('frontend/common/footer2');
            } else {
                redirect('/', 'refresh');
            }
        } else {
            redirect('/', 'refresh');
        }
    }


    //========================================== INSERT RETURN DATA ===============================================
    public function insert_return_request()
    {
        if (!empty($this->session->userdata('user_data'))) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->helper('security');
            if ($this->input->post()) {
                $this->form_validation->set_rules('order1_id', 'order1_id', 'required|xss_clean|trim');
                $this->form_validation->set_rules('order2_id', 'order2_id', 'required|xss_clean|trim');
                $this->form_validation->set_rules('type', 'type', 'required|xss_clean|trim');
                $this->form_validation->set_rules('quantity', 'quantity', 'required|xss_clean|trim');
                $this->form_validation->set_rules('reason', 'reason', 'required|xss_clean|trim');
                $this->form_validation->set_rules('message', 'message', 'xss_clean|trim');


                if ($this->form_validation->run() == true) {
                    $order1_id = $this->input->post('order1_id');
                    $order2_id = $this->input->post('order2_id');
                    $type = $this->input->post('type');
                    $quantity = $this->input->post('quantity');
                    $reason = $this->input->post('reason');
                    $message = $this->input->post('message');
                    $ip = $this->input->ip_address();
                    date_default_timezone_set("Asia/Calcutta");
                    $cur_date = date("Y-m-d H:i:s");
                    //---------------------- image 1 -----------------------
                    $upload_image1 = '';
                    $image1 = 'image1';
                    $file_check = ($_FILES[$image1]['error']);
                    if ($file_check != 4) {
                        $image_upload_folder = FCPATH . "assets/uploads/order_return/";
                        if (!file_exists($image_upload_folder)) {
                            mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                        }
                        $new_file_name = "order_return" . date("Ymdhms");
                        $this->upload_config = array(
                            'upload_path'   => $image_upload_folder,
                            'file_name' => $new_file_name,
                            'allowed_types' => 'jpg|jpeg|png',
                            'max_size'      => 25000
                        );
                        $this->upload->initialize($this->upload_config);
                        if (!$this->upload->do_upload($image1)) {
                            $upload_error = $this->upload->display_errors();
                            $this->session->set_flashdata('emessage', $upload_error);
                            redirect($_SERVER['HTTP_REFERER']);
                        } else {
                            $file_info = $this->upload->data();
                            $upload_image1 = "assets/uploads/images/" . $new_file_name . $file_info['file_ext'];
                        }
                    }
                    //---------------------- image 2 -----------------------
                    $upload_image2 = '';
                    $image2 = 'image2';
                    $file_check = ($_FILES[$image2]['error']);
                    if ($file_check != 4) {
                        $image_upload_folder = FCPATH . "assets/uploads/order_return/";
                        if (!file_exists($image_upload_folder)) {
                            mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                        }
                        $new_file_name = "order_return2" . date("Ymdhms");
                        $this->upload_config = array(
                            'upload_path'   => $image_upload_folder,
                            'file_name' => $new_file_name,
                            'allowed_types' => 'jpg|jpeg|png',
                            'max_size'      => 25000
                        );
                        $this->upload->initialize($this->upload_config);
                        if (!$this->upload->do_upload($image2)) {
                            $upload_error = $this->upload->display_errors();
                            $this->session->set_flashdata('emessage', $upload_error);
                            redirect($_SERVER['HTTP_REFERER']);
                        } else {
                            $file_info = $this->upload->data();
                            $upload_image2 = "assets/uploads/images/" . $new_file_name . $file_info['file_ext'];
                        }
                    }
                    //---------------------- image 3 -----------------------
                    $upload_image3 = '';
                    $image3 = 'image3';
                    $file_check = ($_FILES[$image3]['error']);
                    if ($file_check != 4) {
                        $image_upload_folder = FCPATH . "assets/uploads/order_return/";
                        if (!file_exists($image_upload_folder)) {
                            mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                        }
                        $new_file_name = "order_return3" . date("Ymdhms");
                        $this->upload_config = array(
                            'upload_path'   => $image_upload_folder,
                            'file_name' => $new_file_name,
                            'allowed_types' => 'jpg|jpeg|png',
                            'max_size'      => 25000
                        );
                        $this->upload->initialize($this->upload_config);
                        if (!$this->upload->do_upload($image3)) {
                            $upload_error = $this->upload->display_errors();
                            $this->session->set_flashdata('emessage', $upload_error);
                            redirect($_SERVER['HTTP_REFERER']);
                        } else {
                            $file_info = $this->upload->data();
                            $upload_image3 = "assets/uploads/images/" . $new_file_name . $file_info['file_ext'];
                        }
                    }
                    //---------------------- image 4 -----------------------
                    $upload_image4 = '';
                    $image4 = 'image4';
                    $file_check = ($_FILES[$image4]['error']);
                    if ($file_check != 4) {
                        $image_upload_folder = FCPATH . "assets/uploads/order_return/";
                        if (!file_exists($image_upload_folder)) {
                            mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                        }
                        $new_file_name = "order_retur4" . date("Ymdhms");
                        $this->upload_config = array(
                            'upload_path'   => $image_upload_folder,
                            'file_name' => $new_file_name,
                            'allowed_types' => 'jpg|jpeg|png',
                            'max_size'      => 25000
                        );
                        $this->upload->initialize($this->upload_config);
                        if (!$this->upload->do_upload($image4)) {
                            $upload_error = $this->upload->display_errors();
                            $this->session->set_flashdata('emessage', $upload_error);
                            redirect($_SERVER['HTTP_REFERER']);
                        } else {
                            $file_info = $this->upload->data();
                            $upload_image4 = "assets/uploads/images/" . $new_file_name . $file_info['file_ext'];
                        }
                    }
                    //---------------------- image 5 -----------------------
                    $upload_image5 = '';
                    $image5 = 'image5';
                    $file_check = ($_FILES[$image5]['error']);
                    if ($file_check != 4) {
                        $image_upload_folder = FCPATH . "assets/uploads/order_return/";
                        if (!file_exists($image_upload_folder)) {
                            mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                        }
                        $new_file_name = "order_return5" . date("Ymdhms");
                        $this->upload_config = array(
                            'upload_path'   => $image_upload_folder,
                            'file_name' => $new_file_name,
                            'allowed_types' => 'jpg|jpeg|png',
                            'max_size'      => 25000
                        );
                        $this->upload->initialize($this->upload_config);
                        if (!$this->upload->do_upload($image5)) {
                            $upload_error = $this->upload->display_errors();
                            $this->session->set_flashdata('emessage', $upload_error);
                            redirect($_SERVER['HTTP_REFERER']);
                        } else {
                            $file_info = $this->upload->data();
                            $upload_image5 = "assets/uploads/images/" . $new_file_name . $file_info['file_ext'];
                        }
                    }
                    //---------------------- image 6 -----------------------
                    $upload_image6 = '';
                    $image6 = 'image6';
                    $file_check = ($_FILES[$image6]['error']);
                    if ($file_check != 4) {
                        $image_upload_folder = FCPATH . "assets/uploads/order_return/";
                        if (!file_exists($image_upload_folder)) {
                            mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                        }
                        $new_file_name = "order_return6" . date("Ymdhms");
                        $this->upload_config = array(
                            'upload_path'   => $image_upload_folder,
                            'file_name' => $new_file_name,
                            'allowed_types' => 'jpg|jpeg|png',
                            'max_size'      => 25000
                        );
                        $this->upload->initialize($this->upload_config);
                        if (!$this->upload->do_upload($image6)) {
                            $upload_error = $this->upload->display_errors();
                            $this->session->set_flashdata('emessage', $upload_error);
                            redirect($_SERVER['HTTP_REFERER']);
                        } else {
                            $file_info = $this->upload->data();
                            $upload_image6 = "assets/uploads/images/" . $new_file_name . $file_info['file_ext'];
                        }
                    }
                    $order1Data = $this->db->get_where('tbl_order1', array('id' => $order1_id))->row();
                    $order2Data = $this->db->get_where('tbl_order2', array('id' => $order2_id))->row();
                    $shipping = $order1Data->shipping;
                    $price = $order2Data->spgst * $quantity;
                    $refund_amount = $price - $shipping;
                    $data_insert = array(
                        'order1_id' => $order1_id,
                        'order2_id' => $order2_id,
                        'type' => $type,
                        'quantity' => $quantity,
                        'refund_amount' => $refund_amount,
                        'reason' => $reason,
                        'message' => $message,
                        'image' => $upload_image1,
                        'image2' => $upload_image2,
                        'image3' => $upload_image3,
                        'image4' => $upload_image4,
                        'image5' => $upload_image5,
                        'image6' => $upload_image6,
                        'replace_status' => 0,
                        'ip' => $ip,
                        'date' => $cur_date
                    );

                    $last_id = $this->base_model->insert_table("tbl_replacement_order", $data_insert, 1);
                    if (!empty($last_id)) {
                        $this->session->set_flashdata('smessage', 'Request Submitted Successfully!');
                        redirect('Home/order_details/' . base64_encode($order1_id), 'refresh');
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
    public function decrypt($encryptedText, $key)
    {
        $key = $this->hextobin(md5($key));
        $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
        $encryptedText = $this->hextobin($encryptedText);
        $decryptedText = openssl_decrypt($encryptedText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
        return $decryptedText;
    }
    public function hextobin($hexString)
    {
        $length = strlen($hexString);
        $binString = "";
        $count = 0;
        while ($count < $length) {
            $subString = substr($hexString, $count, 2);
            $packedString = pack("H*", $subString);
            if ($count == 0) {
                $binString = $packedString;
            } else {
                $binString .= $packedString;
            }
            $count += 2;
        }
        return $binString;
    }
    public function delivery_pincode_check()
    {
        $cart_fetch = $this->delhivery->GetCourierServiceability(302020);
    }
}
