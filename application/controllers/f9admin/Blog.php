<?php

    if (! defined('BASEPATH')) {
        exit('No direct script access allowed');
    }
       require_once(APPPATH . 'core/CI_finecontrol.php');
       class Blog extends CI_finecontrol
       {
           public function __construct()
           {
               parent::__construct();
               $this->load->model("login_model");
               $this->load->model("admin/base_model");
               $this->load->library('user_agent');
               $this->load->library('upload');
           }

           public function view_blog()
           {
               if (!empty($this->session->userdata('admin_data'))) {
                   $data['user_name']=$this->load->get_var('user_name');

                   // echo SITE_NAME;
                   // echo $this->session->userdata('image');
                   // echo $this->session->userdata('position');
                   // exit;

                   $this->db->select('*');
                   $this->db->from('tbl_blog');
                   //$this->db->where('id',$usr);
                   $data['blog_data']= $this->db->get();

                   $this->load->view('admin/common/header_view', $data);
                   $this->load->view('admin/blog/view_blog');
                   $this->load->view('admin/common/footer_view');
               } else {
                   redirect("login/admin_login", "refresh");
               }
           }

           public function add_blog()
           {
               if (!empty($this->session->userdata('admin_data'))) {
                   $this->load->view('admin/common/header_view');
                   $this->load->view('admin/blog/add_blog');
                   $this->load->view('admin/common/footer_view');
               } else {
                   redirect("login/admin_login", "refresh");
               }
           }

           public function update_blog($idd)
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
                   $this->db->from('tbl_blog');
                   $this->db->where('id', $id);
                   $data['blog_data']= $this->db->get()->row();


                   $this->load->view('admin/common/header_view', $data);
                   $this->load->view('admin/blog/update_blog');
                   $this->load->view('admin/common/footer_view');
               } else {
                   redirect("login/admin_login", "refresh");
               }
           }

           public function add_blog_data($t, $iw="")
           {
               if (!empty($this->session->userdata('admin_data'))) {
                   $this->load->helper(array('form', 'url'));
                   $this->load->library('form_validation');
                   $this->load->helper('security');
                   if ($this->input->post()) {
                       // print_r($this->input->post());
                       // exit;
                       // $this->form_validation->set_rules('article_date', 'article_date', 'required');
                       $this->form_validation->set_rules('heading', 'heading', 'required');
                       $this->form_validation->set_rules('description', 'description', 'required');
                       $this->form_validation->set_rules('full_description', 'full_description', 'required');
                       $this->form_validation->set_rules('title', 'title', 'required');
                       $this->form_validation->set_rules('keyword', 'keyword', 'required');
                       $this->form_validation->set_rules('dsc', 'dsc', 'required');





                       if ($this->form_validation->run()== true) {
                           // $article_date=$this->input->post('article_date');
                           $heading=$this->input->post('heading');
                           $description=$this->input->post('description');
                           $full_description=$this->input->post('full_description');
                           $title=$this->input->post('title');
                           $keyword=$this->input->post('keyword');
                           $dsc=$this->input->post('dsc');

                           $ip = $this->input->ip_address();
                           date_default_timezone_set("Asia/Calcutta");
                           $cur_date=date("Y-m-d H:i:s");
                           $addedby=$this->session->userdata('admin_id');
//=-======================================IMAGE UPLOAD========================================\\

            $image="";
            $img1='image';


            $typ=base64_decode($t);
            if ($typ==1) {
              $file_check=($_FILES['image']['error']);
              if ($file_check!=4) {
                  $image_upload_folder = FCPATH . "assets/uploads/blog/";
                  if (!file_exists($image_upload_folder)) {
                      mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                  }
                  $new_file_name="blog".date("YmdHis");
                  $this->upload_config = array(
                          'upload_path'   => $image_upload_folder,
                          'file_name' => $new_file_name,
                          'allowed_types' =>'jpg|jpeg|png',
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

                      $videoNAmePath = "assets/uploads/blog/".$file_info['file_name'];
                      $image=$videoNAmePath;
                      // $this->step6_model->updateappIconImage($imageNAmePath,$appInfoId);
                      // echo json_encode($file_info);
                  }
              }


                               $data_insert = array(
                  // 'article_date'=>$article_date,
  'heading'=>$heading,
  'description'=>$description,
  'full_description'=>$full_description,
  'title'=>$title,
  'keyword'=>$keyword,
  'dsc'=>$dsc,
  'image'=>$image,

                     'ip' =>$ip,
                     'added_by' =>$addedby,
                     'is_active' =>1,
                     'date'=>$cur_date
                     );


                               $last_id=$this->base_model->insert_table("tbl_blog", $data_insert, 1) ;
                               if ($last_id!=0) {
                                   $this->session->set_flashdata('smessage', 'Data inserted successfully');
                                   redirect("dcadmin/Blog/view_blog", "refresh");
                               }else {
                                   $this->session->set_flashdata('emessage', 'Sorry error occurred');
                                   redirect($_SERVER['HTTP_REFERER']);
                               }

                           }
                           if ($typ==2) {
                               $idw=base64_decode($iw);
                               // $image="";
                               // $img1='image';
                               // $typ=base64_decode($t);

                                 $file_check=($_FILES['image']['error']);
                                 if ($file_check!=4) {
                                     $image_upload_folder = FCPATH . "assets/uploads/blog/";
                                     if (!file_exists($image_upload_folder)) {
                                         mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                                     }
                                     $new_file_name="blog".date("YmdHis");
                                     $this->upload_config = array(
                                             'upload_path'   => $image_upload_folder,
                                             'file_name' => $new_file_name,
                                             'allowed_types' =>'jpg|jpeg|png',
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

                                         $videoNAmePath = "assets/uploads/blog/".$file_info['file_name'];
                                         $image=$videoNAmePath;
                                         // $this->step6_model->updateappIconImage($imageNAmePath,$appInfoId);
                                         // echo json_encode($file_info);
                                     }
                                 }
                        
                               $this->db->select('*');
                   $this->db->from('tbl_blog');
                   $this->db->where('id',$idw);
                   $blog_data= $this->db->get()->row();
                               if (empty($image)) {
                                 $image= $blog_data->image;
                               }

                               $data_insert = array(
                  // 'article_date'=>$article_date,
  'heading'=>$heading,
  'description'=>$description,
  'full_description'=>$full_description,
  'title'=>$title,
  'keyword'=>$keyword,
  'dsc'=>$dsc,
  'image'=>$image,

                     );
                               $this->db->where('id', $idw);
                               $last_id=$this->db->update('tbl_blog', $data_insert);
                           }
                           if ($last_id!=0) {
                               $this->session->set_flashdata('smessage', 'Data updated successfully');
                               redirect("dcadmin/Blog/view_blog", "refresh");
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

           public function updateblogStatus($idd, $t)
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
                       $zapak=$this->db->update('tbl_blog', $data_update);

                       if ($zapak!=0) {
                                $this->session->set_flashdata('smessage', 'Status updated successfully');
                           redirect("dcadmin/Blog/view_blog", "refresh");
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
                       $zapak=$this->db->update('tbl_blog', $data_update);

                       if ($zapak!=0) {
                         $this->session->set_flashdata('smessage', 'Status updated successfully');
                           redirect("dcadmin/Blog/view_blog", "refresh");

                       } else {
                           $this->session->set_flashdata('emessage', 'Sorry error occurred');
                           redirect($_SERVER['HTTP_REFERER']);
                       }
                   }
               } else {
                   redirect("login/admin_login", "refresh");
               }
           }



           public function delete_blog($idd)
           {
               if (!empty($this->session->userdata('admin_data'))) {
                   $data['user_name']=$this->load->get_var('user_name');

                   $id=base64_decode($idd);

                   if ($this->load->get_var('position')=="Super Admin") {



                       $zapak=$this->db->delete('tbl_blog', array('id' => $id));
                       if ($zapak!=0) {
                         $this->session->set_flashdata('smessage', 'Blog deleted successfully');
                           redirect("dcadmin/Blog/view_blog", "refresh");
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
