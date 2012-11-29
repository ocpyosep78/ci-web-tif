
<div id="main"> 
<h2>Manajemen Users</h2>
<div class="box">
<b color="#fff"><?php echo anchor('webmaster/tambahuser','+Tambah User','class="tombol"')?></b>
	<br /><br />
	<table width="100%" bgcolor="#ccc" cellpadding="2" cellspacing="1" class="listview">
	<tr bgcolor="#D6F3FF" align="center">
		<th>No.</th>
		<th>Nama</th>
		<th>Username</th>
		<th>Email</th>
		<th>No. HP</th>
		<th colspan="2">Aksi</th>
	</tr>
<?php 
$no = $page+1;
	foreach($datausers->result_array() as $user){ ?>
	<tr bgcolor='#fff'>
		<td align='center'><?php echo $no; ?></td>
		<td><?php echo $user['nama']; ?></td>
		<td align="center"><?php echo $user['username']; ?></td>
		<td align="center"><?php echo $user['email']; ?></td>
		<td align="center"><?php echo $user['nohp']; ?></td>
		<td align="center"><a href='<?php echo base_url()."index.php/webmaster/edituser/".$user['id_users'];?>' title='Edit Content'><img src='<?php echo base_url();?>media/images/edit-icon.gif' border='0'></a></td>
		<td>
		<a href='<?php echo base_url()."index.php/webmaster/hapususer/".$user['id_users'];?>' onClick="return confirm('Anda yakin ingin menghapus data ini?')" title='Hapus Content'>
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