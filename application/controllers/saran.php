<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Saran extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url', 'text_helper','date'));
		$this->load->model('Web_model');
		$this->load->library(array('Pagination','image_lib','form_validation'));
	}	
	public function index()
	{
		$data['judul'] = "Tambah Saran";
		$data['msg'] = "";
		$data['daftarmenu'] = $this->Web_model->Menu();
		$this->load->view('home/header',$data);
		$this->load->view('home/saran',$data);
		$this->load->view('home/sidebar');
		$this->load->view('home/footer');
	}
	function kirim_saran(){
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('email', 'Alamat Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('subjek', 'Subjek', 'trim|required');
		$this->form_validation->set_rules('pesan', 'Pesan', 'trim|required');
		
		$this->form_validation->set_message('required', '%s harus diisi');
		$this->form_validation->set_message('valid_email', '%s harus diisi dengan email yang valid');
		$this->form_validation->set_message('is_unique', '%s sudah dipakai');
		
		if($this->form_validation->run()=== FALSE)
		{
			$data['judul'] = "kirim Saran";
			$data['msg'] = "";
			$data['daftarmenu'] = $this->Web_model->Menu();
			$this->load->view('home/header',$data);
			$this->load->view('home/saran',$data);
			$this->load->view('home/sidebar');	
			$this->load->view('home/footer');
		} else {	
			$data['judul'] = "Kirim Saran";
			$nama= $this->input->post('nama');
			$email= $this->input->post('email');
			$subjek= $this->input->post('subjek');
			$pesan= $this->input->post('pesan');
			$unik_code= $this->input->post('unik_code');
			
				if($unik_code == $this->session->userdata('unik_code')){
					$datains = array(
					'nama'=>$nama,
					'email'=>$email,
					'subjek'=>$subjek,
					'pesan'=>$pesan,
					'tanggal'=>date('Y-m-d H:i:s')
					);
					$this->Web_model->tambah_saran($datains);
					$this->session->set_userdata(array('unik_code'=>rand(1000,9999)));
					$pesan="<div class='success' style='width:400px;color:red'>Saran sudah terkirim.</div>";
				} else {
					$pesan="<div class='success' style='width:400px;color:red'>Captcha yang Anda Masukan Salah!</div>";
				}
			$data['msg'] = $pesan;
			$data['daftarmenu'] = $this->Web_model->Menu();
			$this->load->view('home/header',$data);
			$this->load->view('home/saran',$data);
			$this->load->view('home/sidebar');	
			$this->load->view('home/footer');
		}
	}
}

/* End of file saran.php */
/* Location: ./application/controllers/saran.php */