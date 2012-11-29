<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() 
	{
			parent::__construct();
			$this->load->helper(array('form','url', 'text_helper','date'));
			$this->load->model('Web_model');
			$this->load->library(array('Pagination','image_lib'));
	}
	public function index()
	{
		$offset=0;
		$limit=5;
		$data['daftarberita'] = $this->Web_model->Ambil_data('tbl_artikel','id_artikel',$offset,$limit);
		$data['daftarpengumuman'] = $this->Web_model->Ambil_data('tbl_pengumuman','id_pengumuman',$offset,$limit);
		$data['daftarabstrak'] = $this->Web_model->Ambil_data('tbl_abstrak','id_abstrak',$offset,$limit);
		$data['daftarslide'] = $this->Web_model->get_slide();
		$data['daftaragenda'] = $this->Web_model->Ambil_data('tbl_agenda','id_agenda',$offset,$limit);
		$data['daftarmenu'] = $this->Web_model->Menu();
		$data['judul'] = "Home";
		$this->load->view('home/header',$data);
		$this->load->view('home/slider',$data);
		$this->load->view('home/content',$data);
		$this->load->view('home/footer');
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */