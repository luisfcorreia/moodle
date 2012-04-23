<?php
require_once('../../config.php');
global $CFG, $USER;
require_once('fdoc_form.php');

$pdias = new pdias_form();
   $site = get_site();
   
$pdias->display();
/*
print_footer();
*/   
?>