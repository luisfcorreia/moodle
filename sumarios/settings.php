<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * The main sumarios configuration form
 *
 * It uses the standard core Moodle formslib. For more info about them, please
 * visit: http://docs.moodle.org/en/Development:lib/formslib.php
 *
 * @package    mod
 * @subpackage sumarios
 * @copyright  2012 José Andrade & Luis Correia for Universidade Atlântica
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
    require_once($CFG->dirroot.'/mod/sumarios/lib.php');

    if (!isset($CFG->sumarios_db_type)) {
			$CFG->sumarios_file_export = 0;
			$CFG->sumarios_file_export_path = "";
			$CFG->sumarios_db_type = "";
			$CFG->sumarios_db_server = "";
			$CFG->sumarios_db_database = "";
			$CFG->sumarios_db_user = "";
			$CFG->sumarios_db_pass = "";
			$CFG->sumarios_db_table = "";
			$CFG->sumarios_db_table_prefix = "";
			$CFG->sumarios_cron = 0;
			$module->cron=0;
    }

    $options = sumarios_get_database_available();

		$settings->add(new admin_setting_configcheckbox('sumarios_file_export', 
		  get_string('sumarios_file_export', 'sumarios'),
			get_string('sumarios_file_export', 'sumarios'), 
			0)
			);

		$settings->add(new admin_setting_configtext('sumarios_file_export_path', 
		  get_string('sumarios_file_export_path', 'sumarios'),
			get_string('sumarios_file_export_path', 'sumarios'), 
			"")
			);											 
											                      
    $settings->add(new admin_setting_configselect('sumarios_db_type', 
      get_string('sumarios_db_type', 'sumarios'),
      get_string('sumarios_db_type_text', 'sumarios'), 
      0, 
      $options)
      );
                                              
		$settings->add(new admin_setting_configtext('sumarios_db_server', 
		  get_string('sumarios_db_server', 'sumarios'),
			get_string('sumarios_db_server_text', 'sumarios'), 
			"" , 
			PARAM_HOST)
			);
											 
		$settings->add(new admin_setting_configtext('sumarios_db_database', 
		  get_string('sumarios_db_database', 'sumarios'),
			get_string('sumarios_db_database_text', 'sumarios'), 
			"")
			);
						 
		$settings->add(new admin_setting_configtext('sumarios_db_user', 
		  get_string('sumarios_db_user', 'sumarios'),
			get_string('sumarios_db_user_text', 'sumarios'), 
			"")
			);
											 
		$settings->add(new admin_setting_configpasswordunmask('sumarios_db_pass', 
			get_string('sumarios_db_pass', 'sumarios'),
			get_string('sumarios_db_pass_text', 
			'sumarios'), 
			"")
			);
											 
		$settings->add(new admin_setting_configtext('sumarios_db_table', 
		  get_string('sumarios_db_table', 'sumarios'),
			get_string('sumarios_db_table_text', 'sumarios'), 
			"")
			);											 
											 
		$settings->add(new admin_setting_configtext('sumarios_db_table_prefix', 
		  get_string('sumarios_db_table_prefix', 'sumarios'),
			get_string('sumarios_db_table_prefix_text', 'sumarios'), 
			"")
			);

		$settings->add(new admin_setting_configtext( 'sumarios_cron' , 
		  get_string('sumarios_cron', 'sumarios'),
			get_string('sumarios_cron_text', 'sumarios'), 
			$module->cron , 
			PARAM_INT )
			);
											 
}
