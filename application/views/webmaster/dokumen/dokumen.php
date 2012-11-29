
<div id="main"> 
<h2>Manajemen Dokumen Akademik</h2>
<div class="box">
	<b color="#fff"><?php echo anchor('webmaster/tambahdokumen','+Upload Dokumen')?></b>
	<br /><br />
	<table width="100%" bgcolor="#ccc" cellpadding="2" cellspacing="1" class="listview">
	<tr bgcolor="#D6F3FF" align="center">
		<th>No.</th>
		<th>Judul Dokumen</th>
		<th>Nama file</th>
		<th colspan="2">Aksi</th>
	</tr>
<?php 
$no = $page+1;
	foreach($daftardokumen->result_array() as $dokumen){ ?>
	<tr bgcolor='#fff'>
		<td align='center'><?php echo $no; ?></td>
		<td><?php echo $dokumen['judul']; ?></td>
		<td align="center"><?php echo $dokumen['url_file']; ?></td>
		<td align="center"><a href='<?php echo base_url()."index.php/webmaster/editdokumen/".$dokumen['id_dokumen'];?>' title='Edit Content'><img src='<?php echo base_url();?>media/images/edit-icon.gif' border='0'></a></td>
		<td align="center">
		<a href='<?php echo base_url()."index.php/webmaster/hapusdokumen/".$dokumen['id_dokumen'];?>' onClick="return confirm('Anda yakin ingin menghapus data ini?')" title='Hapus Content'>
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