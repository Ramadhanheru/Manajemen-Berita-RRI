<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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

			if($this->session->userdata('role')!= '1')
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
	public function warta_berita()
	{
		$data['user'] =  $this->db->get_where('users', ['username' => $this->session->userdata('user')])->row_array();
		$data['query'] = $this->Model_data->warta_berita();
		 $data['query1'] =  $this->Model_data->all_laporan_berita1();
		 $data['query2'] =  $this->Model_data->get_warta_berita();
		 $this->load->view('template/header');
		 $this->load->view('template/sidebar',$data);
		 $this->load->view('warta_berita',$data);
		 $this->load->view('template/footer');
	}
	public function pdf_warta_berita(){
		/* Create PDF File*/
      	$this->load->library('pdf');
			 	$id_user = $this->input->post('id_user');
                $tanggal = $this->input->post('tanggal');

       $data['query'] = $this->Model_data->pdf_warta_berita($id_user,$tanggal);
       $data['query1'] =  $this->Model_data->get_warta_berita_by_id($id_user,$tanggal);
       $this->load->view('print_warta_berita',$data);

        $paper_size='Legal';
	    $orientation='potrait';
	    $data_header= array('title' => 'Convert to Pdf');
	    $html = $this->output->get_output();
	    $this->pdf->set_paper($paper_size, $orientation, $data_header);

	    $this->pdf->load_html($html);
	    $this->pdf->render();
	    $this->pdf->stream('Warta Berita.pdf', array('Attachment' =>0));

	}
	public function tambah_warta_berita()
	{
		$data = [
			 	'desk_editor' => $this->input->post('desk_editor', true),
                'hari' => $this->input->post('hari', true),
                'tanggal' => $this->input->post('tanggal', true),
                'pukul' => $this->input->post('pukul', true),
                'id_laporan_berita' => $this->input->post('id_laporan_berita', true)
            ];
				$proses = $this->Model_data->tambah_warta_berita($data);
				$this->session->set_flashdata('message','<div class ="alert alert-success" roles="alert"><h6> Data berhasil ditambah ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </h6></div>');
				redirect('welcome/warta_berita');
		
	}
	public function lihat_laporan_berita($id)
	{
		$data['user'] =  $this->db->get_where('users', ['username' => $this->session->userdata('user')])->row_array();
		 $data['query'] =  $this->Model_data->all_laporan_berita_by_id($id);
			 $this->load->view('template/header');
			 $this->load->view('template/sidebar',$data);
			 $this->load->view('lihat_laporan_berita',$data);
			 $this->load->view('template/footer');
		
		 
	}
	public function edit_warta_berita($id){
		$data = [
			 	'desk_editor' => $this->input->post('desk_editor', true),
                'hari' => $this->input->post('hari', true),
                'tanggal' => $this->input->post('tanggal', true),
                'pukul' => $this->input->post('pukul', true)
            ];
            $this->db->set($data);
				$this->db->where('id_warta_berita', $id);
				$this->db->update('warta_berita');
				$this->session->set_flashdata('message','<div class ="alert alert-success" roles="alert"><h6> Data berhasil diUpdate ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </h6></div>');
				redirect('welcome/warta_berita');
	}
	public function hapus_warta_berita($id){

		$data = $this->Model_data->hapus_warta_berita($id);
			if (!$data) {
				$this->session->set_flashdata('message','<div class ="alert alert-success " roles="alert"><h6> Data berhasil dihapus ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </h6></div>');
				redirect('welcome/warta_berita');
			} else {
				$this->session->set_flashdata('message','<div class ="alert alert-danger  " roles="alert"><h6> Data gagal dihapus ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </h6></div>');
				redirect('welcome/warta_berita');
			}
	}
	///////////////////////////////////////////
	public function laporan_berita()
	{
		$data['user'] =  $this->db->get_where('users', ['username' => $this->session->userdata('user')])->row_array();
		 $data['query'] =  $this->Model_data->all_laporan_berita();
		 $this->load->view('template/header');
		 $this->load->view('template/sidebar',$data);
		 $this->load->view('laporan_berita',$data);
		 $this->load->view('template/footer');
	}
	public function update_laporan_berita($id)
	{
		$data['user'] =  $this->db->get_where('users', ['username' => $this->session->userdata('user')])->row_array();
		 $data['query'] =  $this->Model_data->all_laporan_berita_by_id($id);
		 $this->form_validation->set_rules('ringkasan_laporan','ringkasan_laporan','trim|required');

		if($this->form_validation->run()==false){
			 $this->load->view('template/header');
			 $this->load->view('template/sidebar',$data);
			 $this->load->view('update_laporan_berita',$data);
			 $this->load->view('template/footer');
		}else{

			$this->db->set('status', 1);
			$this->db->set('ringkasan_laporan', $this->input->post('ringkasan_laporan'));
			$this->db->where('id_laporan_berita', $id);
			$this->db->update('laporan_berita');
			$this->session->set_flashdata('message','<div class ="alert alert-success" roles="alert"><h6> Data berhasil diUpdate ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </h6></div>');
				redirect('welcome/laporan_berita');
		}
		 
	}
	public function edit_laporan_berita($id)
	{
		$data['user'] =  $this->db->get_where('users', ['username' => $this->session->userdata('user')])->row_array();
		 $data = [
                'berita' => $this->input->post('berita', true),
                'tanggal' => $this->input->post('tanggal', true)
            ];

				$this->db->set($data);
				$this->db->where('id_laporan_berita', $id);
				$this->db->update('laporan_berita');
				$this->session->set_flashdata('message','<div class ="alert alert-success" roles="alert"><h6> Data berhasil diUpdate ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </h6></div>');
				redirect('welcome/laporan_berita');
		
		 
	}
	public function hapus_laporan_berita($id){

		$cekdata = $this->Model_data->cek_warta_berita($id);
			if (!$cekdata) {
					$data = $this->Model_data->hapus_laporan_berita($id);
				if (!$data) {
					$this->session->set_flashdata('message','<div class ="alert alert-success " roles="alert"><h6> Data berhasil dihapus ! 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </h6></div>');
					redirect('welcome/laporan_berita');
				} else {
					$this->session->set_flashdata('message','<div class ="alert alert-danger  " roles="alert"><h6> Data gagal dihapus ! 
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </h6></div>');
					redirect('welcome/laporan_berita');
				}
		
			} else {
				$this->session->set_flashdata('message','<div class ="alert alert-danger  " roles="alert"><h6> Data gagal dihapus ! Karena data sedang digunakan.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </h6></div>');
					redirect('welcome/laporan_berita');
			}

		
			
	}

	///////////////////////////////////////////
	public function pengguna()
	{
		$data['user'] =  $this->db->get_where('users', ['username' => $this->session->userdata('user')])->row_array();
		$data['query'] = $this->Model_data->pengguna();
		 $this->load->view('template/header');
		 $this->load->view('template/sidebar',$data);
		 $this->load->view('pengguna',$data);
		 $this->load->view('template/footer');
	}
	public function role_aktif($id){
		$this->db->set('role',2);
		$this->db->where('id_user', $id);
		$this->db->update('users');
		redirect('welcome/pengguna');
	}
	public function role_aktif_editor($id){
		$this->db->set('role',1);
		$this->db->where('id_user', $id);
		$this->db->update('users');
		redirect('welcome/pengguna');
	}
	public function role_tidak_aktif($id){
		$this->db->set('role',0);
		$this->db->where('id_user', $id);
		$this->db->update('users');
		redirect('welcome/pengguna');
	}
	public function tambah_pengguna()
	{

		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]', ['is_unique' => 'This username has already registered!']);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', ['min_length' => 'Kata sandi terlalu pendek!']);
		$cekgambar1 = $_FILES['foto']['name'];
		if ($cekgambar1==null) {
			$this->form_validation->set_rules('foto','foto','trim|required');
		}

		if($this->form_validation->run()==false){
			$this->pengguna();

		}else{

			$data = [
			 	'username' => $this->input->post('username', true),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'nama' => $this->input->post('nama', true),
                'nip' => $this->input->post('nip', true),
                'jabatan' => $this->input->post('jabatan', true),
                'alamat' => $this->input->post('alamat', true),
                'no_hp' => $this->input->post('no_hp', true),
                'email' => $this->input->post('email', true),
                'foto' => $this->uploadfoto()
            ];
				$proses = $this->Model_data->tambah_pengguna($data);
				$this->session->set_flashdata('message','<div class ="alert alert-success" roles="alert"><h6> Data berhasil ditambah ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </h6></div>');
				redirect('welcome/pengguna');
		}
	}
	public function edit_pengguna($id){
		$data['user'] =  $this->db->get_where('users', ['id_user' => $id])->row_array();
		$cekgambar1 = $_FILES['foto']['name'];

			if($cekgambar1){

		$config['allowed_types'] = 'gif|jpg|png|jpeg|HEIC';
        $config['max_size']      = '2000000';
        $config['upload_path']   = FCPATH .'./uploadfile/';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('foto')) {

        	$old_image = $data['user']['foto'];
        	if($old_image != 'user.png'){
        		unlink(FCPATH . 'uploadfile/' . $old_image);
        	}

            $new_image =  $this->upload->data('file_name');
            $this->db->set('foto',$new_image);
            $this->db->where('id_user', $id);
			$this->db->update('users');
        } else{
            return "user.png";
        }
			}

		$data = [
                'nama' => $this->input->post('nama', true),
                'nip' => $this->input->post('nip', true),
                'jabatan' => $this->input->post('jabatan', true),
                'alamat' => $this->input->post('alamat', true),
                'no_hp' => $this->input->post('no_hp', true),
                'email' => $this->input->post('email', true),
                'role' => 0
            ];

				$this->db->set($data);
				$this->db->where('id_user', $id);
				$this->db->update('users');
				$this->session->set_flashdata('message','<div class ="alert alert-success" roles="alert"><h6> Data berhasil diUpdate ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </h6></div>');
				redirect('welcome/pengguna');

				
	}
	public function hapus_pengguna($id){
		$cekdata = $this->Model_data->cek_laporan_berita($id);
		if (!$cekdata) {
			$data = $this->Model_data->hapus_pengguna($id);
			if (!$data) {
				$this->session->set_flashdata('message','<div class ="alert alert-success " roles="alert"><h6> Data berhasil dihapus ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </h6></div>');
				redirect('welcome/pengguna');
			} else {
				$this->session->set_flashdata('message','<div class ="alert alert-danger  " roles="alert"><h6> Data gagal dihapus ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </h6></div>');
				redirect('welcome/pengguna');
			}
		} else {
			$this->session->set_flashdata('message','<div class ="alert alert-danger  " roles="alert"><h6> Data gagal dihapus ! Karena data sedang digunakan. 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </h6></div>');
				redirect('welcome/pengguna');
		}
		
		
	}
	//////////////////////////////////////////

	public function uploadfoto(){
		 //$config['file_name'] = '';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|HEIC|mp4';
        $config['max_size']      = 0;
        $config['upload_path']   = FCPATH .'./uploadfile/';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('foto')) {
            return  $this->upload->data('file_name');
        } else{
            echo $this->upload->display_errors();
        }
	}

}
