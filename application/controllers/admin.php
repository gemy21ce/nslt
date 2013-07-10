<?php

include_once 'mail/Mailer.php';

class admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('configuration_model');
        $this->load->model('Menu');
//        $this->_is_logged_in();
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
        $menu_list = $menu1->get(25,0);
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

}

?>
