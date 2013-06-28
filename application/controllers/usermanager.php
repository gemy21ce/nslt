<?php

/*
 * home page controller
 */
include_once 'mail/Mailer.php';

//url: ("/${lang}/UserManager/${function}")
class UserManager extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function signup() {
        $this->load->helper('language');
        $this->lang->load('home');
        $user = new User();
        $user->name = $this->input->post('name');
        $user->email = $this->input->post('email');
        $user->password = sha1($this->input->post('pass'));
        $user->sex_id = $this->input->post('sex');
        $user->city_id = $this->input->post('city');
        $user->phone = $this->input->post('phone');
        $user->country_id = $this->input->post('country');
        $user->registration_date = date("Y-m-d H:i:s");
        $user->birth_day = $this->input->post('year') . '-' . $this->input->post('month') . '-' . $this->input->post('day');
        $user->address = $this->input->post('address');
        if ($this->input->post('target-url')) {
            $user->status = 'ACTIVE';
            $user->save();
            $data = array(
                'email' => $user->email,
                'username' => $user->name,
                'is_logged_in' => true
            );
            $this->session->set_userdata($data);
            redirect($this->input->post('target-url'));
        } else {
            $user->status = 'WAITING';
            $user->save();
            $this->_sendmail($user->email, $user->name, $user->id);
            $data['message'] = 'signupsuccess';
            $data['main_content'] = 'frontend/message_view';
            $this->load->view('frontend/includes/template', $data);
        }
    }

    function _sendmail($userMail, $userName, $id) {
        $this->load->model('configuration_model');
        $this->load->helper('language');
        $this->lang->load('home');
        $mail = new Mailer();
        $conf = $this->configuration_model->get();
        $sentmail = $conf->email;
        $sentpassword = $conf->password;
        $data[] = $userMail;
        $message = 'Dear ' . $userName . ',<br/>'
                . 'Thank you for registering on <a href="http://www.3ash.net" >3ash.net</a>' . '<br/>' . '<br/>'
                . 'Please <a href="' . base_url() . $this->lang->lang() . '/usermanager/verify/' . $id . '/' . sha1($userMail . $userName) . '">click here</a> to verify your mail and complete your registration.</br>'
                . 'or copy ' . base_url() . $this->lang->lang() . '/usermanager/verify/' . $id . '/' . sha1($userMail . $userName) . ' and paste in your browser.<br/><br/>'
                . 'Thanks again,<br/>'
                . '<strong>3ash</strong> Team';
        $mail->SendTaskMail($data, $sentmail, $sentmail, $message, $sentmail, $sentpassword);
    }

    function forgetpassword() {
        $this->load->helper('language');
        $this->lang->load('home');
        $data['main_content'] = 'frontend/forgetpassword_view';
        $this->load->view('frontend/includes/template', $data);
    }

    function forgetpasswordmail() {
        $userm = new User();
        $loaded = $userm->where('email', $this->input->post('e_mail'))->get();
        if ($loaded->id) {
            $this->load->model('configuration_model');
            $conf = $this->configuration_model->get();
            $sentmail = $conf->email;
            $sentpassword = $conf->password;
            $data[] = $loaded->email;
            $mail = new Mailer();
            $mail->SendTaskMail($data, "Change password", $sentmail, "please <a href='" . base_url() . $this->lang->lang() . "/usermanager/changepassword/" . $loaded->email . "/" . sha1($loaded->email . $loaded->password . $loaded->phone) . "'>click here</a> to change your password.</br> or copy " . base_url() . $this->lang->lang() . "/usermanager/changepassword/" . $loaded->email . "/" . sha1($loaded->email . $loaded->password . $loaded->phone) . 'and past in your browser.', $sentmail, $sentpassword);
            $this->load->helper('language');
            $this->lang->load('home');
            $data['message'] = 'forgetpasswordmailmessage';
            $data['main_content'] = 'frontend/message_view';
            $this->load->view('frontend/includes/template', $data);
        } else {
            $this->load->helper('language');
            $this->lang->load('home');
            $data['message'] = 'thisuserisnotexist';
            $data['main_content'] = 'frontend/forgetpassword_view';
            $this->load->view('frontend/includes/template', $data);
        }
    }

    function changepassword() {
        if ($this->uri->segment(4) != null && $this->uri->segment(5) != null) {
            $this->load->helper('language');
            $this->lang->load('home');
            $userm = new User();
            $loaded = $userm->where('email', $this->uri->segment(4))->get();
            if ($loaded->id && ($this->uri->segment(5) == sha1($loaded->email . $loaded->password . $loaded->phone))) {
                $data['usercode'] = $this->uri->segment(5);
                $data['usermail'] = $this->uri->segment(4);
                $data['main_content'] = 'frontend/changepassword_view';
                $this->load->view('frontend/includes/template', $data);
            } else {
                $data['message'] = 'urlerror';
                $data['main_content'] = 'frontend/message_view';
                $this->load->view('frontend/includes/template', $data);
            }
        } else {
            redirect($this->lang->lang() . "/home");
        }
    }

    function savepassword() {
        if ($this->input->post('usermail') != null && $this->input->post('usercode') != null) {
            $this->load->helper('language');
            $this->lang->load('home');
            $userm = new User();
            $loaded = $userm->where('email', $this->input->post('usermail'))->get();
            if ($loaded->id && ($this->input->post('usercode') == sha1($loaded->email . $loaded->password . $loaded->phone))) {
                $userm->password = sha1($this->input->post('e_password'));
                $userm->save();
                $data['message'] = 'passwordchanged';
                $data['main_content'] = 'frontend/message_view';
                $this->load->view('frontend/includes/template', $data);
            } else {
                $data['message'] = 'urlerror';
                $data['main_content'] = 'frontend/message_view';
                $this->load->view('frontend/includes/template', $data);
            }
        } else {
            redirect($this->lang->lang() . "/home");
        }
    }

    function logout() {
        $this->session->unset_userdata($this->session->all_userdata());
        $this->session->sess_destroy();
        redirect($this->lang->lang() . "/home");
    }

    function verify() {

        //check if user logged in.
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($is_logged_in) && $is_logged_in == true) {
            redirect($this->lang->lang() . "/home");
            return;
        }

        $this->load->helper('language');
        $this->lang->load('home');

        if ($this->uri->segment(4) != null) {
            $user = new User();
            $id = $this->uri->segment(4);
            $userObject = $user->get_by_id($id);

            if ($userObject->status == "ACTIVE") {
                $data['main_content'] = 'frontend/verification_unsuccess_view';
                $this->load->view('frontend/includes/template', $data);
                return;
            }
            if ($this->uri->segment(5) != null && (sha1($userObject->email . $userObject->name) == $this->uri->segment(5))) {
                $userObject->status = "ACTIVE";
                $userObject->save();
                $data['username'] = $userObject->name;
                $data['email'] = $userObject->email;
                $data = array(
                    'email' => $userObject->email,
                    'username' => $userObject->name,
                    'is_logged_in' => true
                );
                $this->session->set_userdata($data);

                $data['main_content'] = 'frontend/verification_success_view';
                $this->load->view('frontend/includes/template', $data);
            } else {
                $data['main_content'] = 'frontend/verification_unsuccess_view';
                $this->load->view('frontend/includes/template', $data);
            }
        } else {
            $data['main_content'] = 'frontend/verification_unsuccess_view';
            $this->load->view('frontend/includes/template', $data);
        }
    }

    function login() {
        $user = new User();
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user->where('email', $email);
//        $user->where('password', sha1($password));
        $user->where('password', $password);
        $user->where('status', 'ACTIVE');
        $loadedUser = $user->get();
        if ($loadedUser->id) {
            $data = array(
                'email' => $this->input->post('email'),
                'username' => $loadedUser->name,
                'is_logged_in' => true
            );
            $url = $this->session->flashdata('redirectToCurrent');
            $this->session->set_userdata($data);
            if ($this->input->post('target-url'))
                $url = $this->input->post('target-url');
            redirect($url);
        } else {
            $this->load->helper('language');
            $this->lang->load('home');
            $data['errormessage'] = 'true';
            $data['main_content'] = 'frontend/login_view';
            $this->load->view('frontend/includes/template', $data);
        }
    }

    function checkuser() {
        $userm = new User();
        $loaded = $userm->where('email', $this->input->post('email'))->get();
        if ($loaded->id) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    function accessdenaied() {
        $this->load->helper('language');
        $this->lang->load('home');
        $data['main_content'] = 'frontend/login_view';
        $this->load->view('frontend/includes/template', $data);
    }

    function profile(){
        $this->_is_logged_in();
        $this->load->helper('language');
        $this->lang->load('home');
        $user = new User();
        $userObject = $this->session->all_userdata();
        $userObject = $user->get_by_email($userObject['email']);
        $data['user'] = $userObject;
        $data['main_content'] = 'frontend/profile_view';
        $this->load->view('frontend/includes/template', $data);
    }
    
    function editprofile() {
        $this->_is_logged_in();
        $this->load->helper('language');
        $this->lang->load('home');
        $user = new User();
        $userObject = $this->session->all_userdata();
        $userObject = $user->get_by_email($userObject['email']);
        $data['user'] = $userObject;
        $data['main_content'] = 'frontend/editprofile_view';
        $this->load->view('frontend/includes/template', $data);
    }
    
    function saveprofile() {
        $this->_is_logged_in();
        $this->load->helper('language');
        $this->lang->load('home');
        $userModel = new User();
        $userObject = $this->session->all_userdata();
        $user = $userModel->get_by_email($userObject['email']);

        if($this->input->post('pass')!=''){
            $oldPass = $this->input->post('oldpass');
            if($user->password == sha1($oldPass)){
                $user->password = sha1($this->input->post('pass'));
            }else{
                header('HTTP/1.1 400 Password missmatch!');
                exit(0);
            }
        }
        $user->name = $this->input->post('name');
        $user->sex_id = $this->input->post('sex');
        $user->city_id = $this->input->post('city');
        $user->phone = $this->input->post('phone');
        $user->country_id = $this->input->post('country');
        $user->birth_day = $this->input->post('year') . '-' . $this->input->post('month') . '-' . $this->input->post('day');
        $user->address = $this->input->post('address');
        $user->save();
//        $data['message'] = 'datasaved';
//        $data['main_content'] = 'frontend/message_view';
//        $this->load->view('frontend/includes/template', $data);
    }

    function _is_logged_in() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            $this->session->set_flashdata('redirectToCurrent', current_url());
            redirect("usermanager/accessdenaied");
            die();
        }
    }

}

?>
