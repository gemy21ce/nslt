<?php
class Shake extends DataMapper {
    var $table='shake';
    var $model='shake';
    var $has_one=array('file');
    var $has_many = array('menu');
     function  __construct() {
         parent::__construct();
    }
}

?>