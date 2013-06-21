<?php

class Configuration_Model extends CI_Model {

    function save() {
        $new_configuration_insert = array(
            'keywords' => $this->input->post('keywords'),
            'email' => $this->input->post('email'),
            'facebook' => $this->input->post('facebook'),
            'twitter' => $this->input->post('twitter'),
            'sitemap' => $this->input->post('sitemap'),
            'receiver_mail_1' => $this->input->post('receiver_mail_1'),
            'receiver_mail_2' => $this->input->post('receiver_mail_2'),
            'receiver_mail_3' => $this->input->post('receiver_mail_3'),
            'password' => $this->input->post('password')
        );
        if ($this->input->post('id')=='')
            $insert = $this->db->insert('user', $new_configuration_insert);
        else {
            $this->db->where('id', $this->input->post('id'));
            $insert = $this->db->update('configuration', $new_configuration_insert);
        }


        return $insert;
    }



    function get() {
        $q = $this->db->where('id', 1);
        $q = $this->db->get("configuration", 1);
        return $q->row();
    }

}

?>
