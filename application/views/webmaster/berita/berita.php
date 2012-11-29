
<div id="main"> 
<h2>Manajemen Berita</h2>
<div class="box">
	<b color="#fff"><?php echo anchor('webmaster/tambahberita','+Tambah Berita','class="tombol"')?></b>
	<br /><br />
	<table width="100%" bgcolor="#ccc" cellpadding="2" cellspacing="1" class="listview">
	<tr bgcolor="#D6F3FF" align="center">
		<th>No.</th>
		<th>Judul</th>
		<th>Kategori</th>
		<th>Sumber</th>
		<th colspan="2">Aksi</th>
	</tr>
<?php 
$no = $page+1;
	foreach($daftarberita->result_array() as $berita){ ?>
	<tr bgcolor='#fff'>
		<td align='center'><?php echo $no; ?></td>
		<td><?php echo $berita['judul']; ?></td>
		<td align="center"><?php echo $berita['tipe']; ?></td>
		<td align="center"><?php echo $berita['sumber']; ?></td>
		<td align="center"><a href='<?php echo base_url()."index.php/webmaster/editartikel/".$berita['id_artikel'];?>' title='Edit Content'><img src='<?php echo base_url();?>media/images/edit-icon.gif' border='0'></a></td>
		<td align="center">
		<a href='<?php echo base_url()."index.php/webmaster/hapusberita/".$berita['id_artikel'];?>' onClick="return confirm('Anda yakin ingin menghapus data ini?')" title='Hapus Content'>
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