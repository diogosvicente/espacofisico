<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Actions extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function enviar_reserva(){
		if($this->session->userdata("usuario_logado")){

			echo "<pre>";
			print_r($_POST);
			echo "</pre>";

			//echo $this->input->post("local");

			//echo "<script>console.log($_POST)</script>";

			/*$numero_de_produtos = $this->input->post('numero_de_produtos');
			$identico = $this->input->post('identico');

			$id_produto_fk = $this->input->post('produto');
			$data_compra = $this->input->post('data_compra');
			$data_validade = $this->input->post('data_validade');
			$valor = $this->input->post('valor_produto');

			$dados = [
				'id_produto_fk' => $id_produto_fk,
				'data_compra' => $data_compra,
				'data_validade' => $data_validade,
				'valor' => $valor
			];			
			$this->produtos_estoque_model->inserir($dados);*/

		}else{
			$this->load->view('view_login');
		}
	}
}