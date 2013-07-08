<?php
class Menu_Plate extends DataMapper {
    var $table='menu_plates';
    var $model='menu_plate';
    var $has_one=array('menu','plate');
     function  __construct() {
         parent::__construct();
    }
}

?>