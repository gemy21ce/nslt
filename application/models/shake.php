<?php
class Shake extends DataMapper {
    var $table='shakes';
    var $model='shake';
    var $has_one=array('file');
    var $has_many = array('menu_shake');
     function  __construct() {
         parent::__construct();
    }
}

?>