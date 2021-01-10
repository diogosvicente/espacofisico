<?php

class Fullcalendar_model extends CI_Model{

	function fetch_all_event($id_local_fk = ""){
		$this->db->select('events.id, events.title, events.start_event, events.end_event');
		$this->db->from('events');
		(!empty($id_local_fk)) ? $this->db->where('events.id_local_fk', $id_local_fk) : "";
		$this->db->order_by('events.id');
		$query = $this->db->get();
		return $query;
	}

 	function insert_event($data){
 		$this->db->insert('events', $data);
 	}

 	function update_event($data, $id){
 		$this->db->where('id', $id);
 		$this->db->update('events', $data);
 	}

 	function delete_event($id){
 		$this->db->where('id', $id);
 		$this->db->delete('events');
 	}
}

?>