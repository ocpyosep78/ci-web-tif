
<div id="main"> 
<h2>Manajemen Dosen</h2>
<div class="box">
	<b color="#fff"><?php echo anchor('webmaster/tambahdosen','Tambah Dosen','class="tombol"')?></b>
	<br /><br />
	<table width="100%" bgcolor="#ccc" cellpadding="2" cellspacing="1" class="listview">
	<tr bgcolor="#D6F3FF" align="center">
		<th>No.</th>
		<th>NIP</th>
		<th>Nama</th>
		<th>Alamat</th>
		<th colspan="2">Aksi</th>
	</tr>
<?php 
$no = $page+1;
	foreach($daftardosen->result_array() as $dosen){ ?>
	<tr bgcolor='#fff'>
		<td align='center'><?php echo $no; ?></td>
		<td><?php echo $dosen['nip']; ?></td>
		<td><?php echo $dosen['nama']; ?></td>
		<td><?php echo $dosen['alamat']; ?></td>
		<td align="center"><a href='<?php echo base_url()."index.php/webmaster/editdosen/".$dosen['id_dosen'];?>' title='Edit Content'><img src='<?php echo base_url();?>media/images/edit-icon.gif' border='0'></a></td>
		<td align="center">
		<a href='<?php echo base_url()."index.php/webmaster/hapusdosen/".$dosen['id_dosen'];?>' onClick="return confirm('Anda yakin ingin menghapus data ini?')" title='Hapus Content'>
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