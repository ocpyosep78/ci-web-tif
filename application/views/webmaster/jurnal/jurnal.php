
<div id="main"> 
<h2>Manajemen Abstrak</h2>
<div class="box">
	<b color="#fff"><?php echo anchor('webmaster/tambahjurnal','+Tambah Abstrak')?></b>
	<br /><br />
	<table width="100%" bgcolor="#ccc" cellpadding="2" cellspacing="1" class="listview">
	<tr bgcolor="#D6F3FF" align="center">
		<th>No.</th>
		<th>Nim</th>
		<th>Nama</th>
		<th>Judul Skripsi</th>
		<th>Dosen Pembimbing</th>
		<th>Tanggal Munaqosah</th>
		<th colspan="2">Aksi</th>
	</tr>
<?php 
$no = $page+1;
	foreach($daftarjurnal->result_array() as $jurnal){ ?>
	<tr bgcolor='#fff'>
		<td align='center'><?php echo $no; ?></td>
		<td><?php echo $jurnal['nim']; ?></td>
		<td><?php echo $jurnal['nama_mhs']; ?></td>
		<td><?php echo $jurnal['judul']; ?></td>
		<td><?php echo $jurnal['nama']; ?></td>
		<td align="center"><?php echo $jurnal['tgl_munaqosah']; ?></td>
		<td align="center"><a href='<?php echo base_url()."index.php/webmaster/editjurnal/".$jurnal['id_abstrak'];?>' title='Edit Content'><img src='<?php echo base_url();?>media/images/edit-icon.gif' border='0'></a></td>
		<td align="center">
		<a href='<?php echo base_url()."index.php/webmaster/hapusjurnal/".$jurnal['id_abstrak'];?>' onClick="return confirm('Anda yakin ingin menghapus data ini?')" title='Hapus Content'>
		<img src='<?php echo base_url();?>media/images/hapus-icon.gif' border='0'></a>
		</td>
	</tr>
<?php 
	$no++;
 }  
?>
	</table><br />
<?php echo $paginator;?>
</div>	
</div>