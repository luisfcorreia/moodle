<?php
 
class block_pdias_edit_form extends block_edit_form {
 
    protected function specific_definition($mform) {
 
        // Section header title according to language file.
        $mform->addElement('header', 'configheader', 'Cabe�alho');
 
        // A sample string variable with a default value.
        $mform->addElement('text', 'config_text', 'Univ Atlantica');
        $mform->setDefault('config_text', 'default value');
        $mform->setType('config_text', PARAM_MULTILANG);   
// A sample string variable with a default value.
    $mform->addElement('text', 'config_title', 'Unidade Org�nica');
    $mform->setDefault('config_title', 'default value');
    $mform->setType('config_title', PARAM_MULTILANG);		
 
    }
	
}