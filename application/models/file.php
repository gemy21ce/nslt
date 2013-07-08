<?php
class File extends DataMapper {
    var $table='files';
    var $model='file';
    var $has_many = array('menu','scope','shake','plate','theme','type');

     function  __construct() {
         parent::__construct();
    }
}

?>