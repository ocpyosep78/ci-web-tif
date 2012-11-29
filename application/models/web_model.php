<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web_model extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
	}

	//fungsi tambah saran
	function tambah_saran($data){
		$q=$this->db->insert('tbl_saran', $data);
		return $q;
	}
	
	function get_slide(){
		$q=$this->db->query("select * from tbl_slider where status=1 LIMIT 5");
		return $q;
	}
	function getAbstrak($id)
	{
		$q=$this->db->query("select * from tbl_abstrak, tbl_dosen where tbl_abstrak.id_pembimbing=tbl_dosen.id_dosen and id_abstrak=$id");
		return $q;
	}
	
	function getPosts($tabel,$id,$limit)
	{
		$q=$this->db->query("select * from $tabel order by $id DESC LIMIT $limit");
		return $q;
	}
	
	function Menu()
	{
		$q=$this->db->get('tbl_datastatis');
		return $q;
	}
	
	//ambil data Dosen
	function Data_Dosen(){
		$q=$this->db->get('tbl_dosen');
		return $q;
	}
	
	//fungsi Ambil data
	function Ambil_data($tabel,$id,$offset,$limit)
	{
		$q=$this->db->query("select * from $tabel order by $id DESC LIMIT $offset,$limit");
		return $q;
	}
	
	//fungsi total data
	function Total_data($tabel)
	{
		$q=$this->db->query("select * from $tabel");
		return $q;
	}
	//fungsi detail
	function Detail($tabel, $filter){
		$q=$this->db->query("select * from $tabel where $filter");
		return $q;
	}
	//fungsi detail artikel
	function Detail_Artikel($id)
	{
		$q=$this->db->query("select * from tbl_artikel where id_artikel='$id'");
		return $q;
	}
	//fungsi detail dosen
	function Detail_Dosen($id)
	{
		$q=$this->db->query("select * from tbl_dosen where id_artikel='$id'");
		return $q;
	}
	
	//fungsi untuk berita
	function tambahberita()
	{
		$data=array(
			'id'=>"",
			'nama'=>$this->input->post('nama'),
			'jk'=>$this->input->post('jk'),
			'tgl_lhr'=>$this->input->post('tanggal_lahir'),
			'email'=>$this->input->post('email'),
			'password'=>md5($this->input->post('pass')),
			'status'=>""
		);
		return $this->db->insert('member',$data);
	}
	//fungsi untuk login
	function login($data)
	{
		$username = $data['username'];
		$pass = $data['password'];
		$data=array(
			'username'=>$username,
			'password'=>$pass
		);
		$this->db->select('*');
		$this->db->from('tbl_users');
		$this->db->where($data);
		$query = $this->db->get();
		if($query->num_rows > 0)
		{
			$row = $query->row();
			$data['id_users'] = $row->id_users;
			$data['status'] = $row->status;
			$data['nama'] = $row->nama;
			$data['username'] = $row->username;
			return $data;
		} else return false;
	}
	
	

}

/* End of file web_model.php */
/* Location: ./application/models/web_model.php */