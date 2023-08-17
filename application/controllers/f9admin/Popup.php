<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require_once(APPPATH . 'core/CI_finecontrol.php');
class Popup extends CI_finecontrol
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/login_model");
        $this->load->model("admin/base_model");
    }
    //====================view_contact_us==================\\
    public function view_popup()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');

            $this->db->select('*');
            $this->db->from('tbl_popup');
            $this->db->order_by('id', 'desc');
            $data['popup_data']= $this->db->get();

            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/popup/view_popup');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    //==================== VIEW UPLOAD IMAGE==================\\
    public function view_upload_image()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $this->load->view('admin/common/header_view');
            $this->load->view('admin/upload_image/view_upload_image');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }

    //======================== UPLOAD IMAGE ========
    public function upload_image()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->load->library('upload');
            //============================image_upload==========================\\
            $ImagePath="";
            $img1='image';
            $file_check=($_FILES['image']['error']);
            if ($file_check!=4) {
                $image_upload_folder = FCPATH . "assets/uploads/banner/";
                if (!file_exists($image_upload_folder)) {
                    mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                }
                $new_file_name="banner".date("YmdHis");
                $this->upload_config = array(
                        'upload_path'   => $image_upload_folder,
                        'file_name' => $new_file_name,
                        'allowed_types' =>'jpg|jpeg|png',
                        'max_size'      => 25000
                );
                $this->upload->initialize($this->upload_config);
                if (!$this->upload->do_upload($img1)) {
                    $upload_error = $this->upload->display_errors();
                    $this->session->set_flashdata('emessage', $upload_error);
                    redirect($_SERVER['HTTP_REFERER']);
                } else {
                    $file_info = $this->upload->data();

                    $ImagePath = "assets/uploads/banner/".$file_info['file_name'];
                }
            }

            if (!empty($ImagePath)) {
                $this->session->set_flashdata('smessage', "Image Path:- ".$ImagePath);
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->session->set_flashdata('emessage', 'Sorry error occurred');
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
}
