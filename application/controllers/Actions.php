<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Actions extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function add_evento(){
		if($this->session->userdata("usuario_logado")){

			$this->reservas_model->inserir();

		}else{
			$this->load->view('view_login');
		}
	}
}