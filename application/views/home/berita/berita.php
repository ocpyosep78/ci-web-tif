<br/>
<section id="news" class="detail kotak_berita"> 
		<header> 
			<h1>Berita dan Artikel Terbaru</h1> 
			<a class="subscribe-link" href="<?php echo base_url()."berita/feed"; ?>"><img src="<?php echo base_url();?>/media/images/rss.png" /></a> 
		</header>
		<?php 
		$no = $page+1;
		foreach($daftarberita->result_array() as $berita){ 
		$judul=url_title($berita['judul']);
		$isi = substr($berita['isi'],0,180);
		?>
		<article>
		<header>
		<h1><a href='<?php echo base_url()."berita/detail/".$berita['id_artikel']."-".$judul;?>'><?php echo $berita['judul']; ?></a></h1>
		</header><p><?php echo $isi;?>..<a href="<?php echo base_url()."berita/detail/".$berita['id_artikel']."-".$judul;?>">Selengkapnya</a></p></article>
		<?php 
			$no++;
		} ?>
	<br />
	<?php echo $paginator;?>
    </section> 