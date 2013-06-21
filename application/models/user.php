<?php

class User extends DataMapper {

    var $table = 'user';
    var $model = 'user';
    var $has_one = array('country', 'city', 'sex');
    var $has_many = array('orders');

    function __construct() {
        parent::__construct();
    }

}

?>