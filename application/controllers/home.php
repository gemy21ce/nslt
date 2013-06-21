<?php

/*
 * home page controller
 */
include_once 'mail/Mailer.php';

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('configuration_model');
        $this->load->model('Tshirt');
        $this->session->set_flashdata('redirectToCurrent', current_url());
    }

    function index() {
        $this->load->helper('language');
        $this->lang->load('home');
        $tshirt = new Tshirt();
        $tshirt->order_by("id", "desc");
        $tshirt_list = $tshirt->get(8, 0);
        $data['tshirt_list'] = $tshirt_list;
        $tshirt2 = new Tshirt();
        $tshirt2->order_by("id", "desc");
        $tshirt2->order_by("views", "desc");
        $tshirt2->where_not_in('id', $tshirt_list);
        $data['most_viewed'] = $tshirt2->get(4, 0);
        $data['main_content'] = 'frontend/home_view';
        $this->load->view('frontend/includes/template', $data);
    }

    function getTshirt() {
        if ($this->uri->segment(4) != null) {
            $tshirt = new Tshirt();
            $id = $this->uri->segment(4);
            $data['tshirt'] = $tshirt->get_by_id($id);
        }
        $this->load->view('frontend/tshirt_facebook_view', $data);
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

    function reserve() {
        $reservedTshirt = new ReservedTshirt();
        $reservedTshirt->name = $this->input->post('name');
        $reservedTshirt->email = $this->input->post('email');
        $reservedTshirt->size_id = $this->input->post('size');
        $reservedTshirt->sex_id = $this->input->post('sex');
        $reservedTshirt->color_id = $this->input->post('color');
        $reservedTshirt->tshirt_id = $this->input->post('tshirt');
        $reservedTshirt->save();
        echo 'Thanks.';
    }

    function cart() {
        $this->load->view('frontend/cart_view');
    }

    function about_3ash() {
        $this->load->helper('language');
        $this->lang->load('home');
        $data['main_content'] = 'frontend/aboutus_view';
        $this->load->view('frontend/includes/template', $data);
    }

    function contact_3ash() {
        $this->load->helper('language');
        $this->lang->load('home');
        $data['main_content'] = 'frontend/contactus_view';
        $this->load->view('frontend/includes/template', $data);
    }

    /*
    function run_Promotions_Emails_Sendings() {
        $res = new ReservedTshirt();
        $ts = $res->get();
        //* formated url /(3)promotion/(4){r_id}/(5){code}
        $mail = new Mailer();
        $conf = $this->configuration_model->get();
        $sentmail = $conf->email;
        $sentpassword = $conf->password;

        foreach ($ts as $t) {
            $arURL = 'http://www.3ash.net/ar/tshirts/promotion/' . $t->id . '/' . $t->code;
            $enURL = 'http://www.3ash.net/en/tshirts/promotion/' . $t->id . '/' . $t->code;
            unset($data);
//            $data[] = array();
            $data[] = $t->email;
            $data[] = 'sales@3ash.net';
            $subject = '3ash Pre-Order Confirmation!';
            $messagear = '<p style="text-align:right" dir="rtl">' .
                    'عزيزي/عزيزتي ' . $t->name . ',<br/>' .
                    ' شكرا لقيامك بالطلب المسبق من  <a dir="ltr">3ash.net</a><br/><br/></br>' .
                    'لقد واجهنا مشكلة في خادم البريد الإلكتروني ونأسف للإزعاج الذي سببنها لك. رجاء قم بإتباع التعليمات التي بالإسفل لإنهاء طلب الشراء.' . '<br/><br/>' .
                    '<strong>سيتم تسليم التيشرتات في غضون أسبوعين. نأسف على التأخير لكن نعدك أن تشيرتات عاش ستحوز على إعجابك :)<br/>' .
                    'نرجو أن تقوم بالضغط على الرابط التالي لتأكيد الحجز وإستكمال بياناتك<br/></strong>' .
                    '<br/>' . '<a href="' . $arURL . '">' . $arURL . '</a>' . '<br/>' .
                    '<br/>' .
                    'شكرا لك مرة أخرى ,<br/>' .
                    'فريق <strong>3ash</strong>' .
                    '</p>';
            $messageen = '<p style="text-align:left" dir="ltr">' . 'Dear ' . $t->name . ',<br/>' .
                    'Thank you for pre-order from 3ash.net' . '<br/>' . '<br/>' . '<br/>' .
                    'We had a problem with our email service and we apologize for the inconvenience due to it. Please follow the instructions below again to complete the order' . '<br/>' . '<br/>' .
                    '<strong>The t-shirts will be delivered within 2 weeks. Sorry for the delay, but we promise you that you will love our t-shirts :)' . '<br/>' . '<br/>' .
                    'Please click on the URL below to confirm the order and complete your information</strong>' . '<br/>' . '<br/>' .
                    '<a href="' . $enURL . '">' . $enURL . '</a>' . '<br/><br/>' .
                    'Thank you again,<br/>' .
                    '<strong>3ash</strong> Team' . '</p>';

            //$mail->SendTaskMail($data, $subject, $sentmail, $messagear . '<br/>' . '<br/>' . $messageen, $sentmail, $sentpassword);


            $d['email'] = $t->email;
            $d['name'] = $t->name;
            $d['message'] = $messagear . '<br/>' . '<br/>' . $messageen;
            $ds[] = $d;

            $t->where('id', $t->id)->update('gotmail', '1');
        }
        $data['ds'] = $ds;
        $this->load->helper('language');
        $this->lang->load('home');
        $data['main_content'] = 'frontend/includes/mtemplate';
        $this->load->view('frontend/includes/template', $data);
    }
*/
}

?>
