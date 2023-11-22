<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require_once(APPPATH . 'core/CI_finecontrol.php');
class Order extends CI_finecontrol
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("login_model");
        $this->load->model("admin/base_model");
        $this->load->library('user_agent');
        $this->load->library("custom/Delhivery");
    }
    //==============================view_orders=========================\\
    public function view_order()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name'] = $this->load->get_var('user_name');
            $this->db->select('*');
            $this->db->from('tbl_order1');
            $this->db->where('payment_status', 1);
            $this->db->order_by('id', 'desc');
            $this->db->where('order_type', 1); //online orders
            $this->db->where('order_status', 1); //new orders
            $data['order1_data'] = $this->db->get();
            $data['heading'] = "New";
            $data['order_type'] = 1;
            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/order/view_order');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    //===========================placed_orders===========================\\
    public function placed_order()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name'] = $this->load->get_var('user_name');
            $this->db->select('*');
            $this->db->from('tbl_order1');
            $this->db->where('payment_status', 1);
            $this->db->order_by('id', 'desc');
            $this->db->where('order_type', 1); //online orders
            $this->db->where('order_status', 1); //new orders
            $data['order1_data'] = $this->db->get();
            $data['heading'] = "New";
            $data['order_type'] = 1;
            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/order/view_order');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    //================================confirmed_orders=======================\\
    public function accepted_order()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name'] = $this->load->get_var('user_name');
            $this->db->select('*');
            $this->db->from('tbl_order1');
            $this->db->where('payment_status', 1);
            $this->db->order_by('id', 'desc');
            $this->db->where('order_type', 1); //online orders
            $this->db->where('order_status', 2); //new orders
            $data['order1_data'] = $this->db->get();
            $data['heading'] = "Accepted";
            $data['order_type'] = 1;
            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/order/view_order');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    //===============================dispatched_orders========================\\
    public function dispatched_order()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name'] = $this->load->get_var('user_name');
            $this->db->select('*');
            $this->db->from('tbl_order1');
            $this->db->where('payment_status', 1);
            $this->db->order_by('id', 'desc');
            $this->db->where('order_type', 1); //online orders
            $this->db->where('order_status', 3); //dispatched_orders
            $data['order1_data'] = $this->db->get();
            $data['heading'] = "Dispatched";
            $data['order_type'] = 1;
            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/order/view_order');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    //=========================delievered_orders=========================\\
    public function completed_order()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name'] = $this->load->get_var('user_name');
            $this->db->select('*');
            $this->db->from('tbl_order1');
            $this->db->where('payment_status', 1);
            $this->db->order_by('id', 'desc');
            $this->db->where('order_type', 1); //online orders
            $this->db->where('order_status', 4); //delievered orders
            $data['order1_data'] = $this->db->get();
            $data['heading'] = "Completed";
            $data['order_type'] = 1;
            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/order/view_order');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }

    //=============================cancelled_order==========================\\
    public function cancelled_order()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name'] = $this->load->get_var('user_name');
            $this->db->select('*');
            $this->db->from('tbl_order1');
            $this->db->order_by('id', 'desc');
            $this->db->where('payment_status', 1);
            $this->db->where('order_status > ', 4); //cancelled orders
            $data['order1_data'] = $this->db->get();
            $data['heading'] = "Rejected/Cancelled";
            $data['order_type'] = 1;
            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/order/view_order');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    public function rejected_order()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name'] = $this->load->get_var('user_name');
            $this->db->select('*');
            $this->db->from('tbl_order1');
            $this->db->where('payment_status', 1);
            $this->db->order_by('id', 'desc');
            $this->db->where('order_status', 6); //rejected orders
            $data['order1_data'] = $this->db->get();
            $data['heading'] = "Rejected";
            $data['order_type'] = 1;
            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/order/view_order');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    //==============================update_order_status========================\\
    public function updateorderStatus($idd, $t)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name'] = $this->load->get_var('user_name');
            date_default_timezone_set("Asia/Calcutta");
            $delivery_date = date("Y-m-d H:i:s");
            $id = base64_decode($idd);
            if ($t == "confirmed") {
                $data_update = array(
                    'order_status' => 2
                );
                $this->db->where('id', $id);
                $zapak = $this->db->update('tbl_order1', $data_update);
                if ($zapak != 0) {
                    $this->session->set_flashdata('smessage', 'Status updated successfully');
                    redirect($_SERVER['HTTP_REFERER']);
                } else {
                    $this->session->set_flashdata('emessage', 'Some error occurred');
                    exit;
                }
            }
            if ($t == "dispatched") {
                $data_update = array(
                    'order_status' => 3
                );
                $this->db->where('id', $id);
                $zapak = $this->db->update('tbl_order1', $data_update);
                if ($zapak != 0) {
                    $this->session->set_flashdata('smessage', 'Status updated successfully');
                    redirect($_SERVER['HTTP_REFERER']);
                } else {
                    $this->session->set_flashdata('emessage', 'Some error occurred');
                    exit;
                }
            }
            if ($t == "completed") {
                $data_update = array(
                    'order_status' => 4,
                    'delivered_date' => $delivery_date
                );
                $this->db->where('id', $id);
                $zapak = $this->db->update('tbl_order1', $data_update);
                if ($zapak != 0) {
                    $this->session->set_flashdata('smessage', 'Status updated successfully');
                    redirect($_SERVER['HTTP_REFERER']);
                } else {
                    $this->session->set_flashdata('emessage', 'Some error occurred');
                    exit;
                }
            }
            if ($t == "reject") {
                $data_update = array('order_status' => 5);
                $this->db->where('id', $id);
                $zapak = $this->db->update('tbl_order1', $data_update);
                //-------update inventory-------
                $this->db->select('*');
                $this->db->from('tbl_order2');
                $this->db->where('main_id', $id);
                $data_order2 = $this->db->get();
                foreach ($data_order2->result() as $data) {
                    $this->db->select('*');
                    $this->db->from('tbl_type');
                    $this->db->where('id', $data->type_id);
                    $pro_data = $this->db->get()->row();
                    if (!empty($pro_data)) {
                        $update_inv = $pro_data->inventory + $data->quantity;
                        $data_update = array('inventory' => $update_inv);
                        $this->db->where('id', $pro_data->id);
                        $zapak2 = $this->db->update('tbl_type', $data_update);
                    }
                }
                if ($zapak != 0) {
                    $this->session->set_flashdata('smessage', 'Status updated successfully');
                    redirect($_SERVER['HTTP_REFERER']);
                } else {
                    $data['e'] = "Error occurred";
                    // exit;
                    $this->load->view('errors/error500admin', $data);
                }
            }
        } else {
            $this->load->view('admin/login/index');
        }
    }
    //==================================order_detail==========================\\
    public function order_detail($idd, $t = '')
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name'] = $this->load->get_var('user_name');
            $id = base64_decode($idd);
            $data['id'] = $idd;
            $this->db->select('*');
            $this->db->from('tbl_order2');
            $this->db->where('main_id', $id);
            $data['order2_data'] = $this->db->get();
            if (!empty($t)) {
                $data['order_type'] = 2;
            } else {
                $data['order_type'] = 1;
            }
            $this->db->select('*');
            $this->db->from('tbl_order1');
            $this->db->where('id', $id);
            $order1_data = $this->db->get()->row();
            $data['status'] = $order1_data->order_status;
            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/order/order_details');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    //=================================view_bill=============================\\
    public function view_bill($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name'] = $this->load->get_var('user_name');
            $data['user_name'] = $this->load->get_var('user_name');
            $id = base64_decode($idd);
            $data['id'] = $idd;
            $this->db->select('*');
            $this->db->from('tbl_order1');
            $this->db->where('id', $id);
            $order1_data = $this->db->get()->row();
            $data['order1_data'] = $order1_data;
            $data['order_type'] =   $order1_data->order_type;
            $this->db->select('*');
            $this->db->from('tbl_order2');
            $this->db->where('main_id', $id);
            $data['order2_data'] = $this->db->get();
            $this->load->view('admin/order/view_bill', $data);
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    //===================== view order create=========
    public function viewCreateOrder($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $id = base64_decode($idd);
            $data['id'] = $idd;
            $order1_data = $this->db->get_where('tbl_order1', array('id' => $id))->result();
            $address_data = $this->db->get_where('tbl_user_address', array('id' => $order1_data[0]->address_id))->row();
            //----- get courier serviceability ---
            $shipping = $this->delhivery->GetCourierServiceability($address_data->pincode, $order1_data[0]->weight, $order1_data[0]->total_amount, 1);
            $decoded = json_decode($shipping);
            $data['list'] = [];
            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/order/create_order');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    //===================== create delhivery order =========
    public function createOrder()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->helper('security');
            if ($this->input->post()) {
                $this->form_validation->set_rules('id', 'id', 'required|xss_clean|trim');
                $this->form_validation->set_rules('width', 'width', 'required|xss_clean|trim');
                $this->form_validation->set_rules('height', 'height', 'required|xss_clean|trim');
                $this->form_validation->set_rules('shipment_mode', 'shipment_mode', 'required|xss_clean|trim');
                if ($this->form_validation->run() == true) {
                    $id = base64_decode($this->input->post('id'));
                    $width = $this->input->post('width');
                    $height = $this->input->post('height');
                    $shipment_mode = $this->input->post('shipment_mode');
                    $waybill_number = $this->delhivery->FetchWaybill();
                    if (empty($waybill_number)) {
                        $this->session->set_flashdata('emessage', 'Error in creating waybill number');
                        redirect($_SERVER['HTTP_REFERER']);
                    }
                    $curl = curl_init();
                    //--- update data -----
                    $data_update = array(
                        'width' => $width,
                        'height' => $height,
                        'shipment_mode' => $shipment_mode,
                        'waybill_number' => $waybill_number,
                    );
                    $this->db->where('id', $id);
                    $zapak = $this->db->update('tbl_order1', $data_update);
                    //-----get order data ----
                    $order1_data = $this->db->get_where('tbl_order1', array('id' => $id))->result();
                    $order2_data = $this->db->get_where('tbl_order2', array('main_id' => $order1_data[0]->id))->result();
                    $order_items = [];
                    $sub_total = 0;
                    foreach ($order2_data as $order2) {
                        $total = 0;
                        $pro_data = $this->db->get_where('tbl_product', array('id = ' => $order2->product_id, 'is_active' => 1))->result();
                        $type_data = $this->db->get_where('tbl_type', array('id = ' => $order2->type_id, 'is_active' => 1))->result();
                        //------ manage price ------
                        if (!empty($order1_data[0]->user_id)) { //------ for retailer ----
                            $price = $type_data[0]->retailer_spgst;
                        } elseif (!empty($order1_data[0]->reseller_id)) { //---- for reselller -----
                            $price = $type_data[0]->reseller_spgst;
                        }
                        $order_items[] = array(
                            'name' => $pro_data[0]->name,
                            'sku' => 'Poshida-' . $order2->type_id,
                            'selling_price' => $price,
                            'units' => $order2->quantity,
                            'hsn' => $pro_data[0]->hsn_code,
                        );
                        $total = $price * (int)$order2->quantity;
                        $sub_total = $sub_total + $total; //--calculate sub total
                    }
                    //---- create order  --------
                    $create_order_res = $this->delhivery->createOrder($order1_data, $order_items, $order1_data[0]->final_amount);
                    if ($create_order_res->packages[0]->status == 'Success') {
                        //---- update order ---
                        $data_update = array(
                            'shipping_response' => json_encode($create_order_res),
                        );
                        $this->db->where('id', $id);
                        $zapak = $this->db->update('tbl_order1', $data_update);
                        $create_label_res = $this->delhivery->generateLabel($create_order_res->packages[0]->waybill);
                        if (!empty($create_label_res->packages)) {
                            if ($create_label_res->packages[0]->pdf_download_link) {
                                $data_update2 = array(
                                    'delhivery_label' => $create_label_res->packages[0]->pdf_download_link,
                                    'label_response' => json_encode($create_label_res),
                                );
                                $this->db->where('id', $id);
                                $zapak2 = $this->db->update('tbl_order1', $data_update2);
                                $this->session->set_flashdata('smessage', 'Order Created Successfully');
                                redirect("dcadmin/Order/accepted_order", "refresh");
                            } else {
                                $this->session->set_flashdata('emessage', $create_order_res->packages[0]->remarks);
                                redirect($_SERVER['HTTP_REFERER']);
                            }
                        } else {
                            $this->session->set_flashdata('emessage', $create_order_res->packages[0]->remarks);
                            redirect($_SERVER['HTTP_REFERER']);
                        }
                    } else {
                        log_message('error', json_encode($create_order_res->packages[0]->remarks));
                        $this->session->set_flashdata('emessage', json_encode($create_order_res->packages[0]->remarks));
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
            redirect("login/admin_login", "refresh");
        }
    }
    //===================== view order pickup request =========
    public function viewPickupReq()
    {
        if (!empty($this->session->userdata('admin_data'))) {

            $this->db->select('*');
            $this->db->from('tbl_delhivery_pickup_req');
            $this->db->order_by('id', 'desc');
            $data['req_data'] = $this->db->get();
            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/order/view_pickup_req');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    //===================== view addPickupReq =========
    public function addPickupReq()
    {
        if (!empty($this->session->userdata('admin_data'))) {

            $this->load->view('admin/common/header_view');
            $this->load->view('admin/order/add_pickup_request');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    //===================== create delhivery pickup request =========
    public function createPickup_req()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->helper('security');
            if ($this->input->post()) {
                $this->form_validation->set_rules('package_count', 'package_count', 'required|xss_clean|trim');
                $this->form_validation->set_rules('pickup_date', 'pickup_date', 'required|xss_clean|trim');
                $this->form_validation->set_rules('pickup_time', 'pickup_time', 'required|xss_clean|trim');
                if ($this->form_validation->run() == true) {
                    $package_count = $this->input->post('package_count');
                    $pickup_date = $this->input->post('pickup_date');
                    $pickup_time = $this->input->post('pickup_time');
                    $ip = $this->input->ip_address();
                    date_default_timezone_set("Asia/Calcutta");
                    $cur_date = date("Y-m-d H:i:s");
                    $addedby = $this->session->userdata('admin_id');
                    //---- generate label --------
                    $create_pickup_res = $this->delhivery->generatePickupReq($package_count, $pickup_date, $pickup_time);
// print_r($create_pickup_res);die();
                    if (!isset($create_pickup_res->error)) {
                        //--- update data -----
                        $data_insert = array(
                            'package_count' => $package_count,
                            'pickup_date' => $pickup_date,
                            'pickup_time' => $pickup_time,
                            'response' => json_encode($create_pickup_res),
                            'ip' => $ip,
                            'added_by' => $addedby,
                            'date' => $cur_date
                        );
                        $last_id = $this->base_model->insert_table("tbl_delhivery_pickup_req", $data_insert, 1);
                        if (!empty($last_id)) {
                            $this->session->set_flashdata('smessage', 'Request created successfully');
                            // die();

                            redirect("dcadmin/Order/viewPickupReq", "refresh");
                        } else {
                            $this->session->set_flashdata('emessage', 'Some error occurred!');
                            redirect($_SERVER['HTTP_REFERER']);
                        }
                    } else {
                        $this->session->set_flashdata('emessage', $create_pickup_res->error->message);
                        // die();

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
            redirect("login/admin_login", "refresh");
        }
    }
}
