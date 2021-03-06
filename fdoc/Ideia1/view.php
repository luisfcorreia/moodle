<?php  // $Id: view.php,v 1.6.2.3 2009/04/17 22:06:25 skodak Exp $

/**
 * This page prints a particular instance of fdoc
 *
 * @author  Your Name <your@email.address>
 * @version $Id: view.php,v 1.6.2.3 2009/04/17 22:06:25 skodak Exp $
 * @package mod/fdoc
 */

/// (Replace fdoc with the name of your module and remove this line)

require_once(dirname(dirname(dirname(__FILE__))).'/config.php');
require_once(dirname(__FILE__).'/lib.php');

$id = optional_param('id', 0, PARAM_INT); // course_module ID, or
$a  = optional_param('a', 0, PARAM_INT);  // fdoc instance ID

if ($id) {
    if (! $cm = get_coursemodule_from_id('fdoc', $id)) {
        error('Course Module ID was incorrect');
    }

    if (! $course = get_record('course', 'id', $cm->course)) {
        error('Course is misconfigured');
    }

    if (! $fdoc = get_record('fdoc', 'id', $cm->instance)) {
        error('Course module is incorrect');
    }

} else if ($a) {
    if (! $fdoc = get_record('fdoc', 'id', $a)) {
        error('Course module is incorrect');
    }
    if (! $course = get_record('course', 'id', $fdoc->course)) {
        error('Course is misconfigured');
    }
    if (! $cm = get_coursemodule_from_instance('fdoc', $fdoc->id, $course->id)) {
        error('Course Module ID was incorrect');
    }

} else {
    error('You must specify a course_module ID or an instance ID');
}

require_login($course, true, $cm);

add_to_log($course->id, "fdoc", "view", "view.php?id=$cm->id", "$fdoc->id");

/// Print the page header
$strFDocs = get_string('modulenameplural', 'fdoc');
$strFDoc  = get_string('modulename', 'fdoc');

$navlinks = array();
$navlinks[] = array('name' => $strFDocs, 'link' => "index.php?id=$course->id", 'type' => 'activity');
$navlinks[] = array('name' => format_string($fdoc->name), 'link' => '', 'type' => 'activityinstance');

$navigation = build_navigation($navlinks);

print_header_simple(format_string($fdoc->name), '', $navigation, '', '', true,
              update_module_button($cm->id, $course->id, $strFDoc), navmenu($course, $cm));

/// Print the main part of the page

echo 'YOUR CODE GOES HERE';


/// Finish the page
print_footer($course);

?>
