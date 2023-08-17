<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require_once(APPPATH . 'core/CI_finecontrol.php');
class Model extends CI_finecontrol
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("login_model");
        $this->load->model("admin/base_model");
        $this->load->library('user_agent');
    }
    public function add_model()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $this->db->select('*');
            $this->db->from('tbl_users');
            $this->db->where('is_active', 1);
            $this->db->where('is_model', 0);
            // $this->db->where('id', $id);
            $data['users_data']= $this->db->get();


            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/model/add_model');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    //==================================== VIEW_MODEL =====================================\\
    public function view_model()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');

            $this->db->select('*');
            $this->db->from('tbl_users');
            $this->db->where('is_active', 1);
            $this->db->where('is_model', 1);
            // $this->db->where('id', $id);
            $data['users_data']= $this->db->get();

            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/model/view_model');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    //==================================== ADD_MODEL_DATA =====================================\\
    public function add_model_data($t, $iw="")
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->helper('security');
            if ($this->input->post()) {
                $this->form_validation->set_rules('user_id', 'user_id', 'xss_clean|trim');

                if ($this->form_validation->run()== true) {
                    $user_id=$this->input->post('user_id');

                    $this->db->select('*');
                    $this->db->from('tbl_users');
                    $this->db->where('id', $user_id);
                    $user_data= $this->db->get()->row();

                    // $random = bin2hex(random_bytes(8));
                    $random = random_int(1000, 9999);
                    $reference_code = $user_data->f_name.$random;

                    $data_insert = array('is_model'=>1,
                    'reference_code'=>$reference_code,
          );
                    // die();
                    $this->db->where('id', $user_id);
                    $last_id=$this->db->update('tbl_users', $data_insert);

                    if ($last_id!=0) {
                        $this->session->set_flashdata('smessage', 'Data updated successfully');
                        redirect("dcadmin/Model/view_model", "refresh");
                    } else {
                        $this->session->set_flashdata('emessage', 'Sorry error occurred');
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
    //==================================== DELETE_MODEL =====================================\\
    public function delete_model($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');


            $id=base64_decode($idd);

            if ($this->load->get_var('position')=="Super Admin") {
              $data_insert = array('is_model'=>0,
              'reference_code'=>'',
              );
              $this->db->where('id', $id);
                $last_id=$this->db->update('tbl_users', $data_insert);
                $zapak=$this->db->delete('tbl_model_products', array('user_id' => $id));
                if ($zapak!=0) {
                    $this->session->set_flashdata('smessage', 'Data deleted successfully');
                  redirect($_SERVER['HTTP_REFERER']);
                } else {
                    echo "Error";
                    exit;
                }
            } else {
                $data['e']="Sorry You Don't Have Permission To Delete Anything.";
                // exit;
                $this->load->view('errors/error500admin', $data);
            }
        } else {
            $this->load->view('admin/login/index');
        }
    }
    //==================================== VIEW MODEL_PRODUCTS =====================================\\
    public function view_model_products($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $id=base64_decode($idd);
            $data['id']=$idd;
            $this->db->select('*');
            $this->db->from('tbl_model_products');
            $this->db->where('user_id', $id);
            $this->db->where('user_id', $id);
            $data['model_products_data']= $this->db->get();



            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/model/view_model_products');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    public function add_model_products($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $id=base64_decode($idd);
            $data['id']=$idd;
            $this->db->select('*');
            $this->db->from('tbl_product');
            $data['product_data']= $this->db->get();

            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/model/add_model_products');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    //==================================== ADD_MODEL_PRODUCTS_DATA =====================================\\
    public function add_model_products_data($t, $iw="")
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->helper('security');
            if ($this->input->post()) {
                $this->form_validation->set_rules('user_id', 'user_id', 'xss_clean|trim');
                $this->form_validation->set_rules('product_id', 'product_id', 'xss_clean|trim');

                if ($this->form_validation->run()== true) {
                    $user_id=$this->input->post('user_id');
                    $product_id=$this->input->post('product_id');




                    $ip = $this->input->ip_address();
                    date_default_timezone_set("Asia/Calcutta");
                    $cur_date=date("Y-m-d H:i:s");

                    $addedby=$this->session->userdata('admin_id');

                    $data_insert = array('product_id'=>$product_id,
                                'user_id'=>$user_id,
                                'added_by' =>$addedby,
                                'is_active' =>1,
                                'date'=>$cur_date
                      );
                    // die();
                    $last_id=$this->base_model->insert_table("tbl_model_products", $data_insert, 1) ;
                    if ($last_id!=0) {
                        $this->session->set_flashdata('smessage', 'Data inserted successfully');
                        redirect("dcadmin/Model/view_model_products/".base64_encode($user_id), "refresh");
                    } else {
                        $this->session->set_flashdata('emessage', 'Sorry error occurred');
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
    public function view_model_points($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $id=base64_decode($idd);
            $data['id']=$idd;

                        $this->db->select('*');
            $this->db->from('tbl_users');
            $this->db->where('id',$id);
            $data['model']= $this->db->get()->row();
            $this->db->select('*');
            $this->db->from('tbl_order1');
            $this->db->where('model_id', $id);
            $this->db->where('payment_status', 1);
            $this->db->order_by('id', 'desc');
            $data['model_points_data']= $this->db->get();

            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/model/view_model_points');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    public function view_model_points_detials($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $id=base64_decode($idd);
            $data['id']=$idd;

            $this->db->select('*');
            $this->db->from('tbl_order2');
            $this->db->where('main_id', $id);
            $data['detials_data']= $this->db->get();

            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/model/points_details');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    public function view_points_transaction($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $id=base64_decode($idd);
            $data['id']=$idd;

            $this->db->select('*');
            $this->db->from('tbl_points_transation');
            $this->db->where('model_id', $id);
            $data['transaction_data']= $this->db->get();

            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/model/view_points_transaction');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    public function delete_model_product($idd)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $id=base64_decode($idd);
            $data['id']=$idd;
            if ($this->load->get_var('position')=="Super Admin") {
                $zapak=$this->db->delete('tbl_model_products', array('id' => $id));
                if ($zapak!=0) {
                    $this->session->set_flashdata('smessage', 'Data deleted successfully');
                  redirect($_SERVER['HTTP_REFERER']);
                } else {
                    echo "Error";
                    exit;
                }
            } else {
                $data['e']="Sorry You Don't Have Permission To Delete Anything.";
                // exit;
                $this->load->view('errors/error500admin', $data);
            }

            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/model/view_points_transaction');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
}
