<?php

        if (! defined('BASEPATH')) {
            exit('No direct script access allowed');
        }
             require_once(APPPATH . 'core/CI_finecontrol.php');
             class Size extends CI_finecontrol
             {
                 public function __construct()
                 {
                     parent::__construct();
                     $this->load->model("login_model");
                     $this->load->model("admin/base_model");
                     $this->load->library('user_agent');
                     $this->load->library('upload');
                 }

                 public function view_size()
                 {
                     if (!empty($this->session->userdata('admin_data'))) {
                         $data['user_name']=$this->load->get_var('user_name');

                         $this->db->select('*');
                         $this->db->from('tbl_size');
                         // $this->db->order_by('id','desc');
                         $data['size_data']= $this->db->get();

                         $this->load->view('admin/common/header_view', $data);
                         $this->load->view('admin/size/view_size');
                         $this->load->view('admin/common/footer_view');
                     } else {
                         redirect("login/admin_login", "refresh");
                     }
                 }
      public function add_size(){

                       if(!empty($this->session->userdata('admin_data'))){


                         $data['user_name']=$this->load->get_var('user_name');

                         // echo SITE_NAME;
                         // echo $this->session->userdata('image');
                         // echo $this->session->userdata('position');
                         // exit;


                         $this->load->view('admin/common/header_view',$data);
                         $this->load->view('admin/size/add_size');
                         $this->load->view('admin/common/footer_view');

                     }
                     else{

                        redirect("login/admin_login","refresh");
                     }

                     }
 public function add_size_data($t,$iw="")

                       {

                         if(!empty($this->session->userdata('admin_data'))){


                     $this->load->helper(array('form', 'url'));
                     $this->load->library('form_validation');
                     $this->load->helper('security');
                     if($this->input->post())
                     {
          $this->form_validation->set_rules('name', 'name', 'required|xss_clean|trim');
                       if($this->form_validation->run()== TRUE)
                       {
          $name=$this->input->post('name');


        $ip = $this->input->ip_address();
        date_default_timezone_set("Asia/Calcutta");
        $cur_date=date("Y-m-d H:i:s");
        $addedby=$this->session->userdata('admin_id');

       $typ=base64_decode($t);
       $last_id = 0;
       if($typ==1){

                   $data_insert = array(
                              'name'=>$name,
                             'ip' =>$ip,
                             'added_by' =>$addedby,
                             'is_active' =>1,
                             'date'=>$cur_date
                             );


                   $last_id=$this->base_model->insert_table("tbl_size",$data_insert,1) ;
                   if($last_id!=0){
                           $this->session->set_flashdata('smessage','Data inserted successfully');
                           redirect("dcadmin/Size/view_size","refresh");
                          }
                   }
                   if($typ==2){

            $idw=base64_decode($iw);


         $this->db->select('*');
         $this->db->from('tbl_size');
         $this->db->where('id',$idw);
         $dsa=$this->db->get();
         $da=$dsa->row();


                   $data_insert = array(
                          'name'=>$name,

                             );
                     $this->db->where('id', $idw);
                     $last_id=$this->db->update('tbl_size', $data_insert);
                   }
                               if($last_id!=0){
                                       $this->session->set_flashdata('smessage','Data updated successfully');
                                       redirect("dcadmin/Size/view_size","refresh");
                                      }
                                       else
                                           {
                                            $this->session->set_flashdata('emessage','Sorry error occurred');
                                            redirect($_SERVER['HTTP_REFERER']);
                                          }
                       }
                     else{
         //
                $this->session->set_flashdata('emessage',validation_errors());
              redirect($_SERVER['HTTP_REFERER']);
         //
                     }

                     }
                   else{

         $this->session->set_flashdata('emessage','Please insert some data, No data available');
              redirect($_SERVER['HTTP_REFERER']);

                   }
                   }
                   else{

               redirect("login/admin_login","refresh");


                   }

                   }


  public function update_size($idd)
                   {
                   if (!empty($this->session->userdata('admin_data'))) {
                    $data['user_name']=$this->load->get_var('user_name');

                    // echo SITE_NAME;
                    // echo $this->session->userdata('image');
                    // echo $this->session->userdata('position');
                    // exit;

                    $id=base64_decode($idd);
                    $data['id']=$idd;

                    $this->db->select('*');
                    $this->db->from('tbl_size');
                    $this->db->where('id', $id);
                    $data['size']= $this->db->get()->row();


                    $this->load->view('admin/common/header_view', $data);
                    $this->load->view('admin/size/update_size');
                    $this->load->view('admin/common/footer_view');
                   } else {
                    redirect("login/admin_login", "refresh");
                   }
                   }



    public function updatesizeStatus($idd, $t)
                   {
                       if (!empty($this->session->userdata('admin_data'))) {
                           $data['user_name']=$this->load->get_var('user_name');

                           // echo SITE_NAME;
                           // echo $this->session->userdata('image');
                           // echo $this->session->userdata('position');
                           // exit;
                           $id=base64_decode($idd);

                           if ($t=="active") {
                               $data_update = array(
                                'is_active'=>1

                                );

                               $this->db->where('id', $id);
                               $zapak=$this->db->update('tbl_size', $data_update);

                               $this->db->where('size_id', $id);
                               $zapak=$this->db->update('tbl_type', array('size_active'=>1));

                               if ($zapak!=0) {
                                    $this->session->set_flashdata('smessage', 'Status updated successfully');
                                   redirect("dcadmin/Size/view_size", "refresh");
                               } else {
                                   $this->session->set_flashdata('emessage', 'Sorry error occurred');
                                   redirect($_SERVER['HTTP_REFERER']);
                               }
                           }
                           if ($t=="inactive") {
                               $data_update = array(
                                 'is_active'=>0

                                 );

                               $this->db->where('id', $id);
                               $zapak=$this->db->update('tbl_size', $data_update);

                               $this->db->where('size_id', $id);
                               $zapak=$this->db->update('tbl_type', array('size_active'=>0));

                               if ($zapak!=0) {
                                   $this->session->set_flashdata('smessage', 'Status updated successfully');
                                   redirect("dcadmin/Size/view_size", "refresh");
                               } else {
                                   $this->session->set_flashdata('emessage', 'Sorry error occurred');
                                   redirect($_SERVER['HTTP_REFERER']);
                               }
                           }
                       } else {
                           redirect("login/admin_login", "refresh");
                       }
                   }



                   public function delete_size($idd)
                   {
                       if (!empty($this->session->userdata('admin_data'))) {
                           $data['user_name']=$this->load->get_var('user_name');

                           $id=base64_decode($idd);

                           if ($this->load->get_var('position')=="Super Admin") {

                             // $this->db->select('image');
                               // $this->db->from('tbl_blog');
                               // $this->db->where('id',$id);
                               // $dsa= $this->db->get();
                               // $da=$dsa->row();
                               // $img=$da->image;

                               $zapak=$this->db->delete('tbl_type', array('size_id' => $id));
                               $zapak=$this->db->delete('tbl_size', array('id' => $id));
                               if ($zapak!=0) {
                                   // $path = FCPATH .$img;
                                   //   unlink($path);
                                     $this->session->set_flashdata('smessage', 'Size deleted successfully');
                                   redirect("dcadmin/Size/view_size", "refresh");
                               } else {
                                   $this->session->set_flashdata('emessage', 'Sorry error occurred');
                                   redirect($_SERVER['HTTP_REFERER']);
                               }
                           } else {
                               $this->session->set_flashdata('emessage', 'Sorry you not a super admin you dont have permission to delete anything');
                               redirect($_SERVER['HTTP_REFERER']);
                           }
                       } else {
                           redirect("login/admin_login", "refresh");
                       }
                   }
             }
