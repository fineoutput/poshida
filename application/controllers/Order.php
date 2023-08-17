<?php

ob_start(); if (! defined('BASEPATH')) {
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
    }

    //-------------calculate--------------

    public function calculate($pincode,$courier_id)
    {
        if (!empty($this->session->userdata('user_data'))) {
            $calculate = $this->order->calculate($pincode,$courier_id);
            if ($calculate==1) {
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
            $data['order_data']= $this->db->get_where('tbl_order1', array('id' => base64_decode($this->session->userdata('order_id'))))->result();

            $data['state_data'] = $this->db->get('all_states');
            $cart_fetch = $this->cart->ViewCartOnline();
            $data['cart_fetch'] = $cart_fetch;

            $this->load->view('frontend/common/header2', $data);
            $this->load->view('frontend/checkout');
            $this->load->view('frontend/common/footer2');
        } else {
            redirect("/", "refresh");
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
            if ($this->form_validation->run()== true) {
                $promocode=strtoupper($this->input->post('promocode'));
                $apply = $this->promocode->applyPromocode($promocode);
                echo $apply;
            } else {
                $respone['status'] = false;
                $respone['message'] ="Please insert some data, No data available";
                echo json_encode($respone);
            }
        } else {
            $respone['status'] = false;
            $respone['message'] =validation_errors();
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
                $this->form_validation->set_rules('fname', 'fname', 'required|xss_clean|trim');
                $this->form_validation->set_rules('lname', 'lname', 'required|xss_clean|trim');
                $this->form_validation->set_rules('email', 'email', 'required|xss_clean|trim');
                $this->form_validation->set_rules('phonenumber', 'phonenumber', 'required|xss_clean|trim');
                $this->form_validation->set_rules('state', 'state', 'required|xss_clean|trim');
                $this->form_validation->set_rules('city', 'city', 'required|xss_clean|trim');
                $this->form_validation->set_rules('address', 'address', 'required|xss_clean|trim');
                $this->form_validation->set_rules('payment_method', 'payment_method', 'required|xss_clean|trim');
                $this->form_validation->set_rules('referalcode', 'referalcode', 'xss_clean|trim');

                if ($this->form_validation->run()== true) {
                    $name=$this->input->post('fname')." ".$this->input->post('lname');
                    ;
                    $email=$this->input->post('email');
                    $phone=$this->input->post('phonenumber');
                    $state=$this->input->post('state');
                    $city=$this->input->post('city');
                    $address=$this->input->post('address');
                    $payment_method=$this->input->post('payment_method');
                    $referalcode=$this->input->post('referalcode');
                    if ($payment_method==1) {
                        $order_array = array(
                        'name'=>$name,
                        'email'=>$email,
                        'phone'=>$phone,
                        'state'=>$state,
                        'city'=>$city,
                        'address'=>$address,
                        'referalcode'=>$referalcode,
                        'payment_type'=>$payment_method,
                          );
                        $placeOrder = $this->order->PlaceOrder($order_array);
                        echo $placeOrder;
                    } elseif ($payment_method==2) {
                        //--- Create Razorpay order ID ---------
                        $placeOrder = $this->order->CreateRazorPayOrderID();
                        echo $placeOrder;
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
                $respone['message'] ="Please insert some data, No data available";
                echo json_encode($respone);
            }
        } else {
            $respone['status'] = false;
            $respone['message'] ="Some unknown error occurred";
            echo json_encode($respone);
        }
    }


    // ======================================== Order place after payment ===============================
    public function place_prepaid_order()
    {
        if (!empty($this->session->userdata('user_data'))) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->helper('security');
            if ($this->input->post()) {
                $this->form_validation->set_rules('fname', 'fname', 'required|xss_clean|trim');
                $this->form_validation->set_rules('lname', 'lname', 'required|xss_clean|trim');
                $this->form_validation->set_rules('email', 'email', 'required|xss_clean|trim');
                $this->form_validation->set_rules('phonenumber', 'phonenumber', 'required|xss_clean|trim');
                $this->form_validation->set_rules('state', 'state', 'required|xss_clean|trim');
                $this->form_validation->set_rules('city', 'city', 'required|xss_clean|trim');
                $this->form_validation->set_rules('address', 'address', 'required|xss_clean|trim');
                $this->form_validation->set_rules('payment_method', 'payment_method', 'required|xss_clean|trim');
                $this->form_validation->set_rules('referalcode', 'referalcode', 'xss_clean|trim');
                $this->form_validation->set_rules('razorpay_payment_id', 'razorpay_payment_id', 'required|xss_clean|trim');
                $this->form_validation->set_rules('razorpay_order_id', 'razorpay_order_id', 'required|xss_clean|trim');
                $this->form_validation->set_rules('razorpay_signature', 'razorpay_signature', 'required|xss_clean|trim');

                if ($this->form_validation->run()== true) {
                    $name=$this->input->post('fname')." ".$this->input->post('lname');
                    ;
                    $email=$this->input->post('email');
                    $phone=$this->input->post('phonenumber');
                    $state=$this->input->post('state');
                    $city=$this->input->post('city');
                    $address=$this->input->post('address');
                    $payment_method=$this->input->post('payment_method');
                    $referalcode=$this->input->post('referalcode');
                    $razorpay_payment_id=$this->input->post('razorpay_payment_id');
                    $razorpay_order_id=$this->input->post('razorpay_order_id');
                    $razorpay_signature=$this->input->post('razorpay_signature');
                    $order_array = array(
                        'name'=>$name,
                        'email'=>$email,
                        'phone'=>$phone,
                        'state'=>$state,
                        'city'=>$city,
                        'address'=>$address,
                        'referalcode'=>$referalcode,
                        'payment_type'=>$payment_method,
                        'razorpay_payment_id'=>$razorpay_payment_id,
                        'razorpay_order_id'=>$razorpay_order_id,
                        'razorpay_signature'=>$razorpay_signature,
                          );
                    $placeOrder = $this->order->PlacePrePaidOrder($order_array);
                    echo $placeOrder;
                } else {
                    $respone['status'] = false;
                    $respone['message'] = validation_errors();
                    echo json_encode($respone);
                }
            } else {
                $respone['status'] = false;
                $respone['message'] ="Please insert some data, No data available";
                echo json_encode($respone);
            }
        } else {
            $respone['status'] = false;
            $respone['message'] ="Some unknown error occurred";
            echo json_encode($respone);
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
            $orderdata= $this->db->get()->row();

            $data['order_id'] =$orderdata->id;
            $data['amount'] =$orderdata->final_amount;
            $data['user_id'] =$user_id;

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
        $this->load->view('frontend/common/header2');
        $this->load->view('frontend/order_failed');
        $this->load->view('frontend/common/footer2');
    }

    //===========View my orders=========================
    public function view_order()
    {
        if (!empty($this->session->userdata('user_data'))) {
            $user_id=$this->session->userdata('user_id');
            $this->db->select('*');
            $this->db->from('tbl_order1');
            $this->db->where('user_id', $user_id);
            $this->db->order_by('id', 'desc');
            $this->db->where('order_status!= ', 0);
            $data['order1_data']= $this->db->get();
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
        $id=base64_decode($idd);
        $cancel_order = $this->order->cancelOrder($id);
        if ($cancel_order==true) {
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
            $id=base64_decode($idd);
            $data['id']=$idd;
            $return_data = $this->db->get_where('tbl_replacement_order', array('order2_id'=> $id))->result();
            if (empty($return_data)) {
                $data['order2_data'] = $this->db->get_where('tbl_order2', array('id'=> $id))->result();
                $data['pro_data'] = $this->db->get_where('tbl_product', array('id'=> $data['order2_data'][0]->product_id))->result();
                $data['type_data'] = $this->db->get_where('tbl_type', array('id'=> $data['order2_data'][0]->type_id))->result();
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


                if ($this->form_validation->run()== true) {
                    $order1_id=$this->input->post('order1_id');
                    $order2_id=$this->input->post('order2_id');
                    $type=$this->input->post('type');
                    $quantity=$this->input->post('quantity');
                    $reason=$this->input->post('reason');
                    $message=$this->input->post('message');
                    $ip = $this->input->ip_address();
                    date_default_timezone_set("Asia/Calcutta");
                    $cur_date=date("Y-m-d H:i:s");
                    //---------------------- image 1 -----------------------
                    $upload_image1 = '';
                    $image1 = 'image1';
                    $file_check=($_FILES[$image1]['error']);
                    if ($file_check!=4) {
                        $image_upload_folder = FCPATH . "assets/uploads/order_return/";
                        if (!file_exists($image_upload_folder)) {
                            mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                        }
                        $new_file_name="order_return".date("Ymdhms");
                        $this->upload_config = array(
                               'upload_path'   => $image_upload_folder,
                               'file_name' => $new_file_name,
                               'allowed_types' =>'jpg|jpeg|png',
                               'max_size'      => 25000
                       );
                        $this->CI->upload->initialize($this->upload_config);
                        if (!$this->CI->upload->do_upload($image1)) {
                            $upload_error = $this->CI->upload->display_errors();
                            $this->CI->session->set_flashdata('emessage', $upload_error);
                            redirect($_SERVER['HTTP_REFERER']);
                        } else {
                            $file_info = $this->CI->upload->data();
                            $upload_image1 = "assets/uploads/images/".$new_file_name.$file_info['file_ext'];
                        }
                    }
                    //---------------------- image 2 -----------------------
                    $upload_image2 = '';
                    $image2 = 'image2';
                    $file_check=($_FILES[$image2]['error']);
                    if ($file_check!=4) {
                        $image_upload_folder = FCPATH . "assets/uploads/order_return/";
                        if (!file_exists($image_upload_folder)) {
                            mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                        }
                        $new_file_name="order_return2".date("Ymdhms");
                        $this->upload_config = array(
                               'upload_path'   => $image_upload_folder,
                               'file_name' => $new_file_name,
                               'allowed_types' =>'jpg|jpeg|png',
                               'max_size'      => 25000
                       );
                        $this->CI->upload->initialize($this->upload_config);
                        if (!$this->CI->upload->do_upload($image2)) {
                            $upload_error = $this->CI->upload->display_errors();
                            $this->CI->session->set_flashdata('emessage', $upload_error);
                            redirect($_SERVER['HTTP_REFERER']);
                        } else {
                            $file_info = $this->CI->upload->data();
                            $upload_image2 = "assets/uploads/images/".$new_file_name.$file_info['file_ext'];
                        }
                    }
                    //---------------------- image 3 -----------------------
                    $upload_image3 = '';
                    $image3 = 'image3';
                    $file_check=($_FILES[$image3]['error']);
                    if ($file_check!=4) {
                        $image_upload_folder = FCPATH . "assets/uploads/order_return/";
                        if (!file_exists($image_upload_folder)) {
                            mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                        }
                        $new_file_name="order_return3".date("Ymdhms");
                        $this->upload_config = array(
                               'upload_path'   => $image_upload_folder,
                               'file_name' => $new_file_name,
                               'allowed_types' =>'jpg|jpeg|png',
                               'max_size'      => 25000
                       );
                        $this->CI->upload->initialize($this->upload_config);
                        if (!$this->CI->upload->do_upload($image3)) {
                            $upload_error = $this->CI->upload->display_errors();
                            $this->CI->session->set_flashdata('emessage', $upload_error);
                            redirect($_SERVER['HTTP_REFERER']);
                        } else {
                            $file_info = $this->CI->upload->data();
                            $upload_image3 = "assets/uploads/images/".$new_file_name.$file_info['file_ext'];
                        }
                    }
                    //---------------------- image 4 -----------------------
                    $upload_image4 = '';
                    $image4 = 'image4';
                    $file_check=($_FILES[$image4]['error']);
                    if ($file_check!=4) {
                        $image_upload_folder = FCPATH . "assets/uploads/order_return/";
                        if (!file_exists($image_upload_folder)) {
                            mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                        }
                        $new_file_name="order_retur4".date("Ymdhms");
                        $this->upload_config = array(
                               'upload_path'   => $image_upload_folder,
                               'file_name' => $new_file_name,
                               'allowed_types' =>'jpg|jpeg|png',
                               'max_size'      => 25000
                       );
                        $this->CI->upload->initialize($this->upload_config);
                        if (!$this->CI->upload->do_upload($image4)) {
                            $upload_error = $this->CI->upload->display_errors();
                            $this->CI->session->set_flashdata('emessage', $upload_error);
                            redirect($_SERVER['HTTP_REFERER']);
                        } else {
                            $file_info = $this->CI->upload->data();
                            $upload_image4 = "assets/uploads/images/".$new_file_name.$file_info['file_ext'];
                        }
                    }
                    //---------------------- image 5 -----------------------
                    $upload_image5 = '';
                    $image5 = 'image5';
                    $file_check=($_FILES[$image5]['error']);
                    if ($file_check!=4) {
                        $image_upload_folder = FCPATH . "assets/uploads/order_return/";
                        if (!file_exists($image_upload_folder)) {
                            mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                        }
                        $new_file_name="order_return5".date("Ymdhms");
                        $this->upload_config = array(
                               'upload_path'   => $image_upload_folder,
                               'file_name' => $new_file_name,
                               'allowed_types' =>'jpg|jpeg|png',
                               'max_size'      => 25000
                       );
                        $this->CI->upload->initialize($this->upload_config);
                        if (!$this->CI->upload->do_upload($image5)) {
                            $upload_error = $this->CI->upload->display_errors();
                            $this->CI->session->set_flashdata('emessage', $upload_error);
                            redirect($_SERVER['HTTP_REFERER']);
                        } else {
                            $file_info = $this->CI->upload->data();
                            $upload_image5 = "assets/uploads/images/".$new_file_name.$file_info['file_ext'];
                        }
                    }
                    //---------------------- image 6 -----------------------
                    $upload_image6 = '';
                    $image6 = 'image6';
                    $file_check=($_FILES[$image6]['error']);
                    if ($file_check!=4) {
                        $image_upload_folder = FCPATH . "assets/uploads/order_return/";
                        if (!file_exists($image_upload_folder)) {
                            mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                        }
                        $new_file_name="order_return6".date("Ymdhms");
                        $this->upload_config = array(
                               'upload_path'   => $image_upload_folder,
                               'file_name' => $new_file_name,
                               'allowed_types' =>'jpg|jpeg|png',
                               'max_size'      => 25000
                       );
                        $this->CI->upload->initialize($this->upload_config);
                        if (!$this->CI->upload->do_upload($image6)) {
                            $upload_error = $this->CI->upload->display_errors();
                            $this->CI->session->set_flashdata('emessage', $upload_error);
                            redirect($_SERVER['HTTP_REFERER']);
                        } else {
                            $file_info = $this->CI->upload->data();
                            $upload_image6 = "assets/uploads/images/".$new_file_name.$file_info['file_ext'];
                        }
                    }

                    $data_insert = array('order1_id'=>$order1_id,
                              'order2_id'=>$order2_id,
                              'type'=>$type,
                              'quantity'=>$quantity,
                              'reason'=>$reason,
                              'message'=>$message,
                              'image' =>$upload_image1,
                              'image2' =>$upload_image2,
                              'image3' =>$upload_image3,
                              'image4' =>$upload_image4,
                              'image5' =>$upload_image5,
                              'image6' =>$upload_image6,
                              'replace_status' =>0,
                              'ip' =>$ip,
                              'date'=>$cur_date
                              );

                    $last_id=$this->base_model->insert_table("tbl_replacement_order", $data_insert, 1) ;
                    if (!empty($last_id)) {
                        $this->session->set_flashdata('smessage', 'Request Submitted Successfully!');
                        redirect('Home/order_details/'.base64_encode($order1_id), 'refresh');
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
