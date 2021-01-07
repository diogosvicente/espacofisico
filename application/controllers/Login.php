<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		date_default_timezone_set('America/Sao_Paulo');
	}

	public function autenticar(){
		$this->load->model("usuarios_model");
		$login = $this->input->post("login");
		$senha = base64_encode(md5($this->input->post("senha")));
		//$senha = $this->input->post("senha");
		$usuario = $this->usuarios_model->logarUsuarios($login, $senha);
		if($usuario){
			$this->session->set_userdata("usuario_logado", $usuario);
			$this->session->set_flashdata("success","Logado com sucesso!");
			redirect('page','refresh');
		}else{
			$this->session->set_flashdata("danger","Usuário ou senha inválidos!");
			redirect('/');
		}
	}

	public function logout(){
		$this->session->unset_userdata("usuario_logado");
		$this->session->set_flashdata("success", "Deslogado com sucesso!");
		redirect("/");
	}
}
?>