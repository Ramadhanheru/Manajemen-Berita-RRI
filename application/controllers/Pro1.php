<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pro1 extends CI_Controller {

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

			if($this->session->userdata('role')!= '3')
				redirect ('login');
	}
	public function index()
	{
		 $this->load->view('template/header');
		 $this->load->view('template/sidebar');
		 $this->load->view('blank');
		 $this->load->view('template/footer');
	}
	///////////////////////////////////////////
	public function laporan_berita()
	{
		 $this->load->view('template/header');
		 $this->load->view('template/sidebar');
		 $this->load->view('laporan_berita');
		 $this->load->view('template/footer');
	}
	

}
