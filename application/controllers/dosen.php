<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dosen extends CI_Controller {

	public function __construct() 
	{
			parent::__construct();
			$this->load->helper(array('form','url', 'text_helper','date'));
			$this->load->model('Web_model');
			$this->load->library(array('Pagination','image_lib'));
	}
	public function index()
	{
		$data['daftardosen'] = $this->Web_model->Data_Dosen();
		$data['judul'] = "Daftar Data Dosen";
		$data['daftarmenu'] = $this->Web_model->Menu();
		$this->load->view('home/header',$data);
		$this->load->view('home/dosen/dosen',$data);
		$this->load->view('home/sidebar');
		$this->load->view('home/footer');
	}
	
	public function detail()
	{
		$page=$this->uri->segment(3);
		$dt=explode("-",$page);
		$id=$dt[0];
		$data['datadosen'] = $this->Web_model->Detail('tbl_dosen',"id_dosen='$id'");
		$data['daftarmenu'] = $this->Web_model->Menu();
		$data['judul'] = "Data Dosen Prodi";
		$this->load->view('home/header',$data);
		$this->load->view('home/dosen/detail_dosen',$data);
		$this->load->view('home/sidebar');
		$this->load->view('home/footer');
		
	}
}

/* End of file dosen.php */
/* Location: ./application/controllers/dosen.php */