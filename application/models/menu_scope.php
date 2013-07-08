<?php
class Menu_Scope extends DataMapper {
    var $table='menu_scopes';
    var $model='menu_scope';
    var $has_one=array('menu','scope');
     function  __construct() {
         parent::__construct();
    }
}

?>