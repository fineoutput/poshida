<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require_once(APPPATH . 'core/CI_finecontrol.php');
class Home extends CI_finecontrol
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("login_model");
        $this->load->model("admin/base_model");
        $this->load->library('user_agent');
    }

    public function index()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');

            // echo SITE_NAME;

            $this->db->select('*');
            $this->db->from('tbl_admin_sidebar');
            // $this->db->where('student_shift',$cvf);
            $data['sidebar_data']= $this->db->get();

            // echo $this->session->userdata('image');
            // echo $this->session->userdata('position');
            // exit;
            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/dash');
            $this->load->view('admin/common/footer_view');
        } else {
            $this->load->view('admin/login/index');
        }
    }

    //======================== view out of stock products ==================
    public function view_out_stock()
    {
        if (!empty($this->session->userdata('admin_data'))) {
					$this->db->select('*');
					$this->db->from('tbl_type');
					$this->db->where('inventory',0);
					$data['type_data']= $this->db->get();
					// exit;
					$this->load->view('admin/common/header_view', $data);
					$this->load->view('admin/out_stock');
					$this->load->view('admin/common/footer_view');
        } else {
            $this->load->view('admin/login/index');
        }
    }
}
