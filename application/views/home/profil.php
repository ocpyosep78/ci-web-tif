<br/>
<section id="news" class="detail kotak_berita"> 
		<?php 
		foreach($detailmenu->result_array() as $menu){ 
		$judul=url_title($menu['judul']);
		?>
                
		<header> 
			<h1><?php echo $menu['judul']?></h1>
		</header>
		<article>
		<?php echo $menu['isi'];
		  }
		?>
                </article>
	</section> 