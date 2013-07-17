<?php

include_once 'mail/Mailer.php';

class admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('configuration_model');
        $this->load->model('Menu');
        $this->load->model('User');
        $this->_is_logged_in();
    }

    public function index() {
        $this->load->helper('language');
        $this->lang->load('home');
        $data['main_content'] = 'admin/home_view';
        $this->load->view('frontend/includes/menuTemplate', $data);
    }

    public function menus() {
        $this->load->helper('language');
        $this->lang->load('home');

        $menu1 = new Menu();
        $menu1->order_by("id", "desc");
        $menu_list = $menu1->get(25, 0);
        $data['menus'] = $menu_list;

        $data['main_content'] = 'admin/menus_view';
        $this->load->view('frontend/includes/menuTemplate', $data);
    }

    function get() {

        $this->load->helper('language');
        $this->lang->load('home');

        $menu_id = $this->uri->segment(4);
        $menu1 = new Menu();
        $menu = $menu1->get_by_id($menu_id);
        $menu->file->get();
        $menu->menu_scopes->get();

        $data['menu'] = $menu;
        $data['main_content'] = 'frontend/menu_view';
        $this->load->view('frontend/includes/menuTemplate', $data);
    }

    public function users() {
        $this->load->helper('language');
        $this->lang->load('home');

        $user = new User();
        $user->order_by("id", "desc");
        $data['users'] = $user->get(50, 0);
        ;

        $data['main_content'] = 'admin/users_view';
        $this->load->view('frontend/includes/menuTemplate', $data);
    }

    public function usermenus() {
        $this->load->helper('language');
        $this->lang->load('home');

        $userId = $this->uri->segment(4);
        $menu1 = new Menu();
        $menu1->where("user_id", $userId);
        $menu_list = $menu1->get(25, 0);

        $data['menus'] = $menu_list;
        $data['main_content'] = 'admin/menus_view';
        $this->load->view('frontend/includes/menuTemplate', $data);
    }

    public function createuser() {
        $this->load->helper('language');
        $this->lang->load('home');
        $data['error'] = $this->input->get('error');
        $data['main_content'] = 'admin/create_user_view';
        $this->load->view('frontend/includes/menuTemplate', $data);
    }

    public function saveuser() {
        $user = new User();

        $user->where("username", $this->input->post('username'));

        $users = $user->get(10, 0);
        $hasElement = false;
        foreach ($users as $u) {
            $hasElement = true;
        }

        if ($hasElement) {
            redirect(base_url() . $this->lang->lang() . "/admin/createuser?error=usernameexist");
            return;
        }

        $user2 = new User();
        $user2->name = $this->input->post('name');
        $user2->email = $this->input->post('email');
        $user2->username = $this->input->post('username');
        $user2->phone = $this->input->post('phone');
        $user2->password = $this->input->post('password');
        $user2->type = $this->input->post('type');
        $user2->registration_date =  date("Y-m-d H:i:s");

        $user2->save();

        redirect(base_url() . $this->lang->lang() . "/admin/users");
    }

    function _is_logged_in() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        $admin = $this->session->userdata('admin');
        if (!isset($is_logged_in) || $is_logged_in != true || $admin != 'admin') {
            $this->session->set_flashdata('redirectToCurrent', current_url());
            redirect("home/login");
            die();
        }
    }

}

?>
