<br/>
<section id="news" class="detail kotak_berita"> 
		<header> 
			<h1>Data Dosen Prodi</h1> 
		</header>
		<div id="listdosen">
<p><?php 
	foreach($datadosen->result_array() as $dosen){ 
	?>
	<table width="100%">
	<tr>
		<td>Nama</td>
		<td>: <?php echo $dosen['nama']?></td>
	</tr>
	<tr>
		<td>NIP</td>
		<td>: <?php echo $dosen['nip']?></td>
	</tr>
	<tr>
		<td>Pendidikan</td>
		<td>: <?php echo $dosen['pendidikan']?></td>
	</tr>
	<tr>
		<td>Minat</td>
		<td>: <?php echo $dosen['minat']?></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td>: <?php echo $dosen['alamat']?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>: <?php echo $dosen['email']?></td>
	</tr>	
	<tr>
		<td>Website </td>
		<td>: <?php echo $dosen['website']?></td>
	</tr>	
	</table>
<?php 
 }  
?>
<br/><a href="<?php echo base_url().'dosen'?>">Kembali</a>
	</p>
</div>
    </section> 