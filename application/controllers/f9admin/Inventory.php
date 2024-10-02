<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require_once(APPPATH . 'core/CI_finecontrol.php');
class Inventory extends CI_finecontrol
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("login_model");
        $this->load->model("admin/base_model");
        $this->load->library('user_agent');
        $this->load->library('upload');
    }


    public function view_inventory()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $this->db->select('*');
            $this->db->from('tbl_type');
            $this->db->order_by('id', 'desc');
            $data['type_data'] = $this->db->get();
            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/inventory/view_inventory');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }

    public function update_inventory($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name'] = $this->load->get_var('user_name');
            // echo SITE_NAME;
            // echo $this->session->userdata('image');
            // echo $this->session->userdata('position');
            // exit;
            $id = base64_decode($idd);
            $data['id'] = $idd;
            $this->db->select('*');
            $this->db->from('tbl_type');
            $this->db->where('id', $id);
            $data['type_data'] = $this->db->get()->row();
            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/inventory/update_inventory');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    public function add_inventory_data()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->helper('security');
            if ($this->input->post()) {
                // print_r($this->input->post());
                // exit;
                $last_id = 0;
                $this->form_validation->set_rules('type_id', 'type_id', 'required');
                $this->form_validation->set_rules('inventory', 'inventory', 'required');
                if ($this->form_validation->run() == true) {
                    $type_id = base64_decode($this->input->post('type_id'));
                    $inventory = $this->input->post('inventory');
                    $this->db->select('*');
                    $this->db->from('tbl_type');
                    $this->db->where('id', $type_id);
                    $product_data_dsa = $this->db->get()->row();
                    $old_inventory = $product_data_dsa->inventory;
                    $ip = $this->input->ip_address();
                    date_default_timezone_set("Asia/Calcutta");
                    $cur_date = date("Y-m-d H:i:s");
                    $addedby = $this->session->userdata('admin_id');
                    if (!empty($old_inventory)) {
                        $data_insert = array(
                            'inventory' => $inventory,
                        );
                        $this->db->where('id', $type_id);
                        $last_id = $this->db->update('tbl_type', $data_insert);
                    }
                    if ($last_id != 0) {
                        $this->session->set_flashdata('smessage', 'Data inserted successfully');
                        redirect("dcadmin/inventory/view_inventory", "refresh");
                    } else {
                        $this->session->set_flashdata('emessage', 'Sorry error occured');
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

    public function view_inventory_transactions($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $id = base64_decode($idd);
            $data['id'] = $idd;
            $data['type_data'] = $this->db->get_where('tbl_type', array('id' => $id))->row();
            $this->db->select('*');
            $this->db->from('tbl_inventory_transaction');
            $this->db->where('type_id', $id);
            $this->db->order_by('id', 'desc');
            $data['inventory_transactions_data'] = $this->db->get();
            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/inventory/view_inventory_transactions');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
}
