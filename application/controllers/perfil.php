<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class perfil extends CI_Controller {

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
		$this->load->model('login_model', 'usuario');
		$this->usuario->logado();
	}
	public function index()
	{
		$this->load->helper('form');
		$this->load->model('tarefa_model');
		
		$this->load->library('table');
		$this->load->model('desvio_model');
		$query = $this->desvio_model->busca_desvio_por_usuario_id($this->session->userdata('id'));
		$data['tabledesvio'] = $query;
		
		$query = $this->tarefa_model->busca_tarefas_finalizadas_id($this->session->userdata('id'));
		foreach ($query->result() as $row){
			$data['tarefasfinalizadas'] = $row->contador;
		}

		$query1 = $this->tarefa_model->busca_tarefas_projetos_id($this->session->userdata('id'));
		$data['tableprojetos'] = $query1;
		
		$query = $this->tarefa_model->busca_tarefa_perfil('Em Desenvolvimento');
		
		foreach ($query->result() as $row)
		{
			$data['tarefas'][$row->id] =  $row->titulo;
				
			$tooltip = "Projeto: ".$row->projetonome." \nTempo estimado: ".$row->tempoestimado." Horas \n";
				
			$data['tarefa'][] = '<figure id="containerimage">
				<input type="image" data-toggle="tooltip" title="'.$tooltip.'" src="'.base_url().'postit.jpeg" id="centro" name="tarefa" value="'.$row->id.'"><figcaption>#'.$row->id." ".$row->titulo.'</figcaption>
			</figure>'."<?php include 'timer/timer.php'?>";
			
			//echo $data['tarefa'];
			
		}

	

		if(isset($data)){
			$this->load->view('perfil_view',$data);
		}
		else{
			$this->load->view('perfil_view');
		}
	}

}

/* End of file projeto.php */
/* Location: ./application/controllers/projeto.php */