<?php
class login_model extends CI_Model {

    # VALIDA USUÁRIO
    function valida() {
        $this->db->where('nome', $this->input->post('login')); 
        $this->db->where('senha', md5($this->input->post('senha')));        
        $query = $this->db->get('usuario'); 
		
		foreach ($query->result() as $key => $value){
			
			$data['id'] = $value->id;
			$data['nome'] = $value->nome;
			$data['horas'] = $value->horas;
			$data['avatar'] = $value->avatar;

		}
		//print_r($data);
		//echo $data['id'];
		
        //echo "entrou na model";
        if ($query->num_rows == 1) {
        	//$this->session->userdata('logged')
             // RETORNA VERDADEIRO
        	$data['retornou'] = true;
        	//print_r($data);
            return $data;
        }
       
    }

    # VERIFICA SE O USUÁRIO ESTÁ LOGADO
    function logado() {
        $logged = $this->session->userdata('logged');

        if (!isset($logged) || $logged != true) {
            echo 'Voce nao tem permissao para entrar nessa pagina.';
            echo  "<a href=".base_url()."index.php/login>".$this->session->userdata('username').'Entrar</a>';
            die();
        }
    }
    
    function criar($data) {

    	// insert na tabela usuario
        $this->db->insert('usuario', $data);
        
    }
    function busca_usuarios_ativos() {
    
    	$this->db->where('ativo', true);
    	$query = $this->db->get('usuario');
    	
    	return $query;
    }

}
?>
