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
 * This file keeps track of upgrades to the sumarios module
 *
 * Sometimes, changes between versions involve alterations to database
 * structures and other major things that may break installations. The upgrade
 * function in this file will attempt to perform all the necessary actions to
 * upgrade your older installation to the current version. If there's something
 * it cannot do itself, it will tell you what you need to do.  The commands in
 * here will all be database-neutral, using the functions defined in DLL libraries.
 *
 * @package    mod
 * @subpackage sumarios
 * @copyright  2011 Your Name
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Execute sumarios upgrade from the given old version
 *
 * @param int $oldversion
 * @return bool
 */
function xmldb_sumarios_upgrade($oldversion) {
    global $DB;

    $dbman = $DB->get_manager(); // loads ddl manager and xmldb classes

    // And upgrade begins here. For each one, you'll need one
    // block of code similar to the next one. Please, delete
    // this comment lines once this file start handling proper
    // upgrade code.

    // if ($oldversion < YYYYMMDD00) { //New version in version.php
    //
    // }

    // Lines below (this included)  MUST BE DELETED once you get the first version
    // of your module ready to be installed. They are here only
    // for demonstrative purposes and to show how the sumarios
    // iself has been upgraded.

    // For each upgrade block, the file sumarios/version.php
    // needs to be updated . Such change allows Moodle to know
    // that this file has to be processed.

    // To know more about how to write correct DB upgrade scripts it's
    // highly recommended to read information available at:
    //   http://docs.moodle.org/en/Development:XMLDB_Documentation
    // and to play with the XMLDB Editor (in the admin menu) and its
    // PHP generation posibilities.



    // First example, some fields were added to install.xml on 2007/04/01
    if ($oldversion < 2012032603) {

        // Define field intro to be added to sumarios
        $table = new xmldb_table('sumarios');
        $field = new xmldb_field('sumario_texto', XMLDB_TYPE_TEXT, 'medium', null, null, null, null,'name');

        // Add field intro
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Once we reach this point, we can store the new version and consider the module
        // upgraded to the version 2007040100 so the next time this block is skipped
        upgrade_mod_savepoint(true, 2012032603, 'sumarios');
    }

    // Second example, some hours later, the same day 2007/04/01
    // two more fields and one index were added to install.xml (note the micro increment
    // "01" in the last two digits of the version
    if ($oldversion < 2012032601) {

        // Define field intro to be added to sumarios
        $table = new xmldb_table('sumarios');
        $field = new xmldb_field('sumario_texto', XMLDB_TYPE_TEXT, 'medium', null, null, null, null,'name');

        // Add field intro
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Once we reach this point, we can store the new version and consider the module
        // upgraded to the version 2007040100 so the next time this block is skipped

        upgrade_mod_savepoint(true, 2007040101, 'sumarios');
    }

    // Final return of upgrade result (true, all went good) to Moodle.
    return true;
}
