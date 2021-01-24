<?php
class Reservas_model extends CI_Model
{
	public function inserir($data){

		$this->db->insert('events', $data);
		$response = 'cadastrado com sucesso...';	  
			echo ($response);
			return true;
	}
}