<?php

/*
 * home page controller
 */
include_once 'mail/Mailer.php';

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('configuration_model');
        $this->load->model('Menu');
        $this->session->set_flashdata('redirectToCurrent', current_url());
    }

    function index() {
        $this->load->helper('language');
        $this->lang->load('home');
        $data['main_content'] = 'frontend/home_view';
        $this->load->view('frontend/includes/template', $data);
    }

    function sendmail() {
        $mail = new Mailer();
        $conf = $this->configuration_model->get();
        $sentmail = $conf->email;
        $sentpassword = $conf->password;
        if (!empty($conf->receiver_mail_1))
            $data[] = $conf->receiver_mail_1;
        if (!empty($conf->receiver_mail_2))
            $data[] = $conf->receiver_mail_2;
        if (!empty($conf->receiver_mail_3))
            $data[] = $conf->receiver_mail_3;
        $name = $this->input->post('name');
        $clientMail = $this->input->post('email');
        $message = $this->input->post('message');
        $mail->SendTaskMail($data, $name, $sentmail, $clientMail . ' has sent the following :' . $message, $sentmail, $sentpassword);

        redirect($this->lang->lang() . "/home");
    }

    function login() {
        $this->load->helper('language');
        $this->lang->load('home');
        $data['main_content'] = 'frontend/login_view';
        $this->load->view('frontend/includes/template', $data);
    }

    function signin() {
        $user = new User();
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user->where('username', $username);
//        $user->where('password', sha1($password));
        $user->where('password', $password);
        $loadedUser = $user->get();
        
        if ($loadedUser->id) {

            $data = array(
                'username' => $loadedUser->name,
                'admin' => $loadedUser->type,
                'id'=>$loadedUser->id,
                'is_logged_in' => true
            );
            
            $this->session->set_userdata($data);
            
            $user->where('username',$username)->update('last_login', date("Y-m-d H:i:s"));

            if ($loadedUser->type == 'admin') {
                redirect(base_url() . 'en/admin');
                return;
            }

            $url = base_url() . $this->lang->lang() . '/menus/createmenu';

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

    function logout() {
        $this->session->unset_userdata($this->session->all_userdata());
        $this->session->sess_destroy();
        redirect($this->lang->lang() . "/home");
    }

}

?>
