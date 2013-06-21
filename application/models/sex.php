<?php
class Sex extends DataMapper {
    var $table='sex';
    var $model='sex';
    var $has_many = array('user','orderitems');

     function  __construct() {
         parent::__construct();
    }
}

?>