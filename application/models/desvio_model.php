<?php
class desvio_model extends CI_Model{
	function __construct() {
		parent::__construct();
	}
	function form_insert_desvio ($data){
		// Inserting in Table(students) of Database(college)
		$this->db->insert('desvio', $data);
	}
	
	function busca_tipo_desvio(){
		$query = $this->db->get('tipo_desvio');
				
		return $query;
	}
	
	function busca_desvio_por_usuario_id($desvio){
	
		$this->db
		->select('desvio.descricao as Descrição')
		->select('tempo as "Tempo (min) "')
		->select('tipo_desvio.nome as "Tipo de Desvio"')
		//->select('sum(tempo)')
		->join('tipo_desvio','tipo_desvio.id = desvio.tipo_id')
		->where('usuario_id', $desvio);
		$query = $this->db->get('desvio');
	
		return $query;
	}
	function atualiza_desvio($data) {
		$this->db->where('id', $data['id']);
		$this->db->set($data);
		return $this->db->update('desvio', $data);
	}
	function busca_desvio_perfil($estado){
	
		$this->db->where('estado_id', '2');
		$this->db->where('usuario_id', $this->session->userdata('id'));
		$query = $this->db->get('desvio');
	
		return $query;
	}
	
	function busca_desvio_por_projeto_id($projeto_id){
	
		$this->db->where('projeto_id', $projeto_id);
		$query = $this->db->get('desvio');
	
		return $query;
	}
	function busca_desvio_por_equipe(){
		
		// Quando a desvio estiver em desenvolvimento
		$this->db->select('titulo')
		->select('desvio.id')
		->select('nome')
		->from('desvio')
		->join('usuario', 'usuario.id = desvio.usuario_id','right')
		->where('estado_id', "2")
		->or_where('estado_id',NULL)
		->where('ativo', "1")
		->order_by('nome','desc')
		;
		
	
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query;
	}
	function busca_desvio_ordenado_por_estado(){
		
		$this->db->select('estado_desvio.id')
		->select('titulo')
		->select('descricao')
		->select('desvio.id')
		->select('nome')
		->select('sequencia')
		->from('desvio')
		->join('estado_desvio','desvio.estado_id = estado_desvio.id')
		->order_by('sequencia')
		;
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query;
	
	}
}
?>