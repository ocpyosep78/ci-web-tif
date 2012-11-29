<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Webmaster extends CI_Controller {

	public function __construct() 
	{
			parent::__construct();
			session_start();
			$this->load->helper(array('form','url', 'text_helper','date'));
			$this->load->model('Webmaster_model');
			$this->load->library(array('Pagination','image_lib'));
	}
	
	//fungsi index
	public function index()
	{
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
			$data['scriptmce'] = $this->scripttiny_mce();
			$data['judul'] = "Halaman Webmaster untuk Control Panel Website";
			$data['nama'] = $this->session->userdata('nama');
			$data['username'] = $this->session->userdata('username');
			$data['status'] = $this->session->userdata('status');	
			$this->load->view('webmaster/header',$data);
			$this->load->view('webmaster/sidebar');
			$this->load->view('webmaster/isi_index',$data);
			$this->load->view('webmaster/footer');
		} else redirect('login');
	}
	
	//fungsi berita
	public function berita()
	{
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
			$page=$this->uri->segment(3);
			$limit=10;
			if(!$page):
				$offset = 0;
			else:
				$offset = $page;
			endif;
			$data["page"] = $page;
			$config['base_url'] = base_url() . '/index.php/webmaster/berita/';
			$data['scriptmce'] = $this->scripttiny_mce();
			$total = $this->Webmaster_model->Total_Data_Berita();
			$config['total_rows'] = $total->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$data['paginator'] = $this->pagination->create_links();
			$data['daftarberita'] = $this->Webmaster_model->Berita($offset,$limit);
			$data['judul'] = "Halaman Webmaster untuk Control Panel Website";
			$data['nama'] = $this->session->userdata('nama');
			$data['username'] = $this->session->userdata('username');
			$data['status'] = $this->session->userdata('status');	
			$this->load->view('webmaster/header',$data);
			$this->load->view('webmaster/sidebar');
			$this->load->view('webmaster/berita/berita',$data);
			$this->load->view('webmaster/footer');
		
		} else redirect('login');
	}
	
	
	//fungsi tambahberita
	public function tambahberita()
	{
		
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('judul', 'Judul Berita', 'trim|required');
		$this->form_validation->set_rules('isiberita', 'Isi Berita', 'required');
	
		$this->form_validation->set_message('required', '%s harus diisi');		
		
		if($this->form_validation->run()=== FALSE)
		{
			$data['judul'] = "Tambah Berita - Halaman Webmaster untuk Control Panel Website";
			$data['nama'] = $this->session->userdata('nama');
			$data['username'] = $this->session->userdata('username');
			$data['status'] = $this->session->userdata('status');	
			$data['scriptmce'] = $this->scripttiny_mce();
			$this->load->view('webmaster/header',$data);
			$this->load->view('webmaster/sidebar');
			$this->load->view('webmaster/berita/tambah_berita',$data);
			$this->load->view('webmaster/footer');
		
		} else {
			$tgl = "%Y-%m-%d";
			$jam = "%h:%i:%a";
			$time = time();
			$data['judul']=$this->input->post('judul');
			$data['tipe']=$this->input->post('tipe');
			$data['isi']=$this->input->post('isiberita');
			$data['deskripsi_gambar']=$this->input->post('deskripsi');
			$data['sumber']=$this->input->post('sumber');
			$data["tanggal"] = mdate($tgl,$time);
			$data["jam"] = mdate($jam,$time);
			$config['upload_path'] = './media/berita';
			$config['allowed_types'] = 'gif|jpg|png|bmp';					
			$this->load->library('upload', $config);
				
					if(empty($_FILES['userfile']['name'])){
						$data["gambar"]= "";
						$this->Webmaster_model->Simpan_data("tbl_artikel",$data);
						redirect('webmaster/berita');
					}
					else{
						if(!$this->upload->do_upload())
						{
							echo $this->upload->display_errors();
						}
						else {
						$data["gambar"]=$_FILES['userfile']['name'];
						$this->Webmaster_model->Simpan_data("tbl_artikel",$data);
						redirect('webmaster/berita');
						}
					}
			}
		} else redirect('login');
		
	}
	
	//fungsi hapus berita
	function hapusberita()
	{
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
			$id='';
			if ($this->uri->segment(3) === FALSE)
			{
    			$id=$id;
			}
			else
			{
				$id = $this->uri->segment(3);
			}
			$data['scriptmce'] = $this->scripttiny_mce();
			$this->Webmaster_model->Delete_data($id,"id_artikel","tbl_artikel");
			redirect('webmaster/berita');
		
		} else redirect('login');
	}
	
	//fungsi editartikel (Berita dan Artikel)
	public function editartikel()
	{
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
			$id='';
			if ($this->uri->segment(3) === FALSE)
			{
    			$id=$id;
			}
			else
			{
				$id = $this->uri->segment(3);
			}
			$this->load->library('form_validation');
			$this->form_validation->set_rules('judul', 'Judul Berita', 'trim|required');
			$this->form_validation->set_rules('isiberita', 'Isi Berita', 'required');
		
			$this->form_validation->set_message('required', '%s harus diisi');		
		
			if($this->form_validation->run()=== FALSE)
			{
				$data['judul'] = "Tambah Berita - Halaman Webmaster untuk Control Panel Website";
				$data['nama'] = $this->session->userdata('nama');
				$data['username'] = $this->session->userdata('username');
				$data['status'] = $this->session->userdata('status');	
				$data['scriptmce'] = $this->scripttiny_mce();
				$data['edit'] = $this->Webmaster_model->Edit_data("tbl_artikel","id_artikel=$id");
				$this->load->view('webmaster/header',$data);
				$this->load->view('webmaster/sidebar');
				$this->load->view('webmaster/berita/edit_berita',$data);
				$this->load->view('webmaster/footer');
		
			} else {
				$tgl = "%Y-%m-%d";
				$jam = "%h:%i:%a";
				$time = time();
				$data['judul']=$this->input->post('judul');
				$data['tipe']=$this->input->post('tipe');
				$data['isi']=$this->input->post('isiberita');
				$data['deskripsi_gambar']=$this->input->post('deskripsi');
				$data['sumber']=$this->input->post('sumber');
				$data["tanggal"] = mdate($tgl,$time);
				$data["jam"] = mdate($jam,$time);
				$data['id_artikel'] = $this->input->post('id');
				$config['upload_path'] = './media/berita';
				$config['allowed_types'] = 'gif|jpg|png|bmp';					
				$this->load->library('upload', $config);
				
					if(empty($_FILES['userfile']['name'])){
						$this->Webmaster_model->Update_data("tbl_artikel",$data,"id_artikel");
						if($data['tipe']=="berita"){
							redirect('webmaster/berita');
						} else redirect('webmaster/artikel');
					}
					else{
						if(!$this->upload->do_upload())
						{
							echo $this->upload->display_errors();
						}
						else {
						$data["gambar"]=$_FILES['userfile']['name'];
						$this->Webmaster_model->Update_data("tbl_artikel",$data,"id_artikel");
						if($data['tipe']=="berita"){
								redirect('webmaster/berita');
							} else redirect('webmaster/artikel');
						}
					}
			}
			
		
		} else redirect('login');
	
	}
	
	//fungsi hapus artikel
	public function hapusartikel()
	{
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
			$id='';
			if ($this->uri->segment(3) === FALSE)
			{
    			$id=$id;
			}
			else
			{
				$id = $this->uri->segment(3);
			}
			$data['scriptmce'] = $this->scripttiny_mce();
			$this->Webmaster_model->Delete_data($id,"id_artikel","tbl_artikel");
			redirect('webmaster/artikel');
		
		} else redirect('login');
	}
	
	//fungsi artikel
	public function artikel()
	{
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
			$page=$this->uri->segment(3);
			$limit=10;
			if(!$page):
				$offset = 0;
			else:
				$offset = $page;
			endif;
			$data["page"] = $page;
			$config['base_url'] = base_url() . '/index.php/webmaster/artikel/';
			$data['scriptmce'] = $this->scripttiny_mce();
			$total = $this->Webmaster_model->Total_Data_Artikel();
			$config['total_rows'] = $total->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$data['paginator'] = $this->pagination->create_links();
			$data['daftarartikel'] = $this->Webmaster_model->Artikel($offset,$limit);
			$data['judul'] = "Data Artikel - Halaman Webmaster untuk Control Panel Website";
			$data['nama'] = $this->session->userdata('nama');
			$data['username'] = $this->session->userdata('username');
			$data['status'] = $this->session->userdata('status');	
			$this->load->view('webmaster/header',$data);
			$this->load->view('webmaster/sidebar');
			$this->load->view('webmaster/artikel/artikel',$data);
			$this->load->view('webmaster/footer');
		
		} else redirect('login');
	}
	
	//fungsi tambahartikel
	public function tambahartikel()
	{
		
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('judul', 'Judul Artikel', 'trim|required');
		$this->form_validation->set_rules('isiartikel', 'Isi Artikel', 'required');
	
		$this->form_validation->set_message('required', '%s harus diisi');		
		
		if($this->form_validation->run()=== FALSE)
		{
			$data['judul'] = "Tambah Artikel - Halaman Webmaster untuk Control Panel Website";
			$data['nama'] = $this->session->userdata('nama');
			$data['username'] = $this->session->userdata('username');
			$data['status'] = $this->session->userdata('status');	
			$data['scriptmce'] = $this->scripttiny_mce();
			$this->load->view('webmaster/header',$data);
			$this->load->view('webmaster/sidebar');
			$this->load->view('webmaster/artikel/tambah_artikel',$data);
			$this->load->view('webmaster/footer');
		
		} else {
			$tgl = "%Y-%m-%d";
			$jam = "%h:%i:%a";
			$time = time();
			$data['judul']=$this->input->post('judul');
			$data['tipe']=$this->input->post('tipe');
			$data['isi']=$this->input->post('isiartikel');
			$data['deskripsi_gambar']=$this->input->post('deskripsi');
			$data['sumber']=$this->input->post('sumber');
			$data["tanggal"] = mdate($tgl,$time);
			$data["jam"] = mdate($jam,$time);
			$config['upload_path'] = './media/artikel';
			$config['allowed_types'] = 'gif|jpg|png|bmp';         
			$this->load->library('upload', $config); 
				
					if(empty($_FILES['userfile']['name'])){
						$data["gambar"]= "";
						$this->Webmaster_model->Simpan_data("tbl_artikel",$data);
						redirect('webmaster/artikel');
					}
					else{
						if(!$this->upload->do_upload())
						{
							echo $this->upload->display_errors();
						}
						else {
						$data["gambar"]=$_FILES['userfile']['name'];
						$this->Webmaster_model->Simpan_data("tbl_artikel",$data);
						redirect('webmaster/artikel');
						}
					}
			}
		} else redirect('login');
		
	}
	
	//fungsi pengumuman
	public function pengumuman()
	{
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
			$page=$this->uri->segment(3);
			$limit=10;
			if(!$page):
				$offset = 0;
			else:
				$offset = $page;
			endif;
			$data["page"] = $page;
			$config['base_url'] = base_url() . '/index.php/webmaster/berita/';
			$data['scriptmce'] = $this->scripttiny_mce();
			$total = $this->Webmaster_model->Total_data("tbl_pengumuman");
			$config['total_rows'] = $total->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$data['paginator'] = $this->pagination->create_links();
			$data['datapengumuman'] = $this->Webmaster_model->Ambil_data("tbl_pengumuman",$offset,$limit);
			$data['judul'] = "Manajemen Pengumuman - Halaman Webmaster untuk Control Panel Website";
			$data['nama'] = $this->session->userdata('nama');
			$data['username'] = $this->session->userdata('username');
			$data['status'] = $this->session->userdata('status');	
			$this->load->view('webmaster/header',$data);
			$this->load->view('webmaster/sidebar');
			$this->load->view('webmaster/pengumuman/pengumuman',$data);
			$this->load->view('webmaster/footer');
		
		} else redirect('login');
	}
	
	//fungsi tambah Pengumuman
	public function tambahpengumuman()
	{
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('judul', 'Judul Pengumuman', 'trim|required');
			$this->form_validation->set_rules('isipengumuman', 'Isi Pengumuman', 'required');
		
			$this->form_validation->set_message('required', '%s harus diisi');		
		
		if($this->form_validation->run()=== FALSE)
		{
			$data['judul'] = "Tambah Pengumuman - Halaman Webmaster untuk Control Panel Website";
			$data['nama'] = $this->session->userdata('nama');
			$data['username'] = $this->session->userdata('username');
			$data['status'] = $this->session->userdata('status');	
			$data['scriptmce'] = $this->scripttiny_mce();
			$this->load->view('webmaster/header',$data);
			$this->load->view('webmaster/sidebar');
			$this->load->view('webmaster/pengumuman/tambah_pengumuman',$data);
			$this->load->view('webmaster/footer');
		
		} else {
			$tgl = "%Y-%m-%d";
			$jam = "%h:%i:%a";
			$time = time();
			$data['judul']=$this->input->post('judul');
			$data['isi']=$this->input->post('isipengumuman');
			$data['sumber']=$this->input->post('sumber');
			$data["tanggal"] = mdate($tgl,$time);
			$this->Webmaster_model->Simpan_data("tbl_pengumuman",$data);
			redirect('webmaster/pengumuman');
			}
		} else redirect('login');
	
	}
	
	//fungsi editpengumuman
	public function editpengumuman()
	{
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
			$id='';
			if ($this->uri->segment(3) === FALSE)
			{
    			$id=$id;
			}
			else
			{
				$id = $this->uri->segment(3);
			}
			$this->load->library('form_validation');
			$this->form_validation->set_rules('judul', 'Judul Pengumuman', 'trim|required');
			$this->form_validation->set_rules('isipengumuman', 'Isi Pengumuman', 'required');
		
			$this->form_validation->set_message('required', '%s harus diisi');		
		
			if($this->form_validation->run()=== FALSE)
			{
				$data['judul'] = "Edit Pengumuman - Halaman Webmaster untuk Control Panel Website";
				$data['nama'] = $this->session->userdata('nama');
				$data['username'] = $this->session->userdata('username');
				$data['status'] = $this->session->userdata('status');	
				$data['scriptmce'] = $this->scripttiny_mce();
				$data['edit'] = $this->Webmaster_model->Edit_data("tbl_pengumuman","id_pengumuman=$id");
				$this->load->view('webmaster/header',$data);
				$this->load->view('webmaster/sidebar');
				$this->load->view('webmaster/pengumuman/edit_pengumuman',$data);
				$this->load->view('webmaster/footer');
		
			} else {
				$tgl = "%Y-%m-%d";
				$jam = "%h:%i:%a";
				$time = time();
				$data['id_pengumuman']=$this->input->post('id');
				$data['judul']=$this->input->post('judul');
				$data['isi']=$this->input->post('isipengumuman');
				$data['sumber']=$this->input->post('sumber');
				$data["tanggal"] = mdate($tgl,$time);
				$this->Webmaster_model->Update_data("tbl_pengumuman",$data,"id_pengumuman");
				redirect('webmaster/pengumuman');
			}
		} else redirect('login');
	}
	
	//fungsi hapus pengumuman
	public function hapuspengumuman()
	{
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
			$id='';
			if ($this->uri->segment(3) === FALSE)
			{
    			$id=$id;
			}
			else
			{
				$id = $this->uri->segment(3);
			}
			$data['scriptmce'] = $this->scripttiny_mce();
			$this->Webmaster_model->Delete_data($id,"id_pengumuman","tbl_pengumuman");
			redirect('webmaster/pengumuman');
		
		} else redirect('login');
	}

	//Fungsi Agenda
	public function agenda()
	{
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
			$page=$this->uri->segment(3);
			$limit=10;
			if(!$page):
				$offset = 0;
			else:
				$offset = $page;
			endif;
			$data["page"] = $page;
			$config['base_url'] = base_url() . '/index.php/webmaster/agenda/';
			$data['scriptmce'] = $this->scripttiny_mce();
			$total = $this->Webmaster_model->Total_data("tbl_agenda");
			$config['total_rows'] = $total->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$data['paginator'] = $this->pagination->create_links();
			$data['daftaragenda'] = $this->Webmaster_model->Ambil_data("tbl_agenda",$offset,$limit);
			$data['judul'] = "Manajemen Agenda - Halaman Webmaster untuk Control Panel Website";
			$data['nama'] = $this->session->userdata('nama');
			$data['username'] = $this->session->userdata('username');
			$data['status'] = $this->session->userdata('status');	
			$this->load->view('webmaster/header',$data);
			$this->load->view('webmaster/sidebar');
			$this->load->view('webmaster/agenda/agenda',$data);
			$this->load->view('webmaster/footer');
		
		} else redirect('login');
	}
	
	//fungsi tambah agenda
	public function tambahagenda()
	{
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('judulacara', 'Judul Agenda', 'trim|required');
			$this->form_validation->set_rules('tempat', 'Tempat Agenda', 'trim|required');
			$this->form_validation->set_rules('tgl_mulai', 'Tanggal mulai', 'trim|required');
			$this->form_validation->set_rules('tgl_selesai', 'Tanggal Selesai', 'trim|required');
			$this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'trim|required');
			$this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'trim|required');
			$this->form_validation->set_rules('sumber', 'Sumber', 'trim|required');
			$this->form_validation->set_rules('isiagenda', 'Isi Agenda', 'required');
		
			$this->form_validation->set_message('required', '%s harus diisi');		
		
		if($this->form_validation->run()=== FALSE)
		{
			$data['judul'] = "Tambah Agenda - Halaman Webmaster untuk Control Panel Website";
			$data['nama'] = $this->session->userdata('nama');
			$data['username'] = $this->session->userdata('username');
			$data['status'] = $this->session->userdata('status');	
			$data['scriptmce'] = $this->scripttiny_mce();
			$this->load->view('webmaster/header',$data);
			$this->load->view('webmaster/sidebar');
			$this->load->view('webmaster/agenda/tambah_agenda',$data);
			$this->load->view('webmaster/footer');
		
		} else {
			$tgl = "%Y-%m-%d";
			$jam = "%h:%i:%a";
			$time = time();
			$data['judul']=$this->input->post('judulacara');
			$data['tgl_mulai']=$this->input->post('tgl_mulai');
			$data['tgl_selesai']=$this->input->post('tgl_selesai');
			$data['jam_mulai']=$this->input->post('jam_mulai');
			$data['jam_selesai']=$this->input->post('jam_selesai');
			$data['tempat']=$this->input->post('tempat');
			$data['topik']=$this->input->post('isiagenda');
			$data['sumber']=$this->input->post('sumber');
			$data['tgl_posting'] = mdate($tgl,$time);
			$this->Webmaster_model->Simpan_data("tbl_agenda",$data);
			redirect('webmaster/agenda');
			}
		} else redirect('login');
	
	}
	
	//fungsi editagenda
	public function editagenda()
	{
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
			$id='';
			if ($this->uri->segment(3) === FALSE)
			{
    			$id=$id;
			}
			else
			{
				$id = $this->uri->segment(3);
			}
			$this->load->library('form_validation');
			$this->form_validation->set_rules('judulacara', 'Judul Agenda', 'trim|required');
			$this->form_validation->set_rules('tempat', 'Tempat Agenda', 'trim|required');
			$this->form_validation->set_rules('tgl_mulai', 'Tanggal mulai', 'trim|required');
			$this->form_validation->set_rules('tgl_selesai', 'Tanggal Selesai', 'trim|required');
			$this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'trim|required');
			$this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'trim|required');
			$this->form_validation->set_rules('sumber', 'Sumber', 'trim|required');
			$this->form_validation->set_rules('isiagenda', 'Isi Agenda', 'required');		
			$this->form_validation->set_message('required', '%s harus diisi');		
		
			if($this->form_validation->run()=== FALSE)
			{
				$data['judul'] = "Edit Agenda - Halaman Webmaster untuk Control Panel Website";
				$data['nama'] = $this->session->userdata('nama');
				$data['username'] = $this->session->userdata('username');
				$data['status'] = $this->session->userdata('status');	
				$data['scriptmce'] = $this->scripttiny_mce();
				$data['edit'] = $this->Webmaster_model->Edit_data("tbl_agenda","id_agenda=$id");
				$this->load->view('webmaster/header',$data);
				$this->load->view('webmaster/sidebar');
				$this->load->view('webmaster/agenda/edit_agenda',$data);
				$this->load->view('webmaster/footer');
		
			} else {
				$tgl = "%Y-%m-%d";
				$jam = "%h:%i:%a";
				$time = time();
				$data['id_agenda']=$this->input->post('id');
				$data['judul']=$this->input->post('judulacara');
				$data['tgl_mulai']=$this->input->post('tgl_mulai');
				$data['tgl_selesai']=$this->input->post('tgl_selesai');
				$data['jam_mulai']=$this->input->post('jam_mulai');
				$data['jam_selesai']=$this->input->post('jam_selesai');
				$data['tempat']=$this->input->post('tempat');
				$data['topik']=$this->input->post('isiagenda');
				$data['sumber']=$this->input->post('sumber');
				$data['tgl_posting'] = mdate($tgl,$time);				
				$this->Webmaster_model->Update_data("tbl_agenda",$data,"id_agenda");
				redirect('webmaster/agenda');
			}
		} else redirect('login');
	}
	
	//fungsi hapus agenda
	public function hapusagenda()
	{
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
			$id='';
			if ($this->uri->segment(3) === FALSE)
			{
    			$id=$id;
			}
			else
			{
				$id = $this->uri->segment(3);
			}
			$data['scriptmce'] = $this->scripttiny_mce();
			$this->Webmaster_model->Delete_data($id,"id_agenda","tbl_agenda");
			redirect('webmaster/agenda');
		
		} else redirect('login');
	}

	
	//fungsi jurnal
	public function jurnal()
	{
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
			$page=$this->uri->segment(3);
			$limit=10;
			if(!$page):
				$offset = 0;
			else:
				$offset = $page;
			endif;
			$data["page"] = $page;
			$config['base_url'] = base_url() . '/index.php/webmaster/jurnal/';
			$data['scriptmce'] = $this->scripttiny_mce();
			$total = $this->Webmaster_model->Total_data("tbl_abstrak");
			$config['total_rows'] = $total->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$data['paginator'] = $this->pagination->create_links();
			$data['daftarjurnal'] = $this->Webmaster_model->Abstrak($offset,$limit);
			$data['judul'] = "Manajemen Abstrak - Halaman Webmaster untuk Control Panel Website";
			$data['nama'] = $this->session->userdata('nama');
			$data['username'] = $this->session->userdata('username');
			$data['status'] = $this->session->userdata('status');	
			$this->load->view('webmaster/header',$data);
			$this->load->view('webmaster/sidebar');
			$this->load->view('webmaster/jurnal/jurnal',$data);
			$this->load->view('webmaster/footer');
		
		} else redirect('login');
	}
	
	//fungsi tambah Jurnal
	public function tambahjurnal()
	{
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('nim', 'Nim', 'trim|required');
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('dosen', 'Dosen Pembimbing', 'trim|required');
			$this->form_validation->set_rules('judul', 'Judul Skripsi', 'trim|required');
			$this->form_validation->set_rules('tgl_munaqosah', 'Tanggal Munaqosah', 'trim|required');
			$this->form_validation->set_rules('isiabstrak', 'Isi Abstrak', 'trim|required');
			
			$this->form_validation->set_message('required', '%s harus diisi');		
		
		if($this->form_validation->run()=== FALSE)
		{
			$data['judul'] = "Tambah Pengumuman - Halaman Webmaster untuk Control Panel Website";
			$data['nama'] = $this->session->userdata('nama');
			$data['username'] = $this->session->userdata('username');
			$data['status'] = $this->session->userdata('status');	
			$data['scriptmce'] = $this->scripttiny_mce();
			$data['datadosen'] = $this->Webmaster_model->Dosen();
			$this->load->view('webmaster/header',$data);
			$this->load->view('webmaster/sidebar');
			$this->load->view('webmaster/jurnal/tambah_jurnal',$data);
			$this->load->view('webmaster/footer');
		
		} else {
			$data['nim']=$this->input->post('nim');
			$data['nama_mhs']=$this->input->post('nama');
			$data['id_pembimbing']=$this->input->post('dosen');
			$data['tgl_munaqosah']=$this->input->post('tgl_munaqosah');
			$data['judul']=$this->input->post('judul');
			$data['abstrak']=$this->input->post('isiabstrak');
			$this->Webmaster_model->Simpan_data("tbl_abstrak",$data);
			redirect('webmaster/jurnal');
			}
		} else redirect('login');
	
	}
	
	//fungsi editjurnal
	public function editjurnal()
	{
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
			$id='';
			if ($this->uri->segment(3) === FALSE)
			{
    			$id=$id;
			}
			else
			{
				$id = $this->uri->segment(3);
			}
			$this->load->library('form_validation');
			$this->form_validation->set_rules('nim', 'Nim', 'trim|required');
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('dosen', 'Dosen Pembimbing', 'trim|required');
			$this->form_validation->set_rules('judul', 'Judul Skripsi', 'trim|required');
			$this->form_validation->set_rules('tgl_munaqosah', 'Tanggal Munaqosah', 'trim|required');
			$this->form_validation->set_rules('isiabstrak', 'Isi Abstrak', 'trim|required');
		
			$this->form_validation->set_message('required', '%s harus diisi');		
		
			if($this->form_validation->run()=== FALSE)
			{
				$data['judul'] = "Edit Jurnal - Halaman Webmaster untuk Control Panel Website";
				$data['nama'] = $this->session->userdata('nama');
				$data['username'] = $this->session->userdata('username');
				$data['status'] = $this->session->userdata('status');	
				$data['scriptmce'] = $this->scripttiny_mce();
				$data['edit'] = $this->Webmaster_model->getAbstrak($id);
				$data['datadosen'] = $this->Webmaster_model->Dosen();
				$this->load->view('webmaster/header',$data);
				$this->load->view('webmaster/sidebar');
				$this->load->view('webmaster/jurnal/edit_jurnal',$data);
				$this->load->view('webmaster/footer');
		
			} else {
				$data['nim'] = $this->input->post('nim');
				$data['id_abstrak'] = $this->input->post('id');
				$data['nama_mhs']=$this->input->post('nama');
				$data['id_pembimbing']=$this->input->post('dosen');
				$data['tgl_munaqosah']=$this->input->post('tgl_munaqosah');
				$data['judul']=$this->input->post('judul');
				$data['abstrak']=$this->input->post('isiabstrak');
				$this->Webmaster_model->Update_data("tbl_abstrak",$data,"id_abstrak");
				redirect('webmaster/jurnal');
			}
		} else redirect('login');
	}
	
	//fungsi hapus jurnal
	public function hapusjurnal()
	{
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
			$id='';
			if ($this->uri->segment(3) === FALSE)
			{
    			$id=$id;
			}
			else
			{
				$id = $this->uri->segment(3);
			}
			$data['scriptmce'] = $this->scripttiny_mce();
			$this->Webmaster_model->Delete_data($id,"id_abstrak","tbl_abstrak");
			redirect('webmaster/jurnal');
		
		} else redirect('login');
	}
	//fungsi saran
	public function saran()
	{
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
			$page=$this->uri->segment(3);
			$limit=10;
			if(!$page):
				$offset = 0;
			else:
				$offset = $page;
			endif;
			$data["page"] = $page;
			$config['base_url'] = base_url() . '/index.php/webmaster/berita/';
			$data['scriptmce'] = $this->scripttiny_mce();
			$total = $this->Webmaster_model->Total_data("tbl_saran");
			$config['total_rows'] = $total->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$data['paginator'] = $this->pagination->create_links();
			$data['datasaran'] = $this->Webmaster_model->Ambil_data("tbl_saran",$offset,$limit);
			$data['judul'] = "Data Saran - Halaman Webmaster untuk Control Panel Website";
			$data['nama'] = $this->session->userdata('nama');
			$data['username'] = $this->session->userdata('username');
			$data['status'] = $this->session->userdata('status');	
			$this->load->view('webmaster/header',$data);
			$this->load->view('webmaster/sidebar');
			$this->load->view('webmaster/saran',$data);
			$this->load->view('webmaster/footer');
		
		} else redirect('login');
	}
	//fungsi hapus saran
	public function hapussaran()
	{
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
			$id='';
			if ($this->uri->segment(3) === FALSE)
			{
				$id=$id;
			}
			else
			{
				$id = $this->uri->segment(3);
			}
			$this->Webmaster_model->Delete_Data($id,"id_saran","tbl_saran");
			redirect('webmaster/saran');
			
		} else redirect('login');
	}
	
	
	//fungsi dosen
	public function dosen()
	{
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
			$page=$this->uri->segment(3);
			$limit=10;
			if(!$page):
				$offset = 0;
			else:
				$offset = $page;
			endif;
			$data["page"] = $page;
			$config['base_url'] = base_url() . '/index.php/webmaster/dosen/';
			$data['scriptmce'] = $this->scripttiny_mce();
			$total = $this->Webmaster_model->Total_data("tbl_dosen");
			$config['total_rows'] = $total->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$data['paginator'] = $this->pagination->create_links();
			$data['daftardosen'] = $this->Webmaster_model->Ambil_data("tbl_dosen",$offset,$limit);
			$data['judul'] = "Data Dosen - Halaman Webmaster untuk Control Panel Website";
			$data['nama'] = $this->session->userdata('nama');
			$data['username'] = $this->session->userdata('username');
			$data['status'] = $this->session->userdata('status');	
			$this->load->view('webmaster/header',$data);
			$this->load->view('webmaster/sidebar');
			$this->load->view('webmaster/dosen/dosen',$data);
			$this->load->view('webmaster/footer');
		
		} else redirect('login');
	}
	//fungsi tambah Dosen
	public function tambahdosen()
	{
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('nip', 'NIP Dosen', 'trim|required');
			$this->form_validation->set_rules('nama', 'Nama Dosen', 'trim|required');
		
			$this->form_validation->set_message('required', '%s harus diisi');		
		
		if($this->form_validation->run()=== FALSE)
		{
			$data['judul'] = "Tambah Dosen - Halaman Webmaster untuk Control Panel Website";
			$data['nama'] = $this->session->userdata('nama');
			$data['username'] = $this->session->userdata('username');
			$data['status'] = $this->session->userdata('status');	
			$data['scriptmce'] = $this->scripttiny_mce();
			$this->load->view('webmaster/header',$data);
			$this->load->view('webmaster/sidebar');
			$this->load->view('webmaster/dosen/tambah_dosen',$data);
			$this->load->view('webmaster/footer');
		
		} else {
			$data['nip']=$this->input->post('nip');
			$data['nama']=$this->input->post('nama');
			$data['pendidikan']=$this->input->post('pendidikan');
			$data['minat']=$this->input->post('minat');
			$data['alamat']=$this->input->post('alamat');
			$data['email']=$this->input->post('email');
			$data['website']=$this->input->post('website');
			$this->Webmaster_model->Simpan_data("tbl_dosen",$data);
			redirect('webmaster/dosen');
			}
		} else redirect('login');
	
	}
	
	//fungsi edit dosen
	public function editdosen()
	{
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
			$id='';
			if ($this->uri->segment(3) === FALSE)
			{
    			$id=$id;
			}
			else
			{
				$id = $this->uri->segment(3);
			}
				$this->load->library('form_validation');
				$this->form_validation->set_rules('nip', 'NIP Dosen', 'trim|required');
				$this->form_validation->set_rules('nama', 'Nama Dosen', 'trim|required');
				$this->form_validation->set_message('required', '%s harus diisi');		
		
			if($this->form_validation->run()=== FALSE)
			{
				$data['judul'] = "Edit Dosen - Halaman Webmaster untuk Control Panel Website";
				$data['nama'] = $this->session->userdata('nama');
				$data['username'] = $this->session->userdata('username');
				$data['status'] = $this->session->userdata('status');	
				$data['scriptmce'] = $this->scripttiny_mce();
				$data['edit'] = $this->Webmaster_model->Edit_data("tbl_dosen","id_dosen=$id");
				$this->load->view('webmaster/header',$data);
				$this->load->view('webmaster/sidebar');
				$this->load->view('webmaster/dosen/edit_dosen',$data);
				$this->load->view('webmaster/footer');
		
			} else {
				$data['id_dosen']=$this->input->post('id');
				$data['nip']=$this->input->post('nip');
				$data['nama']=$this->input->post('nama');
				$data['pendidikan']=$this->input->post('pendidikan');
				$data['minat']=$this->input->post('minat');
				$data['alamat']=$this->input->post('alamat');
				$data['email']=$this->input->post('email');
				$data['website']=$this->input->post('website');
				$this->Webmaster_model->Update_data("tbl_dosen",$data,"id_dosen");
				redirect('webmaster/dosen');
			}
		} else redirect('login');
	}
	
	//fungsi hapus dosen
	public function hapusdosen()
	{
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
			$id='';
			if ($this->uri->segment(3) === FALSE)
			{
    			$id=$id;
			}
			else
			{
				$id = $this->uri->segment(3);
			}
			$data['scriptmce'] = $this->scripttiny_mce();
			$this->Webmaster_model->Delete_data($id,"id_dosen","tbl_dosen");
			redirect('webmaster/dosen');
		
		} else redirect('login');
	}
	
	//fungsi halaman statis
	public function halstatis()
	{
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
			$page=$this->uri->segment(3);
			$limit=10;
			if(!$page):
				$offset = 0;
			else:
				$offset = $page;
			endif;
			$data["page"] = $page;
			$config['base_url'] = base_url() . '/index.php/webmaster/halstatis/';
			$data['scriptmce'] = $this->scripttiny_mce();
			$total = $this->Webmaster_model->Total_data("tbl_datastatis");
			$config['total_rows'] = $total->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$data['paginator'] = $this->pagination->create_links();
			$data['datahalstatis'] = $this->Webmaster_model->Ambil_data("tbl_datastatis",$offset,$limit);
			$data['scriptmce'] = $this->scripttiny_mce();
			$data['judul'] = "Halaman Webmaster untuk Control Panel Website";
			$data['nama'] = $this->session->userdata('nama');
			$data['username'] = $this->session->userdata('username');
			$data['status'] = $this->session->userdata('status');	
			$this->load->view('webmaster/header',$data);
			$this->load->view('webmaster/sidebar');
			$this->load->view('webmaster/hal_statis/hal_statis',$data);
			$this->load->view('webmaster/footer');
		
		} else redirect('login');
	}
	
	//fungsi edit hal statis
	public function edithalstatis()
	{
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
			$id='';
			if ($this->uri->segment(3) === FALSE)
			{
    			$id=$id;
			}
			else
			{
				$id = $this->uri->segment(3);
			}
				$this->load->library('form_validation');
				$this->form_validation->set_rules('judul', 'Judul Halaman Statis', 'trim|required');
				$this->form_validation->set_rules('isihalstatis', 'isi Halaman Statis', 'trim|required');
				
				$this->form_validation->set_message('required', '%s harus diisi');		
		
			if($this->form_validation->run()=== FALSE)
			{
				$data['judul'] = "Edit Halaman Statis - Halaman Webmaster untuk Control Panel Website";
				$data['nama'] = $this->session->userdata('nama');
				$data['username'] = $this->session->userdata('username');
				$data['status'] = $this->session->userdata('status');	
				$data['scriptmce'] = $this->scripttiny_mce();
				$data['edit'] = $this->Webmaster_model->Edit_data("tbl_datastatis","id_datastatis=$id");
				$this->load->view('webmaster/header',$data);
				$this->load->view('webmaster/sidebar');
				$this->load->view('webmaster/hal_statis/edit_hal_statis',$data);
				$this->load->view('webmaster/footer');
		
			} else {
				$data2['id_datastatis']=$this->input->post('id');
				$data2['judul']=$this->input->post('judul');
				$data2['isi']=$this->input->post('isihalstatis');
				$this->Webmaster_model->Update_data("tbl_datastatis",$data2,"id_datastatis");
				redirect('webmaster/halstatis');
			}
		} else redirect('login');
	}
	
	//fungsi hapus Hal statis
	public function hapushalstatis()
	{
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
			$id='';
			if ($this->uri->segment(3) === FALSE)
			{
    			$id=$id;
			}
			else
			{
				$id = $this->uri->segment(3);
			}
			$data['scriptmce'] = $this->scripttiny_mce();
			$this->Webmaster_model->Delete_data($id,"id_datastatis","tbl_datastatis");
			redirect('webmaster/halstatis');
		
		} else redirect('login');
	}
	
	//fungsi dokumen akademik
	public function dokumen()
	{
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
			$page=$this->uri->segment(3);
			$limit=10;
			if(!$page):
				$offset = 0;
			else:
				$offset = $page;
			endif;
			$data["page"] = $page;
			$config['base_url'] = base_url() . '/index.php/webmaster/dokumen/';
			$data['scriptmce'] = $this->scripttiny_mce();
			$total = $this->Webmaster_model->Total_data("tbl_dokumen");
			$config['total_rows'] = $total->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$data['paginator'] = $this->pagination->create_links();
			$data['daftardokumen'] = $this->Webmaster_model->Ambil_data("tbl_dokumen",$offset,$limit);
			$data['judul'] = "Managemen Dokumen - Halaman Webmaster untuk Control Panel Website";
			$data['nama'] = $this->session->userdata('nama');
			$data['username'] = $this->session->userdata('username');
			$data['status'] = $this->session->userdata('status');	
			$this->load->view('webmaster/header',$data);
			$this->load->view('webmaster/sidebar');
			$this->load->view('webmaster/dokumen/dokumen',$data);
			$this->load->view('webmaster/footer');
		
		} else redirect('login');
	}
	
	//fungsi tambah dokumen
	public function tambahdokumen()
	{
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('judul', 'Judul Dokumen', 'trim|required');
	
			$this->form_validation->set_message('required', '%s harus diisi');		
	
			if($this->form_validation->run()=== FALSE)
			{
				$data['scriptmce'] = $this->scripttiny_mce();
				$data['judul'] = "Halaman Webmaster untuk Control Panel Website";
				$data['nama'] = $this->session->userdata('nama');
				$data['username'] = $this->session->userdata('username');
				$data['status'] = $this->session->userdata('status');	
				$this->load->view('webmaster/header',$data);
				$this->load->view('webmaster/sidebar');
				$this->load->view('webmaster/dokumen/tambah_dokumen',$data);
				$this->load->view('webmaster/footer');
			} else {
				$tgl = "%Y-%m-%d";
				$jam = "%h:%i:%a";
				$time = time();
				$data['judul'] = $this->input->post('judul');
				$data["tanggal"] = mdate($tgl,$time);
				$config['upload_path'] = './media/dokumen';
				$config['allowed_types'] = '*';					
				$this->load->library('upload', $config);
					if(!$this->upload->do_upload())
					{
						echo $this->upload->display_errors();
					}
					else {
						$data["url_file"]=$_FILES['userfile']['name'];
						$this->Webmaster_model->Simpan_data("tbl_dokumen",$data);
						redirect('webmaster/dokumen');
					}
				}
		} else redirect('login');
	}
	
	//fungsi edit dokumen
	public function editdokumen()
	{
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
			$id='';
			if ($this->uri->segment(3) === FALSE)
			{
    			$id=$id;
			}
			else
			{
				$id = $this->uri->segment(3);
			}
			$this->load->library('form_validation');
			$this->form_validation->set_rules('judul', 'Judul Berita', 'trim|required');
		
			$this->form_validation->set_message('required', '%s harus diisi');		
		
			if($this->form_validation->run()=== FALSE)
			{
				$data['judul'] = "Edit Dokumen - Halaman Webmaster untuk Control Panel Website";
				$data['nama'] = $this->session->userdata('nama');
				$data['username'] = $this->session->userdata('username');
				$data['status'] = $this->session->userdata('status');	
				$data['scriptmce'] = $this->scripttiny_mce();
				$data['edit'] = $this->Webmaster_model->Edit_data("tbl_dokumen","id_dokumen=$id");
				$this->load->view('webmaster/header',$data);
				$this->load->view('webmaster/sidebar');
				$this->load->view('webmaster/dokumen/edit_dokumen',$data);
				$this->load->view('webmaster/footer');
		
			} else {
				$tgl = "%Y-%m-%d";
				$jam = "%h:%i:%a";
				$time = time();
				$data2['judul']=$this->input->post('judul');
				$data2['id_dokumen']=$this->input->post('id');
				$data2["tanggal"] = mdate($tgl,$time);
				$config['upload_path'] = './media/dokumen';
				$config['allowed_types'] = '*';					
				$this->load->library('upload', $config);
				
					if(empty($_FILES['userfile']['name'])){
						$this->Webmaster_model->Update_data("tbl_dokumen",$data2,"id_dokumen");
						redirect('webmaster/dokumen');
					}
					else{
						if(!$this->upload->do_upload())
						{
							echo $this->upload->display_errors();
						} else {
							$data2["url_file"]=$_FILES['userfile']['name'];
							$this->Webmaster_model->Update_data("tbl_dokumen",$data2,"id_dokumen");
							redirect('webmaster/dokumen');
						}
					}
			}
			
		
		} else redirect('login');
	
	}
	
	//fungsi hapus dokumen
	public function hapusdokumen()
	{
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
			$id='';
			if ($this->uri->segment(3) === FALSE)
			{
				$id=$id;
			}
			else
			{
				$id = $this->uri->segment(3);
			}
			$dir="media/dokumen/";
			$dokumen=$this->Webmaster_model->getData("tbl_dokumen","id_dokumen=$id");
			foreach($dokumen->result_array() as $dok){
				$nama=$dok['url_file'];			
			}
			$file=$dir.$nama;
			if(file_exists($file)){
				@unlink($file);
			}
			$this->Webmaster_model->Delete_Data($id,"id_dokumen","tbl_dokumen");
			redirect('webmaster/dokumen');
			
		} else redirect('login');
	}
	
	//fungsi Slider Gambar
	public function slider()
	{
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
			$page=$this->uri->segment(3);
			$limit=10;
			if(!$page):
				$offset = 0;
			else:
				$offset = $page;
			endif;
			$data["page"] = $page;
			$config['base_url'] = base_url() . '/index.php/webmaster/slider/';
			$data['scriptmce'] = $this->scripttiny_mce();
			$total = $this->Webmaster_model->Total_data("tbl_slider");
			$config['total_rows'] = $total->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$data['paginator'] = $this->pagination->create_links();
			$data['daftarslider'] = $this->Webmaster_model->Ambil_data("tbl_slider",$offset,$limit);
			$data['judul'] = "Managemen Gambar slider - Halaman Webmaster untuk Control Panel Website";
			$data['nama'] = $this->session->userdata('nama');
			$data['username'] = $this->session->userdata('username');
			$data['status'] = $this->session->userdata('status');	
			$this->load->view('webmaster/header',$data);
			$this->load->view('webmaster/sidebar');
			$this->load->view('webmaster/slider/slider',$data);
			$this->load->view('webmaster/footer');
		
		} else redirect('login');
	}
	
	//fungsi tambah slider
	public function tambahslider()
	{
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('judul', 'Judul Gambar', 'trim|required');
			$this->form_validation->set_rules('deskripsi', 'Deskripsi Gambar', 'trim|required');
			$this->form_validation->set_rules('status', 'Status Slide', 'required');
	
			$this->form_validation->set_message('required', '%s harus diisi');		
	
			if($this->form_validation->run()=== FALSE)
			{
				$data['scriptmce'] = $this->scripttiny_mce();
				$data['judul'] = "Halaman Webmaster untuk Control Panel Website";
				$data['nama'] = $this->session->userdata('nama');
				$data['username'] = $this->session->userdata('username');
				$data['status'] = $this->session->userdata('status');	
				$this->load->view('webmaster/header',$data);
				$this->load->view('webmaster/sidebar');
				$this->load->view('webmaster/slider/tambah_slider',$data);
				$this->load->view('webmaster/footer');
			} else {
				$data['judul'] = $this->input->post('judul');
				$data['deskripsi'] = $this->input->post('deskripsi');
				$data['url'] = $this->input->post('url');
				$data['status'] = $this->input->post('status');
				$config['upload_path'] = './media/photo_slide';
				$config['allowed_types'] = 'gif|jpg|png|bmp';					
				$this->load->library('upload', $config);
					if(!$this->upload->do_upload())
					{
						echo $this->upload->display_errors();
					}
					else {
						$data["gambar"]=$_FILES['userfile']['name'];
						$this->Webmaster_model->Simpan_data("tbl_slider",$data);
						redirect('webmaster/slider');
					}
				}
		} else redirect('login');
	}
	
	//fungsi edit slider
	public function editslider()
	{
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
			$id='';
			if ($this->uri->segment(3) === FALSE)
			{
    			$id=$id;
			}
			else
			{
				$id = $this->uri->segment(3);
			}
			$this->load->library('form_validation');
			$this->form_validation->set_rules('judul', 'Judul Gambar', 'trim|required');
			$this->form_validation->set_rules('deskripsi', 'Deskripsi Gambar', 'trim|required');
			$this->form_validation->set_rules('status', 'Status Slide', 'required');
		
			$this->form_validation->set_message('required', '%s harus diisi');		
		
			if($this->form_validation->run()=== FALSE)
			{
				$data['judul'] = "Edit Dokumen - Halaman Webmaster untuk Control Panel Website";
				$data['nama'] = $this->session->userdata('nama');
				$data['username'] = $this->session->userdata('username');
				$data['status'] = $this->session->userdata('status');	
				$data['scriptmce'] = $this->scripttiny_mce();
				$data['edit'] = $this->Webmaster_model->Edit_data("tbl_slider","id_slider=$id");
				$this->load->view('webmaster/header',$data);
				$this->load->view('webmaster/sidebar');
				$this->load->view('webmaster/slider/edit_slider',$data);
				$this->load->view('webmaster/footer');
		
			} else {
				$data2['id_slider'] = $this->input->post('id');
				$data2['judul'] = $this->input->post('judul');
				$data2['deskripsi'] = $this->input->post('deskripsi');
				$data2['url'] = $this->input->post('url');
				$data2['status'] = $this->input->post('status');
				$config['upload_path'] = './media/photo_slide';
				$config['allowed_types'] = 'gif|jpg|png|bmp';		
				
				$this->load->library('upload', $config);
				
					if(empty($_FILES['userfile']['name'])){
						$this->Webmaster_model->Update_data("tbl_slider",$data2,"id_slider");
						redirect('webmaster/slider');
					}
					else{
						if(!$this->upload->do_upload())
						{
							echo $this->upload->display_errors();
						} else {
							$data2["url_file"]=$_FILES['userfile']['name'];
							$this->Webmaster_model->Update_data("tbl_slider",$data2,"id_slider");
							redirect('webmaster/slider');
						}
					}
			}
			
		
		} else redirect('login');
	
	}
	
	//fungsi hapus slider
	public function hapusslider()
	{
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
			$id='';
			if ($this->uri->segment(3) === FALSE)
			{
				$id=$id;
			}
			else
			{
				$id = $this->uri->segment(3);
			}
			$dir="media/photo_slide";
			$dokumen=$this->Webmaster_model->getData("tbl_slider","id_slider=$id");
			foreach($dokumen->result_array() as $dok){
				$nama=$dok['gambar'];			
			}
			$file=$dir.$nama;
			if(file_exists($file)){
				@unlink($file);
			}
			$this->Webmaster_model->Delete_Data($id,"id_slider","tbl_slider");
			redirect('webmaster/slider');
			
		} else redirect('login');
	}
	
	//fungsi Manajemen Users
	public function users()
	{
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
			$page=$this->uri->segment(3);
			$limit=10;
			if(!$page):
				$offset = 0;
			else:
				$offset = $page;
			endif;
			$data["page"] = $page;
			$config['base_url'] = base_url() . '/index.php/webmaster/berita/';
			$data['scriptmce'] = $this->scripttiny_mce();
			$total = $this->Webmaster_model->Total_data("tbl_users");
			$config['total_rows'] = $total->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$data['paginator'] = $this->pagination->create_links();
			$data['datausers'] = $this->Webmaster_model->Ambil_data("tbl_users",$offset,$limit);
			$data['judul'] = "Manjemen User - Halaman Webmaster untuk Control Panel Website";
			$data['nama'] = $this->session->userdata('nama');
			$data['username'] = $this->session->userdata('username');
			$data['status'] = $this->session->userdata('status');	
			$this->load->view('webmaster/header',$data);
			$this->load->view('webmaster/sidebar');
			$this->load->view('webmaster/user/users',$data);
			$this->load->view('webmaster/footer');
		
		} else redirect('login');
	}
	// fungsi tambah user
	public function tambahuser()
	{
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('nohp', 'Nomor HP / Telp', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
	
		$this->form_validation->set_message('required', '%s harus diisi');		
		
		if($this->form_validation->run()=== FALSE)
		{
			$data['scriptmce'] = $this->scripttiny_mce();
			$data['judul'] = "Tambah User - Halaman Webmaster untuk Control Panel Website";
			$data['nama'] = $this->session->userdata('nama');
			$data['username'] = $this->session->userdata('username');
			$data['status'] = $this->session->userdata('status');	
			$this->load->view('webmaster/header',$data);
			$this->load->view('webmaster/sidebar');
			$this->load->view('webmaster/user/tambah_user',$data);
			$this->load->view('webmaster/footer');
		
		} else {
			$data['nama']=$this->input->post('nama');
			$data['username']=$this->input->post('username');
			$data['email']=$this->input->post('email');
			$data['nohp']=$this->input->post('nohp');
			$data['status']=$this->input->post('status');
			$data['password']=md5($this->input->post('password'));
			$this->Webmaster_model->Simpan_data("tbl_users",$data);
			redirect('webmaster/users');
		}
		
		} else redirect('login');
	
	}
	
	//fungsi ganti password
	public function gantipassword()
	{
		if($this->session->userdata('status') == '1' && $this->session->userdata('id_users') != '' && $this->session->userdata('username') != '') 
		{
			$username=$this->session->userdata('username');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('passwordlama', 'Password Lama', 'trim|required');
			$this->form_validation->set_rules('password1', 'Password Baru', 'trim|required|matches[password2]');
			$this->form_validation->set_rules('password2', 'Konfirmasi Password Baru', 'trim|required');
	
			$this->form_validation->set_message('required', '%s harus diisi');		
			$data['scriptmce'] = $this->scripttiny_mce();
			$data['judul'] = "Halaman Webmaster untuk Control Panel Website";
			$data['nama'] = $this->session->userdata('nama');
			$data['username'] = $this->session->userdata('username');
			$data['status'] = $this->session->userdata('status');	
			if($this->form_validation->run()=== FALSE)
			{
				$data['pesan'] = "";
				$this->load->view('webmaster/header',$data);
				$this->load->view('webmaster/sidebar');
				$this->load->view('webmaster/user/gantipassword',$data);
				$this->load->view('webmaster/footer');
			} else {
				$user = $this->Webmaster_model->Edit_data("tbl_users","username='$username'");
				foreach($user->result_array() as $u){ 
					$pass=$u['password'];
				}
				if($pass != md5($this->input->post('passwordlama'))){
					$data['pesan'] = "Password Lama yang Anda masukkan salah!";
					$this->load->view('webmaster/header',$data);
					$this->load->view('webmaster/sidebar');
					$this->load->view('webmaster/user/gantipassword',$data);
					$this->load->view('webmaster/footer');
				} else {
					$data2['password'] = md5($this->input->post('password1'));
					$data2['id_users'] = $this->session->userdata('id_users');
					$this->Webmaster_model->Update_data("tbl_users",$data2,"id_users");
					$data['pesan'] = "Password Berhasil diganti!";
					$this->load->view('webmaster/header',$data);
					$this->load->view('webmaster/sidebar');
					$this->load->view('webmaster/user/gantipassword',$data);
					$this->load->view('webmaster/footer');
				}
		
			}
		} else redirect('login');
	}
	
	
	//fungsi untuk logout
	public function logout()
	{
		$this->session->unset_userdata('id_users');
		$this->session->unset_userdata('status');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('username');
		redirect('home');
	}
	
	//Function TinyMce------------------------------------------------------------------
		private function scripttiny_mce() {
		return '
	<!-- TinyMCE -->
	<script type="text/javascript" src="'.base_url().'media/jscripts/tiny_mce/tiny_mce_src.js"></script>
	<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		//content_css : "'.base_url().'system/application/views/themes/css/BrightSide.css",

		// Drop lists for link/image/media/template dialogs
		//"'.base_url().'media/lists/image_list.js"
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "'.base_url().'index.php/webadmin/image_list/",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : \'Bold text\', inline : \'b\'},
			{title : \'Red text\', inline : \'span\', styles : {color : \'#ff0000\'}},
			{title : \'Red header\', block : \'h1\', styles : {color : \'#ff0000\'}},
			{title : \'Example 1\', inline : \'span\', classes : \'example1\'},
			{title : \'Example 2\', inline : \'span\', classes : \'example2\'},
			{title : \'Table styles\'},
			{title : \'Table row 1\', selector : \'tr\', classes : \'tablerow1\'}
		],
		//disabled relative urls
		relative_urls : false,
		
		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>';	
	} 
}

/* End of file webmaster.php */
/* Location: ./application/controllers/webmaster.php */