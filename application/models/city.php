<?php
class city extends DataMapper {
    var $table='city';
    var $model='city';
    var $has_many = array('user');
    var $has_one=array('country');
     function  __construct() {
         parent::__construct();
    }
}

?>