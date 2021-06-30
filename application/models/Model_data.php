<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_data extends CI_Model
{

	public function login($user)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('username', $user);
		return $this->db->get()->row_array();
	}
	///////////////////////////////////////////////////
	public function ambil_id_profile($id){
		 return $this->db->get_where('users',['id_user'=> $id])->row_array();
	}
	public function pengguna(){
		$this->db->not_like('id_user',1);
		return $this->db->get('users');
	}
	public function tambah_pengguna($data){
		$this->db->insert('users',$data);
	}
	public function hapus_pengguna($id){
		$this->db->where('id_user', $id);
		$query = $this->db->delete('users');
	}

}