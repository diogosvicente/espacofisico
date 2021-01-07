<?php
class Usuarios_model extends CI_Model
{
	public function logarUsuarios($login, $senha){
		$this->db->where("login", $login);
		$this->db->where("senha", $senha);
		$usuario = $this->db->get("usuarios")->row_array();
		return $usuario;
	}

	public function getUserData($id_usuario){
		$this->db->select();
		$this->db->from('usuarios');
		$this->db->where('id_usuario', $id_usuario);
		$query =  $this->db->get()->row();
		return $query;
	}
}