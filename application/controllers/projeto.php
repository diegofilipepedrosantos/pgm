<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class projeto extends CI_Controller {

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
		$this->load->model('projeto_model');
		$this->load->model('login_model', 'usuario');
		$this->usuario->logado();
	}
	public function index()
	{
		$this->load->helper('form');
		//$this->load->library('image_lib');
	
		
		$query = $this->projeto_model->busca_projeto();
		
		//$data['teste'] = array();
		
		foreach ($query->result() as $row)
		{
				
			$dateinicial = $row->datainicial;			
			$dateinicial =  date('d/m/Y', strtotime($dateinicial));

			$datafim = $row->datafim;
			$datafim =  date('d/m/Y', strtotime($datafim));

			$tooltip = $row->nome."\n Data Inicial: ". $dateinicial."\n Data Final: ". $datafim;
			
			$data['tarefa'][] = '<figure id="containerimage">
				<input type="image" data-toggle="tooltip" title="'.$tooltip.'" src="'.base_url().'postitprojetos.jpeg" id="centro" name="projeto" value="'.$row->id.'"><figcaption>'.$row->nome.'</figcaption>
			</figure>';

		}


		$this->load->view('projeto_view',$data);
	}
	public function form()
	{
		$this->load->helper('form');
		$this->load->view('projeto_form_view');

	}
	public function salvar()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		//Validating Name Field
		$this->form_validation->set_rules('dname', 'nome do projeto', 'required|min_length[3]|max_length[30]');
		
		//Validating Email Field
		//$this->form_validation->set_rules('datainicial', 'Data Inicial', 'required|regex_match[/^([1-9]|0[1-9]|[1,2][0-9]|3[0,1])/([1-9]|1[0,1,2])\/\d{4}$\/]');


		//Validating Mobile no. Field
		//$this->form_validation->set_rules('datafim', 'Data Final', 'required|regex_match[/^([1-9]|0[1-9]|[1,2][0-9]|3[0,1])/([1-9]|1[0,1,2])/\d{4}$\/]');

		//Validating Address Field
		$this->form_validation->set_rules('daddress', 'Address', 'required|min_length[10]|max_length[300]');
		
	

		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('projeto_form_view');
		} else {
			//Setting values for tabel columns
			
			$datainicial = $this->input->post('datainicial');
			$datainicial = str_replace('/', '-', $datainicial);
			$datainicial = date('Y-d-m', strtotime($datainicial));
				
			$datafim = $this->input->post('datafim');
			$datafim = str_replace('/', '-', $datafim);
			$datafim = date('Y-m-d', strtotime($datafim));
			
			$data = array(
					'nome' => $this->input->post('dname'),
					'datainicial' => $datainicial,
					'datafim' => $datafim,
					'descricao' => $this->input->post('daddress')
			);
			
			//print_r($data);
			//Transfering data to Model
			$this->projeto_model->form_insert_projeto($data);
			$data['message'] = 'Data Inserted Successfully';
			//Loading View
			$this->load->view('projeto_form_view', $data);
		}
	}
	public function detalhes()
	{
		$this->load->helper('form');
		
		$projeto_id = $this->input->post('projeto');
			
		$query = $this->projeto_model->busca_projeto_por_id($projeto_id);

		foreach ($query->result() as $key => $row)
		{
			$datainicial = $row->datainicial;
			$datainicial =  date('d/m/Y', strtotime($datainicial));
			
			$datafim = $row->datafim;
			$datafim =  date('d/m/Y', strtotime($datafim));
			
			$data['projeto_id'] =  $row->id;
			$data['nome'] =  $row->nome;
			$data['datainicial'] = $datainicial;
			$data['datafim'] = $datafim;
			$data['desc'] = $row->descricao;
			$data['todastarefas'] = $row->todastarefas;
			
		}
		
		// Tratar os datos pra exibir as tarefas do projeto
		$this->load->model('tarefa_model');
		$query = $this->tarefa_model->busca_tarefa_por_projeto_id($data['projeto_id']);

		foreach ($query->result() as $row)
		{
			$data['option'][$row->id] =  $row->titulo;		
		}
		
		$this->load->view('projeto_form_detalhes_view',$data);
	}
	public function editar()
	{
		$this->load->helper('form');
		
		$projeto_id = $this->input->post('projeto_id');
		
		$datainicial = $this->input->post('datainicial');
		$datainicial = str_replace('/', '-', $datainicial);
		$datainicial = date('Y-d-m', strtotime($datainicial));
			
		$datafim = $this->input->post('datafim');
		$datafim = str_replace('/', '-', $datafim);
		$datafim = date('Y-m-d', strtotime($datafim));
		
		$data = array(
				'id' => $projeto_id,
				'nome' => $this->input->post('dname'),
				'datainicial' => $datainicial,
				'datafim' => $datafim,
				'descricao' => $this->input->post('daddress'),
				'todastarefas'=> $this->input->post('tarefascadastradas')
		);
			
		//Transfering data to Model
		$this->projeto_model->atualiza_projeto($data);
		//$data['message'] = 'Data Inserted Successfully';
		//Loading View
		
		$data = array(
				'projeto_id' => $projeto_id,
				'nome' => $this->input->post('dname'),
				'datainicial' => $this->input->post('datainicial'),
				'datafim' => $this->input->post('datafim'),
				'desc' => $this->input->post('daddress'),
				'todastarefas'=> $this->input->post('tarefascadastradas'),
				'message' => 'Data Inserted Successfully' 
		);
		
		//print_r($data);
		$this->load->view('projeto_form_detalhes_view', $data);
	}

}

/* End of file projeto.php */
/* Location: ./application/controllers/projeto.php */