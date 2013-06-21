<?php
class File extends DataMapper {
    var $table='files';
    var $model='file';
    var $has_many = array('tshirt');

     function  __construct() {
         parent::__construct();
    }
}

?>