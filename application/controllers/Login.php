<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
	public function index()
	{
		 $this->load->view('loginn');
	}
	public function loginn(){
		//login admin
			$this->form_validation->set_rules('username','username','trim|required');
			$this->form_validation->set_rules('password','Password','trim|required');
			if($this->form_validation->run()==false){
				$this->index();
			
			}else{

				$userr = $this->input->post('username');
				$password = $this->input->post('password');
				
				$user = $this->Model_data->login($userr);
				//jika data benar
				if($user['role'] == '1'){
					if (password_verify($password, $user['password'])) {
                   
                   $this->session->set_userdata(array('user'=>$userr,'password'=>$password,'role' => $user['role'], 'id_user' => $user['id_user']));
					$this->session->set_flashdata('message','<div class ="alert alert-success" roles="alert"><h6>Welcome '.$userr.' ! <span>Anda Masuk Sebagai Editor.</span></h6> </div>');
					redirect('Welcome');

                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    <h6>Salah Password!</h6></div>');
                   $this->index();
                }
					
				}else if($user['role'] == '2'){
					if (password_verify($password, $user['password'])) {
                   
                   $this->session->set_userdata(array('user'=>$userr,'password'=>$password,'role' => $user['role'],'id_user'=>$user['id_user']));
					$this->session->set_flashdata('message','<div class ="alert alert-success" roles="alert"><h6>Welcome '.$userr.' ! <span>Anda Masuk Sebagai Reporter</span></h6></div>');
					redirect('Reporter');

                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><h6>
                    Salah Password!</h6></div>');
                   $this->index();
                }
					
				}else if($user['role'] == '3'){
					if (password_verify($password, $user['password'])) {
                   
                   $this->session->set_userdata(array('user'=>$userr,'password'=>$password,'role' => $user['role'],'id_user'=>$user['id_user']));
					$this->session->set_flashdata('message','<div class ="alert alert-success" roles="alert"><h6>Welcome '.$userr.' ! <span>Anda Masuk Sebagai Programa 1</span></h6></div>');
					redirect('Pro1');

                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><h6>
                    Salah Password!</h6></div>');
                   $this->index();
                }
					
				}else if($user['role'] == '0'){
					$this->session->set_flashdata('message','<div class ="alert alert-danger" roles="alert"><h6> Akun Anda sedang di Non-aktifkan !</h6> </div>');
					$this->index();
					
				}else {
					$this->session->set_flashdata('message','<div class ="alert alert-danger" roles="alert"><h6> Akun Anda tidak terdaftar ! </h6></div>');
					$this->index();
				}
				

			}
	}

	public function e_profile(){
		$data['user'] =  $this->db->get_where('users', ['username' => $this->session->userdata('user')])->row_array();

		$this->load->view('template/header',$data);
		$this->load->view('profile');
		$this->load->view('template/footer');

	}
	public function editprofile($id){

		$user = $this->Model_data->ambil_id_profile($id);
		$data['query1'] = $this->Model_data->ambil_id_profile($id);
		$cek_username = $_POST['username'];
			if($cek_username){
				$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[pengguna.username]', [
            'is_unique' => 'This username has already registered!']);
			}
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', ['min_length' => 'Kata sandi terlalu pendek!']);

		if($this->form_validation->run()==false){
			$this->e_profile();

		}else{

			

			$cekgambar1 = $_FILES['foto']['name'];

			if($cekgambar1){

		$config['allowed_types'] = 'gif|jpg|png|jpeg|HEIC';
        $config['max_size']      = '2000000';
        $config['upload_path']   = FCPATH .'./uploadfile/';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('foto')) {

        	$old_image = $data['query1']['foto'];
        	if($old_image != 'avatar.png'){
        		unlink(FCPATH . 'uploadfile/' . $old_image);
        	}

            $new_image =  $this->upload->data('file_name');
            $this->db->set('foto',$new_image);
            $this->db->where('id_pengguna', $id);
			$this->db->update('pengguna');
        } else{
            return "avatar.png";
        }
			}

		$cek_username = $_POST['username'];
			if($cek_username){
				$this->db->set('username', $this->input->post('username'));
			}
		
		$this->db->set('password', password_hash($this->input->post('password'), PASSWORD_DEFAULT));
		$this->db->where('id_pengguna', $id);
		$this->db->update('pengguna');
		$this->session->set_flashdata('message','<div class ="alert alert-success" roles="alert"><h6> Data berhasil diubah ! 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </h6></div>');
		$user = $this->Model_data->ambil_id_profile($id);
		$this->session->set_userdata(array('user'=>$user['username'],'password'=>$user['password'],'role' => $user['role'],'id_pengguna'=>$user['id_pengguna']));
			$this->e_profile();
		}

	}


	public function logout(){
		unset($role);
		$this->session->sess_destroy();
		$this->session->set_flashdata('message','<div class ="alert alert-warning" roles="alert"><h6> Log out berhasil </h6></div>');
		$this->index();
	}
}
