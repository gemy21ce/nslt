<?php
class Shape extends DataMapper {
    var $table='shape';
    var $model='shape';
    var $has_one=array('file');
    var $has_many = array('menu');
     function  __construct() {
         parent::__construct();
    }
}

?>