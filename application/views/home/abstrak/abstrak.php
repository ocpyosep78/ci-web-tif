<br/>
<section id="news" class="detail kotak_berita"> 
		<header> 
			<h1>Daftar Abstrak</h1> 
			<a class="subscribe-link" href="<?php echo base_url()."abstrak/feed"; ?>"><img src="<?php echo base_url();?>/media/images/rss.png" /></a>
		</header>

		<?php 
		$no = $page+1;
		foreach($daftarabstrak->result_array() as $abstrak){ 
		$judul=url_title($abstrak['judul']);
		?>	
			<article>
			<header>
			<h1><a href='<?php echo base_url()."abstrak/detail/".$abstrak['id_abstrak']."-".$judul;?>'><?php echo $abstrak['judul']; ?> (<?php echo $abstrak['nim']; ?>)</a></h1><p></p></header></article>
		<?php 
			$no++;
		} ?>
	<br />
	<?php echo $paginator;?>
    </section> 