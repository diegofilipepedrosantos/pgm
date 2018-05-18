<?php
class tarefa_model extends CI_Model{
	function __construct() {
		parent::__construct();
	}
	function form_insert_tarefa ($data){
		// Inserting in Table(students) of Database(college)
		$this->db->insert('tarefa', $data);
	}
	
	function busca_tarefa(){
		$query = $this->db->get('tarefa');
				
		return $query;
	}
	
	function busca_tarefa_por_id($tarefa){
	
		$this->db->where('id', $tarefa);
		$query = $this->db->get('tarefa');
	
		return $query;
	}
	function atualiza_tarefa($data) {
		$this->db->where('id', $data['id']);
		$this->db->set($data);
		return $this->db->update('tarefa', $data);
	}
	function busca_tarefa_perfil($estado){
		$this->db
		->select('projeto.nome as projetonome' )
		->select('tarefa.id' )
		->select('tarefa.titulo')
		->select('tarefa.tempoestimado' )
		->from('tarefa')
		->join('projeto','tarefa.projeto_id = projeto.id ')
		->where('estado_id', '2')
		->where('usuario_id', $this->session->userdata('id'));
		
		$query = $this->db->get();
	
		return $query;
	}
	
	function busca_tarefa_por_projeto_id($projeto_id){
	
		$this->db->where('projeto_id', $projeto_id);
		$query = $this->db->get('tarefa');
	
		return $query;
	}
	function busca_tarefa_por_equipe(){
		
		// Quando a tarefa estiver em desenvolvimento
		$this->db->select('titulo')
		->select('avatar')
		->select('tarefa.id')
		->select('nome')
		->from('tarefa')
		->join('usuario', 'usuario.id = tarefa.usuario_id','right')
		->where('estado_id', "2")
		->or_where('estado_id',NULL)
		->where('ativo', "1")
		->order_by('nome','desc')
		;
		
	
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query;
	}
	function busca_tarefa_ordenado_por_estado(){
		
		$this->db->select('estado_tarefa.id')
		->select('titulo')
		->select('tempoestimado')
		->select('tarefa.descricao')
		->select('tarefa.id')
		->select('estado_tarefa.nome')
		->select('projeto.nome as projetonome' )
		->select('sequencia')
		->from('tarefa')
		->join('estado_tarefa','tarefa.estado_id = estado_tarefa.id')
		->join('projeto','tarefa.projeto_id = projeto.id ')
		//->join('usuario','tarefa.usuario_id = usuario.id ')
		->order_by('sequencia')
		;
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query;
	
	}
	
	function busca_tarefas_finalizadas_id($id){
	
		$this->db
		->select('count(tarefa.id) as contador')
		->from('tarefa')
		->join('estado_tarefa','tarefa.estado_id = estado_tarefa.id')
		->join('projeto','tarefa.projeto_id = projeto.id ')
		->where('usuario_id',$id)
		->like('estado_tarefa.nome', "Finalizada")
		->order_by('sequencia');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query;
	
	}
	
	function busca_tarefas_projetos_id($id){
	
		$this->db
		->select('projeto.nome as "Projetos Envolvidos"')
		->from('tarefa')
		->join('projeto','tarefa.projeto_id = projeto.id ')
		->where('usuario_id',$id)
		->group_by('projeto.nome');
		$query = $this->db->get();
		return $query;
	}
	
}
?>