
<div id="main"> 
<h2>Manajemen Slide</h2>
<div class="box">
	<b color="#fff"><?php echo anchor('webmaster/tambahslider','+Tambah Slide')?></b>
	<br /><br />
	<table width="100%" bgcolor="#ccc" cellpadding="2" cellspacing="1" class="listview">
	<tr bgcolor="#D6F3FF" align="center">
		<th>No.</th>
		<th>Judul Slide</th>
		<th>Deskripsi</th>
		<th>Foto</th>
		<th>Status</th>	
		<th colspan="2">Aksi</th>
	</tr>
<?php 
$no = $page+1;
	foreach($daftarslider->result_array() as $slider){ ?>
	<tr bgcolor='#fff'>
		<td align='center'><?php echo $no; ?></td>
		<td><?php echo $slider['judul']; ?></td>
		<td align="center"><?php echo $slider['deskripsi']; ?></td>
		<td align="center"><img src="<?php echo base_url()."/media/photo_slide/".$slider['gambar']; ?>" width="50" height="50" /></td>
		<td align="center"><?php echo $slider['status']==1?"Aktif":"Tidak Aktif"; ?></td>
		<td align="center"><a href='<?php echo base_url()."index.php/webmaster/editslider/".$slider['id_slider'];?>' title='Edit Content'><img src='<?php echo base_url();?>media/images/edit-icon.gif' border='0'></a></td>
		<td align="center">
		<a href='<?php echo base_url()."index.php/webmaster/hapusslider/".$slider['id_slider'];?>' onClick="return confirm('Anda yakin ingin menghapus data ini?')" title='Hapus Content'>
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