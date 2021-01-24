<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Actions extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function enviar_reserva(){
		if($this->session->userdata("usuario_logado")){

			/*echo "<pre>";
			print_r($_POST);
			echo "</pre>";*/

			$local = mb_strtoupper(($this->input->post('local')), 'UTF-8');

			$datepicker = mb_strtoupper(($this->input->post('datepicker')), 'UTF-8');
			$horario_1_inicio = mb_strtoupper(($this->input->post('horario_1_inicio')), 'UTF-8');
			$horario_1_fim = mb_strtoupper(($this->input->post('horario_1_fim')), 'UTF-8');

			$aux_data = explode("/", $datepicker); //separa data formato pt-br
			$data = implode("-", $aux_data); //junta data formato mysql
			$datatime_start = "$data $horario_1_inicio"; //junta data formato mysql + hora início
			$datatime_end = "$data $horario_1_fim"; //junta data formato mysql + hora fim

			$start_event = date('Y-m-d H:i:00', strtotime($datatime_start)); //datatime start_event
			$end_event = date('Y-m-d H:i:00', strtotime($datatime_end)); //datatime end_event

			$dados = [
				'start_event' => $start_event,
				'end_event' => $end_event,
				'id_local_fk' => $local
			];
			
			$this->reservas_model->inserir($dados);

		}else{
			$this->load->view('view_login');
		}
	}
}