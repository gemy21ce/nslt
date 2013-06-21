<?php

include_once 'mail/Mailer.php';

class Payment extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->_is_logged_in();
    }

    function index() {
        $this->load->helper('language');
        $this->lang->load('home');
        $user = new User();
        $userObject = $this->session->all_userdata();
        $userObject = $user->get_by_email($userObject['email']);
        $data['user'] = $userObject;
        $data['main_content'] = 'frontend/payment_view';
        $this->load->view('frontend/includes/template', $data);
    }

    function ordersummery() {
        $this->load->helper('language');
        $this->lang->load('home');
        $this->load->model('Orders');
        $this->load->model('User');
        $user = new User();
        $userObject = $this->session->all_userdata();
        $userObject = $user->get_by_email($userObject['email']);
        $data['user'] = $userObject;
        $order = new Orders();
        $order->where("user_id", $userObject->id);
        $status[] = "WAITING";
        $status[] = "DELIVERED";
        $status[] = "PROCESSING";
        $order->where_in("status", $status);
        $orderResult = $order->get();
        $data['orders'] = $orderResult;
        $data['main_content'] = 'frontend/order_summery_view';
        $this->load->view('frontend/includes/template', $data);
    }

    function cancelorder() {
        if ($this->uri->segment(4) != null) {
            $tshirt = new Tshirt();
            $id = $this->uri->segment(4);
            $this->load->model('Orders');
            $order = new Orders();
            $orderObject=$order->get_by_id($id);
            if($orderObject->status=='WAITING'){
                $order->status='CANCELLED';
                $order->save();
            }
            
        }

        redirect("payment/ordersummery");
    }

    function saveorder() {
        $this->load->helper('language');
        $this->lang->load('home');
        $this->load->library('parser');

        if ($cart = $this->cart->contents()) {
            $user = new User();
            $userObject = $this->session->all_userdata();
            $userObject = $user->get_by_email($userObject['email']);
            $orders = new Orders();
            $orders->user_id = $userObject->id;
            $orders->order_date = date("Y-m-d H:i:s");
            $orders->address = $this->input->post('address');
            $orders->ip = $this->_get_ip_address();
            $orders->save();
            $colorObject = new Color();
            $sexObject = new Sex();
            $sizeObject = new Size();
            $details = array();
            foreach ($cart as $item) {
                if ($this->cart->has_options($item['rowid'])) {

                    foreach ($this->cart->product_options($item['rowid']) as $option => $value) {
                        if ($option == 'Sex')
                            $sex = $value;
                        elseif ($option == 'Size')
                            $size = $value;
                        else
                            $color = $value;
                    }
                }
                $orderitems = new OrderItems();
                $orderitems->order_id = $orders->id;
                $orderitems->tshirts_id = $item['id'];
                $orderitems->quantity = $item['qty'];
                $orderitems->price = $item['price'];
                $orderitems->color_id = $colorObject->get_by_color($color)->id;
                $orderitems->size_id = $sizeObject->get_by_name($size)->id;
                $orderitems->sex_id = $sexObject->get_by_sex($sex)->id;
                $orderitems->save();
                array_push($details, array('url' => base_url() . $this->lang->lang() . '/tshirts/get/3ash/' . $item['id'], 'sex' => $sex, 'color' => $color, 'size' => $size, 'qty' => $item['qty']));
            }
            $templatedata = array(
                'name' => $user->name,
                'total' => $this->cart->total(),
                'details' => $details
            );
            $templatestring = $this->parser->parse('frontend/order_mail_template', $templatedata, true);
            $this->_sendmail($user->email, $user->name, $templatestring);
        }
        $this->cart->destroy();
        $data['main_content'] = 'frontend/order_state_view';
        $this->load->view('frontend/includes/template', $data);
    }

    function _is_logged_in() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            $this->session->set_flashdata('redirectToCurrent', current_url());
            redirect("usermanager/accessdenaied");
            die();
        }
    }

    function _get_ip_address() {
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    if (filter_var($ip, FILTER_VALIDATE_IP) !== false) {
                        return $ip;
                    }
                }
            }
        }
    }

    function _sendmail($userMail, $userName, $message) {
        $this->load->model('configuration_model');
        $this->load->helper('language');
        $this->lang->load('home');
        $mail = new Mailer();
        $conf = $this->configuration_model->get();
        $sentmail = $conf->email;
        $sentpassword = $conf->password;
        $data = array($userMail, 'sales@3ash.net');
        $mail->SendTaskMail($data, "T-shirts order", $sentmail, $message, $sentmail, $sentpassword);
    }

}

?>
