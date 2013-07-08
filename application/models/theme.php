<?php
class Theme extends DataMapper {
    var $table='themes';
    var $model='theme';
    var $has_one=array('file');
    var $has_many = array('menu');
     function  __construct() {
         parent::__construct();
    }
}

?>