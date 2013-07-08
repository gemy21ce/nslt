<?php
class File extends DataMapper {
    var $table='files';
    var $model='file';
    var $has_many = array('menu');

     function  __construct() {
         parent::__construct();
    }
}

?>