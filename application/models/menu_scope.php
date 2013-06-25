<?php
class Menu_Scope extends DataMapper {
    var $table='menu_scope';
    var $model='menu_scope';
    var $has_one=array('menu','scope');
     function  __construct() {
         parent::__construct();
    }
}

?>