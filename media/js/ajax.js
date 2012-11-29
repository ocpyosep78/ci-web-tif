//================= Fungsi Utama AJAX =================\\
 
// Fungsi createRequestObject
function createRequestObject() {
	// Fungsi untuk membuat reques Objek
	// I. S : -
	// F. S : Request terhadap browser yang dipakai
	// Inisialisasi
    var ro;
    var browser = navigator.appName;
	
	// Proses
    if(browser == "Microsoft Internet Explorer"){		// Bila browser IE
        ro = new ActiveXObject("Microsoft.XMLHTTP");
    }													// Browser selain IE
	else{										
        ro = new XMLHttpRequest();
    }
    return ro;	// Nilai kembalian
}
	
// Fungsi urlAjax
function callAjax(url,inner){
//  Inisisalisasi 
	var xmlhttp = createRequestObject();
	// Fungsi untuk mengolah ajax
	//alert(url);
	xmlhttp.open('get', url, true);
    xmlhttp.onreadystatechange = function() {
		document.getElementById(inner).innerHTML = '<center><br><br><br><img src="http://shantysinteriors.com/system/application/images/ajax-loader3.gif"><br><br></center>';
		if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200))
        {
             document.getElementById(inner).innerHTML = xmlhttp.responseText;
			 //alert (xmlhttp.responseText);
        }
        return false;
    }
    xmlhttp.send(null);
}

//=================  Event AJAX =================\\

function delete_record(url,inner){
	var answer = confirm('Apakah Anda yakin akan menghapus data ini?');
	if (answer){
		alert(url);
		callAjax(url,inner);
	}
}

function form_edit_pengalaman_kerja(id,url){
	var inner = "row"+id;
	var no = document.getElementById("no"+id).innerHTML;
	path = url+no+"/"+id;
	alert(path)
	callAjax(path,inner);
}

function submit_edit_pengalaman_kerja(id,url){
	var inner = "row"+id;
	var no = document.getElementById("no"+id).innerHTML;
	var nama_perusahaan = document.getElementById("nama_perusahaan"+id).value;
	var bidang = document.getElementById("bidang"+id).value;
	var jabatan = document.getElementById("jabatan"+id).value;
	var thn_masuk = document.getElementById("thn_masuk"+id).value;
	var thn_keluar = document.getElementById("thn_keluar"+id).value;
	
	if (nama_perusahaan=="" || bidang=="" || jabatan=="" || thn_masuk=="" || thn_keluar==""){
		alert("All Field Required");
	}else{
		url = url+no+"/"+id+"/"+nama_perusahaan+"/"+bidang+"/"+jabatan+"/"+thn_masuk+"/"+thn_keluar;
		
		alert(url);
		callAjax(url,inner);
	}
}

function submit_add_pengalaman_kerja(url,inner){
	var nama_perusahaan = document.getElementById("nama_perusahaan_add").value;
	var bidang = document.getElementById("bidang_add").value;
	var jabatan = document.getElementById("jabatan_add").value;
	var thn_masuk = document.getElementById("thn_masuk_add").value;
	var thn_keluar = document.getElementById("thn_keluar_add").value;
	
	if (nama_perusahaan=="" || bidang=="" || jabatan=="" || thn_masuk=="" || thn_keluar==""){
		alert("All Field Required");
	}else{
		url = url+nama_perusahaan+"/"+bidang+"/"+jabatan+"/"+thn_masuk+"/"+thn_keluar;
		
		alert(url);
		inner = 'wrap';
		callAjax(url,inner);
	}
}

function get_kabupaten(url)
{
	var inner = "kabupaten";
	var idprovinsi = document.getElementById("provinsi").value;
	//var url = "http://localhost/p3swot/index.php/pendaftaran/keterangan_pribadi/get_kabupaten/"+idprovinsi;
	//document.write(url);
	var path = url+idprovinsi;
	callAjax(path,inner)
}

function hitung_nilai(id)
{
	var nilai = document.getElementById("nilai"+id).innerHTML;
	var bobot = document.getElementById("bobot"+id).innerHTML;
	var skor = document.getElementById("skor"+id).value;
	var total_nilai = document.getElementById("total_nilai").innerHTML;
	//ganti nilai yang baru
	document.getElementById("nilai"+id).innerHTML = bobot * skor;
	//ganti total nilai
	if(total_nilai == '') {
		document.getElementById("total_nilai").innerHTML = bobot * skor;
	}
	else {
		document.getElementById("total_nilai").innerHTML = (total_nilai - nilai) + (bobot * skor);
	}
}

function cek_validasi_anggaran()
{
	if(document.getElementById(anggaran_disetujui).value == '') {
		alert('Anggaran Disetujui harus diisi.');
	}
}

/*
function form_edit_sk_anggaran(id,url){
	var inner = "row"+id;
	var no = document.getElementById("no"+id).innerHTML;
	var nama_lengkap = document.getElementById("nama_lengkap"+id).innerHTML;
	var nama_instansi = document.getElementById("nama_instansi"+id).innerHTML;
	var total_anggaran = document.getElementById("total_anggaran"+id).innerHTML;
	var nilai_akhir = document.getElementById("nilai_akhir"+id).innerHTML;
	
	no = replace_char(no);
	nama_lengkap = replace_char(nama_lengkap);
	nama_instansi = replace_char(nama_instansi);
	total_anggaran = replace_char(total_anggaran);
	nilai_akhir = replace_char(nilai_akhir);
	
	path = url+no+"/"+id+"/"+nama_lengkap+"/"+nama_instansi+"/"+total_anggaran+"/"+nilai_akhir;
	callAjax(path,inner);
}

function submit_edit_sk_anggaran(id,url1,url2){
	var inner = "row"+id;
	var no = document.getElementById("no"+id).innerHTML;
	var nama_lengkap = document.getElementById("nama_lengkap"+id).innerHTML;
	var nama_instansi = document.getElementById("nama_instansi"+id).innerHTML;
	var total_anggaran = document.getElementById("total_anggaran"+id).innerHTML;
	var nilai_akhir = document.getElementById("nilai_akhir"+id).innerHTML;
	var no_sk = document.getElementById("no_sk"+id).value;
	var tgl_sk = document.getElementById("tgl_sk"+id).value;
	var anggaran = document.getElementById("anggaran"+id).value;
	
	if (no_sk=="" || tgl_sk=="" || anggaran==""){
		alert("Nomor Sk, Tanggal SK, dan Anggaran harus diisi.");
	}else{
		no = replace_char(no);
		nama_lengkap = replace_char(nama_lengkap);
		nama_instansi = replace_char(nama_instansi);
		total_anggaran = replace_char(total_anggaran);
		nilai_akhir = replace_char(nilai_akhir);
		no_sk = replace_char(no_sk);
		tgl_sk = replace_char(tgl_sk);
		anggaran = replace_char(anggaran);
	
		path = url2+no+"/"+id+"/"+nama_lengkap+"/"+nama_instansi+"/"+total_anggaran+"/"+nilai_akhir+"/"+no_sk+"/"+tgl_sk+"/"+anggaran;
		//alert (path);
		callAjax(path,inner);
		callAjax(url1,'total_anggaran');
	}
}
*/

//////////////////////////////EDIT SK ANGGARAN//////////////////////////////////

function form_edit_sk_anggaran(id,no_sk,tgl_sk,anggaran,url_edit,url_image){
	document.getElementById("no_sk"+id).innerHTML = '<input type="text" size="10" name="no_sk" id="no_sk_form'+id+'" value="'+no_sk+'" />';
	document.getElementById("tgl_sk"+id).innerHTML = '<input type="text" size="10" name="tgl_sk" id="tgl_sk_form'+id+'" value="'+tgl_sk+'" readonly="readonly" />&nbsp;<a href="javascript:NewCssCal(\'tgl_sk_form'+id+'\',\'yyyymmdd\')"><img src="'+url_image+'" width="16" height="16" alt="Ambil Kalender" border="0"/></a>';
	document.getElementById("anggaran"+id).innerHTML = '<input type="text" size="10" name="anggaran" id="anggaran_form'+id+'" value="'+anggaran+'" />';
	document.getElementById("aksi"+id).innerHTML = '<a href="javascript:void(0)" onClick="do_edit_sk_anggaran(\''+id+'\',\''+no_sk+'\',\''+tgl_sk+'\',\''+anggaran+'\',\''+url_edit+'\',\''+url_image+'\')">Submit</a><br /><br /><a href="javascript:void(0)" onClick="cancel_edit_sk_anggaran(\''+id+'\',\''+no_sk+'\',\''+tgl_sk+'\',\''+anggaran+'\',\''+url_edit+'\',\''+url_image+'\')">Cancel</a>';
}

function cancel_edit_sk_anggaran(id,no_sk,tgl_sk,anggaran,url_edit,url_image){
	document.getElementById("no_sk"+id).innerHTML = no_sk;
	document.getElementById("tgl_sk"+id).innerHTML = tgl_sk;
	document.getElementById("anggaran"+id).innerHTML = anggaran;
	document.getElementById("aksi"+id).innerHTML = '<a href="javascript:void(0)" onClick="form_edit_sk_anggaran(\''+id+'\',\''+no_sk+'\',\''+tgl_sk+'\',\''+anggaran+'\',\''+url_edit+'\',\''+url_image+'\')">Edit</a>';
}

function do_edit_sk_anggaran(id,no_sk,tgl_sk,anggaran,url_edit,url_image){
	var no_sk = document.getElementById("no_sk_form"+id).value;
	var tgl_sk = document.getElementById("tgl_sk_form"+id).value;
	var anggaran = document.getElementById("anggaran_form"+id).value;
	
	if (no_sk=="" || tgl_sk=="" || anggaran==""){
		alert("Nomor Sk, Tanggal SK, dan Anggaran harus diisi.");
	}else{
		if(isNaN(anggaran)) {
			alert("Anggaran harus berupa angka.");
		}else{
			document.getElementById("no_sk"+id).innerHTML = no_sk;
			document.getElementById("tgl_sk"+id).innerHTML = tgl_sk;
			document.getElementById("anggaran"+id).innerHTML = anggaran;
			document.getElementById("aksi"+id).innerHTML = '<a href="javascript:void(0)" onClick="form_edit_sk_anggaran(\''+id+'\',\''+no_sk+'\',\''+tgl_sk+'\',\''+anggaran+'\',\''+url_edit+'\',\''+url_image+'\')">Edit</a>';
			
			no_sk = replace_char(no_sk);
			tgl_sk = replace_char(tgl_sk);
			anggaran = replace_char(anggaran);
			path = url_edit+id+"/"+no_sk+"/"+"/"+tgl_sk+"/"+anggaran;
			
			var inner = "total_anggaran";
			callAjax(path,inner);
		}
	}
}


////////////////////PENCARIAN////////////////////////////////////
function cari(url){
	var idpendaftaran = document.getElementById("idpendaftaran").value;
	var nama_lengkap = document.getElementById("nama_lengkap").value;
	var nama_instansi = document.getElementById("nama_instansi").value;
	var kategori = document.getElementById("kategori").value;
	var judul = document.getElementById("judul").value;
	var status = document.getElementById("status").value;
	
	if(idpendaftaran == "") {idpendaftaran = "0";}
	if(nama_lengkap == "") {nama_lengkap = "0";}
	if(nama_instansi == "") {nama_instansi = "0";}
	if(kategori == "") {kategori = "0";}
	if(judul == "") {judul = "0";}
	if(status == "") {status = "0";}
	
	url = url + "1/" + idpendaftaran + "/" + nama_lengkap + "/" + nama_instansi + "/" + kategori + "/" + judul + "/" + status;
	var inner = "hasil_searching";
	//alert(url);
	callAjax(url,inner);
}

function pagging_search(url,halaman,idpendaftaran,nama_lengkap,nama_instansi,kategori,judul,status){
	url		= url + halaman + '/' + idpendaftaran + "/" + nama_lengkap + "/" + nama_instansi + "/" + kategori + "/" + judul + "/" + status;
	var inner = "hasil_searching";
	//alert(url);
	callAjax(url,inner);
}

function validasi_pesan() {
	var pesan = document.getElementById("balasan").innerHTML
	//alert(pesan.length);
	if (pesan.length == 0) {
		alert('Balasan pesan harus diisi.');
		return false;
	}
	else{
		return true;
	}
}

//////////////////////////Periode pendaftaran////////////////////////////
function get_jadwal_pendaftaran(url)
{
	var idperiode = document.getElementById("idperiode").value;
	var url = url + idperiode;
	var inner = 'list_jadwal_pendaftaran';
	//alert(url);
	callAjax(url,inner);
}

function edit_jadwal_pendaftaran(url)
{
	var inner = 'list_jadwal_pendaftaran';
	//alert(url);
	callAjax(url,inner);
}

function do_edit_jadwal_pendaftaran(url)
{
	var idperiode = document.getElementById("idperiode").value;
	var tgl_mulai = document.getElementById("tgl_mulai").value;
	var tgl_selesai = document.getElementById("tgl_selesai").value;
	var url = url + tgl_mulai + '/' + tgl_selesai + '/' + idperiode;
	var inner = 'list_jadwal_pendaftaran';
	//alert(url);
	callAjax(url,inner);
}
////////////////////////END PERIODE PENDAFTARAN/////////////////////

//Ga Dipake,,,periode pendaftaran yang konsep lama
/*function form_edit_jadwal_periode(id,url){
	var inner = "row"+id;
	var no = document.getElementById("no"+id).innerHTML;
	path = url+no+"/"+id;
	//alert(path)
	callAjax(path,inner);
}

function submit_edit_jadwal_periode(id,url){
	var inner = "row"+id;
	var no = document.getElementById("no"+id).innerHTML;
	var ket = document.getElementById("ket"+id).value;
	var tgl_mulai = document.getElementById("tgl_mulai"+id).value;
	var tgl_selesai = document.getElementById("tgl_selesai"+id).value;
	
	if (ket =="" || tgl_mulai =="" || tgl_selesai ==""){
		alert("Semua field harus diisi.");
	}else{
		url = url+no+"/"+id+"/"+ket+"/"+tgl_mulai+"/"+tgl_selesai;
		//alert(url);
		callAjax(url,inner);
	}
}
*/

/////////////////////PENETAPAN PEMENANG///////////////////////////////
function validasi_penetapan_pemenang(form,jumlah_pendaftar) {
	var administrasi = form.administrasi.value;
	var prestasi = form.prestasi.value;
	var proposal = form.proposal.value;
	var rekomendasi = form.rekomendasi.value;
	var jumlah_pemenang = form.jumlah_pemenang.value;
	
	if ((administrasi == '') || (prestasi == '') || (proposal == '') || (rekomendasi == '') || (jumlah_pemenang == '') || isNaN(administrasi) || isNaN(prestasi) || isNaN(proposal) || isNaN(rekomendasi) || isNaN(jumlah_pemenang)) {
		alert('Jumlah persentase Administrasi, Prestasi, Proposal, Rekomendasi, dan Jumlah Pemenang tidak boleh kosong dan harus berupa angka.');
		return false;
	}else{	
		administrasi = parseInt(administrasi,10);
		prestasi = parseInt(prestasi,10);
		proposal = parseInt(proposal,10);
		rekomendasi = parseInt(rekomendasi,10);
		jumlah_pemenang = parseInt(jumlah_pemenang,10);
		var total_persentase = administrasi + prestasi + proposal + rekomendasi;
		
		if(total_persentase != 100){
			alert('Jumlah persentase Administrasi, Prestasi, Proposal, dan Rekomendasi harus sama dengan 100%.');
			return false;
		}else{
			if(jumlah_pemenang <= 0){
				alert('Jumlah pemenang harus lebih besar dari 0');
				return false;
			}else{
				if (jumlah_pemenang > jumlah_pendaftar) {
					alert('Jumlah pemenang tidak boleh melebihi jumlah pendaftar');
					return false;
				}else {
					return true;
				}
			}
		}
	}
}

function replace_char(text){

	if (text==""){
		text = "empty";
	}
	text = text.replace(/&/g,"~0");
	text = text.replace(/\./g,"~1");
	text = text.replace(/,/g,"~2");
	text = text.replace(/\//g,"~3");
	text = text.replace(/@/g,"~4");
	text = text.replace(/\(/g,"~5");
	text = text.replace(/\)/g,"~6");
	text = text.replace(/\+/g,"~7");
	text = text.replace(/\*/g,"~8");
	text = text.replace(/%/g,"~9");
	text = text.replace(/#/g,"~a");
	text = text.replace(/!/g,"~b");
	text = text.replace(/\$/g,"~c");
	text = text.replace(/\^/g,"~d");
	text = text.replace(/\*/g,"~e");
	text = text.replace(/\\/g,"~f");
	
	return text;
}

/////////////////////////////////DAFTAR ULANG///////////////////////////////////////////
function form_edit_daftar_ulang(id,kontrak,tgl_kontrak,konversi_tgl_kontrak,kuitansi,tgl_kuitansi,konversi_tgl_kuitansi,url_edit,url_image){
	var cek_kontrak;
	var cek_kuitansi;
	if(kontrak == 1) {cek_kontrak = 'CHECKED';} else {cek_kontrak = ""; tgl_kontrak="";}
	if(kuitansi == 1) {cek_kuitansi = 'CHECKED';} else {cek_kuitansi = ""; tgl_kuitansi="";}

	document.getElementById("kontrak"+id).innerHTML = '<input type="checkbox" name="kontrak" id="kontrak_form'+id+'" value="'+kontrak+'" '+cek_kontrak+' /><br /><input type="text" size="10" name="tgl_kontrak" id="tgl_kontrak_form'+id+'" value="'+tgl_kontrak+'" readonly="readonly" />&nbsp;<a href="javascript:NewCssCal(\'tgl_kontrak_form'+id+'\',\'yyyymmdd\')"><img src="'+url_image+'icon_calendar.jpg" width="16" height="16" alt="Ambil Kalender" border="0"/></a>';
	document.getElementById("kuitansi"+id).innerHTML = '<input type="checkbox" name="kuitansi" id="kuitansi_form'+id+'" value="'+kuitansi+'" '+cek_kuitansi+' /><br /><input type="text" size="10" name="tgl_kuitansi" id="tgl_kuitansi_form'+id+'" value="'+tgl_kuitansi+'" readonly="readonly" />&nbsp;<a href="javascript:NewCssCal(\'tgl_kuitansi_form'+id+'\',\'yyyymmdd\')"><img src="'+url_image+'icon_calendar.jpg" width="16" height="16" alt="Ambil Kalender" border="0"/></a>';
	document.getElementById("aksi"+id).innerHTML = '<a href="javascript:void(0)" onClick="do_edit_daftar_ulang(\''+id+'\',\''+kontrak+'\',\''+tgl_kontrak+'\',\''+konversi_tgl_kontrak+'\',\''+kuitansi+'\',\''+tgl_kuitansi+'\',\''+konversi_tgl_kuitansi+'\',\''+url_edit+'\',\''+url_image+'\')">Submit</a><br /><br /><a href="javascript:void(0)" onClick="cancel_edit_daftar_ulang(\''+id+'\',\''+kontrak+'\',\''+tgl_kontrak+'\',\''+konversi_tgl_kontrak+'\',\''+kuitansi+'\',\''+tgl_kuitansi+'\',\''+konversi_tgl_kuitansi+'\',\''+url_edit+'\',\''+url_image+'\')">Cancel</a>';
}

function cancel_edit_daftar_ulang(id,kontrak,tgl_kontrak,konversi_tgl_kontrak,kuitansi,tgl_kuitansi,konversi_tgl_kuitansi,url_edit,url_image){
	var cek_kontrak;
	var cek_kuitansi;
	if(kontrak == 1) {cek_kontrak = konversi_tgl_kontrak;} else {cek_kontrak = '<img src="'+url_image+'del.png"  alt="Kosong" border="0"/>';}
	if(kuitansi == 1) {cek_kuitansi = konversi_tgl_kuitansi;} else {cek_kuitansi = '<img src="'+url_image+'del.png"  alt="Kosong" border="0"/>';}
	
	document.getElementById("kontrak"+id).innerHTML = cek_kontrak;
	document.getElementById("kuitansi"+id).innerHTML = cek_kuitansi;
	document.getElementById("aksi"+id).innerHTML = '<a href="javascript:void(0)" onClick="form_edit_daftar_ulang(\''+id+'\',\''+kontrak+'\',\''+tgl_kontrak+'\',\''+konversi_tgl_kontrak+'\',\''+kuitansi+'\',\''+tgl_kuitansi+'\',\''+konversi_tgl_kuitansi+'\',\''+url_edit+'\',\''+url_image+'\')">Edit</a>';
}

function do_edit_daftar_ulang(id,kontrak,tgl_kontrak,konversi_tgl_kontrak,kuitansi,tgl_kuitansi,konversi_tgl_kuitansi,url_edit,url_image){
	
	var kontrak = document.getElementById("kontrak_form"+id).checked;
	var tgl_kontrak = document.getElementById("tgl_kontrak_form"+id).value;
	var kuitansi = document.getElementById("kuitansi_form"+id).checked;
	var tgl_kuitansi = document.getElementById("tgl_kuitansi_form"+id).value;
		
	if((kontrak == true) && (tgl_kontrak == "")){
		alert('Tanggal kontrak belum diinputkan.');
	}else{
		if((kuitansi == true) && (tgl_kuitansi == "")){
			alert('Tanggal kuitansi belum diinputkan.');
		}
		else{
			
			if(kontrak == true) {kontrak = 1;} else{kontrak = 0; tgl_kontrak == ""}
			if(kuitansi == true) {kuitansi = 1;} else{kuitansi = 0; tgl_kuitansi == ""}
			
			if(kontrak == 1) {cek_kontrak = konversi_tanggal(tgl_kontrak);} else {cek_kontrak = '<img src="'+url_image+'del.png"  alt="Kosong" border="0"/>';}
			if(kuitansi == 1) {cek_kuitansi = konversi_tanggal(tgl_kuitansi);} else {cek_kuitansi = '<img src="'+url_image+'del.png"  alt="Kosong" border="0"/>';}
		
			document.getElementById("kontrak"+id).innerHTML = cek_kontrak;
			document.getElementById("kuitansi"+id).innerHTML = cek_kuitansi;
			document.getElementById("aksi"+id).innerHTML = '<a href="javascript:void(0)" onClick="form_edit_daftar_ulang(\''+id+'\',\''+kontrak+'\',\''+tgl_kontrak+'\',\''+konversi_tgl_kontrak+'\',\''+kuitansi+'\',\''+tgl_kuitansi+'\',\''+konversi_tgl_kuitansi+'\',\''+url_edit+'\',\''+url_image+'\')">Edit</a>';
				
			if(tgl_kontrak == "") {tgl_kontrak = "0";}
			if(tgl_kuitansi == "") {tgl_kuitansi = "0";}	
			
			path = url_edit+id+"/"+kontrak+"/"+tgl_kontrak+"/"+kuitansi+"/"+tgl_kuitansi;
			var inner = "blank";
			callAjax(path,inner);
		}
	}
}

function konversi_tanggal(tgl)
		{
		2010-01-01
			var hari = tgl.substring(8);
			var bln = tgl.substring(5,7);
			var bulan;
			
			if(bln == "01") {bulan = "Januari";}
			if(bln == "02") {bulan = "Februari";}
			if(bln == "03") {bulan = "Maret";}
			if(bln == "04") {bulan = "April";}
			if(bln == "05") {bulan = "Mei";}
			if(bln == "06") {bulan = "Juni";}
			if(bln == "07") {bulan = "Juli";}
			if(bln == "08") {bulan = "Agustus";}
			if(bln == "09") {bulan = "September";}
			if(bln == "10") {bulan = "Oktober";}
			if(bln == "11") {bulan = "November";}
			if(bln == "12") {bulan = "Desember";}
			
			var tahun = tgl.substring(0,4);
			
			var tanggal = hari + ' ' + bulan + ' ' + tahun;
			return tanggal;
		}

/*
function form_edit_daftar_ulang(id,url){
	var inner = "row"+id;
	var no = document.getElementById("no"+id).innerHTML;
	var nama_lengkap = document.getElementById("nama_lengkap"+id).innerHTML;
	var nama_instansi = document.getElementById("nama_instansi"+id).innerHTML;
	var anggaran = document.getElementById("anggaran"+id).innerHTML;
	
	no = replace_char(no);
	nama_lengkap = replace_char(nama_lengkap);
	nama_instansi = replace_char(nama_instansi);
	anggaran = replace_char(anggaran);
	
	path = url+no+"/"+id+"/"+nama_lengkap+"/"+nama_instansi+"/"+anggaran;
	//alert (path);
	callAjax(path,inner);
}

function submit_edit_daftar_ulang(id,url){
	var inner = "row"+id;
	var no = document.getElementById("no"+id).innerHTML;
	var nama_lengkap = document.getElementById("nama_lengkap"+id).innerHTML;
	var nama_instansi = document.getElementById("nama_instansi"+id).innerHTML;
	var anggaran = document.getElementById("anggaran"+id).innerHTML;
	
	var kontrak = document.getElementById("kontrak"+id).checked;
	var tgl_kontrak = document.getElementById("tgl_kontrak"+id).value;
	var kuitansi = document.getElementById("kuitansi"+id).checked;
	var tgl_kuitansi = document.getElementById("tgl_kuitansi"+id).value;
	
		no = replace_char(no);
		nama_lengkap = replace_char(nama_lengkap);
		nama_instansi = replace_char(nama_instansi);
		anggaran = replace_char(anggaran);
		tgl_kontrak = replace_char(tgl_kontrak);
		tgl_kuitansi = replace_char(tgl_kuitansi);
		
		if(kontrak == true) {kontrak = 1;} else{kontrak = 0;}
		if(kuitansi == true) {kuitansi = 1;} else{kuitansi = 0;}
	
		path = url+no+"/"+id+"/"+nama_lengkap+"/"+nama_instansi+"/"+anggaran+"/"+kontrak+"/"+tgl_kontrak+"/"+kuitansi+"/"+tgl_kuitansi;
		//alert (path);
		callAjax(path,inner);
}
*/
////////////////////////////////LAORAN//////////////////////////////
function validasi_verifikasi_laporan(form) {
	var status_laporan1 = form.status_laporan1.checked;
	var status_laporan2 = form.status_laporan2.checked;
	var alasan = form.alasan.value;
	
	if ((status_laporan1 == true || status_laporan2 == true)){
		if(status_laporan2 == true){
			if(alasan == ''){
				alert('Jika Status Laporan = Tidak Valid, Alasan harus diisi.');
				return false;
			}
		}else{
			return true;
		}
	}
	else{
		alert('Status Laporan harus diisi.');
		return false;
	}
}

function validasi_penilaian_proposal(form) {
	var rekomendasi_diterima = form.rekomendasi_diterima.checked;
	var rekomendasi_ditolak = form.rekomendasi_ditolak.checked;
	var anggaran_disetujui = form.anggaran_disetujui.value;
	
	if ((rekomendasi_diterima == true || rekomendasi_ditolak == true)){
		if(rekomendasi_diterima == true) {
			if((anggaran_disetujui == '') || isNaN(anggaran_disetujui) || anggaran_disetujui <= 0){
				alert('Anggaran yang Disetujui hasrus diisi dan harus berupa angka');
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}else{
		alert('Rekomendasi harus diisi.');
		return false;
	}
}

function validasi_konfirmasi_laporan(form) {
	var alasan = form.alasan.value;
	if(alasan == ''){
		alert('Alasan harus diisi.');
		return false;
	}else{
		return true;
	}
}

////////////////////////////////////Fungsi untuk Periode Seleksi//////////////////////////////////////////
function get_detail_periode_seleksi(url)
{
		var idperiode = document.getElementById("idperiode").value;
		var url = url + idperiode;
		var inner = 'detail_periode_seleksi';
		//alert(url);
		callAjax(url,inner);
}

function detail_periode_seleksi(url)
{
	var inner = 'detail_periode_seleksi';
	//alert(url);
	callAjax(url,inner);
}

function add_periode_seleksi(url)
{
	var inner = 'detail_periode_seleksi';
	//alert(url);
	callAjax(url,inner);
}

function do_add_periode_seleksi(url)
{
	var idperiode = document.getElementById("idperiode").value;
	var tgl_mulai = document.getElementById("tgl_mulai").value;
	var tgl_selesai = document.getElementById("tgl_selesai").value;
	var aktif = document.getElementById("aktif").checked;
	
	if(tgl_mulai == ""){
		alert('Tanggal Mulai harus diisi.');
	}else if(tgl_selesai == ""){
		alert('Tanggal selesai harus diisi.');
	}else if(tgl_mulai > tgl_selesai){
		alert('Tanggal Selesai harus lebih besar dari Tanggal Mulai');
	}else{
		tgl_mulai = replace_char(tgl_mulai);
		tgl_selesai = replace_char(tgl_selesai);
		if(aktif == true) {aktif = 1;} else{aktif = 0;}
		var inner = 'detail_periode_seleksi';
		url = url + tgl_mulai + "/" + tgl_selesai + "/" + aktif + "/" + idperiode;
		callAjax(url,inner);
	}	
}

function edit_periode_seleksi(url)
{
		var inner = 'detail_periode_seleksi';
		//alert(url);
		callAjax(url,inner);
}

function do_edit_periode_seleksi(url)
{
	var idperiode = document.getElementById("idperiode").value;
	var tgl_mulai = document.getElementById("tgl_mulai").value;
	var tgl_selesai = document.getElementById("tgl_selesai").value;
	var aktif = document.getElementById("aktif").checked;
	
	if(tgl_mulai == ""){
		alert('Tanggal Mulai harus diisi.');
	}else if(tgl_selesai == ""){
		alert('Tanggal selesai harus diisi.');
	}else if(tgl_mulai > tgl_selesai){
		alert('Tanggal Selesai harus lebih besar dari Tanggal Mulai');
	}else{
		tgl_mulai = replace_char(tgl_mulai);
		tgl_selesai = replace_char(tgl_selesai);
		if(aktif == true) {aktif = 1;} else{aktif = 0;}
		var inner = 'detail_periode_seleksi';
		url = url + tgl_mulai + "/" + tgl_selesai + "/" + aktif + "/" + idperiode;
		//alert(url);
		callAjax(url,inner);
	}	
}

function delete_periode_seleksi(url,aktif)
{
	if(aktif == 1){
		alert('Anda tidak dapat menghapus periode seleksi ini, kerena data tersebut adalah periode seleksi yang aktif.');
	}else{
		var konfirmasi_delete = confirm('Apakah Anda yakin akan menghapus data ini?');
		if(konfirmasi_delete)
		{
			var idperiode = document.getElementById("idperiode").value;
			var inner = 'detail_periode_seleksi';
			url = url + "/" + idperiode;
			//alert(url);
			callAjax(url,inner);
		}
	}
}