<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class documentacao extends CI_Controller {

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
		$this->load->model('documentacao_model');
	}
	public function index()
	{
		
		$this->load->helper('form');
		$this->load->library('image_lib');

		$query = $this->documentacao_model->busca_docs();

		//print_r($query);

		if(isset($query)){
			foreach ($query as $row)
			{			
				$data['texto'] = $row;
				//echo $row;
			}
			$this->load->view('docs_view',$data);
		}

		//$this->load->view('docs_view');
	}
	public function salvar()
	{
	
		$this->load->helper('form');
		$this->load->library('image_lib');
	
	
		
		$docs = $this->input->post('area2');
		
		
		//print($docs);
	
		$data['texto'] = $docs;
	
		
		//Transfering data to Model
		$this->documentacao_model->atualiza($data);
	
		$this->load->view('docs_view',$data);
	}

}

/* End of file projeto.php */
/* Location: ./application/controllers/projeto.php */