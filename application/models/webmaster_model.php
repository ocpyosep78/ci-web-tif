<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Webmaster_model extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
	}
	//fungsi Ambil data
	function Ambil_data($tabel,$offset,$limit)
	{
		$q=$this->db->query("select * from $tabel LIMIT $offset,$limit");
		return $q;
	}
	
	//fungsi total data
	function Total_data($tabel)
	{
		$q=$this->db->query("select * from $tabel");
		return $q;
	}
	//fungsi Hapus data
	function Delete_data($id,$seleksi,$tabel)
	{
		$this->db->where($seleksi,$id);
		$this->db->delete($tabel);
	}
	//fungsi update data
	function Update_data($tabel,$isi,$seleksi)
	{
			$this->db->where($seleksi,$isi[$seleksi]);
			$this->db->update($tabel,$isi);
	}
	
	//fungsi edit data
	function Edit_data($tabel,$seleksi)
	{
			$query=$this->db->query("select * from $tabel where $seleksi");
			return $query;
	}
	//fungsi ambil data dosen
	function Dosen()
	{
		$q=$this->db->get('tbl_dosen');
		return $q;
	}
	//fungsi Ambil Abstrak
	function getAbstrak($id)
	{
		$q=$this->db->query("select * from tbl_abstrak, tbl_dosen where tbl_abstrak.id_pembimbing=tbl_dosen.id_dosen and id_abstrak=$id");
		return $q;
	}
	
	//fungsi Abstrak
	function Abstrak($offset,$limit)
	{
		$q=$this->db->query("select * from tbl_abstrak, tbl_dosen where tbl_abstrak.id_pembimbing=tbl_dosen.id_dosen order by id_abstrak DESC LIMIT $offset,$limit");
		return $q;
	}
	
	//fungsi berita
	function Berita($offset,$limit)
	{
		$q=$this->db->query("select * from tbl_artikel where tipe='berita' order by id_artikel DESC LIMIT $offset,$limit");
		return $q;
	}
	//fungsi hitung total data berita
	function Total_Data_Berita()
	{
			$q=$this->db->query("select * from tbl_artikel where tipe='berita'");
			return $q;
	
	}	
	
	//fungsi hitung total data artikel
	function Total_Data_Artikel()
	{
			$q=$this->db->query("select * from tbl_artikel where tipe='artikel'");
			return $q;
	
	}	
	
	//fungsi Artikel
	function Artikel($offset,$limit)
	{
		$q=$this->db->query("select * from tbl_artikel where tipe='artikel' order by id_artikel DESC LIMIT $offset,$limit");
		return $q;
	}
	
	
	//fungsi simpan Data
	function Simpan_data($tabel,$data)
	{
		$s=$this->db->insert($tabel,$data);
		return $s;
	}
		
	//fungsi Ambil Data
	function getData($tabel, $filter){
		$q=$this->db->query("select * from $tabel where $filter");
		return $q;
	}

} 

/* End of file webmaster_model.php */
/* Location: ./application/models/webmaster_model.php */