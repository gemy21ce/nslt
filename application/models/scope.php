<?php
class Scope extends DataMapper {
    var $table='scopes';
    var $model='scope';
    var $has_one=array('file');
    var $has_many = array('menu');
     function  __construct() {
         parent::__construct();
    }
}

?>