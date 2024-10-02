<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require('razorpay/Razorpay.php');

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class CI_Order
{
    protected $CI;
    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->helper('form');
        $this->CI->load->model("admin/login_model");
        $this->CI->load->model("admin/base_model");
        $this->CI->load->library("custom/Delhivery");
    }

    //===================================== CALCULATE ========================================================
    // public function calculate($pincode, $courier_id)
    public function calculate()
    {
        $user_type = $this->CI->session->userdata('user_type');
        if ($user_type == 2) {
            $reseller_id = $this->CI->session->userdata('user_id');
            $cartInfo = $this->CI->db->get_where('tbl_cart', array('user_id' => $reseller_id, 'user_type' => $user_type));
            $user_id = '';
        } else {
            $user_id = $this->CI->session->userdata('user_id');
            $cartInfo = $this->CI->db->get_where('tbl_cart', array('user_id' => $user_id, 'user_type' => $user_type));
            $reseller_id = '';
        }
        //---------get cart data----------------

        if (!empty($cartInfo)) {
            $ip = $this->CI->input->ip_address();
            date_default_timezone_set("Asia/Calcutta");
            $cur_date = date("Y-m-d H:i:s");
            $total = 0;
            $total_weight = 0;
            foreach ($cartInfo->result() as $cart) {
                $price = 0;
                $pro_data = $this->CI->db->get_where('tbl_product', array('id = ' => $cart->product_id, 'is_active' => 1))->result();
                $type_data = $this->CI->db->get_where('tbl_type', array('id = ' => $cart->type_id, 'is_active' => 1))->result();
                // -------check inventory ------
                if (!empty($type_data)) {
                    if ($type_data[0]->inventory < $cart->quantity) {
                        $this->CI->session->set_flashdata('emessage', $pro_data[0]->name . ' is out of stock!');
                        return 0;
                        exit;
                    }
                } else {
                    $this->CI->session->set_flashdata('emessage', $pro_data[0]->name . ' is out of stock!');
                    return 0;
                    exit;
                }
                if ($user_type == 2) {
                    if ($type_data[0]->reseller_min_qty >= $cart->quantity) {
                        $this->CI->session->set_flashdata('emessage', 'Minimum quantity should be ' . $type_data[0]->reseller_min_qty . '!');
                        return 0;
                        exit;
                    }
                    $spgst = $type_data[0]->reseller_spgst;
                } else {
                    $spgst = $type_data[0]->retailer_spgst;
                }
                $price = $spgst * $cart->quantity;
                $total = $total + $price;
                $weight = $pro_data[0]->weight * (int)$cart->quantity;
                $total_weight = $total_weight + $weight; //--calculate total weight
                $final_amount = $total;
            }
            $user_type = $this->CI->session->userdata('user_type');
            $address_data = $this->CI->db->order_by('id', 'desc')->get_where('tbl_user_address', array('user_id' => $user_id, 'user_type' => $user_type, 'is_default' => 1))->row();

            // echo $total; die();
            $pincode = '';
            if (!empty($address_data)) {
                $pincode = $address_data->pincode;
                $shipping = $this->CI->delhivery->GetCourierServiceability($pincode, $total_weight, $final_amount);
                $shipping = json_decode($shipping);
                if ($shipping->status == false) {
                    $this->CI->session->set_flashdata('emessage', $shipping->message);
                    return 0;
                    exit;
                }
                $shipping = $shipping->data->shipping;
            } else {
                $shipping = 0;
                $courier_id = '';
            }
            $courier_id = '';
            $final_amount = $final_amount + $shipping;
            //------order1 entry-------------
            $order1_insert = array(
                'user_id' => $user_id,
                'reseller_id' => $reseller_id,
                'total_amount' => $total,
                'final_amount' => $final_amount,
                'payment_status' => 0,
                'order_status' => 0,
                'shipping' => $shipping,
                'weight' => $total_weight,
                'ip' => $ip,
                'date' => $cur_date
            );

            $last_id = $this->CI->base_model->insert_table("tbl_order1", $order1_insert, 1);

            if (!empty($last_id)) {
                //---------------order2 entires-------------------
                foreach ($cartInfo->result() as $cart2) {
                    $type_data = $this->CI->db->get_where('tbl_type', array('id = ' => $cart2->type_id, 'is_active' => 1))->result();

                    $user_type = $this->CI->session->userdata('user_type');
                    $spgst = 0;
                    if ($user_type == 2) {
                        $mrp = $type_data[0]->reseller_mrp;
                        $gst = $type_data[0]->reseller_gst;
                        $sp = $type_data[0]->reseller_sp;
                        $spgst = $type_data[0]->reseller_spgst;
                    } else {
                        $mrp = $type_data[0]->retailer_mrp;
                        $gst = $type_data[0]->retailer_gst;
                        $sp = $type_data[0]->retailer_sp;
                        $spgst = $type_data[0]->retailer_spgst;
                    }

                    $total = $spgst * $cart2->quantity;
                    $order2_insert = array(
                        'main_id' => $last_id,
                        'product_id' => $cart2->product_id,
                        'type_id' => $cart2->type_id,
                        'quantity' => $cart2->quantity,
                        'mrp' => $mrp,
                        'gst' => $gst,
                        'selling_price' => $sp,
                        'spgst' => $spgst,
                        'total_amount' => $total,
                        'date' => $cur_date
                    );

                    $last_id2 = $this->CI->base_model->insert_table("tbl_order2", $order2_insert, 1);
                }
                if (!empty($last_id)) {
                    $this->CI->session->set_userdata('order_id', base64_encode($last_id));
                    $respone['status'] = true;
                    $respone['message'] = 'Success';
                    return 1;
                } else {
                    $this->CI->session->set_flashdata('emessage', 'Some error occurred!');
                    return 0;
                    exit;
                }
            } else {
                $this->CI->session->set_flashdata('emessage', 'Some error occurred');
                return 0;
                exit;
            }
        } else {
            $this->CI->session->set_flashdata('emessage', 'Your cart is empty!');
            return 0;
            exit;
        }
    }

    // =========================================== PLACE COD ORDER ===========================================================
    public function PlaceOrder($placeOrder)
    {
        $ip = $this->CI->input->ip_address();
        date_default_timezone_set("Asia/Calcutta");
        $cur_date = date("Y-m-d H:i:s");
        $order_id = base64_decode($this->CI->session->userdata('order_id'));
        $user_id = $this->CI->session->userdata('user_id');
        $user_type = $this->CI->session->userdata('user_type');
        if ($this->CI->session->userdata('user_type') == 2) {
            $user_id = $this->CI->session->userdata('user_id');
            $user_data = $this->CI->db->get_where('tbl_reseller', array('id = ' => $user_id))->result();
            $user_name = $user_data[0]->name;
        } else {
            $user_id = $this->CI->session->userdata('user_id');
            $user_data = $this->CI->db->get_where('tbl_users', array('id = ' => $user_id))->result();
            $user_name = $user_data[0]->f_name . ' ' . $user_data[0]->l_name;
        }
        if (!empty($user_data)) {
            if ($user_data[0]->is_active == 1) {
                $order_data = $this->CI->db->get_where('tbl_order1', array('id = ' => $order_id))->result();
                // $final_amount = $order_data[0]->total_amount - $order_data[0]->promo_discount +  $order_data[0]->shipping;
                $user_id = $order_data[0]->user_id;
                $final_amount = $order_data[0]->final_amount;
                $referpoints['model_id'] = '';
                $referpoints['refer_points'] = 0;
                if (!empty($placeOrder['referalcode'])) {
                    $referpoints = $this->checkModelReferal($placeOrder['referalcode'], $order_id, $user_id);
                }
                //--- generate invoice no ------
                $order1 = $this->CI->db->order_by('id', 'desc')->get_where('tbl_order1', array('payment_status' => 1))->result();
                if (empty($order1[0]->invoice_no)) {
                    $invoice_no = 1;
                } else {
                    $invoice_no = $order1[0]->invoice_no + 1;
                }
                //----------order1 entry-------------
                $order1_update = array(
                    // 'name' => $placeOrder['name'],
                    // 'email' => $placeOrder['email'],
                    // 'phone' => $placeOrder['phone'],
                    // 'address' => $placeOrder['address'],
                    // 'state' => $placeOrder['state'],
                    // 'city' => $placeOrder['city'],
                    'final_amount' => $final_amount,
                    'refererral_code' => $placeOrder['referalcode'],
                    'ref_points' => $referpoints['refer_points'],
                    'model_id' => $referpoints['model_id'],
                    'payment_status' => 1,
                    'payment_type' => 1,
                    'order_status' => 1,
                    'order_type' => 1,
                    'invoice_no' => $invoice_no,
                    'date' => $cur_date,
                    'ip' => $ip,
                );
                $this->CI->db->where('id', $order_id);
                $zapak2 = $this->CI->db->update('tbl_order1', $order1_update);

                if ($zapak2 == 1) {
                    $order2_data = $this->CI->db->get_where('tbl_order2', array('main_id = ' => $order_id));
                    //----- ----- check inventory ------- -----
                    foreach ($order2_data->result() as $odr2) {
                        $pro_data = $this->CI->db->get_where('tbl_product', array('id = ' => $odr2->product_id, 'is_active' => 1))->result();
                        $type_data = $this->CI->db->get_where('tbl_type', array('id = ' => $odr2->type_id))->result();
                        if (!empty($type_data)) {
                            if ($type_data[0]->inventory < $odr2->quantity) {
                                $this->CI->session->set_flashdata('emessage', $pro_data[0]->name . ' is out of stock!');
                                $respone['status'] = false;
                                $respone['message'] = $pro_data[0]->name . ' is out of stock!';
                                return json_encode($respone);
                            }
                        } else {
                            $this->CI->session->set_flashdata('emessage', $pro_data[0]->name . ' is out of stock!');
                            $respone['status'] = false;
                            $respone['message'] = $pro_data[0]->name . ' is out of stock!';
                            return json_encode($respone);
                        }
                    }
                    //--------------inventory update and cart delete--------
                    foreach ($order2_data->result() as $odr2) {
                        //---------- inventory update ------------------------
                        $type_data = $this->CI->db->get_where('tbl_type', array('id = ' => $odr2->type_id))->result();
                        $new_inventory = (int)$type_data[0]->inventory - (int)$odr2->quantity;
                        //--------- inventory transaction --------
                        $data_insert = array(
                            'order1_id' => $odr2->main_id,
                            'order2_id' => $odr2->id,
                            'type_id' => $odr2->type_id,
                            'qty' => $odr2->quantity,
                            'old_inventory' => $type_data[0]->inventory,
                            'new_inventory' => $new_inventory,
                            'date' => $cur_date,
                        );
                        $last_id = $this->CI->base_model->insert_table("tbl_inventory_transaction", $data_insert, 1);

                        $this->CI->db->where('id', $odr2->type_id);
                        $zapak2 = $this->CI->db->update('tbl_type', array('inventory' => $new_inventory));
                        //-------cart delete---------
                        $delete = $this->CI->db->delete('tbl_cart', array('user_id' => $user_id, 'product_id' => $odr2->product_id, 'type_id' => $odr2->type_id, 'user_type' => $user_type));
                        $this->CI->session->unset_userdata('cart_data');
                    }
                    //--- start send whatsapp msg -----
                    $this->send_whatsapp_msg_admin($order_data[0], $user_name);
                    // $config = Array(
                    // 'protocol' => 'smtp',
                    // 'smtp_host' => SMTP_HOST,
                    // 'smtp_port' => SMTP_PORT,
                    // 'smtp_user' => USER_NAME, // change it to yours
                    // 'smtp_pass' => PASSWORD, // change it to yours
                    // 'mailtype' => 'html',
                    // 'charset' => 'iso-8859-1',
                    // 'wordwrap' => true
                    // );
                    // $to=$email;
                    // $data['name']= $name;
                    // $data['email']= $email;
                    // $data['phone']= $phone;
                    // $data['order1_id']= $order_id;
                    // $data['date']= $cur_date;
                    // $message =$this->load->view('email/ordersuccess',$data,TRUE);
                    // // echo $to;
                    // // print_r($message);
                    // // exit;
                    // $this->load->library('email', $config);
                    // $this->email->set_newline("");
                    // $this->email->from(EMAIL); // change it to yours
                    // $this->email->to($to);// change it to yours
                    // $this->email->subject('Order Placed');
                    // $this->email->message($message);
                    // if($this->email->send()){
                    // // echo 'Email sent.';
                    // }else{
                    // show_error($this->email->print_debugger());
                    // }
                    // die();



                    $respone['status'] = true;
                    return json_encode($respone);
                    //-----order placing end

                } else {
                    $respone['status'] = false;
                    $respone['data_message'] = "Some error occurred";
                    return json_encode($respone);
                }
            } else {
                $this->CI->session->unset_userdata('user_data');
                $this->CI->session->unset_userdata('user_id');
                $this->CI->session->unset_userdata('user_name');
                $this->CI->session->unset_userdata('user_email');
                $respone['status'] = false;
                $this->CI->session->set_flashdata('emessage', "Your account is inactive! Please contact admin");
                return json_encode($respone);
            }
        } else {
            $this->CI->session->unset_userdata('user_data');
            $this->CI->session->unset_userdata('user_id');
            $this->CI->session->unset_userdata('user_name');
            $this->CI->session->unset_userdata('user_email');
            $respone['status'] = false;
            $this->CI->session->set_flashdata('emessage', "User not found!");
            echo json_encode($respone);
        }
    }

    // =============================== PLACE ONLINE  AFTER CONFIRMATION FROM CCAVENUE ====================================
    public function PlacePrePaidOrder($order_id, $decryptValues)
    {
        $ip = $this->CI->input->ip_address();
        date_default_timezone_set("Asia/Calcutta");
        $cur_date = date("Y-m-d H:i:s");
        $user_type = $this->CI->session->userdata('user_type');
        if ($this->CI->session->userdata('user_type') == 2) {
            $user_id = $this->CI->session->userdata('user_id');
            $user_data = $this->CI->db->get_where('tbl_reseller', array('id = ' => $user_id))->result();
            $user_name = $user_data[0]->name;
        } else {
            $user_id = $this->CI->session->userdata('user_id');
            $user_data = $this->CI->db->get_where('tbl_users', array('id = ' => $user_id))->result();
            $user_name = $user_data[0]->f_name . ' ' . $user_data[0]->l_name;

        }
        if (!empty($user_data)) {
            if ($user_data[0]->is_active == 1) {
                $order_data = $this->CI->db->get_where('tbl_order1', array('id = ' => $order_id))->result();
                if ($order_data[0]->payment_status == 1) {
                    $respone['status'] = true;
                    return json_encode($respone);
                }
                // $final_amount = $order_data[0]->total_amount - $order_data[0]->promo_discount +  $order_data[0]->shipping;
                $user_id = $order_data[0]->user_id;
                $final_amount = $order_data[0]->final_amount - $order_data[0]->promo_discount;
                $referpoints['model_id'] = '';
                $referpoints['refer_points'] = 0;
                if (!empty($order_data[0]->refererral_code)) {
                    $referpoints = $this->checkModelReferal($order_data[0]->refererral_code, $order_id, $user_id);
                }
                //--- generate invoice no ------
                $order1 = $this->CI->db->order_by('id', 'desc')->get_where('tbl_order1', array('payment_status' => 1))->result();
                if (empty($order1[0]->invoice_no)) {
                    $invoice_no = 1;
                } else {
                    $invoice_no = $order1[0]->invoice_no + 1;
                }
                //----------order1 entry-------------
                $order1_update = array(
                    'cc_response' => $decryptValues,
                    'payment_status' => 1,
                    'payment_type' => 2,
                    'order_status' => 1,
                    'order_type' => 1,
                    'invoice_no' => $invoice_no,
                    'date' => $cur_date,
                    'ip' => $ip,
                );
                $this->CI->db->where('id', $order_id);
                $zapak2 = $this->CI->db->update('tbl_order1', $order1_update);

                if ($zapak2 == 1) {
                    $order2_data = $this->CI->db->get_where('tbl_order2', array('main_id = ' => $order_id));
                    //--------------inventory update and cart delete--------
                    foreach ($order2_data->result() as $odr2) {
                        //---------- inventory update ------------------------
                        $type_data = $this->CI->db->get_where('tbl_type', array('id = ' => $odr2->type_id))->result();
                        if ((int)$type_data[0]->inventory >= (int)$odr2->quantity) {
                            $new_inventory = (int)$type_data[0]->inventory - (int)$odr2->quantity;
                            //--------- inventory transaction --------
                            $data_insert = array(
                                'order1_id' => $odr2->main_id,
                                'order2_id' => $odr2->id,
                                'type_id' => $odr2->type_id,
                                'qty' => $odr2->quantity,
                                'old_inventory' => $type_data[0]->inventory,
                                'new_inventory' => $new_inventory,
                                'date' => $cur_date,
                            );
                            $last_id = $this->CI->base_model->insert_table("tbl_inventory_transaction", $data_insert, 1);

                            $this->CI->db->where('id', $odr2->type_id);
                            $zapak2 = $this->CI->db->update('tbl_type', array('inventory' => $new_inventory));
                            //-------cart delete---------
                            $delete = $this->CI->db->delete('tbl_cart', array('user_id' => $user_id, 'product_id' => $odr2->product_id, 'type_id' => $odr2->type_id, 'user_type' => $user_type));
                            $this->CI->session->unset_userdata('cart_data');
                        }
                    }
                    //--- start send whatsapp msg -----
                    $this->send_whatsapp_msg_admin($order_data[0], $user_name);
                    // $config = Array(
                    // 'protocol' => 'smtp',
                    // 'smtp_host' => SMTP_HOST,
                    // 'smtp_port' => SMTP_PORT,
                    // 'smtp_user' => USER_NAME, // change it to yours
                    // 'smtp_pass' => PASSWORD, // change it to yours
                    // 'mailtype' => 'html',
                    // 'charset' => 'iso-8859-1',
                    // 'wordwrap' => true
                    // );
                    // $to=$email;
                    // $data['name']= $name;
                    // $data['email']= $email;
                    // $data['phone']= $phone;
                    // $data['order1_id']= $order_id;
                    // $data['date']= $cur_date;
                    // $message =$this->load->view('email/ordersuccess',$data,TRUE);
                    // // echo $to;
                    // // print_r($message);
                    // // exit;
                    // $this->load->library('email', $config);
                    // $this->email->set_newline("");
                    // $this->email->from(EMAIL); // change it to yours
                    // $this->email->to($to);// change it to yours
                    // $this->email->subject('Order Placed');
                    // $this->email->message($message);
                    // if($this->email->send()){
                    // // echo 'Email sent.';
                    // }else{
                    // show_error($this->email->print_debugger());
                    // }
                    // die();


                    $respone['status'] = true;
                    return json_encode($respone);
                } else {
                    $respone['status'] = false;
                    $respone['message'] = "Some error occurred";
                    return json_encode($respone);
                }
            } else {
                $this->CI->session->unset_userdata('user_data');
                $this->CI->session->unset_userdata('user_id');
                $this->CI->session->unset_userdata('user_name');
                $this->CI->session->unset_userdata('user_email');
                $respone['status'] = false;
                $respone['message'] = "Your account is inactive! Contact Admin";
                return json_encode($respone);
            }
        } else {
            $this->CI->session->unset_userdata('user_data');
            $this->CI->session->unset_userdata('user_id');
            $this->CI->session->unset_userdata('user_name');
            $this->CI->session->unset_userdata('user_email');
            $respone['status'] = false;
            $respone['message'] = "User Not Found!";
            return json_encode($respone);
        }
    }

    //

    public function PlaceHdfcPaidOrder($order_id, $decryptValues)
    {
        $ip = $this->CI->input->ip_address();
        date_default_timezone_set("Asia/Calcutta");
        $cur_date = date("Y-m-d H:i:s");
        $user_type = $this->CI->session->userdata('user_type');
        if ($this->CI->session->userdata('user_type') == 2) {
            $user_id = $this->CI->session->userdata('user_id');
            $user_data = $this->CI->db->get_where('tbl_reseller', array('id = ' => $user_id))->result();
            $user_name = $user_data[0]->name;
        } else {
            $user_id = $this->CI->session->userdata('user_id');
            $user_data = $this->CI->db->get_where('tbl_users', array('id = ' => $user_id))->result();
            $user_name = $user_data[0]->f_name . ' ' . $user_data[0]->l_name;

        }
        if (!empty($user_data)) {
            if ($user_data[0]->is_active == 1) {
                $order_data = $this->CI->db->get_where('tbl_order1', array('id = ' => $order_id))->result();
                if ($order_data[0]->payment_status == 1) {
                    $respone['status'] = true;
                    return json_encode($respone);
                }
                // $final_amount = $order_data[0]->total_amount - $order_data[0]->promo_discount +  $order_data[0]->shipping;
                $user_id = $order_data[0]->user_id;
                $final_amount = $order_data[0]->final_amount - $order_data[0]->promo_discount;
                $referpoints['model_id'] = '';
                $referpoints['refer_points'] = 0;
                if (!empty($order_data[0]->refererral_code)) {
                    $referpoints = $this->checkModelReferal($order_data[0]->refererral_code, $order_id, $user_id);
                }
                //--- generate invoice no ------
                $order1 = $this->CI->db->order_by('id', 'desc')->get_where('tbl_order1', array('payment_status' => 1))->result();
                if (empty($order1[0]->invoice_no)) {
                    $invoice_no = 1;
                } else {
                    $invoice_no = $order1[0]->invoice_no + 1;
                }
                //----------order1 entry-------------
                $order1_update = array(
                    'cc_response' =>json_encode($decryptValues),
                    'payment_status' => 1,
                    'payment_type' => 2,
                    'order_status' => 1,
                    'order_type' => 1,
                    'invoice_no' => $invoice_no,
                    'date' => $cur_date,
                    'ip' => $ip,
                );
                $this->CI->db->where('id', $order_id);
                $zapak2 = $this->CI->db->update('tbl_order1', $order1_update);

                if ($zapak2 == 1) {
                    $order2_data = $this->CI->db->get_where('tbl_order2', array('main_id = ' => $order_id));
                    //--------------inventory update and cart delete--------
                    foreach ($order2_data->result() as $odr2) {
                        //---------- inventory update ------------------------
                        $type_data = $this->CI->db->get_where('tbl_type', array('id = ' => $odr2->type_id))->result();
                        if ((int)$type_data[0]->inventory >= (int)$odr2->quantity) {
                            $new_inventory = (int)$type_data[0]->inventory - (int)$odr2->quantity;
                            //--------- inventory transaction --------
                            $data_insert = array(
                                'order1_id' => $odr2->main_id,
                                'order2_id' => $odr2->id,
                                'type_id' => $odr2->type_id,
                                'qty' => $odr2->quantity,
                                'old_inventory' => $type_data[0]->inventory,
                                'new_inventory' => $new_inventory,
                                'date' => $cur_date,
                            );
                            $last_id = $this->CI->base_model->insert_table("tbl_inventory_transaction", $data_insert, 1);

                            $this->CI->db->where('id', $odr2->type_id);
                            $zapak2 = $this->CI->db->update('tbl_type', array('inventory' => $new_inventory));
                            //-------cart delete---------
                            $delete = $this->CI->db->delete('tbl_cart', array('user_id' => $user_id, 'product_id' => $odr2->product_id, 'type_id' => $odr2->type_id, 'user_type' => $user_type));
                            $this->CI->session->unset_userdata('cart_data');
                        }
                    }
                    //--- start send whatsapp msg -----
                    $this->send_whatsapp_msg_admin($order_data[0], $user_name);
                    // $config = Array(
                    // 'protocol' => 'smtp',
                    // 'smtp_host' => SMTP_HOST,
                    // 'smtp_port' => SMTP_PORT,
                    // 'smtp_user' => USER_NAME, // change it to yours
                    // 'smtp_pass' => PASSWORD, // change it to yours
                    // 'mailtype' => 'html',
                    // 'charset' => 'iso-8859-1',
                    // 'wordwrap' => true
                    // );
                    // $to=$email;
                    // $data['name']= $name;
                    // $data['email']= $email;
                    // $data['phone']= $phone;
                    // $data['order1_id']= $order_id;
                    // $data['date']= $cur_date;
                    // $message =$this->load->view('email/ordersuccess',$data,TRUE);
                    // // echo $to;
                    // // print_r($message);
                    // // exit;
                    // $this->load->library('email', $config);
                    // $this->email->set_newline("");
                    // $this->email->from(EMAIL); // change it to yours
                    // $this->email->to($to);// change it to yours
                    // $this->email->subject('Order Placed');
                    // $this->email->message($message);
                    // if($this->email->send()){
                    // // echo 'Email sent.';
                    // }else{
                    // show_error($this->email->print_debugger());
                    // }
                    // die();


                    $respone['status'] = true;
                    return json_encode($respone);
                } else {
                    $respone['status'] = false;
                    $respone['message'] = "Some error occurred";
                    return json_encode($respone);
                }
            } else {
                $this->CI->session->unset_userdata('user_data');
                $this->CI->session->unset_userdata('user_id');
                $this->CI->session->unset_userdata('user_name');
                $this->CI->session->unset_userdata('user_email');
                $respone['status'] = false;
                $respone['message'] = "Your account is inactive! Contact Admin";
                return json_encode($respone);
            }
        } else {
            $this->CI->session->unset_userdata('user_data');
            $this->CI->session->unset_userdata('user_id');
            $this->CI->session->unset_userdata('user_name');
            $this->CI->session->unset_userdata('user_email');
            $respone['status'] = false;
            $respone['message'] = "User Not Found!";
            return json_encode($respone);
        }
    }

    // ===================================== CHECK FOR MODEL REFERAL CODE ============================================
    public function checkModelReferal($referal, $order_id, $user_id)
    {
        $validitycheck = $this->CI->db->get_where('tbl_users', array('reference_code = ' => $referal, 'is_active = ' => 1))->result();
        $modelID = '';
        $this_order_points = 0;
        if (!empty($validitycheck) && ($validitycheck[0]->id != $user_id)) {
            $modelID = $validitycheck[0]->id;
            $model_products = $this->CI->db->get_where('tbl_model_products', array('user_id = ' => $modelID, 'is_active = ' => 1));
            $productsExists = $model_products->result();
            if (!empty($productsExists)) {
                $this_order_points = 0;
                $order_data = $this->CI->db->get_where('tbl_order2', array('main_id = ' => $order_id));
                foreach ($order_data->result() as $order2) {
                    foreach ($model_products->result() as $model) {
                        if ($order2->product_id == $model->product_id) {
                            $total_points = $validitycheck[0]->total_points + REFERAL_POINTS;
                            $this_order_points = $this_order_points + REFERAL_POINTS;
                            $insert = array('total_points' => $total_points);
                            $this->CI->db->where('id', $validitycheck[0]->id);
                            $zapak2 = $this->CI->db->update('tbl_users', $insert);
                        }
                    }
                }
                $returnArray = array('refer_points' => $this_order_points, 'model_id' => $modelID);
                return $returnArray;
            } else {
                $returnArray = array('refer_points' => $this_order_points, 'model_id' => $modelID);
                return $returnArray;
            }
        } else {
            $returnArray = array('refer_points' => $this_order_points, 'model_id' => $modelID);
            return $returnArray;
        }
    }

    // =================================== CANCEL ORDER ===========================================================
    public function cancelOrder($order_id)
    {
        $data_update = array('order_status' => 6);    //--- order status 6: Cancelled by user
        $this->CI->db->where('id', $order_id);
        $zapak = $this->CI->db->update('tbl_order1', $data_update);
        //-------update inventory-------
        $data_order2 = $this->CI->db->get_where('tbl_order2', array('main_id = ' => $order_id))->result();
        foreach ($data_order2 as $data) {
            $type = $this->CI->db->get_where('tbl_type', array('id = ' => $data->type_id))->row();
            if (!empty($type)) {
                $update_inv = $type->inventory + $data->quantity;
                $data_update = array('inventory' => $update_inv);
                $this->CI->db->where('id', $type->id);
                $zapak2 = $this->CI->db->update('tbl_type', $data_update);
            }
        }
        if (!empty($zapak)) {
            return true;
        } else {
            return false;
        }
    }
    // =================================== UPDATE SHIPPING ===========================================================
    public function updateShipping($address_data, $order_id, $check = 0)
    {
        $order_id = base64_decode($order_id);
        $order1_data = $this->CI->db->get_where('tbl_order1', array('id' => $order_id))->row();
        // print_r($order1_data);die();

        $pincode = $address_data->pincode;
        $shipping = $this->CI->shiprocket->GetCourierServiceability($pincode, $order1_data->weight, $order1_data->final_amount);
        $shipping = json_decode($shipping);
        if ($shipping->status == false) {
            $this->CI->session->set_flashdata('emessage', $shipping->message);
            $data_update = array(
                'shipping' => 0, 'final_amount' => $order1_data->total_amount - $order1_data->promo_discount,
            );
            $this->CI->db->where('id', $order_id);
            $zapak = $this->CI->db->update('tbl_order1', $data_update);
            $respone['status'] = false;
            $respone['message'] =  $shipping->message;
            return json_encode($respone);
            exit;
        }
        if ($check == 1) {
            $respone['status'] = true;
            return json_encode($respone);
        }
        $shipping_charge = $shipping->data->shipping;
        $data_update = array(
            'shipping' => $shipping_charge,
            'final_amount' => $order1_data->total_amount - $order1_data->promo_discount + $shipping_charge, 'address_id' => $address_data->id
        );
        $this->CI->db->where('id', $order_id);
        $zapak = $this->CI->db->update('tbl_order1', $data_update);
        if (!empty($zapak)) {
            $respone['status'] = true;
            return json_encode($respone);
        } else {
            $respone['status'] = false;
            $respone['message'] =  'Some error occured';
            return json_encode($respone);
            exit;
        }
    }
     //======================== START ORDER WHATSAPP MESSAGE TO ADMIN  ==========================
     public function send_whatsapp_msg_admin($order1_data, $userName)
     {
         $order2Data = $this->CI->db->get_where('tbl_order2', array('main_id' => $order1_data->id))->result();
         $products_details = '';
         foreach ($order2Data as  $order2) {
             $pro = $this->CI->db->get_where('tbl_product', array('id' => $order2->product_id))->row();
             $type = $this->CI->db->get_where('tbl_type', array('id' => $order2->type_id))->row();
             $p_name = $pro ? $pro->name : "product not found";
             if (!empty($type)) {
                 $size_da = $this->CI->db->get_where('tbl_size', array('id' => $type->size_id))->row();
                 $color_da = $this->CI->db->get_where('tbl_colour', array('id' => $type->colour_id))->row();
                 $size = $size_da ? $size_da->name : "size not found";
                 $colour = $color_da ? $color_da->colour_name : "color not found";
             } else {
                 $size = 'size not found';
                 $colour = 'color not found';
             }
             //----creating ordered products string----
             $p2 = '&product name=' . $p_name . ' - ' . $size . '(' . $colour . ')*' . $order2->quantity;
             $products_details = $products_details . $p2;
         }
         $payment_type = $order1_data->payment_type == 1 ? "Cash on delivery" : 'Online payment';
         //---- sending whatspp msg to admin -------
         $curl = curl_init();
         curl_setopt_array($curl, array(
             CURLOPT_URL => 'https://whatsapp.fineoutput.com/send_order_message',
             CURLOPT_RETURNTRANSFER => true,
             CURLOPT_ENCODING => '',
             CURLOPT_MAXREDIRS => 10,
             CURLOPT_TIMEOUT => 0,
             CURLOPT_FOLLOWLOCATION => true,
             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
             CURLOPT_CUSTOMREQUEST => 'POST',
             CURLOPT_POSTFIELDS => 'phone=' . WHATSAPP_NUMBERS3 . '&order_id=' . $order1_data->id . '&amount=' . $order1_data->final_amount . '&date=' . $order1_data->date . '&method=' . $payment_type . '&products=' . $products_details . '&customer_name=' . $userName . '',
             CURLOPT_HTTPHEADER => array(
                 'token:' . TOKEN . '',
                 'Content-Type:application/x-www-form-urlencoded',
                 'Cookie:ci_session=e40e757b02bc2d8fb6f5bf9c5b7bb2ea74c897e8'
             ),
         ));
         $respons = curl_exec($curl);
         curl_close($curl);
         // print_r('phone=' . WHATSAPP_NUMBERS3 . '&order_id=' . $order1_data->id . '&amount=' . $order1_data->final_amount . '&date=' . $order1_data->date . '&method=' . $payment_type . '&products=' . $products_details . '&customer_name=' . $userName . '');die();
         return true;
     }
     //======================== END ORDER WHATSAPP MESSAGE TO ADMIN ==========================
}
