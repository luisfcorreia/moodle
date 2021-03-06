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

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot.'/course/moodleform_mod.php');

/**
 * Module instance settings form
 */
class mod_sumarios_mod_form extends moodleform_mod {

	/**
	 * Defines forms elements
	 */
	public function definition() {

		$mform = $this->_form;

		//-------------------------------------------------------------------------------
		// Adding the "general" fieldset, where all the common settings are showed
		$mform->addElement('header', 'general', get_string('general', 'form'));

		// Adding the standard "name" field
		$mform->addElement('text', 'name', get_string('sumariosname', 'sumarios'), array('size'=>'64'));
		if (!empty($CFG->formatstringstriptags)) {
			$mform->setType('name', PARAM_TEXT);
		} else {
			$mform->setType('name', PARAM_CLEAN);
		}

		$mform->addRule('name', null, 'required', null, 'client');
		$mform->addRule('name', get_string('maximumchars', '', 255), 'maxlength', 255, 'client');
		$mform->addHelpButton('name', 'sumariosname', 'sumarios');

		//-------------------------------------------------------------------------------
		$mform->addElement('textarea', 'texto', get_string('sumariostexto', 'sumarios'),array('cols'=>48, 'rows'=>6));
		$mform->setType('texto', PARAM_TEXT);

		//$mform->addElement('editor', 'texto', get_string('sumariostexto', 'sumarios'));
		//$mform->setType('texto', PARAM_RAW);

		$mform->addHelpButton('texto', 'sumariostexto', 'sumarios');
		$mform->addRule('texto', get_string('required'), 'required', null, 'client');

		//-------------------------------------------------------------------------------
		$mform->addElement('date_selector', 'timeclass', get_string('sumariosdata','sumarios'));
		$mform->addRule('timeclass', get_string('required'), 'required', null, 'client');

		//-------------------------------------------------------------------------------
		// add standard elements, common to all modules
		$this->standard_coursemodule_elements();
		//-------------------------------------------------------------------------------
		// add standard buttons, common to all modules
		$this->add_action_buttons();
	}
}
