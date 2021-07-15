<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Redaksi extends CI_Controller {

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

			if($this->session->userdata('role')!= '4')
				redirect ('login');
	}
	public function index()
	{
		$data['user'] =  $this->db->get_where('users', ['username' => $this->session->userdata('user')])->row_array();
		$data['total1'] = $this->Model_data->total_warta_daerah();
		$data['total2'] = $this->Model_data->total_warta_olahraga();
		$data['total3'] = $this->Model_data->total_warta_berita();
		$data['total4'] = $this->Model_data->total_warta_berita_masuk();
		 $this->load->view('template/header');
		 $this->load->view('template/sidebar',$data);
		 $this->load->view('blank',$data);
		 $this->load->view('template/footer');
	}
	///////////////////////////////////////////
	public function warta_berita()
	{
		$data['user'] =  $this->db->get_where('users', ['username' => $this->session->userdata('user')])->row_array();
		$data['query'] = $this->Model_data->warta_berita0();
		$data['query1'] = $this->Model_data->warta_berita1();

		 $this->load->view('template/header');
		 $this->load->view('template/sidebar',$data);
		 $this->load->view('warta_berita',$data);
		 $this->load->view('template/footer');
	}
	public function pdf_warta_berita($berita,$desk_editor,$tanggal){
		/* Create PDF File*/
      	$this->load->library('pdf');
      	$berita = urldecode($this->uri->segment(3));
      	$desk_editor = urldecode($this->uri->segment(4));

       $data['query'] = $this->Model_data->pdf_warta_berita($berita,$desk_editor,$tanggal);
       $data['query1'] =  $this->Model_data->get_warta_berita_by_id($berita,$desk_editor,$tanggal);
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
	public function siarkan_warta_berita($desk_editor,$tanggal){

		$data = [
                'frame' => $this->input->post('frame', true),
                'durasi' => $this->input->post('durasi', true),
                'pembaca_berita' => $this->input->post('pembaca_berita', true),
                'status' => 1
            ];
				$this->db->set($data);
				$this->db->where('desk_editor', $desk_editor);
				$this->db->where('tanggal', $tanggal);
				$this->db->where('id_laporan_berita', $this->input->post('id_laporan_berita', true));
				$this->db->update('warta_berita');

				$this->db->set('status',2);
				$this->db->where('id_laporan_berita', $this->input->post('id_laporan_berita', true));
				$this->db->update('laporan_berita');
				$this->session->set_flashdata('message','<div class ="alert alert-success" roles="alert"><h6> Data berhasil ditambah ! 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </h6></div>');
				redirect('pro1/warta_berita');
	}
	

	public function pdf_draft_siaran(){
		/* Create PDF File*/
      	$this->load->library('pdf');
      	$tanggal = $this->input->post('tanggal', true);
      	$data['query'] = $this->Model_data->pdf_draft_siaran_daerah($tanggal);
      	$data['query1'] = $this->Model_data->pdf_draft_siaran_olahraga($tanggal);
      	$data['query2'] = $this->Model_data->pdf_draft_siaran_daerah_by_id($tanggal);
      	$data['query3'] = $this->Model_data->pdf_draft_siaran_olahraga_by_id($tanggal);

       $this->load->view('print_draft_siaran',$data);

        $paper_size='Legal';
	    $orientation='potrait';
	    $data_header= array('title' => 'Convert to Pdf');
	    $html = $this->output->get_output();
	    $this->pdf->set_paper($paper_size, $orientation, $data_header);

	    $this->pdf->load_html($html);
	    $this->pdf->render();
	    $this->pdf->stream('Draft Siaran.pdf', array('Attachment' =>0));

	}
}
