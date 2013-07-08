<?php
class Plate extends DataMapper {
    var $table='plates';
    var $model='plate';
    var $has_one=array('file');
    var $has_many = array('menu_plate');
     function  __construct() {
         parent::__construct();
    }
}

?>