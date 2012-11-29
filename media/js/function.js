function edit_detail_pengalaman_kerja(id,nama_perusahaan,bidang,jabatan,thn_masuk,thn_keluar,url_edit,url_delete){
	document.getElementById("form_open"+id).innerHTML ='<form action='+url_edit+id+' methode="POST">';
	document.getElementById("nama_perusahaan"+id).innerHTML = '<input type="text" name="nama_perusahaan" id="nama_perusahaan'+id+'" value="'+nama_perusahaan+'" size="20"/>';
	document.getElementById("bidang"+id).innerHTML = '<input type="text" name="bidang" id="bidang'+id+'" value="'+bidang+'" size="20"/>';
	document.getElementById("jabatan"+id).innerHTML = '<input type="text" name="jabatan" id="jabatan'+id+'" value="'+jabatan+'" size="20"/>';
	document.getElementById("thn_masuk"+id).innerHTML = '<input type="text" name="thn_masuk" id="thn_masuk'+id+'" value="'+thn_masuk+'" size="10"/>';
	document.getElementById("thn_keluar"+id).innerHTML = '<input type="text" name="thn_keluar" id="thn_keluar'+id+'" value="'+thn_keluar+'" size="10"/>';
	document.getElementById("aksi"+id).innerHTML = '<input type="submit" name="add" id="add" value="Tambah">&nbsp;<a href="javascript:void(0)" style="color:#6d540a" onClick="cancel_category(\''+id+'\',\''+name+'\',\''+url_edit+'\',\''+url_delete+'\')">CANCEL</a>';
	document.getElementById("form_close"+id).innerHTML = '</form>';
}

function edit_detail_pengalaman_kerja2(id,nama_perusahaan,bidang,jabatan,thn_masuk,thn_keluar,url_edit,url_delete){
	document.getElementById("pengalaman_kerja"+id).innerHTML = 
	'<form action='+url_edit+'><td>Tahun Keluar</td><td><input type="text" name="nama_perusahaan" id="nama_perusahaan'+id+'" value="'+nama_perusahaan+'" size="20"/></td><td><input type="text" name="bidang" id="bidang'+id+'" value="'+bidang+'" size="20"/></td><td><input type="text" name="jabatan" id="jabatan'+id+'" value="'+jabatan+'" size="20"/></td><td>Tahun Masuk</td><td>Tahun Keluar</td><td>Tahun Keluar</td></form>'
	;
}

function cek_validasi_pengalaman_kerja()
{
	var nama_perusahaan = document.getElementById("nama_perusahaan_add").value;
	var bidang = document.getElementById("bidang_add").value;
	var jabatan = document.getElementById("jabatan_add").value;
	var thn_masuk = document.getElementById("thn_masuk_add").value;
	var thn_keluar = document.getElementById("thn_keluar_add").value;
	
	if (nama_perusahaan=="" || bidang=="" || jabatan=="" || thn_masuk=="" || thn_keluar==""){
		alert("All Field Required");
		return false;
	}
	else{
		return true;
	}
}

function cek_sk_anggaran(row,url)
{
	if(row != 0){
		alert('Data SK dan anggaran belum lengkap');
	}
	else{
		if(confirm('Apakah Anda yakin akan mempublish daftar pemenang sekarang?')) {
			window.location = url;
		}
	}
}

function cek_validasi_jadwal_periode()
{
	var ket = document.getElementById("ket_add").value;
	var tgl_mulai = document.getElementById("tgl_mulai_add").value;
	var tgl_selesai = document.getElementById("tgl_selesai_add").value;
	
	if (ket =="" || tgl_mulai =="" || tgl_selesai ==""){
		alert("Semua field harus diisi.");
		return false;
	}
	else{
		return true;
	}
}

function edit_jadwal_periode(id,ket,tgl_mulai,tgl_selesai,url_edit,url_base){
	alert(id + ket + tgl_mulai + tgl_selesai + url_edit + url_base)
	alert('tgl_mulai'+id);
	document.getElementById("ket"+id).innerHTML = '<input type="text" name="ket_edit" id="ket_edit'+id+'" value="'+ket+'" size="20"/>';
	document.getElementById("tgl_mulai"+id).innerHTML = '<input type="text" name="tgl_mulai_edit" id="tgl_mulai_edit'+id+'" value="'+tgl_mulai+'" size="20" readonly="readonly" /> <a href="javascript:NewCssCal(\'tgl_mulai_edit'+id+'\',\'yyyymmdd\')"><img src="'+url_base+'other/images/icon_calendar.jpg" width="16" height="16" alt="Ambil Kalender" border="0"/></a>';
	document.getElementById("tgl_selesai"+id).innerHTML = '<input type="text" name="tgl_selesai_edit" id="tgl_selesai_edit'+id+'" value="'+tgl_selesai+'" size="20" readonly="readonly" /> <a href="javascript:NewCssCal(\'tgl_selesai_edit'+id+'\',\'yyyymmdd\')"><img src="'+url_base+'other/images/icon_calendar.jpg" width="16" height="16" alt="Ambil Kalender" border="0"/></a>';
	document.getElementById("aksi"+id).innerHTML = '<a href="javascript:void(0)" onClick="do_edit_jadwal_periode(\''+id+'\',\''+url_edit+'\',\''+url_base+'\')">Submit</a> <a href="javascript:void(0)" onClick="cancel_category(\''+id+'\',\''+ket+'\',\''+tgl_mulai+'\',\''+tgl_selesai+'\',\''+url_edit+'\')">Cancel</a>';
}

function do_edit_jadwal_periode(id,url_edit,url_base){
	var inner = "no"+id;
	//var no = document.getElementById("no"+id).innerHTML;
	var ket = document.getElementById("ket_edit"+id).value;
	var tgl_mulai = document.getElementById("tgl_mulai_edit"+id).value;
	var tgl_selesai = document.getElementById("tgl_selesai_edit"+id).value;
	
	if (ket =="" || tgl_mulai =="" || tgl_selesai ==""){
		alert("Semua field harus diisi.");
	}else{
		url_edit = url_edit+"/"+id+"/"+ket+"/"+tgl_mulai+"/"+tgl_selesai;
		alert(url_edit);
		callAjax(url_edit,inner);
		callAjax(url_edit,'ket'+id);
		
		
		document.getElementById("ket"+id).innerHTML = '<input type="text" name="ket_edit" id="ket_edit'+id+'" value="'+ket+'" size="20"/>';
		document.getElementById("tgl_mulai"+id).innerHTML = '<input type="text" name="tgl_mulai_edit" id="tgl_mulai_edit'+id+'" value="'+tgl_mulai+'" size="20" readonly="readonly" /> <a href="javascript:NewCssCal(\'tgl_mulai_edit'+id+'\',\'yyyymmdd\')"><img src="'+url_base+'other/images/icon_calendar.jpg" width="16" height="16" alt="Ambil Kalender" border="0"/></a>';
		document.getElementById("tgl_selesai"+id).innerHTML = '<input type="text" name="tgl_selesai_edit" id="tgl_selesai_edit'+id+'" value="'+tgl_selesai+'" size="20" readonly="readonly" /> <a href="javascript:NewCssCal(\'tgl_selesai_edit'+id+'\',\'yyyymmdd\')"><img src="'+url_base+'other/images/icon_calendar.jpg" width="16" height="16" alt="Ambil Kalender" border="0"/></a>';
		document.getElementById("aksi"+id).innerHTML = '<a href="javascript:void(0)" onClick="do_edit_jadwal_periode(\''+id+'\',\''+url_edit+'\')">Submit</a> <a href="javascript:void(0)" onClick="cancel_category(\''+id+'\',\''+ket+'\',\''+tgl_mulai+'\',\''+tgl_selesai+'\',\''+url_edit+'\')">Cancel</a>';
		
		
	}
}

//validasi form periode seleksi
function validasi_form_periode_seleksi(form)
{
	if(form.tgl_mulai.value == ""){
		alert('Tanggal Mulai harus diisi.');
		return false;
	}else if(form.tgl_selesai.value == ""){
		alert('Tanggal selesai harus diisi.');
		return false;
	}else if(tgl_mulai.value > tgl_selesai.value){
		alert('Tanggal Selesai harus lebih besar dari Tanggal Mulai');
		return false;
	}else{
		return true;
	}
}
