<?php
class documentacao_model extends CI_Model {

	
	function busca_docs() {

		$query = $this->db
		->select('texto')
		->select('id')
		->from('documentacao')
		->order_by('id','desc')
		->limit(1);

		$query = $this->db->get();
		
		foreach ($query->result() as $key => $value){
				
			$data['id'] = $value->id;
			$data['texto'] = $value->texto;

		}
		if(isset($data)){
			return $data;
			///print_r($data);
		}
	}

	function atualiza($data) {

		$this->db->insert('documentacao', $data);
	}


}
?>
