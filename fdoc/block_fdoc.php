<?php
class block_pdias extends block_list {

    public function init() {
        $this->title = 'Moodle - Ficha Docente ';
    }
	public function get_content() {
    if ($this->content !== null) {
    return $this->content;
  }
  $courseid=2;
  $this->content         = new stdClass;
  $this->content->items  =array();
 $this->content->items[] = html_writer::link(new moodle_url('/blocks/fdoc/view.php', array('courseid' => $courseid)), 'Formulario');

 $this->content->footer = '-- FOOTER --';
  return $this->content;
  }
  public function instance_allow_multiple() {
  return true;
}
 function specialization() {
 if(!empty($this->config->title)){
 $this->title = $this->config->title;
 }
 if(empty($this->config->text)){
 $this->config->text = '';
 }
}

}  