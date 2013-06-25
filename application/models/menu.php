<?php
class Menu extends DataMapper {
    var $table='menu';
    var $model='menu';
    var $has_one=array('user','file','menu_theme');
    var $has_many = array('menu_plate','menu_scope','menu_shake','menu_shape');
     function  __construct() {
         parent::__construct();
    }
}

?>