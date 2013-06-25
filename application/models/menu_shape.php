<?php
class Menu_Shape extends DataMapper {
    var $table='menu_shape';
    var $model='menu_shape';
    var $has_one=array('menu','shape');
     function  __construct() {
         parent::__construct();
    }
}

?>