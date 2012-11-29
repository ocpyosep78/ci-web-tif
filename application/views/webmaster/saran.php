
<div id="main"> 
<h2>Data Saran</h2>
<div class="box">
<table width="100%" bgcolor="#ccc" cellpadding="2" cellspacing="1" class="listview">
	<tr bgcolor="#D6F3FF" align="center">
		<th>No.</th>
		<th>Nama</th>
		<th>Email</th>
		<th>Subjek</th>
		<th>Pesan</th>
		<th colspan="2">Aksi</th>
	</tr>
<?php 
$no = $page+1;
	foreach($datasaran->result_array() as $saran){ ?>
	<tr bgcolor='#fff'>
		<td align='center'><?php echo $no; ?></td>
		<td><?php echo $saran['nama']; ?></td>
		<td align="center"><?php echo $saran['email']; ?></td>
		<td align="center"><?php echo $saran['subjek']; ?></td>
		<td><?php echo $saran['pesan']; ?></td>
		<td><a href='<?php echo base_url()."index.php/webmaster/hapussaran/".$saran['id_saran'];?>' onClick="return confirm('Anda yakin ingin menghapus data ini?')" title='Hapus Content'>
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