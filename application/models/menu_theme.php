<?php
class Menu_Theme extends DataMapper {
    var $table='menu_theme';
    var $model='menu_theme';
    var $has_one=array('file');
    var $has_many = array('menu');
     function  __construct() {
         parent::__construct();
    }
}

?>