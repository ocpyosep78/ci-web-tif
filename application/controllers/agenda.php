<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agenda extends CI_Controller {

	public function __construct() 
	{
			parent::__construct();
			$this->load->helper(array('form','url', 'text_helper','date'));
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
		$config['base_url'] = base_url() . '/agenda/index/';
		$total = $this->Web_model->Total_data('tbl_agenda');
		$config['total_rows'] = $total->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['first_link'] = 'Awal';
		$config['last_link'] = 'Akhir';
		$config['next_link'] = 'Selanjutnya';
		$config['prev_link'] = 'Sebelumnya';
		$this->pagination->initialize($config);
		$data['paginator'] = $this->pagination->create_links();
		$data['dataagenda'] = $this->Web_model->Ambil_data('tbl_agenda','id_agenda',$offset,$limit);
		$data['daftaragenda'] = $this->Web_model->Ambil_data('tbl_agenda','id_agenda',0,5);
		$data['daftarmenu'] = $this->Web_model->Menu();
		$data['judul'] = "agenda Terbaru";
		$this->load->view('home/header',$data);
		$this->load->view('home/agenda/agenda',$data);
		$this->load->view('home/sidebar');
		$this->load->view('home/footer');
	}
	
	public function detail()
	{
		$id=$this->uri->segment(3);
		$data['agenda'] = $this->Web_model->Detail('tbl_agenda',"id_agenda='$id'");
		$data['judul'] = "agenda Terbaru";
		$data['daftarmenu'] = $this->Web_model->Menu();
		$this->load->view('home/header',$data);
		$this->load->view('home/agenda/detail_agenda',$data);
		$this->load->view('home/sidebar');
		$this->load->view('home/footer');
		
	}
	
	public function feed(){
		$data['feed_name'] = 'Agenda Terbaru - Teknik Informatika UIN Suka';
		$data['encoding'] = 'utf-8';
        $data['feed_url'] = 'http://informatika.uin-suka.ac.id/agenda/feed';
        $data['page_description'] = 'Informasi Website Teknik Informatika';
        $data['page_language'] = 'en-en';
        $data['creator_email'] = 'udinjust4u@yahoo.com';
        $data['posts'] = $this->Web_model->getPosts('tbl_agenda','id_agenda',10);
        header("Content-Type: application/rss+xml");
		$this->load->view('home/agenda/rss', $data);
	
	}
}

/* End of file agenda.php */
/* Location: ./application/controllers/agenda.php */