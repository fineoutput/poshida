<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require_once(APPPATH . 'core/CI_finecontrol.php');
class Popup_Image extends CI_finecontrol
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/login_model");
        $this->load->model("admin/base_model");
        $this->load->library("upload");
    }
    //====================view_popup_image==================\\
    public function view_popup_image()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name'] = $this->load->get_var('user_name');
            $this->db->select('*');
            $this->db->from('tbl_popup_image');
            $data['popup_image_data'] = $this->db->get();
            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/popup_image/view_popup_image');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    //=======================add popup_image==================\\
    public function add_popup_image()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name'] = $this->load->get_var('user_name');
            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/popup_image/add_popup_image');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    //===================add_popup_image_data======================\\
    public function add_popup_image_data($t, $iw = "")
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->helper('security');
            if ($this->input->post()) {
                // $this->form_validation->set_rules('name', 'name', 'required|xss_clean|trim');
                $this->form_validation->set_rules('text', 'text', 'required|xss_clean|trim');
                if ($this->form_validation->run() == true) {
                    // $name=$this->input->post('name');
                    $text = $this->input->post('text');
                    $ip = $this->input->ip_address();
                    date_default_timezone_set("Asia/Calcutta");
                    $cur_date = date("Y-m-d H:i:s");
                    $addedby = $this->session->userdata('admin_id');
                    $img1 = 'image';
                    $nnnn = '';
                    $file_check = ($_FILES['image']['error']);
                    if ($file_check != 4) {
                        $image_upload_folder = FCPATH . "assets/uploads/popup_image/";
                        if (!file_exists($image_upload_folder)) {
                            mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                        }
                        $new_file_name = "image" . date("YmdHis");
                        $this->upload_config = array(
                            'upload_path'   => $image_upload_folder,
                            'file_name' => $new_file_name,
                            'allowed_types' => 'jpg|jpeg|png',
                            'max_size'      => 25000
                        );
                        $this->upload->initialize($this->upload_config);
                        if (!$this->upload->do_upload($img1)) {
                            $upload_error = $this->upload->display_errors();
                            // echo json_encode($upload_error);
                            // echo $upload_error;
                            $this->session->set_flashdata('emessage', $upload_error);
                            redirect($_SERVER['HTTP_REFERER']);
                        } else {
                            $file_info = $this->upload->data();
                            $videoNAmePath = "assets/uploads/popup_image/" . $file_info['file_name'];
                            $nnnn = $videoNAmePath;
                        }
                    }
                    $typ = base64_decode($t);
                    if ($typ == 1) {
                        $data_insert = array(
                            'text' => $text,
                            'image' => $nnnn,
                            'ip' => $ip,
                            'added_by' => $addedby,
                            'is_active' => 1,
                            'date' => $cur_date
                        );
                        $last_id = $this->base_model->insert_table("tbl_popup_image", $data_insert, 1);
                        if ($last_id != 0) {
                            $this->session->set_flashdata('smessage', 'Data inserted successfully');
                            redirect("dcadmin/Popup_Image/view_popup_image", "refresh");
                        }
                    }
                    if ($typ == 2) {
                        $idw = base64_decode($iw);
                        $this->db->select('*');
                        $this->db->from('tbl_popup_image');
                        $this->db->where('id', $idw);
                        $dsa = $this->db->get();
                        $da = $dsa->row();
                        $img1 = 'image';
                        $nnnn = '';
                        $file_check = ($_FILES['image']['error']);
                        if ($file_check != 4) {
                            $image_upload_folder = FCPATH . "assets/uploads/popup_image/";
                            if (!file_exists($image_upload_folder)) {
                                mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                            }
                            $new_file_name = "image" . date("YmdHis");
                            $this->upload_config = array(
                                'upload_path'   => $image_upload_folder,
                                'file_name' => $new_file_name,
                                'allowed_types' => 'jpg|jpeg|png',
                                'max_size'      => 25000
                            );
                            $this->upload->initialize($this->upload_config);
                            if (!$this->upload->do_upload($img1)) {
                                $upload_error = $this->upload->display_errors();
                                // echo json_encode($upload_error);
                                // echo $upload_error;
                                $this->session->set_flashdata('emessage', $upload_error);
                                redirect($_SERVER['HTTP_REFERER']);
                            } else {
                                $file_info = $this->upload->data();
                                $videoNAmePath = "assets/uploads/popup_image/" .$file_info['file_name'];
                                $nnnn = $videoNAmePath;
                            }
                        }
                        if (!empty($nnnn)) {
                            $data_insert = array(
                                'text' => $text,
                                'image' => $nnnn,
                            );
                            $this->db->where('id', $idw);
                            $last_id = $this->db->update('tbl_popup_image', $data_insert);
                        } else {
                            $data_insert = array(
                                'text' => $text
                            );
                            $this->db->where('id', $idw);
                            $last_id = $this->db->update('tbl_popup_image', $data_insert);
                        }
                        if ($last_id != 0) {
                            $this->session->set_flashdata('smessage', 'Data updated successfully');
                            redirect("dcadmin/Popup_Image/view_popup_image", "refresh");
                        } else {
                            $this->session->set_flashdata('emessage', 'Sorry error occurred');
                            redirect($_SERVER['HTTP_REFERER']);
                        }
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
    //=========================update_popup_image==========================\\
    public function update_popup_image($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name'] = $this->load->get_var('user_name');
            $id = base64_decode($idd);
            $data['id'] = $idd;
            $this->db->select('*');
            $this->db->from('tbl_popup_image');
            $this->db->where('id', $id);
            $dsa = $this->db->get();
            $data['popup_image'] = $dsa->row();
            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/popup_image/update_popup_image');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    //=====================delete_popup_image=====================\\
    public function delete_popup_image($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name'] = $this->load->get_var('user_name');
            $id = base64_decode($idd);
            if ($this->load->get_var('position') == "Super Admin") {
                $zapak = $this->db->delete('tbl_popup_image', array('id' => $id));
                if ($zapak != 0) {
                    $this->session->set_flashdata('smessage', 'Data deleted successfully');
                    redirect("dcadmin/Popup_Image/view_popup_image", "refresh");
                } else {
                    echo "Error";
                    exit;
                }
            } else {
                $data['e'] = "Sorry You Don't Have Permission To Delete Anything.";
                // exit;
                $this->load->view('errors/error500admin', $data);
            }
        } else {
            $this->load->view('admin/login/index');
        }
    }
    public function updatepopup_imageStatus($idd, $t)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name'] = $this->load->get_var('user_name');
            $id = base64_decode($idd);
            if ($t == "active") {
                $data_update = array(
                    'is_active' => 1
                );
                $this->db->where('id', $id);
                $zapak = $this->db->update('tbl_popup_image', $data_update);
                $this->session->set_flashdata('smessage', 'Status updated successfully');
                if ($zapak != 0) {
                    redirect("dcadmin/Popup_Image/view_popup_image", "refresh");
                } else {
                    echo "Error";
                    exit;
                }
            }
            if ($t == "inactive") {
                $data_update = array(
                    'is_active' => 0
                );
                $this->db->where('id', $id);
                $zapak = $this->db->update('tbl_popup_image', $data_update);
                $this->session->set_flashdata('smessage', 'Data updated successfully');
                if ($zapak != 0) {
                    redirect("dcadmin/Popup_Image/view_popup_image", "refresh");
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
}
