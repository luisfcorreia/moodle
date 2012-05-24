<?php

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
    require_once($CFG->dirroot.'/mod/sumarios/lib.php');

    if (!isset($CFG->sumarios_tipobd)) {
    }

    $options = array(SUMARIOS_MYSQL => 'Oracle MySQL',
                     SUMARIOS_MSSQL => 'Microsoft SQL Server');
                     
    $settings->add(new admin_setting_configselect('sumarios_tipobd', get_string('sumariosdatabase', 'sumarios'),
                       get_string('sumariosdatabase', 'sumarios'), SUMARIOS_MYSQL, $options));
                       

}
