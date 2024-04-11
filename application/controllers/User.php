<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("login_model");
        $this->load->model("admin/base_model");
        $this->load->library('user_agent');
        $this->load->library('custom/Login');
        $this->load->library('custom/Forms');
        $this->load->library('custom/Cart');

    }
    //=============================================== USER REGISTER =============================================================
    public function register_process()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('fname', 'fname', 'required|xss_clean|trim');
            $this->form_validation->set_rules('lname', 'lname', 'required|xss_clean|trim');
            $this->form_validation->set_rules('phone', 'phone', 'required|xss_clean|trim');
            if ($this->form_validation->run() == true) {
                $fname = $this->input->post('fname');
                $lname = $this->input->post('lname');
                $phone = $this->input->post('phone');
                //-------------- register user  with otp ------------
                $Register = $this->login->RegisterWithOtp($fname, $lname, $phone);
                echo $Register;
            } else {
                $this->session->set_flashdata('emessage', validation_errors());
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata('emessage', 'Please insert some data');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    //=============================================== RESELLER REGISTER =============================================================
    public function reseller_register_process()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'name', 'required|xss_clean|trim');
            $this->form_validation->set_rules('email', 'email', 'required|xss_clean|trim');
            $this->form_validation->set_rules('shopname', 'shopname', 'required|xss_clean|trim');
            $this->form_validation->set_rules('gstnumber', 'gstnumber', 'xss_clean|trim');
            $this->form_validation->set_rules('address', 'address', 'required|xss_clean|trim');
            $this->form_validation->set_rules('city', 'city', 'required|xss_clean|trim');
            $this->form_validation->set_rules('state', 'state', 'required|xss_clean|trim');
            $this->form_validation->set_rules('phone', 'phone', 'required|xss_clean|trim');
            if ($this->form_validation->run() == true) {
                $name = $this->input->post('name');
                $email = $this->input->post('email');
                $shopname = $this->input->post('shopname');
                $gstnumber = $this->input->post('gstnumber');
                $address = $this->input->post('address');
                $city = $this->input->post('city');
                $state = $this->input->post('state');
                $phone = $this->input->post('phone');
                //-------------- register user  with otp ------------
                $Register = $this->login->ResellerRegisterWithOtp($name, $email, $shopname, $address, $city, $state, $gstnumber, $phone);
                echo $Register;
            } else {
                $this->session->set_flashdata('emessage', validation_errors());
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata('emessage', 'Please insert some data');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    //=============================================== USER REGISTER OTP VERIFY =============================================================
    public function register_otp_verify()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('phone', 'phone', 'required|xss_clean|trim');
            $this->form_validation->set_rules('otp', 'otp', 'required|xss_clean|trim');
            if ($this->form_validation->run() == true) {
                $phone = $this->input->post('phone');
                $otp = $this->input->post('otp');
                //-------------- register otp verify ------------
                $RegisterVerify = $this->login->RegisterOtpVerify($phone, $otp);
                // redirect($_SERVER['HTTP_REFERER']);
                echo $RegisterVerify;
            } else {
                $this->session->set_flashdata('emessage', validation_errors());
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata('emessage', 'Please insert some data');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    //============================================ USER LOGIN PROCESS ===========================================================
    public function login_process()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('phone', 'phone', 'required|xss_clean|trim');
            if ($this->form_validation->run() == true) {
                $phone = $this->input->post('phone');
                //------ user login send otp ----------
                $Login = $this->login->LoginWithOtp($phone);
                echo $Login;
            } else {
                $this->session->set_flashdata('emessage', validation_errors());
            }
        } else {
            $this->session->set_flashdata('emessage', 'Please insert some data');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    //=============================================== USER LOGIN OTP VERIFY =============================================================
    public function login_otp_verify()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('phone', 'phone', 'required|xss_clean|trim');
            $this->form_validation->set_rules('otp', 'otp', 'required|xss_clean|trim');
            if ($this->form_validation->run() == true) {
                $phone = $this->input->post('phone');
                $otp = $this->input->post('otp');
                //-------------- register otp verify ------------
                $LoginVerify = $this->login->LoginOtpVerify($phone, $otp);
                echo $LoginVerify;
                die();
            } else {
                $this->session->set_flashdata('emessage', validation_errors());
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata('emessage', 'Please insert some data');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    //=============================================== USER LOGIN OTP VERIFY =============================================================
    public function email_login()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('email', 'email', 'required|xss_clean|trim');
            $this->form_validation->set_rules('password', 'password', 'required|xss_clean|trim');
            if ($this->form_validation->run() == true) {
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                //-------------- register otp verify ------------
                $LoginVerify = $this->login->EmailLogin($email, $password);
                // echo $LoginVerify;
                // die();
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->session->set_flashdata('emessage', validation_errors());
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata('emessage', 'Please insert some data');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    //======================================= UPDATE USER PROFILE =============================================
    public function update_profile()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('fname', 'fname', 'required|xss_clean|trim');
            $this->form_validation->set_rules('lname', 'lname', 'required|xss_clean|trim');
            if ($this->form_validation->run() == TRUE) {
                $fname = $this->input->post('fname');
                $lname = $this->input->post('lname');
                $update = array('f_name' => $fname, 'l_name' => $lname);
                $this->db->where('id', $this->session->userdata('user_id'));
                $zapak2 = $this->db->update('tbl_users', $update);
                if ($zapak2 == 1) {
                    $this->session->set_flashdata('smessage', 'Profile updated successfully!');
                    redirect('my_profile/account', 'refresh');
                } else {
                    $this->session->set_flashdata('emessage', 'Some unknown error occurred');
                    redirect('my_profile/account', 'refresh');
                }
            } else {
                $this->session->set_flashdata('emessage', validation_errors());
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata('emessage', 'Please insert some data, No data available');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    //======================================= UPDATE RESELLER PROFILE =============================================
    public function update_reseller_profile()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'name', 'required|xss_clean|trim');
            $this->form_validation->set_rules('email', 'email', 'required|xss_clean|trim');
            $this->form_validation->set_rules('shop', 'shop', 'required|xss_clean|trim');
            $this->form_validation->set_rules('gstin', 'gstin', 'xss_clean|trim');
            $this->form_validation->set_rules('city', 'city', 'required|xss_clean|trim');
            $this->form_validation->set_rules('address', 'address', 'required|xss_clean|trim');
            if ($this->form_validation->run() == TRUE) {
                $name = $this->input->post('name');
                $email = $this->input->post('email');
                $shop = $this->input->post('shop');
                $gstin = $this->input->post('gstin');
                $city = $this->input->post('city');
                $address = $this->input->post('address');
                $update = array('name' => $name, 'email' => $email, 'shop' => $shop, 'gst_number' => $gstin, 'city' => $city, 'address' => $address);
                $this->db->where('id', $this->session->userdata('user_id'));
                $zapak2 = $this->db->update('tbl_reseller', $update);
                if ($zapak2 == 1) {
                    $this->session->set_flashdata('smessage', 'Profile updated successfully!');
                    redirect('my_profile', 'refresh');
                } else {
                    $this->session->set_flashdata('emessage', 'Some unknown error occurred');
                    redirect('my_profile', 'refresh');
                }
            } else {
                $this->session->set_flashdata('emessage', validation_errors());
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata('emessage', 'Please insert some data, No data available');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    //======================================= REDEEM POINTS ==================================================
    public function redeem_points()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('points', 'points', 'required|xss_clean|trim');
            $this->form_validation->set_rules('accountnumber', 'accountnumber', 'required|xss_clean|trim');
            $this->form_validation->set_rules('ifsccode', 'ifsccode', 'required|xss_clean|trim');
            $this->form_validation->set_rules('name', 'name', 'required|xss_clean|trim');

            if ($this->form_validation->run() == TRUE) {
                $points = $this->input->post('points');
                $accountnumber = $this->input->post('accountnumber');
                $ifsccode = $this->input->post('ifsccode');
                $name = $this->input->post('name');
                $submit_request = $this->forms->redeemModelPoints($points, $accountnumber, $ifsccode, $points);
                redirect('my_profile', 'refresh');
            } else {
                $this->session->set_flashdata('emessage', validation_errors());
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata('emessage', 'Please insert some data, No data available');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    //=============================================== USER REGISTER =============================================================
    public function email_register()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('fname', 'fname', 'required|xss_clean|trim');
            $this->form_validation->set_rules('lname', 'lname', 'required|xss_clean|trim');
            $this->form_validation->set_rules('phone', 'phone', 'required|xss_clean|trim');
            $this->form_validation->set_rules('email', 'email', 'required|xss_clean|trim');
            $this->form_validation->set_rules('password', 'password', 'required|xss_clean|trim');
            if ($this->form_validation->run() == true) {
                $fname = $this->input->post('fname');
                $lname = $this->input->post('lname');
                $phone = $this->input->post('phone');
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                //-------------- register user  with otp ------------
                $Register = $this->login->EmailRegister($fname, $lname, $phone, $email, $password);
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->session->set_flashdata('emessage', validation_errors());
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata('emessage', 'Please insert some data');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    //=============================================== Reseller REGISTER =============================================================
    public function reseller_email_register()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('fname', 'fname', 'required|xss_clean|trim');
            $this->form_validation->set_rules('Email', 'Email', 'required|xss_clean|trim');
            $this->form_validation->set_rules('gstnumber', 'gstnumber', 'required|xss_clean|trim');
            $this->form_validation->set_rules('state', 'state', 'required|xss_clean|trim');
            $this->form_validation->set_rules('shopname', 'shopname', 'required|xss_clean|trim');
            $this->form_validation->set_rules('password', 'password', 'required|xss_clean|trim');
            $this->form_validation->set_rules('phonenumber', 'phonenumber', 'required|xss_clean|trim');
            $this->form_validation->set_rules('city', 'city', 'required|xss_clean|trim');
            $this->form_validation->set_rules('address', 'address', 'required|xss_clean|trim');
            if ($this->form_validation->run() == true) {
                $fname = $this->input->post('fname');
                $Email = $this->input->post('Email');
                $gstnumber = $this->input->post('gstnumber');
                $state = $this->input->post('state');
                $shopname = $this->input->post('shopname');
                $password = $this->input->post('password');
                $phonenumber = $this->input->post('phonenumber');
                $city = $this->input->post('city');
                $address = $this->input->post('address');
                //-------------- register user  with otp ------------
                $Register = $this->login->ResellerEmailRegister($fname, $Email, $gstnumber, $state, $shopname, $password, $phonenumber, $city, $address);
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->session->set_flashdata('emessage', validation_errors());
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata('emessage', 'Please insert some data');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    //======================================== USER LOGOUT ========================================================
    public function logout()
    {
        $Logout = $this->login->UserOtpLogout();
        redirect("/", "refresh");
    }
    //------form forgot password submit-----

    public function generateRandomString($length = 20)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    //========================forgot password email submit===================================
    public function form_submit_forgot_password()
    {
        if (empty($this->session->userdata('user_data'))) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->helper('security');
            if ($this->input->post()) {
                $this->form_validation->set_rules('reset_email', 'reset_email', 'required|valid_email|xss_clean|trim');

                if ($this->form_validation->run() == true) {
                    $email = $this->input->post('reset_email');


                    $this->db->select('*');
                    $this->db->from('tbl_users');
                    $this->db->where('email', $email);
                    $user_data = $this->db->get()->row();
                    $user_name = '';
                    $user_type = '';
                    if (empty($user_data)) {
                        $user_data = $this->db->get_where('tbl_reseller', array('email' => $email))->row();
                         if(!empty($user_data)){
                        $user_name = $user_data->name;
                        $user_type = 2;
                        }
                    } else {
                        $user_name = $user_data->f_name . ' ' . $user_data->l_name;
                        $user_type = 1;
                    }
                    // print_r($user_data);
                    // exit;
                    if (!empty($user_data)) {

                        if ($user_data->is_active == 1) {
                            $user_id = $user_data->id;
                            $user_email = $user_data->email;
                            $ip = $this->input->ip_address();
                            date_default_timezone_set("Asia/Calcutta");
                            $cur_date = date("Y-m-d H:i:s");

                            //generate unique string number for txn_id

                            $txn_id =  $this->generateRandomString(6);

                            $data_insert = array(
                                'user_id' => $user_id,
                                'user_type' => $user_type,
                                'txn_id' => $txn_id,
                                'status' => 0,
                                'ip' => $ip,
                                'date' => $cur_date
                            );

                            $last_id = $this->base_model->insert_table("tbl_forgot_pass", $data_insert, 1);
                            $link = base_url() . "User/forget_password_reset/" . $txn_id;
                            $forgot_password_data = array(
                                'user_name' => $user_name,
                                'link' => $link

                            );

                            $config = array(
                                'protocol' => 'smtp',
                                'smtp_host' => SMTP_HOST,
                                'smtp_port' => SMTP_PORT,
                                'smtp_user' => USER_NAME, // change it to yours
                                'smtp_pass' => PASSWORD, // change it to yours
                                'mailtype' => 'html',
                                'charset' => 'iso-8859-1',
                                'wordwrap' => true
                            );
                            $to = $user_email;

                            $message =     $this->load->view('email/forgetpassword', $forgot_password_data, true);

                            $this->load->library('email', $config);
                            $this->email->set_newline("");
                            $this->email->from(EMAIL); // change it to yours
                            $this->email->to($to); // change it to yours
                            $this->email->subject('Reset Your Password');
                            $this->email->message($message);
                            if ($this->email->send()) {
                                // echo 'Email sent.';
                            } else {
                                show_error($this->email->print_debugger());
                            }

                            $this->session->set_flashdata('smessage', 'Password reset link has been sent successfully');
                            redirect('/');
                        } else {
                            $this->session->set_flashdata('emessage', 'Your account is inactive. Please contact admin.');
                            redirect($_SERVER['HTTP_REFERER']);
                        }
                    } else {
                        $this->session->set_flashdata('emessage', 'User does not exists');
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
            redirect("/", "refresh");
        }
    }

    //---forget-password-reset-----
    public function forget_password_reset($t)
    {
        if (empty($this->session->userdata('user_data'))) {
            $id = $t;
            $this->db->select('*');
            $this->db->from('tbl_forgot_pass');
            $this->db->where('txn_id', $id);
            $u1 = $this->db->get()->row();
            $st = $u1->status;

            if ($st == 0) {
                $data_update = array('status' => 1);
                $this->db->where('status', $u1->status);
                $zapak = $this->db->update('tbl_forgot_pass', $data_update);
                $data['auth'] = $id;

                $this->load->view('frontend/common/header', $data);
                $this->load->view('frontend/forgot_pass');
                $this->load->view('frontend/common/footer', $data);
            } else {
                $this->session->set_flashdata('emessage', 'Link already used');
                redirect("/");
            }
        } else {
            redirect("/", "refresh");
        }
    }
    ////-------update password------
    public function update_password($t)
    {
        if (empty($this->session->userdata('user_data'))) {
            $txn_id = $t;

            $this->db->select('*');
            $this->db->from('tbl_forgot_pass');
            $this->db->where('txn_id', $txn_id);
            $u2 = $this->db->get()->row();
            $ui = $u2->user_id;
            $user_type = $u2->user_type;
            $data['auth'] = $txn_id;
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->helper('security');
            if ($this->input->post()) {
                $this->form_validation->set_rules('reset_password', 'reset_password', 'required|xss_clean|trim');

                if ($this->form_validation->run() == true) {
                    $reset_password = $this->input->post('reset_password');

                    if ($user_type == 1) {
                        $this->db->select('*');
                        $this->db->from('tbl_users');
                        $this->db->where('id', $ui);
                        $this->db->where('is_active', 1);
                        $user = $this->db->get()->row();
                    } else {
                        $this->db->select('*');
                        $this->db->from('tbl_reseller');
                        $this->db->where('id', $ui);
                        $this->db->where('is_active', 1);
                        $user = $this->db->get()->row();
                    }

                    if (!empty($user)) {
                        $rs = md5($reset_password);
                        $data_update = array('password' => $rs);
                        $this->db->where('id', $user->id);
                        if ($user_type == 1) {
                            $zapak = $this->db->update('tbl_users', $data_update);
                        } else {
                            $zapak = $this->db->update('tbl_reseller', $data_update);
                        }

                        if ($zapak != 0) {
                            $this->session->set_flashdata('smessage', 'Password reset successfully');
                            redirect("/", "refresh");
                        }
                    } else {
                        $this->session->set_flashdata('emessage', 'User not found');
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
            redirect("/", "refresh");
        }
    }
}
