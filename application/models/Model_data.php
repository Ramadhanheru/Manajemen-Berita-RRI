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
	///////////////////////////////////////////////////
	public function laporan_berita($id){
		$this->db->select('*, users.nama');
		$this->db->from('users');
		$this->db->join('laporan_berita','laporan_berita.id_user = users.id_user');
		$this->db->where('laporan_berita.id_user', $id);
		return $this->db->get();
	}
	public function all_laporan_berita(){
		$this->db->select('*, users.nama');
		$this->db->from('users');
		$this->db->join('laporan_berita','laporan_berita.id_user = users.id_user');
		return $this->db->get();
	}
	public function all_laporan_berita_by_id($id){
		$this->db->select('*, users.nama');
		$this->db->from('users');
		$this->db->join('laporan_berita','laporan_berita.id_user = users.id_user');
		$this->db->where('laporan_berita.id_laporan_berita', $id);
		return $this->db->get()->row_array();
	}
	public function hapus_laporan_berita($id){
		$this->db->where('id_laporan_berita', $id);
		$query = $this->db->delete('laporan_berita');
	}
	public function tambah_laporan_berita($data){
		$this->db->insert('laporan_berita',$data);
	}
	//////////////////////////////////////////////////
	public function warta_berita(){
		$this->db->select('*, laporan_berita.id_user, laporan_berita.berita, laporan_berita.file_laporan, laporan_berita.ringkasan_laporan
							,laporan_berita.status, users.nama');
		$this->db->from('warta_berita');
		$this->db->join('laporan_berita','laporan_berita.id_laporan_berita = warta_berita.id_laporan_berita');
		$this->db->join('users','users.id_user = laporan_berita.id_user');


		return $this->db->get();
	}


}