<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

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
		if($this->session->userdata('logged')){
			redirect('projeto');
		}else{
			$this->load->view('login_view');
		}
	}
	public function logar()
	{
		$this->load->model('login_model');
		$logado =$this->login_model->valida();
		
		
		if($logado['retornou']){ 
			$data = array(
					'id' => $logado['id'],
                    'username' => $this->input->post('login'),
                    'logged' => true,
					'horas' => $logado['horas'],
					'avatar' => $logado['avatar']
            );
            $this->session->set_userdata($data);
			redirect('projeto');	
			
		}
		else{
			$this->load->view('login_view');
			echo "Usuario ou Senha Incoreta!";
		}
					
	}
	public function criar()
	{
		$data['criar'] = "true";
		
		$this->load->view('login_view',$data);
	}
	public function salvar()
	{
		
		$this->load->model('login_model');
		
		$data = array(
				'nome' => $this->input->post('login'),
				'horas' => 8,
				'senha' => md5($this->input->post('senha')),
		);
		
		$this->login_model->criar($data);
		echo "Usuario ".$data['nome']." criado!";
		$this->load->view('login_view');
	}
	public function sair()
	{
		$data = array(
                    'username' => '',
                    'logged' => false
                );
        $this->session->set_userdata($data);
        
        $this->load->view('login_view');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */