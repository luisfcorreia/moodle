<?php

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
    require_once($CFG->dirroot.'/mod/sumarios/lib.php');

    if (!isset($CFG->sumarios_db_type)) {
		$CFG->sumarios_db_type = SUMARIOS_MYSQL;
		$CFG->sumarios_db_server = "";
		$CFG->sumarios_db_user = "";
		$CFG->sumarios_db_pass = "";
		$CFG->sumarios_db_table = "";
    }

    $options = array(SUMARIOS_MYSQL => 'Oracle MySQL',
                     SUMARIOS_MSSQL => 'Microsoft SQL Server');
                     
    $settings->add(new admin_setting_configselect('sumarios_db_type', get_string('sumariosdatabase', 'sumarios'),
                       get_string('sumariosdatabase', 'sumarios'), SUMARIOS_MYSQL, $options));
                       
   $settings->add(new admin_setting_configtext_trim_lower($name, $visiblename, $description, $defaultsetting))

}
