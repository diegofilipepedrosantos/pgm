<?php
class projeto_model extends CI_Model{
	function __construct() {
		parent::__construct();
	}
	function form_insert_projeto ($data){
		// Inserting in Table(students) of Database(college)
		$this->db->insert('projeto', $data);
	}
	
	function busca_projeto(){
		$query = $this->db->get('projeto');
				
		return $query;
	}
	
	function busca_projeto_por_id($projeto){

		$this->db->where('id', $projeto);
		$query = $this->db->get('projeto');
		
		return $query;
	}
	function atualiza_projeto($data) {
		$this->db->where('id', $data['id']);
		$this->db->set($data);
		return $this->db->update('projeto', $data);
	}
}
?>