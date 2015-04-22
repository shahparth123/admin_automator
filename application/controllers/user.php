<?php

session_start(); //we need to start session in order to access it through CI

Class User extends CI_Controller {

    public function __construct() {
        parent::__construct();

// Load form helper library
        $this->load->helper('form');

// Load form validation library
        $this->load->library('form_validation');

// Load session library
        $this->load->library('session');

// Load database
        $this->load->model('login_database');

// Load md5		
        $this->load->helper('security');
// Load email library				
        $this->load->library('email');
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
    }

// Show login page

    public function login() {
        if ($this->login_database->is_logged_in()) {
            redirect(base_url() . 'dashboard');
        } else {
            $this->load->view('user/login_form');
        }
    }

// Show registration page
    public function registration() {
        $this->load->view('user/registration_form');
    }

// Validate and store registration data in database
    public function new_user_registration() {

// Check validation for user input in SignUp form
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            //$this->load->view('user/registration_form');
        } else {
            $email_code = uniqid();
            $data = array(
                'name' => $this->input->post('name'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => do_hash($this->input->post('password'), 'md5'),
                'emailcode' => $email_code
            );
            $result = $this->login_database->registration_insert($data);
            if ($result == TRUE) {
//                $data['message_display'] = 'Registration Successfully !';
//                $subject = "Email Verification";
//                $message = "Welcome " . $data['username'] . " to Admin Automator. To verify click Here:" . base_url() . "user/verify?code=" . $email_code . "&usnm=" . $data['username'];
               // $this->login_database->sendemail($data['email'], $subject, $message);
                //$this->load->view('login_form', $data);
               echo json_encode(array("success" => "true"));
            } else {
                $data['message_display'] = 'Username already exist!';
//                //$this->load->view('user/registration_form', $data);
            }
        }
    }

// Check for user login process
    public function user_login_process() {


        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/login_form');
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => do_hash($this->input->post('password'), 'md5'),
            );
            $result = $this->login_database->login($data);
            if ($result == TRUE) {
                $sess_array = array(
                    'username' => $this->input->post('username')
                );

// Add user data in session
                $this->session->set_userdata('logged_in', $sess_array);
                $result = $this->login_database->read_user_information($sess_array);
                if ($result != false) {
                    $data = array(
                        'id' => $result[0]->id,
                        'name' => $result[0]->name,
                        'username' => $result[0]->username,
                        'email' => $result[0]->email,
                        'permission' => $result[0]->permission
                    );
                    $this->login_database->loginlog($result[0]->id,$this->input->ip_address(),$this->input->user_agent());
                    //	$this->load->view('user/admin_page', $data);
                }$this->session->set_userdata('logged_in', $data);
                $op['login_status'] = "success";
                $op['redirect_url'] = base_url() . 'dashboard';
                echo json_encode($op);
            } else {
                $op['login_status'] = "invalid";
                echo json_encode($op);
            }
        }
    }

// Logout from admin page
    public function logout() {

// Removing session data
        $this->session->sess_destroy();
        $data['message_display'] = 'Successfully Logout';
        redirect(base_url() . 'user/login');
    }

    public function verify() {
        $username = $_GET['usnm'];
        $emailcode = $_GET['code'];
        $query = $this->db->query("SELECT username, emailcode FROM auto_user where username='$username' and emailcode='$emailcode'");
        if ($query->num_rows() == 1) {
            $this->db->query("Update auto_user set status = 1 where username='$username' and emailcode='$emailcode'");
            redirect(base_url() . 'user/login');
        }
    }

    public function forgotpassword() {

        if ($this->input->post()) {
            $email = $this->input->post("email");
            $emailcode = uniqid();
            $verified = $this->login_database->checkemailid($email, $emailcode);

            if ($verified == true) {
                $subject = "Forgot Password";
                $message = "Hello You have requested for new password. Please click Here: " . base_url() . "user/newpassword?email=" . $email . "?emailcode=" . $emailcode;
                $this->login_database->sendemail($email, $subject, $message);
                $submitted_data['email'] = $email;
                echo json_encode($submitted_data);
            }
        } else {
            $this->load->view('user/forgotpassword');
        }
    }

    public function changepassword() {
        if (isset($_GET['email']) && isset($_GET['emailcode'])) {
            $email = $_GET['email'];
            $emailcode = $_GET['emailcode'];
            $password = $this->input->post("password");
            $changedpw = $this->login_database->changepassword($email, $emailcode, $password);
        } else {
            return FALSE;
        }

        $this->load->view('user/changepassword');
    }

    public function editpassword() {
        if ($this->login_database->is_logged_in()) {
            $role = $this->session->userdata('logged_in');
            $user_data = $this->session->all_userdata();
            $id = $user_data['logged_in']['id'];
            if ($this->input->post()) {
                //$oldpassword = $this->input->post("oldpassword");
                $newpassword = do_hash($this->input->post("newpassword"), 'md5');
                $confirmpassword = do_hash($this->input->post("confirmpassword"), 'md5');
                if ($newpassword == $confirmpassword) {
                    $checked = $this->login_database->editpassword($id, $newpassword);
                    if ($checked == true) {
                        $message = "Your password is Successfully Changed";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                    } //else {
//                $message = "Your password is not Changed.(Can be your old password is incorrect.)";
//                echo "<script type='text/javascript'>alert('$message');</script>";
//            }
                } else {
                    $message = "Please Enter Same Password";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }
            }


            $data['title'] = "Edit Password";
            $data['permission'] = $role['permission'];
            $data['main_content'] = "user/editpassword";
            $this->load->view('template/template', $data);
        } else {
            redirect(base_url() . 'user/login');
        }
    }

    public function editprofile() {
        if ($this->login_database->is_logged_in()) {
            $role = $this->session->userdata('logged_in');
            $data['user_detail'] = $this->login_database->editprofile();
            $data['title'] = "Edit Profile";
            $data['permission'] = $role['permission'];
            $data['main_content'] = "user/editprofile";
            $this->load->view('template/template', $data);
        } else {
            redirect(base_url() . 'user/login');
        }
    }

    public function updateprofile() {
        $id = $this->input->post('id');
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
                //'username' => $this->input->post('username')
        );

        $success = $this->login_database->updateprofile($data, $id);
        if ($success == true) {
            redirect('dashboard/index', $data);
        }
    }

    public function changepic() {
        if ($this->login_database->is_logged_in()) {
            $role = $this->session->userdata('logged_in');
            $user_data = $this->session->all_userdata();
            $id = $user_data['logged_in']['id'];
            $config = array(
                'upload_path' => "uploads/",
                'allowed_types' => "jpg",
                'overwrite' => TRUE,
                'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "10240",
                'max_width' => "10240",
                'file_name' => $id . '.jpg'
            );
            if ($this->input->post()) {
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('userfile')) {
                    redirect('dashboard/index', $data);
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $data['title'] = "Change Profile Picture";
                    $data['permission'] = $role['permission'];

                    $data['error_content'] = "<p>" . implode("<p>", $error) . "</p>";
                    $data['main_content'] = "user/changepic";

                    $this->load->view('template/template', $data);
                }
            } else {
                $data['title'] = "Change Profile Picture";
                $data['permission'] = $role['permission'];
                $data['main_content'] = "user/changepic";
                $this->load->view('template/template', $data);
            }
        } else {
            redirect(base_url() . 'user/login');
        }
    }

}
