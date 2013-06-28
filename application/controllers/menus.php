<?php

class Menus extends CI_Controller {

    function __construct() {
        parent::__construct();
//        $this->_is_logged_in();
    }

    public function index() {
        echo 'hellow';
//        $this->load->helper('language');
//        $this->lang->load('home');
//        $user = new User();
//        $userObject = $this->session->all_userdata();
//        $userObject = $user->get_by_email($userObject['email']);
//        $data['user'] = $userObject;
//        $data['main_content'] = 'frontend/payment_view';
//        $this->load->view('frontend/includes/template', $data);
//        $data['main_content'] = 'frontend/home_view';
//        $this->load->view('frontend/includes/template', $data);
    }
    
    public function createmenu(){
        $this->load->helper('language');
        $this->lang->load('home');
        $data['tab'] = $this->uri->segment(4);
        $data['subtab'] = $this->uri->segment(5);
        $data['main_content'] = 'frontend/menu_form_view';
        $this->load->view('frontend/includes/template', $data);
    }
    
    function saveMenu() {
        $menu = new Menu();
        $menu->name = $this->input->get('name');
        $menu->phone = $this->input->post('phone');
        $menu->mobile = $this->input->post('mobile');
        $menu->email = $this->input->post('email');
        $menu->address = $this->input->post('address');
        $menu->sales_man = $this->input->post('sales_man');
        $menu->menu_title = $this->input->post('menu_title');
//        $plate = new Plate();
//        $plate->id=$this->input->get('plate');
//        $menu->plates = array($this->input->get('plate'));
        $menu->user = 1;
        $menu->save();
        $plate = new Plate();
        $plate->id = 2;
        $menuPlate = new Menu_Plate();
        $menuPlate->plate_id = $plate->id;
        $menuPlate->menu_id = $menu->id;
        $menuPlate->save();
//        echo 'eshta';
    }

}

?>
