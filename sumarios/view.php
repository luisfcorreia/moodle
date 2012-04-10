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
 * Prints a particular instance of sumarios
 *
 * You can have a rather longer description of the file as well,
 * if you like, and it can span multiple lines.
 *
 * @package    mod
 * @subpackage sumarios
 * @copyright  2011 Your Name
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(dirname(dirname(__FILE__))).'/config.php');
require_once(dirname(__FILE__).'/lib.php');

$id = optional_param('id', 0, PARAM_INT); // course_module ID, or
$n  = optional_param('s', 0, PARAM_INT);  // sumarios instance ID - it should be named as the first character of the module

if ($id) {
    $cm         = get_coursemodule_from_id('sumarios', $id, 0, false, MUST_EXIST);
    $course     = $DB->get_record('course', array('id' => $cm->course), '*', MUST_EXIST);
    $sumarios   = $DB->get_record('sumarios', array('id' => $cm->instance), '*', MUST_EXIST);
} elseif ($n) {
    $sumarios   = $DB->get_record('sumarios', array('id' => $n), '*', MUST_EXIST);
    $course     = $DB->get_record('course', array('id' => $sumarios->course), '*', MUST_EXIST);
    $cm         = get_coursemodule_from_instance('sumarios', $sumarios->id, $course->id, false, MUST_EXIST);
} else {
    error('You must specify a course_module ID or an instance ID');
}

require_login($course, true, $cm);

if ($id) {
    $context    = get_context_instance(CONTEXT_MODULE, $cm->id);
} elseif ($n) {
    $context    = context_module::instance_by_id($cm->id);
}

add_to_log($course->id, 'sumarios', 'view', "view.php?id={$cm->id}", $sumarios->name, $cm->id);

/// Print the page header

$PAGE->set_url('/mod/sumarios/view.php', array('id' => $cm->id));
$PAGE->set_title(format_string($sumarios->name));
$PAGE->set_heading(format_string($course->fullname));
$PAGE->set_context($context);

// other things you may want to set - remove if not needed
//$PAGE->set_cacheable(false);
//$PAGE->set_focuscontrol('some-html-id');
//$PAGE->add_body_class('sumarios-'.$somevar);

// Output starts here
echo $OUTPUT->header();

// Replace the following lines with you own code
echo $OUTPUT->container(get_string('sumarioscabecalho', 'sumarios'));
echo $OUTPUT->container('<br />');

echo $OUTPUT->container($sumarios->texto);

// Finish the page
echo $OUTPUT->footer();
