<?php
class Menu_Shake extends DataMapper {
    var $table='menu_shakes';
    var $model='menu_shake';
    var $has_one=array('menu','shake');
     function  __construct() {
         parent::__construct();
    }
}

?>