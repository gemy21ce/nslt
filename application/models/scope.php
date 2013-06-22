<?php
class Scope extends DataMapper {
    var $table='scope';
    var $model='scope';
    var $has_one=array('file');
    var $has_many = array('menu');
     function  __construct() {
         parent::__construct();
    }
}

?>