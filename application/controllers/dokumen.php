<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dokumen extends CI_Controller {

	public function __construct() 
	{
			parent::__construct();
			$this->load->helper(array('form','url', 'text_helper','date','download'));
			$this->load->model('Web_model');
			$this->load->library(array('Pagination','image_lib'));
	}
	public function index()
	{
		$page=$this->uri->segment(3);
		$limit=10;
		if(!$page):
			$offset = 0;
		else:
			$offset = $page;
		endif;
		$data["page"] = $page;
		$config['base_url'] = base_url() . '/dokumen/index/';
		$total = $this->Web_model->Total_data('tbl_dokumen');
		$config['total_rows'] = $total->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['first_link'] = 'Awal';
		$config['last_link'] = 'Akhir';
		$config['next_link'] = 'Selanjutnya';
		$config['prev_link'] = 'Sebelumnya';
		$this->pagination->initialize($config);
		$data['paginator'] = $this->pagination->create_links();
		$data['daftardokumen'] = $this->Web_model->Ambil_data('tbl_dokumen','id_dokumen',$offset,$limit);
		$data['daftarmenu'] = $this->Web_model->Menu();
		$data['judul'] = "Download Dokumen Akademik";
		$this->load->view('home/header',$data);
		$this->load->view('home/dokumen/dokumen',$data);
		$this->load->view('home/sidebar');
		$this->load->view('home/footer');
	}
}

/* End of file dokumen.php */
/* Location: ./application/controllers/dokumen.php */