<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require_once(APPPATH . 'core/CI_finecontrol.php');
class Replacement_order extends CI_finecontrol
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("login_model");
        $this->load->model("admin/base_model");
        $this->load->library('user_agent');
    }
    public function view_replacement_order()
    {
        if (!empty($this->session->userdata('admin_data'))) {

            $this->db->select('*');
                        $this->db->from('tbl_replacement_order');
                        $data['replacement_order_data']= $this->db->get();


            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/replacement_order/view_replacement_order');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
    //==============================update_order_status========================\\
    public function updatereplacement_orderStatus($idd, $t)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');


            $id=base64_decode($idd);

            if ($t=="complete") {
                $data_update = array('replace_status'=>2);

                $this->db->where('id', $id);
                $zapak=$this->db->update('tbl_replacement_order', $data_update);
                //-------update inventory-------
                $replace_data = $this->db->get_where('tbl_replacement_order', array('id'=> $id));
                $order2_data = $this->db->get_where('tbl_order2', array('id'=> $replace_data[0]->order2_id))->result();

                    $this->db->select('*');
                    $this->db->from('tbl_type');
                    $this->db->where('id', $order2_data[0]->type_id);
                    $pro_data= $this->db->get()->row();
                    if (!empty($pro_data)) {
                        $update_inv = $pro_data->quantity + $replace_data[0]->quantity;
                        $data_update = array('inventory'=>$update_inv,
                      );
                        $this->db->where('id', $pro_data->id);
                        $zapak2=$this->db->update('tbl_type', $data_update);
                    }

                if ($zapak!=0) {
                  $this->session->set_flashdata('smessage', 'Status updated successfully');
                    redirect($_SERVER['HTTP_REFERER']);
                } else {
                  $this->session->set_flashdata('emessage', $upload_error);
                    exit;
                }
            }
            if ($t=="accept") {
                $data_update = array(
                                            'replace_status'=>1

                                            );

                $this->db->where('id', $id);
                $zapak=$this->db->update('tbl_replacement_order', $data_update);

                if ($zapak!=0) {
                    $this->session->set_flashdata('smessage', 'Status updated successfully');
                    redirect($_SERVER['HTTP_REFERER']);
                } else {
                    $data['e']="Error occurred";
                    // exit;
                    $this->load->view('errors/error500admin', $data);
                }
            }
            if ($t=="reject") {
                $data_update = array(
                                            'replace_status'=>3

                                            );

                $this->db->where('id', $id);
                $zapak=$this->db->update('tbl_replacement_order', $data_update);

                if ($zapak!=0) {
                    $this->session->set_flashdata('smessage', 'Status updated successfully');
                    redirect($_SERVER['HTTP_REFERER']);
                } else {
                    $data['e']="Error occurred";
                    // exit;
                    $this->load->view('errors/error500admin', $data);
                }
            }
        } else {
            $this->load->view('admin/login/index');
        }
    }
  }
