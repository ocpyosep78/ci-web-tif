<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct() 
	{
			parent::__construct();
			$this->load->helper(array('form','url', 'text_helper','date'));
			$this->load->model('Web_model');
			$this->load->library(array('Pagination','image_lib'));
	}
	public function index()
	{
		redirect('home');
	}
	
	public function detail(){
		
		$page=$this->uri->segment(3);
		if(!$page):
			$id = 1;
		else:
			$dt=explode("-",$page);
			$id=$dt[0];
		endif;
		$data['detailmenu'] = $this->Web_model->Detail('tbl_datastatis',"id_datastatis='$id'");
		$data['daftarmenu'] = $this->Web_model->Menu();
		$data['judul'] = "Profil Teknik Informatika";
		$this->load->view('home/header',$data);
		$this->load->view('home/profil',$data);
		$this->load->view('home/sidebar');
		$this->load->view('home/footer');
	
	}
}

/* End of file profil.php */
/* Location: ./application/controllers/profil.php */