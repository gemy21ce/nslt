<?php
class Plate extends DataMapper {
    var $table='plate';
    var $model='plate';
    var $has_one=array('file');
    var $has_many = array('menu');
     function  __construct() {
         parent::__construct();
    }
}

?>