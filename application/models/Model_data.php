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
	public function pengguna(){
		return $this->db->get('users');
	}

}