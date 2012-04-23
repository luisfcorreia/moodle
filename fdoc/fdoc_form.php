<?php
require_once("$CFG->libdir/formslib.php");
class pdias_form extends moodleform {
    function definition() {
       global $CFG;
         
        $mform =& $this->_form;
//-------------
$mform->addElement('static', 'description', 'Ficha Curricular do Docente / Academic Staff Curricular File','(Trabalho de Paulo Dias)');		
//--------------
$mform->addElement('header', 'displayinfo', 'Ficha curricular do Professor');
$mform->addElement('text','pagetitle','Nome:','maxlength="100" size="50" ');
$mform->addElement('text','pagetitle','Unidade Orgânica:','maxlength="100" size="50" ');
$mform->addElement('text','pagetitle','Categoria:','maxlength="50" size="25" ');
$mform->addElement('text','pagetitle','Grau:','maxlength="30" size="15" ');
$mform->addElement('text','pagetitle','Área Cientifica deste grau Académico:','maxlength="100" size="50" ');
$mform->addElement('text','pagetitle','Ano em que foi Obtido este Grau Académico:','maxlength="4" size="4" ');
$mform->addElement('text','pagetitle','Regime de tempo na instituição que submete a proposta:','maxlength="100" size="50" ');
//--------------
$mform->addElement('header', 'displayinfo', 'Outros graus académicos ou títulos / Other Academic degrees or titles');
$mform->addElement('text','pagetitle','Ano/Year:','maxlength="4" size="4" ');
$mform->addElement('text','pagetitle','Grau ou Título/Degree or title:','maxlength="20" size="15" ');
$mform->addElement('text','pagetitle','Área/Area:','maxlength="20" size="15" ');
$mform->addElement('text','pagetitle','Instituição / Institution:','maxlength="50" size="25" ');
$mform->addElement('text','pagetitle','Classif. / Mark:','maxlength="15" size="5" ');
//--------------
$mform->addElement('header', 'displayinfo', 'Para ciclos de estudos de ensino universitário, referenciar até 5 artigos em revistas internacionais, livros ou capítulos de livros, com revisão por pares, relevantes na área do ciclo de estudos. Para estudos artísticos, referenciar até 5 actividades relacionadas com a área do ciclo de estudos.
For university study cycles, present up to 5 publications in international journals with peer review, books or chapters of books, with peer review, in the main area of the study cycle. For artistic studies, present up to 5 activities related to the area of the study cycle.');
$mform->addElement('editor', 'fieldname', get_string('labeltext', 'langfile'));
$mform->setType('fieldname', PARAM_RAW);
//----------
$mform->addElement('header', 'displayinfo', 'Experiência Profissional Relevante (5 referências) / Relevant Professional Experience (5 references)');
$mform->addElement('editor', 'fieldname', get_string('labeltext1', 'langfile'));
$mform->setType('fieldname', PARAM_RAW);
//--------------
//----------
$mform->addElement('header', 'displayinfo', 'Unidades curriculares a leccionar no ciclo de estudos proposto / Curricular units to lecture in the proposed study cycle');
$mform->addElement('editor', 'fieldname', get_string('labeltext', 'langfile'));
$mform->setType('fieldname', PARAM_RAW);
//--------------
$mform->addElement('static', 'description', '1) Tipo de metodologia: T-Ensino teórico, TP-Ensino teórico-prático,PL-Ensino prático e laboratorial, TC-Trabalho de campo, S-','Seminário, E-Estágio, OT-Orientação tutorial, O-Outra. ');		
$mform->addElement('static', 'description', '(1) Indicate for each adopted methodology the total number of hours. Ex. T – 15; PL – 30. (T-theoretical, TP-theoretical and practical, PL-','Practical and laboratorial, TC-Field work, S- Seminar, E-Training, OT-Tutorial, O-Other');		
//--------------
$mform->addElement('header', 'displayinfo', 'Outras unidades curriculares a leccionar em ciclos de estudos em funcionamento / Other curricular units to lecture in study cycles already in operation');
$mform->addElement('editor', 'fieldname', get_string('labeltext1', 'langfile'));
$mform->setType('fieldname', PARAM_RAW);
//--------------

$this->add_action_buttons();
    }
}
?>