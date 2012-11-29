<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct() 
	{
			parent::__construct();
			session_start();
			$this->load->model('web_model');
	}

	public function index()
	{
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
			redirect('webmaster');
		} else {
		$data['warning']="";
		$this->load->view('login',$data);
		}
	}
	public function ceklogin($op)
	{
		if($op == 'proses')
		{
			$data['username'] = $this->input->post('username');
			$data['password'] = md5($this->input->post('password'));
			if($this->input->post('login') == 'login' && $data = $this->web_model->login($data))
			{
				$login['id_users'] = $data['id_users'];
				$login['status'] = '1';
				$login['nama'] = $data['nama'];
				$login['username'] = $data['username'];
				$this->session->set_userdata($login);
					redirect('webmaster');
			}else redirect('login/ceklogin/salah');
			
		}
		if($op == 'salah')
		{
			$data['warning'] = "username atau password salah!";
			$this->load->view('login', $data);
		}
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */