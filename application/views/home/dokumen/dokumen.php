<br/>
<section id="news" class="detail kotak_berita"> 
		<header> 
			<h1>Daftar Dokumen Akademik</h1> 
		</header>
		<div id="listdokumen">
<p><table width="100%" cellpadding="2" cellspacing="1" class="listview">
	<tr bgcolor="#D6F3FF" align="center">
		<th>No.</th>
		<th>Nama</th>
		<th>Aksi</th>
	</tr>
<?php 
	$no = $page+1;
	foreach($daftardokumen->result_array() as $dokumen){ 
	$nama=url_title($dokumen['judul']);
	?>
	<tr bgcolor='#fff'>
		<td align='center'><?php echo $no; ?></td>
		<td><?php echo $dokumen['judul']; ?></td>
		<td align="center"><a href='<?php echo base_url()."media/dokumen/".$dokumen['url_file'];?>'>Download</a></td>
	</tr>
<?php 
	$no++;
 }  
?>
	</table><br />
	<?php echo $paginator;?>
	</p>
</div>
    </section> 