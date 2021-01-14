<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function index(){
		if($this->session->userdata("usuario_logado")){

			$id_usuario = $this->session->usuario_logado['id_usuario'];
			// Passando dados do usuário para a view
			$data['dados_usuario'] = $this->usuarios_model->getUserData($id_usuario);

			$data['page_title'] = 'Espaço Físico - Página Inicial';
			$this->load->view('template/01_header', $data);
			$this->load->view('template/02_topbar');
			$this->load->view('template/03_sidebar');
			$this->load->view('view_home');
			$this->load->view('template/04_footer');

		}else{
			$this->load->view('view_login');
		}
	}

	function gerenciar_reservas(){
		if($this->session->userdata("usuario_logado")){

			$id_usuario = $this->session->usuario_logado['id_usuario'];
			// Passando dados do usuário para a view
			$data['dados_usuario'] = $this->usuarios_model->getUserData($id_usuario);
			$data['locais'] = $this->locais_model->locais();

			$data['fullcalendar'] = true;
			$data['sweet_alert'] = true;
			$data['crypto'] = true;
			$data['moment'] = true;
			$data['datepicker_multiple'] = true;
			$data['daterangepicker'] = true;

			$data['page_title'] = 'Espaço Físico - Gerenciar Reservas';
			$this->load->view('template/01_header', $data);
			$this->load->view('template/02_topbar');
			$this->load->view('template/03_sidebar');
			$this->load->view('view_gerenciar_reservas');
			$this->load->view('template/04_footer');

		}else{
			$this->load->view('view_login');
		}
	}

	function reservas(){
		if($this->session->userdata("usuario_logado")){
		}else{
			$this->load->view('view_login');
		}
	}

	function relatorios(){
		if($this->session->userdata("usuario_logado")){

			$id_usuario = $this->session->usuario_logado['id_usuario'];
			// Passando dados do usuário para a view
			$data['dados_usuario'] = $this->usuarios_model->getUserData($id_usuario);

			$data['page_title'] = 'Espaço Físico - Relatórios';
			$this->load->view('template/01_header', $data);
			$this->load->view('template/02_topbar');
			$this->load->view('template/03_sidebar');
			$this->load->view('view_relatorios');
			$this->load->view('template/04_footer');

		}else{
			$this->load->view('view_login');
		}
	}

	function manual(){
		if($this->session->userdata("usuario_logado")){

			$id_usuario = $this->session->usuario_logado['id_usuario'];
			// Passando dados do usuário para a view
			$data['dados_usuario'] = $this->usuarios_model->getUserData($id_usuario);

			$data['page_title'] = 'Espaço Físico - Manual';
			$this->load->view('template/01_header', $data);
			$this->load->view('template/02_topbar');
			$this->load->view('template/03_sidebar');
			$this->load->view('view_manual');
			$this->load->view('template/04_footer');

		}else{
			$this->load->view('view_login');
		}
	}

	function sobre(){
		if($this->session->userdata("usuario_logado")){

			$id_usuario = $this->session->usuario_logado['id_usuario'];
			// Passando dados do usuário para a view
			$data['dados_usuario'] = $this->usuarios_model->getUserData($id_usuario);

			$data['page_title'] = 'Espaço Físico - Sobre';
			$this->load->view('template/01_header', $data);
			$this->load->view('template/02_topbar');
			$this->load->view('template/03_sidebar');
			$this->load->view('view_sobre');
			$this->load->view('template/04_footer');

		}else{
			$this->load->view('view_login');
		}
	}

	function local(){
		if($this->session->userdata("usuario_logado")){

			$id_usuario = $this->session->usuario_logado['id_usuario'];
			// Passando dados do usuário para a view
			$data['dados_usuario'] = $this->usuarios_model->getUserData($id_usuario);

			$data['page_title'] = 'Espaço Físico - Local';
			$this->load->view('template/01_header', $data);
			$this->load->view('template/02_topbar');
			$this->load->view('template/03_sidebar');
			$this->load->view('view_local');
			$this->load->view('template/04_footer');

		}else{
			$this->load->view('view_login');
		}
	}

	function usuario(){

		// if/else abaixo = página disponível apenas para usuário tipo = administrador
		if ($this->session->usuario_logado['id_usuario'] == null){
			$id_usuario = "";
			$tipo = "comum";
		}else{
			// Usando dados do usuário no próprio controller
			$user_data = $this->usuarios_model->getUserData($this->session->usuario_logado['id_usuario']);
			$tipo = $user_data->tipo;
		}

		if($this->session->userdata("usuario_logado") AND $tipo == "administrador"){

			$id_usuario = $this->session->usuario_logado['id_usuario'];
			// Passando dados do usuário para a view
			$data['dados_usuario'] = $this->usuarios_model->getUserData($id_usuario);	

			$crud = new Grocery_CRUD();
			$crud->set_table("usuarios");
			$crud->columns("nome", "login", "tipo", "sexo", "avatar");

			$crud->set_subject("Usuário");
	    	$crud->unique_fields("login");
	    	$crud->required_fields("nome", "login", "senha", "confirma", "sexo");    	

	    	$crud->field_type("senha", "password");
	    	$crud->field_type("confirma", "password");
	    	$crud->display_as("confirma", "Confirmar Senha");
	    	$crud->set_rules("confirma", "Confirmar Senha", "matches[senha]|min_length[6]");

	    	$crud->callback_before_insert(array($this, "remove_confirma"));
	    	$crud->callback_before_update(array($this, "remove_confirma"));

	    	$crud->set_field_upload('avatar','assets/uploads/avatar');

	    	if ($tipo == 'comum'){
	    		$crud->unset_back_to_list();
	    		$crud->unset_add();
		    	$crud->unset_read();
	            $crud->unset_clone();
	            $crud->unset_delete();
	            //$crud->unset_edit();
	            $crud->fields("senha", "confirma", "avatar");
	    	}else{
	    		$crud->fields("nome", "login", "senha", "confirma", "tipo", "sexo", "avatar");
	    	}

	    	$form = $crud->render();

			$data['page_title'] = 'Espaço Físico - Usuários';
			$this->load->view('template/01_header', $data);
			$this->load->view('template/02_topbar');
			$this->load->view('template/03_sidebar');
			$this->load->view('view_usuario', $form);
			$this->load->view('template/04_footer');

		}else{
			$this->load->view('view_login');
		}
	}

	public function remove_confirma($post_array){
		unset($post_array['confirma']); //remove confirma
	    $post_array['senha'] = base64_encode(md5($post_array['senha'])); //aplica base64, depois md5 a senha
		return $post_array;

	}
}