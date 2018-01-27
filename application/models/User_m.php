<?php 
class User_m extends CI_Model {
	function tampil_data(){
		return $this->db->get('user');
	}
	function input_data($data, $table){
		$this->db->insert($table, $data);
	}

	function hapus_record($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function edit_datauser($table, $where){
		return $this->db->get_where($table, $where);
	}

	function update_datauser($data, $table, $where){
		$this->db->where($where);
		$this->db->update($table, $data);
	}
}
?>