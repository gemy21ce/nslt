<?php
class Type extends DataMapper {
    var $table='types';
    var $model='type';
    var $has_one=array('file');
    var $has_many = array('menu');
     function  __construct() {
         parent::__construct();
    }
}

?>