<?php
class Country extends DataMapper {
    var $table='countries';
    var $model='country';
    var $has_many = array('user','city');
     function  __construct() {
         parent::__construct();
    }
}

?>