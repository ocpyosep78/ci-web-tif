
<div id="main"> 
<h2>Manajemen Halaman Statis</h2>
<div class="box">
	<br /><br />
	<table width="100%" bgcolor="#ccc" cellpadding="2" cellspacing="1" class="listview">
	<tr bgcolor="#D6F3FF" align="center">
		<th>No.</th>
		<th>Judul</th>
		<th colspan="2">Aksi</th>
	</tr>
<?php 
$no = $page+1;
	foreach($datahalstatis->result_array() as $halstatis){ ?>
	<tr bgcolor='#fff'>
		<td align='center'><?php echo $no; ?></td>
		<td><?php echo $halstatis['judul']; ?></td>
		<td align="center"><a href='<?php echo base_url()."index.php/webmaster/edithalstatis/".$halstatis['id_datastatis'];?>' title='Edit Content'><img src='<?php echo base_url();?>media/images/edit-icon.gif' border='0'></a></td>
		<td align="center">
		<a href='<?php echo base_url()."index.php/webmaster/hapushalstatis/".$halstatis['id_datastatis'];?>' onClick="return confirm('Anda yakin ingin menghapus data ini?')" title='Hapus Content'>
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