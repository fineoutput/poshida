<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require_once(APPPATH . 'core/CI_finecontrol.php');
class Payment_requests extends CI_finecontrol
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("login_model");
        $this->load->model("admin/base_model");
        $this->load->library('user_agent');
    }

    public function view_payment_requests()
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $this->db->select('*');
            $this->db->from('tbl_points_transation');
            $this->db->order_by('id', 'desc');
            $data['payment_data']= $this->db->get();
            $this->load->view('admin/common/header_view', $data);
            $this->load->view('admin/payment/view_payments');
            $this->load->view('admin/common/footer_view');
        } else {
            redirect("login/admin_login", "refresh");
        }
    }

    public function updatePaymentStatus($idd, $t)
    {
        if (!empty($this->session->userdata('admin_data'))) {
            $data['user_name']=$this->load->get_var('user_name');

            // echo SITE_NAME;
            // echo $this->session->userdata('image');
            // echo $this->session->userdata('position');
            // exit;
            $id=base64_decode($idd);

            date_default_timezone_set("Asia/Calcutta");
            $cur_date=date("Y-m-d H:i:s");
            $addedby=$this->session->userdata('admin_id');
            if ($t=="complete") {
                $this->db->select('*');
                $this->db->from('tbl_points_transation');
                $this->db->where('id', $id);
                $transaction_data= $this->db->get()->row();

                $this->db->select('*');
                $this->db->from('tbl_users');
                $this->db->where('id', $transaction_data->model_id);
                $model_data= $this->db->get()->row();

                $upadte_amount = $model_data->total_points - $transaction_data->req_points;

                $data_update = array('total_points'=>$upadte_amount,
                                      );
                $this->db->where('id', $model_data->id);
                $zapak=$this->db->update('tbl_users', $data_update);
                $data_update = array(
                                    'status'=>1,
                                    'completed_date'=>$cur_date,
                                    'added_by'=>$addedby,

                                    );

                $this->db->where('id', $id);
                $zapak=$this->db->update('tbl_points_transation', $data_update);



                if ($zapak!=0) {
                    $this->session->set_flashdata('smessage', 'Status updated successfully');
                    redirect("dcadmin/Payment_requests/view_payment_requests", "refresh");
                } else {
                    $this->session->set_flashdata('emessage', 'Sorry error occurred');
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }
            if ($t=="reject") {
                $data_update = array(
                                     'status'=>2
                                     );

                $this->db->where('id', $id);
                $zapak=$this->db->update('tbl_points_transation', $data_update);

                if ($zapak!=0) {
                    $this->session->set_flashdata('smessage', 'Status updated successfully');
                    redirect("dcadmin/Payment_requests/view_payment_requests", "refresh");
                } else {
                    $this->session->set_flashdata('emessage', 'Sorry error occurred');
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }
        } else {
            redirect("login/admin_login", "refresh");
        }
    }
}
