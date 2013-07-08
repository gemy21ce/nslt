<?php

class Menu extends DataMapper {

    var $table = 'menus';
    var $model = 'menu';
    var $has_one = array('user', 'file' => array(
            'class' => 'File',
            'other_field' => 'file_id'
        ),
        'theme' => array('class' => 'Theme', 'other_field' => 'theme_id'));
    var $has_many = array('menu_plate', 'menu_scope', 'menu_shake');

    function __construct() {
        parent::__construct();
    }

}

?>