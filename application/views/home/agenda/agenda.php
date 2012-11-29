<br/>
<section id="news" class="detail kotak_berita"> 
		<header> 
			<h1>Agenda Terbaru</h1> 
		</header>
		<?php 
		$no = $page+1;
		foreach($dataagenda->result_array() as $agenda){ 
		$judul=url_title($agenda['judul']);
		?>
            <article>
		<header>
		<p><h1><a href='<?php echo base_url()."agenda/detail/".$agenda['id_agenda']."-".$judul;?>'><?php echo $agenda['judul']; ?></a></h1></p>
            </header></article>
		<?php 
			$no++;
		} ?>
	<br />
	<?php echo $paginator;?>
    </section> 