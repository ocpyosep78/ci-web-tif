
<div id="main"> 
<h2>Manajemen Pengumuman</h2>
<div class="box">

<b color="#fff"><?php echo anchor('webmaster/tambahpengumuman','+Tambah Pengumuman')?></b>
	<br /><br />
	<table width="100%" bgcolor="#ccc" cellpadding="2" cellspacing="1" class="listview">
	<tr bgcolor="#D6F3FF" align="center">
		<th>No.</th>
		<th>Judul</th>
		<th>Tanggal</th>
		<th>Sumber</th>
		<th colspan="2">Aksi</th>
	</tr>
<?php 
$no = $page+1;
	foreach($datapengumuman->result_array() as $pengumuman){ ?>
	<tr bgcolor='#fff'>
		<td align='center'><?php echo $no; ?></td>
		<td><?php echo $pengumuman['judul']; ?></td>
		<td align="center"><?php echo $pengumuman['tanggal']; ?></td>
		<td align="center"><?php echo $pengumuman['sumber']; ?></td>
		<td align="center"><a href='<?php echo base_url()."index.php/webmaster/editpengumuman/".$pengumuman['id_pengumuman'];?>' title='Edit Content'><img src='<?php echo base_url();?>media/images/edit-icon.gif' border='0'></a></td>
		<td align="center">
		<a href='<?php echo base_url()."index.php/webmaster/hapuspengumuman/".$pengumuman['id_pengumuman'];?>' onClick="return confirm('Anda yakin ingin menghapus data ini?')" title='Hapus Content'>
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