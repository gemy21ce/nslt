<?php

class Tshirts extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('configuration_model');
        $this->load->model('Tshirt');
        $this->session->set_flashdata('redirectToCurrent', current_url());
    }

    function get() {
        $this->load->helper('language');
        $this->lang->load('home');
        $sex = $this->uri->segment(6) + 1;
        $color = $this->uri->segment(7) + 1;
        if ($this->uri->segment(5) != null) {
            $tshirt = new Tshirt();
            $id = $this->uri->segment(5);
            $shirt = $tshirt->get_by_id($id);
            $tshirt->where('id', $id)->update('views', $shirt->views + 1);
            if (!$shirt->id) {
                show_error('not found', 404);
            }
            $data['tshirt'] = $shirt;
            $tshirt2 = new Tshirt();
            $tshirt2->where_not_in('id', $id);
            $data['related'] = $tshirt2->order_by('id', "random")->get(1);
            $data['sex'] = $sex;
            $data['color'] = $color;
        } else {
            show_error('not found', 404);
        }
        $data['main_content'] = 'frontend/tshirt_view';
        $this->load->view('frontend/includes/template', $data);
    }

    function cart_add() {
        $this->load->helper('language');
        $tshirt = new Tshirt();
        $tshirtObject = $tshirt->get_by_id($this->input->post('id'));
        $tshirtObject->file->get();
        $sex = new Sex();
        $color = new Color();
        $size = new Size();
        $colorname = $color->get_by_id($this->input->post('color'))->color;
        if ($this->input->post('sex') == 1) {
            $sexName = "man";
        } else {
            $sexName = "woman";
        }
        $imageurl = base_url() . $tshirtObject->file->path . "w-" . $sexName . "-" . $colorname . "-" . $tshirtObject->file->name;
        $data = array(
            'id' => $tshirtObject->id,
            'name' => $imageurl,
            'qty' => 1,
            'price' => $tshirtObject->price,
            'options' => array('Size' => $size->get_by_id($this->input->post('sizenumber'))->name, 'Color' => $colorname, 'Sex' => $sex->get_by_id($this->input->post('sex'))->sex)
        );
        $this->cart->insert($data);
        if ($this->input->post('gotoBasket') == '1') {
            redirect($this->lang->lang() . "/tshirts/cart");
        }else
            redirect($this->lang->lang() . "/home");
    }

    function cart_remove($rowid) {

        $this->cart->update(array(
            'rowid' => $rowid,
            'qty' => 0
        ));

        redirect($this->lang->lang() . "/tshirts/cart");
    }

    function cart_destroy() {

        $this->cart->destroy();
        redirect($this->lang->lang() . "/home");
    }

    function cart() {
        if (!$this->cart->contents()) {
            redirect($this->lang->lang() . "/home");
        }
        $this->load->helper('language');
        $this->lang->load('home');
        $data['main_content'] = 'frontend/cart_view';
        $this->load->view('frontend/includes/template', $data);
    }

    function cart_update($rowid) {

        $data = array(
            'rowid' => $rowid,
            'qty' => '1'
        );

        $this->cart->update($data);
        echo "update() called";
    }

    function men() {
        $this->load->helper('language');
        $this->lang->load('home');
        $tshirt = new Tshirt();
        $data['tshirts'] = $tshirt->get();
        $data['main_content'] = 'frontend/men_view';
        $this->load->view('frontend/includes/template', $data);
    }

    function women() {
        $this->load->helper('language');
        $this->lang->load('home');
        $tshirt = new Tshirt();
        $data['tshirts'] = $tshirt->get();
        $data['main_content'] = 'frontend/women_view';
        $this->load->view('frontend/includes/template', $data);
    }

    function promotion() {
        /*
         * formated url /(3)promotion/(4){r_id}/(5){code}
         * //(3)promotion/(4){t_id}/(5){t_name}/(6){t_size}/(7){t_color}/(8){t_sex}/(9){code}
         */
        $this->load->helper('language');
        $this->lang->load('home');
        $code = $this->uri->segment(5);
        if ($this->uri->segment(4) != null && $this->uri->segment(5)) {
            $tshirt = new Tshirt();
            $id = $this->uri->segment(4);
            $reservedtshirt = new ReservedTshirt();
            $promo = $reservedtshirt->get_by_id($id);
            if (!$promo->id || $promo->code == null || $promo->code != $code) {
                redirect(base_url() . $this->lang->lang() . "/home");
            }

            $data['tshirt'] = $tshirt->get_by_id($promo->tshirt_id);

            $data['code'] = $promo->code;
            $data['size'] = $promo->size_id;
            $data['color'] = $promo->color_id;
            $data['sex'] = $promo->sex_id;
            $data['name'] = $promo->name;
            $data['email'] = $promo->email;
        } else {
            redirect(base_url() . $this->lang->lang() . "/home");
        }
        $data['main_content'] = 'frontend/promotion_view';
        $this->load->view('frontend/includes/template', $data);
    }

    function add_promotion_cart() {
        $code = $this->uri->segment(4);
        $reservedtshirt = new ReservedTshirt();
        $promo = $reservedtshirt->get_by_code($code);

        $this->load->helper('language');
        $tshirt = new Tshirt();
        $tshirtObject = $tshirt->get_by_id($promo->tshirt_id);
        $tshirtObject->file->get();
        $sex = new Sex();
        $color = new Color();
        $size = new Size();
        $colorname = $color->get_by_id($promo->color_id)->color;
        if ($this->input->post('sex') == 1) {
            $sexName = "man";
        } else {
            $sexName = "woman";
        }
        $imageurl = base_url() . $tshirtObject->file->path . "w-" . $sexName . "-" . $colorname . "-" . $tshirtObject->file->name;
        $data = array(
            'id' => $tshirtObject->id,
            'name' => $imageurl,
            'qty' => 1,
            'price' => 89,
            'options' => array('Size' => $size->get_by_id($promo->size_id)->name, 'Color' => $colorname, 'Sex' => $sex->get_by_id($promo->sex_id)->sex)
        );
        $this->cart->insert($data);
        $reservedtshirt->where('id', $promo->id)->update('code', '');
        if ($this->input->post('gotoBasket') == '1') {
            redirect($this->lang->lang() . "/tshirts/cart");
        }else
            redirect($this->lang->lang() . "/home");
    }
/*
    function p() {
        $reservedtshirt = new ReservedTshirt();
        $promo = $reservedtshirt->get();
        foreach ($promo as $p) {
            $reservedtshirt->where('id', $p->id)->update('code', sha1($p->email . $p->id . $p->size_id . $p->name . '3ash'));
        }
    }
*/
}

?>
