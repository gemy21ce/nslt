<?php

include_once 'mail/Mailer.php';

class Menus extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('configuration_model');
        $this->_is_logged_in();
    }

    public function index() {
        $this->load->helper(array('form', 'url'));
        $this->load->helper('language');
        $this->lang->load('home');
        $data['main_content'] = 'frontend/home_view';
        $this->load->view('frontend/includes/template', $data);
    }

    public function createmenu() {
        $this->load->helper('language');
        $this->lang->load('home');
        $data['tab'] = $this->uri->segment(4);
        $data['subtab'] = $this->uri->segment(5);
        $data['main_content'] = 'frontend/menu_form_view';
        $this->load->view('frontend/includes/template', $data);
    }

    function saveMenu() {

        $menu = new Menu();
        $menu->name = $this->input->post('name');
        $menu->phone = $this->input->post('phone');
        $menu->mobile = $this->input->post('mobile');
        $menu->email = $this->input->post('email');
        $menu->address = $this->input->post('address');
        $menu->sales_man = $this->input->post('sales');
        $menu->menu_title = $this->input->post('title');
        $menu->quantity = $this->input->post('quantity');
        $menu->type_id = $this->input->post('type');
        $menu->theme_id = $this->input->post('theme');
        //set user
        $menu->user_id = $this->session->userdata('id');




        //uploading logo
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '100000';
        $config['max_width'] = '4048';
        $config['max_height'] = '4048';

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('logo')) {
            $upload_data = $this->upload->data();
            $file = new File();
            $file->name = $upload_data['file_name'];
            $file->path = 'uploads/' . $upload_data['file_name'];
            $file->save();
            $menu->file_id = $file->id;
        }

        //saving menu
        $menu->save();
        //save scoops
        $scoops = $this->input->post('scoop');

        foreach ($scoops as $scoop) {
            $menu_scoop = new Menu_Scope();
            $menu_scoop->menu_id = $menu->id;
            $menu_scoop->scope_id = $scoop;
            $menu_scoop->price = $this->input->post('scoop_' . $scoop . "_price");
            $menu_scoop->save();
        }

        //save shakes
        $shakes = $this->input->post('shake');

        foreach ($shakes as $shake) {
            $menu_shake = new Menu_Shake();
            $menu_shake->menu_id = $menu->id;
            $menu_shake->shake_id = $shake;
            $menu_shake->price = $this->input->post('shake_' . $shake . "_price");
            $menu_shake->save();
        }

        //save plates
        $plates = $this->input->post('plate');
        foreach ($plates as $plate) {
            $menu_plate = new Menu_Plate();
            $menu_plate->menu_id = $menu->id;
            $menu_plate->plate_id = $plate;
            $menu_plate->price = $this->input->post('plate_' . $plate . "_price");
            $menu_plate->save();
        }

        $msg = 'A new Nestle menu has created click on the following link to see menu detials:<br/>' .
                '<a href="' . base_url() . '/en/admin/get/' . $menu->id . '">' . base_url() . '/en/admin/get/' . $menu->id . '</a>';
        $this->sendMail($msg);
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

    function sendMail($msg) {
        $mail = new Mailer();
        $conf = $this->configuration_model->get();
        $sentmail = $conf->email;
        $sentpassword = $conf->password;
//        unset($data);
//        $data[] = array($conf->receiver_mail_1,$conf->receiver_mail_2);
        $subject = 'Menu created';

        $mail->SendTaskMail(array($conf->receiver_mail_1, $conf->receiver_mail_2), $subject, $sentmail, $msg, $sentmail, $sentpassword);
    }

    function _is_logged_in() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            $this->session->set_flashdata('redirectToCurrent', current_url());
            redirect("home/login");
            die();
        }
    }

}

?>
