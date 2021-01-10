<?php
class Locais_model extends CI_Model
{
	public function locais(){
		$this->db->select();
		$this->db->from('locais');
		$this->db->order_by('nome_local');
		$query =  $this->db->get()->result();
		return $query;
	}
}