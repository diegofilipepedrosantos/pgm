<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tarefa extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct() {
		parent::__construct();
		$this->load->model('tarefa_model');
		$this->load->model('login_model', 'usuario');
		$this->usuario->logado();
	}
	public function index()
	{
		$this->load->helper('form');
		$this->load->library('table');
		$this->load->helper('form');

		$query = $this->tarefa_model->busca_tarefa_ordenado_por_estado();

		$head = array();
		$tarefanterior ="";
		$list = array();
		
		foreach ($query->result() as $row)
		{

			$data['equipeTarefas'][] = array(
					'Sequencia' => $row->sequencia,
					'Nome' => $row->nome,
					'id' => $row->id ==""?"":"#".$row->id,
					'Titulo' => $row->titulo);
			
			if(!in_array($row->nome,$head)){
				array_push($head,$row->nome );
			}
			
			$tooltip = "Projeto: ".$row->projetonome." \nTempo estimado: ".$row->tempoestimado." Horas \n";
			
			$tarefa = '<figure id="containerimage">
				<input type="image" data-toggle="tooltip" title="'.$tooltip.'" src="'.base_url().'postit.jpeg" id="centro" name="tarefa" value="'.$row->id.'"><figcaption>#'.$row->id." ".$row->titulo.'</figcaption>
			</figure>';

			$this->table->add_row($row->sequencia== 1?"$tarefa":"", $row->sequencia== 2?$tarefa:"",$row->sequencia== 3?$tarefa:"");
			
			$list = array($row->sequencia== 1?"$tarefa":"", $row->sequencia== 2?$tarefa:"",$row->sequencia== 3?$tarefa:"");
			
			
			
			if($row->sequencia== 1){
				//$this->table->add_row($row->sequencia== 1?"$tarefa":"");
				//array_push($list['1'],$tarefa);
			}
			if($row->sequencia== 2){
				//$this->table->add_row("", $row->sequencia== 2?$tarefa:"");
				//array_push($list['2'],$tarefa);
				//$list =$tarefa;
			}		
			if($row->sequencia== 3){
				//array_push($list['3'],$tarefa);
				//$this->table->add_row("","",$row->sequencia== 3?$tarefa:"");
				//$list=$tarefa;				
			}
		}
		
		//print_r($list);
		
		//$list = array( 'two',"2" , 'four' );
		//$list1 = array($list,'3' , '1' );
		//foreach($sequencia as i$){
			//$this->table->add_row($sequencia[0], $sequencia[1],$sequencia[2]);
		//}
// 		/$new_list = $this->table->make_columns($list,3);	
		//$new_list = $this->table->make_columns($list1,3);
		
		//$data[new_list] = $new_list;
		
		$this->table->set_heading($head);
		
		$this->load->view('tarefa_view',$data);
		
	}
	public function form()
	{
		$this->load->helper('form');
		$this->load->model('projeto_model');
		$query = $this->projeto_model->busca_projeto();

		$data['teste'] = array();
		$data['id'] = array();

		foreach ($query->result() as $row)
		{

			$data['option'][$row->id] =  $row->nome;
		}


		//print_r($data);
		$this->load->view('tarefa_form_view',$data);

	}
	public function salvar()
	{
		$this->load->helper('form');
		$this->load->model('tarefa_model');
		$this->load->model('projeto_model');
		$query = $this->projeto_model->busca_projeto();

		$data['teste'] = array();
		$data['id'] = array();

		foreach ($query->result() as $row)
		{

			$data['option'][$row->id] =  $row->nome;
		}

		$datas = array(
				'titulo' => $this->input->post('dname'),
				'projeto_id' => $this->input->post('projetoid'),
				'tempoestimado' => $this->input->post('dmobile'),
				'descricao' => $this->input->post('demail')
		);
		//print_r($data)	;

		//Transfering data to Model
		$this->tarefa_model->form_insert_tarefa($datas);
		$data['message'] = "Sucesso";
		//Loading View
		$this->load->view('tarefa_form_view', $data);
		//}
	}
	public function detalhes()
	{
		$this->load->helper('form');
	
		//Busca Dados pra popular Option Projeto
		$this->load->model('projeto_model');
		$query = $this->projeto_model->busca_projeto();
		foreach ($query->result() as $row)
		{	
			$data['option'][$row->id] =  $row->nome;
		}
		
		//Busca Dados pra popular Option Estado Tarefa
		$this->load->model('estado_tarefa_model');
		$query = $this->estado_tarefa_model->busca_estado_tarefa();
		foreach ($query->result() as $row)
		{
			$data['option_estado'][$row->id] =  $row->nome;
		}
		//Busca Dados pra popular Option Usuario
		$this->load->model('login_model');
		$query =$this->login_model->busca_usuarios_ativos();
		$data['option_usuario'][0] =  "Ninguem";
		foreach ($query->result() as $row)
		{
			//array_push($data['teste'], $row->nome);
			$data['option_usuario'][$row->id] =  $row->nome;
		
		}
		
		$tarefa = $this->input->post('tarefa');

		$query = $this->tarefa_model->busca_tarefa_por_id($tarefa);
	
		foreach ($query->result() as $key => $row)
		{
			
			$data['id'] =  $row->id;
			$data['projeto_id'] =  $row->projeto_id;
			$data['titulo'] =  $row->titulo;
			$data['descricao'] = $row->descricao;
			$data['tempoestimado'] = $row->tempoestimado;
			$data['estado_id'] = $row->estado_id;
			$data['usuario_id'] = $row->usuario_id;	
				
		}
	
		$this->load->view('tarefa_form_detalhes_view',$data);
	}
	public function editar()
	{
		$this->load->helper('form');
	
		$tarefa = $this->input->post('id');
		$data = array(
				'id' => $tarefa,
				'projeto_id' => $this->input->post('projetoid'),
				'titulo' => $this->input->post('dname'),
				'descricao' => $this->input->post('demail'),
				'tempoestimado' => $this->input->post('dmobile'),
				'estado_id' => $this->input->post('estado_tarefa_id'),
				'usuario_id' => $this->input->post('usuario_id')
		);
		//Transfering data to Model
		$this->tarefa_model->atualiza_tarefa($data);
			
		//Busca Dados pra popular Option Projeto
		$this->load->model('projeto_model');
		$query = $this->projeto_model->busca_projeto();
		foreach ($query->result() as $row)
		{
			$data['option'][$row->id] =  $row->nome;
		}
		//Busca Dados pra popular Option Usuario
		$this->load->model('login_model');
		$query =$this->login_model->busca_usuarios_ativos();
		$data['option_usuario'][0] =  "Ninguem";
		foreach ($query->result() as $row)
		{
			//array_push($data['teste'], $row->nome);
			$data['option_usuario'][$row->id] =  $row->nome;
		
		}
		
		//Busca Dados pra popular Option Estado Tarefa
		$this->load->model('estado_tarefa_model');
		$query = $this->estado_tarefa_model->busca_estado_tarefa();
		foreach ($query->result() as $row)
		{
			$data['option_estado'][$row->id] =  $row->nome;
		}
		
		$data['message'] =  'Data Inserted Successfully';

		$this->load->view('tarefa_form_detalhes_view', $data);
	}
	
	public function equipe(){
		
		$query = $this->tarefa_model->busca_tarefa_por_equipe();
		

		//echo $query->num_rows;
		foreach ($query->result() as $row)
		{

			$data['equipeTarefas'][] = array(
					'Avatar' => $row->avatar,
					'Nome' => $row->nome,
					'Tarefa' => $row->id==""?"":"#".$row->id,			
					'Titulo' => $row->titulo);
					
		}
		
		$this->load->view('equipe_tarefa_view', $data);
	}
	

}

/* End of file projeto.php */
/* Location: ./application/controllers/projeto.php */