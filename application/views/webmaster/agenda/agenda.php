
<div id="main"> 
<h2>Manajemen Agenda</h2>
<div class="box">
	<b color="#fff"><?php echo anchor('webmaster/tambahagenda','+Tambah Agenda','class="tombol"')?></b>
	<br /><br />
	<table width="100%" bgcolor="#ccc" cellpadding="2" cellspacing="1" class="listview">
	<tr bgcolor="#D6F3FF" align="center">
		<th>No.</th>
		<th>Acara</th>
		<th>Tanggal</th>
		<th>Tempat</th>
		<th colspan="2">Aksi</th>
	</tr>
<?php 
$no = $page+1;
	foreach($daftaragenda->result_array() as $agenda){ ?>
	<tr bgcolor='#fff'>
		<td align='center'><?php echo $no; ?></td>
		<td><?php echo $agenda['judul']; ?></td>
		<td align="center"><?php echo $agenda['tgl_mulai']; ?> s/d <?php echo $agenda['tgl_selesai']; ?></td>
		<td align="center"><?php echo $agenda['tempat']; ?></td>
		<td align="center"><a href='<?php echo base_url()."index.php/webmaster/editagenda/".$agenda['id_agenda'];?>' title='Edit Content'><img src='<?php echo base_url();?>media/images/edit-icon.gif' border='0'></a></td>
		<td align="center">
		<a href='<?php echo base_url()."index.php/webmaster/hapusagenda/".$agenda['id_agenda'];?>' onClick="return confirm('Anda yakin ingin menghapus data ini?')" title='Hapus Content'>
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