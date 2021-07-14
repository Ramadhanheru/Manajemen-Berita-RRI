<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporter extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();

			if($this->session->userdata('role')!= '2')
				redirect ('login');
	}
	public function index()
	{
		$data['user'] =  $this->db->get_where('users', ['username' => $this->session->userdata('user')])->row_array();
		 $this->load->view('template/header');
		 $this->load->view('template/sidebar',$data);
		 $this->load->view('blank');
		 $this->load->view('template/footer');
	}
	///////////////////////////////////////////
	public function laporan_berita()
	{
		$data['user'] =  $this->db->get_where('users', ['username' => $this->session->userdata('user')])->row_array();
		$id = $this->session->userdata('id_user');
		$data['query'] =  $this->Model_data->laporan_berita($id);
		 $this->load->view('template/header');
		 $this->load->view('template/sidebar',$data);
		 $this->load->view('laporan_berita',$data);
		 $this->load->view('template/footer');
	}
	///////////////////////////////////////////
	public function upload_laporan()
	{
		$data['user'] =  $this->db->get_where('users', ['username' => $this->session->userdata('user')])->row_array();
		 $this->load->view('template/header');
		 $this->load->view('template/sidebar',$data);
		 $this->load->view('upload_laporan');
		 $this->load->view('template/footer');
	}
	public function tambah_laporan_berita()
	{
		$cekgambar1 = $_FILES['text_laporan']['name'];
		$cekgambar12 = $_FILES['file_laporan']['name'];

		if (!$cekgambar1 && !$cekgambar12) {
			$this->session->set_flashdata('message','<div class ="alert alert-danger" roles="alert"><h6>Data  gagal ditambahkan, Minimal Harus upload 1 file laporan ! 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </h6></div>');
					redirect('Reporter/upload_laporan');
		}

		$this->form_validation->set_rules('nama','Nama','trim|required');


		if($this->form_validation->run()==false){
			$this->upload_laporan();

		}else{

				if ($cekgambar1) {
					$data = [
				 	'id_user' => $this->input->post('id_user', true),
	                'berita' => $this->input->post('gender', true),
	                'tanggal' => $this->input->post('tanggal', true),
	               	'text_laporan'=> $this->uploadlaporantext()
	               ];
				}if ($cekgambar12) {
					$data = [
				 	'id_user' => $this->input->post('id_user', true),
	                'berita' => $this->input->post('gender', true),
	                'tanggal' => $this->input->post('tanggal', true),
	               	'file_laporan'=> $this->uploadlaporan()
	               ];
				}if ($cekgambar1 && $cekgambar12) {
					$data = [
				 	'id_user' => $this->input->post('id_user', true),
	                'berita' => $this->input->post('gender', true),
	                'tanggal' => $this->input->post('tanggal', true),
	               	'text_laporan'=> $this->uploadlaporantext(),
	               	'file_laporan'=> $this->uploadlaporan()  
	            	];
				}
					$proses = $this->Model_data->tambah_laporan_berita($data);
					$this->session->set_flashdata('message','<div class ="alert alert-success" roles="alert"><h6> Data berhasil ditambah ! 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </h6></div>');
					redirect('Reporter/laporan_berita');
			}
	}

	///////////////////////////////////////////

	public function uploadlaporan(){
		 //$config['file_name'] = '';
        $config['allowed_types'] = '*';
        $config['max_size']      = 0;
        $config['upload_path']   = FCPATH .'./uploadfile/';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file_laporan')) {
            return  $this->upload->data('file_name');
        } else{
            echo $this->upload->display_errors();
        }
	}
	public function uploadlaporantext(){
		 //$config['file_name'] = '';
        $config['allowed_types'] = 'doc|docx|pdf|mpeg';
        $config['max_size']      = 0;
        $config['upload_path']   = FCPATH .'./uploadfile/';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('text_laporan')) {
            return  $this->upload->data('file_name');
        } else{
            echo $this->upload->display_errors();
        }
	}
	

}
