<?php
class Country extends DataMapper {
    var $table='country';
    var $model='country';
    var $has_many = array('user','city');
     function  __construct() {
         parent::__construct();
    }
}

?>