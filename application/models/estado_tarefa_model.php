<?php
class estado_tarefa_model extends CI_Model{
	function __construct() {
		parent::__construct();
	}
	
	function busca_estado_tarefa(){
		
		$query = $this->db->get('estado_tarefa');
		return $query;
	}
	
	
}
?>