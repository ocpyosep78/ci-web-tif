<br/>
<section id="news" class="detail kotak_berita"> 
		<header> 
			<h1>Pengumuman Terbaru</h1> 
			<a class="subscribe-link" href="<?php echo base_url()."pengumuman/feed"; ?>"><img src="<?php echo base_url();?>/media/images/rss.png" /></a>
		</header>
		<?php 
		$no = $page+1;
		foreach($daftarpengumuman->result_array() as $pengumuman){ 
		$judul=url_title($pengumuman['judul']);
		?>
		<article class="home-news">
		<header>
		<h1><a href='<?php echo base_url()."pengumuman/detail/".$pengumuman['id_pengumuman']."-".$judul;?>'><?php echo $pengumuman['judul']; ?></a></h1>
		</header>
		</article>
		<?php 
			$no++;
		} ?>
	<br />
	<?php echo $paginator;?>
    </section> 