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

			$nome_evento = mb_strtoupper(($this->input->post('nome_evento')), 'UTF-8');
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
				'title' => $nome_evento,
				'start_event' => $start_event,
				'end_event' => $end_event,
				'id_local_fk' => $local
			];


			/*
			apenas um dia
			[datepicker] => 06/04/2021
			[horario_1_inicio] => 12:00
			[horario_1_fim] => 12:00

			dias não seguidos
			[myrosterdate] => 09/03/2021,10/03/2021,11/03/2021
			[daterange] => 02/03/2021 - 05/03/2021
				dia todo ou horários idênticos{
					[horario_2_inicio] => 00:00
    				[horario_2_fim] => 23:59
				}
				horário múltiplo{
					[horario_multiplo] => 07:00,08:00,10:00,12:00,14:00,15:30
				}
				
			*/

			$this->reservas_model->inserir($dados);

		}else{
			$this->load->view('view_login');
		}
	}
}