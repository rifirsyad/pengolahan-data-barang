<?php if ( ! defined('BASEPATH')) exit('no direct script acces allowed');

class RsModel extends CI_Model
{
	
	function TambahData($table,$data){
		$this->db->insert($table,$data);
	}
	function EditData($table,$data,$id){
		$this->db->update($table,$data,$id);
	}
	function HapusData($table,$data){
		$this->db->delete($table,$data);
	}
	function TampilData($table){
		return $this->db->get($table);
	}
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}
	function get_by_id($tabel, $id){
	    return $this->db->get_where($tabel,$id);
	}
	function get_all_data($tabel){
	    $q=$this->db->get($tabel);
	    return $q;
	}
}