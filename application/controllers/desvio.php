<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class desvio extends CI_Controller {

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
	public function index()
	{
		$this->load->helper('form');
		$this->load->model('desvio_model');

		$query = $this->desvio_model->busca_tipo_desvio();

		foreach ($query->result() as $row)
		{

			$data['option'][$row->id] =  $row->nome;
		}

		$this->load->view('desvio_form_view',$data);

	}
	public function salvar(){
		$this->load->helper('form');
		$datas = array(
				'tipo_id' => $this->input->post('tipodesvio'),
				'tempo' => $this->input->post('tempodesvio'),
				'descricao' => $this->input->post('descdesvio'),
				'usuario_id' => $this->session->userdata('id')
		);

		//print_r($datas);
		$this->load->model('desvio_model');
		$this->desvio_model->form_insert_desvio($datas);
		$data['message'] = "Sucesso";
		//Loading View
		$this->load->view('desvio_form_view',$data);

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */