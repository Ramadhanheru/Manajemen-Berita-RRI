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

	public function profile(){
		$data['user'] =  $this->db->get_where('users', ['username' => $this->session->userdata('user')])->row_array();

		 $this->load->view('template/header');
		 $this->load->view('template/sidebar');
		 $this->load->view('profile',$data);
		 $this->load->view('template/footer');

	}
	public function editprofile(){
		$data['user'] =  $this->db->get_where('users', ['username' => $this->session->userdata('user')])->row_array();
		$id = $this->input->post('id_user');
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
			$this->session->set_flashdata('message','<div class ="alert alert-success" roles="alert"><h6> Data berhasil diUpdate ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </h6></div>');
				$user = $this->Model_data->ambil_id_profile($id);
			redirect('login/profile');

        } else{
            return "user.png";
        }
			}

		$data = [
                'nama' => $this->input->post('nama', true),
                'alamat' => $this->input->post('alamat', true),
                'no_hp' => $this->input->post('no_hp', true),
                'email' => $this->input->post('email', true)
            ];

				$this->db->set($data);
				$this->db->where('id_user', $id);
				$this->db->update('users');
				$this->session->set_flashdata('message','<div class ="alert alert-success" roles="alert"><h6> Data berhasil diUpdate ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </h6></div>');
				$user = $this->Model_data->ambil_id_profile($id);
				$this->session->set_userdata(array('user'=>$user['username'],'password'=>$user['password'],'role' => $user['role'],'id_user'=>$user['id_user']));
			redirect('login/profile');
	}

	public function editPassword(){

		$id = $this->input->post('id_user');
		
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Kata sandi tidak cocok!',
            'min_length' => 'Kata sandi terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]');

		if($this->form_validation->run()==false){
			$this->profile();

		}else{

		$this->db->set('password', password_hash($this->input->post('password2'), PASSWORD_DEFAULT));
		$this->db->where('id_user', $id);
		$this->db->update('users');
		$this->session->set_flashdata('message','<div class ="alert alert-success" roles="alert"><h6> Data berhasil diupdate ! 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </h6></div>');
		$user = $this->Model_data->ambil_id_profile($id);
		$this->session->set_userdata(array('user'=>$user['username'],'password'=>$user['password'],'role' => $user['role'],'id_user'=>$user['id_user']));
			redirect('login/profile');
		}

	}
	public function editUsername(){
		$id = $this->input->post('id_user');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]', [
            'is_unique' => 'This username has already registered!']);
		
		if($this->form_validation->run()==false){
			$this->profile();

		}else{
		$this->db->set('username', $this->input->post('username'));
		$this->db->where('id_user', $id);
		$this->db->update('users');
		$this->session->set_flashdata('message','<div class ="alert alert-success" roles="alert"><h6> Data berhasil diupdate ! 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </h6></div>');
		$user = $this->Model_data->ambil_id_profile($id);
		$this->session->set_userdata(array('user'=>$user['username'],'password'=>$user['password'],'role' => $user['role'],'id_user'=>$user['id_user']));
			redirect('login/profile');
			}
	}


	public function logout(){
		unset($role);
		$this->session->sess_destroy();
		$this->session->set_flashdata('message','<div class ="alert alert-warning" roles="alert"><h6> Log out berhasil </h6></div>');
		$this->index();
	}
}
