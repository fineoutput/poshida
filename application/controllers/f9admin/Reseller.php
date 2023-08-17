<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require_once(APPPATH . 'core/CI_finecontrol.php');
class Reseller extends CI_finecontrol
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("login_model");
        $this->load->model("admin/base_model");
        $this->load->library('user_agent');
    }

//========================================pending_reseller====================================\\
public function pending_reseller(){

                 if(!empty($this->session->userdata('admin_data'))){


                   $data['user_name']=$this->load->get_var('user_name');

                   $this->db->select('*');
                   $this->db->from('tbl_reseller');
                   $this->db->where('is_active', 1);//block
                   $this->db->order_by('id','desc');
                  $this->db->where('reseller_status', 0);//pending
                   $data['reseller_data']= $this->db->get();
                  $data['heading'] = "Pending";

                   $this->load->view('admin/common/header_view',$data);
                   $this->load->view('admin/reseller/view_reseller');
                   $this->load->view('admin/common/footer_view');

               }
               else{

                  redirect("login/admin_login","refresh");
               }

               }
  //========================================approved reseller====================================\\
public function approved_reseller(){

                 if(!empty($this->session->userdata('admin_data'))){


                   $data['user_name']=$this->load->get_var('user_name');

                   $this->db->select('*');
                   $this->db->from('tbl_reseller');
                   $this->db->order_by('id','desc');
                  $this->db->where('reseller_status', 1);//approved
                   $data['reseller_data']= $this->db->get();
                   $data['heading'] = "Approved";

                   $this->load->view('admin/common/header_view',$data);
                   $this->load->view('admin/reseller/view_reseller');
                   $this->load->view('admin/common/footer_view');

               }
               else{

                  redirect("login/admin_login","refresh");
               }

               }
//========================================rejected reseller====================================\\
public function rejected_reseller(){

                 if(!empty($this->session->userdata('admin_data'))){


                   $data['user_name']=$this->load->get_var('user_name');

                   $this->db->select('*');
                   $this->db->from('tbl_reseller');
                   $this->db->order_by('id','desc');
                     $this->db->where('reseller_status', 2);//rejected
                   $data['reseller_data']= $this->db->get();
                   $data['heading'] = "Rejected";

                   $this->load->view('admin/common/header_view',$data);
                   $this->load->view('admin/reseller/view_reseller');
                   $this->load->view('admin/common/footer_view');

               }
               else{

                  redirect("login/admin_login","refresh");
               }

               }
public function updateresellerStatus($idd,$t){

         if(!empty($this->session->userdata('admin_data'))){


           $data['user_name']=$this->load->get_var('user_name');

           // echo SITE_NAME;
           // echo $this->session->userdata('image');
           // echo $this->session->userdata('position');
           // exit;
           $id=base64_decode($idd);

           if($t=="pending"){

             $data_update = array(
         'reseller_status'=>0

         );

         $this->db->where('id', $id);
        $zapak=$this->db->update('tbl_reseller', $data_update);
             if($zapak!=0){
                 $this->session->set_flashdata('smessage', 'Status updated successfully');
              redirect($_SERVER['HTTP_REFERER']);;
                     }
                     else
                     {
                       echo "Error";
                       exit;
                     }
           }
           if($t=="approved"){
             $data_update = array(
          'reseller_status'=>1
          );
          $this->db->where('id', $id);
          $zapak=$this->db->update('tbl_reseller', $data_update);

              if($zapak!=0){
              $this->session->set_flashdata('smessage', 'Status updated successfully');
              redirect($_SERVER['HTTP_REFERER']);;
                      }
                      else
                      {

          $data['e']="Error occurred";
                          	// exit;
        	$this->load->view('errors/error500admin',$data);
                      }
           }
           if($t=="rejected"){
             $data_update = array(
          'reseller_status'=>2
          );
          $this->db->where('id', $id);
          $zapak=$this->db->update('tbl_reseller', $data_update);

              if($zapak!=0){
              $this->session->set_flashdata('smessage', 'Status updated successfully');
              redirect($_SERVER['HTTP_REFERER']);;
                      }
                      else
                      {

          $data['e']="Error occurred";
                          	// exit;
        	$this->load->view('errors/error500admin',$data);
                      }
           }
           if ($t=="active") {
               $data_update = array(
                              'is_active'=>1

                              );

               $this->db->where('id', $id);
               $zapak=$this->db->update('tbl_reseller', $data_update);
               $this->session->set_flashdata('smessage', 'Data updated successfully');

               if ($zapak!=0) {
                   // redirect("dcadmin/promocode/view_promocode", "refresh");
                   $this->session->set_flashdata('smessage', 'Status updated successfully');
                redirect($_SERVER['HTTP_REFERER']);;
               } else {
                   echo "Error";
                   exit;
               }
           }
           if ($t=="inactive") {
               $data_update = array(
                              'is_active'=>0

                              );

               $this->db->where('id', $id);
               $zapak=$this->db->update('tbl_reseller', $data_update);
               $this->session->set_flashdata('smessage', 'Data updated successfully');

               if ($zapak!=0) {
                 $this->session->set_flashdata('smessage', 'Status updated successfully');
              redirect($_SERVER['HTTP_REFERER']);;
               } else {
                   $data['e']="Error occurred";
                   // exit;
                   $this->load->view('errors/error500admin', $data);
               }
           }


       }
       else{

           $this->load->view('admin/login/index');
       }

       }
       public function update_reseller($idd)
       {
           if (!empty($this->session->userdata('admin_data'))) {
               $data['user_name']=$this->load->get_var('user_name');
               $id=base64_decode($idd);
               $data['id']=$idd;
               $this->db->select('*');
               $this->db->from('tbl_reseller');
               $this->db->where('id',$id);
               $data['reseller_data']= $this->db->get()->row();


               $this->load->view('admin/common/header_view', $data);
               $this->load->view('admin/reseller/update_approved_reseller');
               $this->load->view('admin/common/footer_view');
           } else {
               redirect("login/admin_login", "refresh");
           }
       }
       //=============================add_promocode_data==================\\
       public function update_reseller_data($iw="")
       {
           if (!empty($this->session->userdata('admin_data'))) {
               $this->load->helper(array('form', 'url'));
               $this->load->library('form_validation');
               $this->load->helper('security');
               if ($this->input->post()) {
                   // print_r($this->input->post());
                   // exit;
                   $this->form_validation->set_rules('name', 'name', 'required|xss_clean|trim');
                   $this->form_validation->set_rules('email', 'email', 'required|xss_clean|trim');
                   $this->form_validation->set_rules('phone', 'phone', 'required|xss_clean|trim');
                   $this->form_validation->set_rules('shop', 'shop', 'required|xss_clean|trim');
                   $this->form_validation->set_rules('gst_number', 'gst_number', 'xss_clean|trim');
                   $this->form_validation->set_rules('address', 'address', 'required|xss_clean|trim');
                   $this->form_validation->set_rules('city', 'city', 'required|xss_clean|trim');
                   $this->form_validation->set_rules('state', 'state', 'required|xss_clean|trim');



                   if ($this->form_validation->run()== true) {
                       $name=$this->input->post('name');
                       $email=$this->input->post('email');
                       $phone=$this->input->post('phone');
                       $gst_number=$this->input->post('gst_number');
                       $shop=$this->input->post('shop');
                       $address=$this->input->post('address');
                       $city=$this->input->post('city');
       $state=$this->input->post('state');
                       $ip = $this->input->ip_address();
                       date_default_timezone_set("Asia/Calcutta");
                       $cur_date=date("Y-m-d H:i:s");

                       $addedby=$this->session->userdata('admin_id');


                           $idw=base64_decode($iw);


                           $data_insert = array('name'=>$name,
                           'email'=>$email,
                           'phone'=>$phone,
                     'gst_number'=>$gst_number,
                                 'shop'=>$shop,
                                 'address'=>$address,
                                 'city'=>$city,
                                 'state'=>$state,
                                 );

                           $this->db->where('id', $idw);
                           $last_id=$this->db->update('tbl_reseller', $data_insert);
                           if ($last_id!=0) {
                               $this->session->set_flashdata('smessage', 'Data updated successfully');
                                redirect("dcadmin/Reseller/approved_reseller", "refresh");
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


  }
