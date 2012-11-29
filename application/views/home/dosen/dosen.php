<br/>
<section id="news" class="detail kotak_berita"> 
		<header> 
			<h1>Daftar Dosen</h1> 
		</header>
		<div id="listberita">
<table width="100%" cellpadding="2" cellspacing="1" class="listview">
	<tr bgcolor="#D6F3FF" align="center">
		<td align="center"><b>No.</b></th>
		<td align="center"><b>NIP</b></th>
		<td align="center"><b>Nama Lengkap</b></th>
	</tr>
<?php 
	$no = 1;
	foreach($daftardosen->result_array() as $dosen){ 
	$nama=url_title($dosen['nama']);
	?>
	<tr bgcolor='#fff'>
		<td align="center"><?php echo $no; ?></td>
		<td align="center"><?php echo $dosen['nip']; ?></td>
		<td><a href='<?php echo base_url()."dosen/detail/".$dosen['id_dosen']."-".$nama;?>'><?php echo $dosen['nama']; ?></a></td>
	</tr>
<?php 
	$no++;
 }  
?>
	</table><br />
</div>
    </section> 