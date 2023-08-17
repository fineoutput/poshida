<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require_once(APPPATH . 'core/CI_finecontrol.php');
class Shop_By_Category extends CI_finecontrol
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("login_model");
        $this->load->model("admin/base_model");
        $this->load->library('user_agent');
    }
    //========================view_shop_by_category======================\\
    public function view_shop_by_category()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name'] = $this->load->get_var('user_name');
            $this->db->select('*');
            $this->db->from('tbl_shop_by_category');
            //$this->db->where('id',$usr);
            $data['shop_by_category_data'] = $this->db->get();
            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/shop_by_category/view_shop_by_category');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    //===================add_shop_by_category===================\\
    public function add_shop_by_category()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name'] = $this->load->get_var('user_name');
            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/shop_by_category/add_shop_by_category');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    public function add_shop_by_category_data($t, $iw = "")
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->helper('security');
            if ($this->input->post()) {
                // print_r($this->input->post());
                // exit;
                $this->form_validation->set_rules('name', 'name', 'xss_clean|trim');
                $this->form_validation->set_rules('link', 'link', 'xss_clean|trim');
                // $this->form_validation->set_rules('link2', 'link2', 'required|xss_clean|trim');
                if ($this->form_validation->run() == true) {
                    $name = $this->input->post('name');
                    $link = $this->input->post('link');
                    // $link2=$this->input->post('link2');
                    $ip = $this->input->ip_address();
                    date_default_timezone_set("Asia/Calcutta");
                    $cur_date = date("Y-m-d H:i:s");
                    $addedby = $this->session->userdata('admin_id');
                    $this->load->library('upload');
                    //============================image_upload==========================\\
                    $image = "";
                    $img1 = 'image';
                    $typ = base64_decode($t);
                    if ($typ == 1) {
                        $file_check = ($_FILES['image']['error']);
                        if ($file_check != 4) {
                            $image_upload_folder = FCPATH . "assets/uploads/shop_by_category/";
                            if (!file_exists($image_upload_folder)) {
                                mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                            }
                            $new_file_name = "shop_by_category" . date("YmdHis");
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
                                $this->session->set_flashdata('emessage', $upload_error);
                                redirect($_SERVER['HTTP_REFERER']);
                            } else {
                                $file_info = $this->upload->data();
                                $videoNAmePath = "assets/uploads/shop_by_category/" . $file_info['file_name'];
                                $image = $videoNAmePath;
                                // $this->step6_model->updateappIconImage($imageNAmePath,$appInfoId);
                                // echo json_encode($file_info);
                            }
                        }
                        $data_insert = array(
                            'image' => $image,
                            'name' => $name,
                            // 'image2'=>$image2,
                            'link' => $link,
                            // 'link2'=>$link2,
                            'ip' => $ip,
                            'added_by' => $addedby,
                            'is_active' => 1,
                            'date' => $cur_date
                        );
                        $last_id = $this->base_model->insert_table("tbl_shop_by_category", $data_insert, 1);
                        if ($last_id != 0) {
                            $this->session->set_flashdata('smessage', 'Data inserted successfully');
                            redirect("dcadmin/Shop_By_Category/view_shop_by_category", "refresh");
                        } else {
                            $this->session->set_flashdata('emessage', 'Sorry error occurred');
                            redirect($_SERVER['HTTP_REFERER']);
                        }
                    }
                    if ($typ == 2) {
                        $idw = base64_decode($iw);
                        $file_check = ($_FILES['image']['error']);
                        if (!empty($_FILES['image']['name'])) {
                            if ($file_check != 4) {
                                $image_upload_folder = FCPATH . "assets/uploads/shop_by_category/";
                                if (!file_exists($image_upload_folder)) {
                                    mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                                }
                                $new_file_name = "shop_by_category" . date("YmdHis");
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
                                    $videoNAmePath = "assets/uploads/shop_by_category/" . $file_info['file_name'];
                                    $image = $videoNAmePath;
                                    // $this->step6_model->updateappIconImage($imageNAmePath,$appInfoId);
                                    // echo json_encode($file_info);
                                }
                            }
                        }
                        $this->db->select('*');
                        $this->db->from('tbl_shop_by_category');
                        $this->db->where('id', $idw);
                        $slider_data = $this->db->get()->row();
                        if (empty($image)) {
                            $image = $slider_data->image;
                        }
                        // if(empty($image2)){
                        //     $image2= $slider_data->image2;
                        // }
                        if (!empty($image)) {
                            $data_insert = array(
                                'link' => $link,
                                // 'link2'=>$link2,
                                'image' => $image,
                                'name' => $name,
                                // 'image2'=>$image2,
                            );
                        } else {
                            $data_insert = array(
                                'link' => $link,
                                // 'link2'=>$link2,
                            );
                        }
                        // die();
                        $this->db->where('id', $idw);
                        $last_id = $this->db->update('tbl_shop_by_category', $data_insert);
                        if ($last_id != 0) {
                            $this->session->set_flashdata('smessage', 'Data updated successfully');
                            redirect("dcadmin/Shop_By_Category/view_shop_by_category", "refresh");
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
    //======================update_shop_by_category===================\\
    public function update_shop_by_category($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name'] = $this->load->get_var('user_name');
            $id = base64_decode($idd);
            $data['id'] = $idd;
            $this->db->select('*');
            $this->db->from('tbl_shop_by_category');
            $this->db->where('id', $id);
            $dsa = $this->db->get();
            $data['shop_by_category'] = $dsa->row();
            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/shop_by_category/update_shop_by_category');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    //======================delete_shop_by_category===================\\
    public function delete_shop_by_category($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name'] = $this->load->get_var('user_name');
            // echo SITE_NAME;
            // echo $this->session->userdata('image');
            // echo $this->session->userdata('position');
            // exit;
            $id = base64_decode($idd);
            if ($this->load->get_var('position') == "Super Admin") {
                $this->db->select('image');
                $this->db->from('tbl_shop_by_category');
                $this->db->where('id', $id);
                $dsa = $this->db->get();
                $da = $dsa->row();
                // $img=$da->image;
                $zapak = $this->db->delete('tbl_shop_by_category', array('id' => $id));
                if ($zapak != 0) {
                    $this->session->set_flashdata('smessage', 'Data deleted successfully');
                    redirect("dcadmin/Shop_By_Category/view_shop_by_category", "refresh");
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
    //==================update_shop_by_category status=====================\\
    public function updateshop_by_categoryStatus($idd, $t)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name'] = $this->load->get_var('user_name');
            $id = base64_decode($idd);
            if ($t == "active") {
                $data_update = array(
                    'is_active' => 1
                );
                $this->db->where('id', $id);
                $zapak = $this->db->update('tbl_shop_by_category', $data_update);
                $this->session->set_flashdata('smessage', 'Status updated successfully');
                if ($zapak != 0) {
                    redirect("dcadmin/Shop_By_Category/view_shop_by_category", "refresh");
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
                $zapak = $this->db->update('tbl_shop_by_category', $data_update);
                $this->session->set_flashdata('smessage', 'Status updated successfully');
                if ($zapak != 0) {
                    redirect("dcadmin/Shop_By_Category/view_shop_by_category", "refresh");
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
