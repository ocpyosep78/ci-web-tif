<section id="news" class="kotak_berita"> 
		<header> 
			<h1>Berita & Artikel Terbaru</h1> 
		</header> 
		
		<a class="subscribe-link" href="<?php echo base_url()."berita/feed"; ?>"><img src="<?php echo base_url();?>/media/images/rss.png" /></a> 
		<?php 
		$no = 1;
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
		<p class="news-read-more"><a href='<?php echo base_url()."berita";?>'>Arsip Artikel</a>...</p>
    </section> 
	
	
 	<section class="kotak_sidebar"> 
		<header> 
			<h1>Keep in Touch</h1> 
		</header> 
	
        <!-- Twitter follow button --> 
        <p>Follow <a href="http://twitter.com/mang_udien" class="twitter-follow-button">@tifuinsuka</a> </p>
		<!-- end twitter follow --> 
		<div class="social-media"> 
		<a class="social-links" href="http://www.facebook.com/tifuinsuka" target="_blank"><img src="<?php echo base_url();?>/media/css_home/img/Fb.png" alt="Facebook" /></a> 
		<a class="social-links" href="https://foursquare.com/tifuinsuka" target="_blank"><img src="<?php echo base_url();?>/media/css_home/img/Frsq.png" alt="Foursquare" /></a> 
		<a class="social-links" href="http://tifuinsuka.tumblr.com/" target="_blank"><img src="<?php echo base_url();?>/media/css_home/img/Tmblr.png" alt="Tumblr" /></a> 
		<a class="social-links" href="http://www.youtube.com/user/tifuinsuka" target="_blank"><img src="<?php echo base_url();?>/media/css_home/img/Yt.png" alt="YouTube" /></a> 
		</div> 
                
                <header>
                    <h1>Facebook Page </h1>
                </header>
                <div class="fb-like-box" data-href="http://www.facebook.com/tif.kusuka" data-width="200" data-height="300" data-show-faces="true" data-stream="true" data-header="true"></div>

                <div id="fb-root"></div>
                <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	</section> 



	<section id="notice" class="kotak_pengumuman"> 
		<header> 
			<h1>Pengumuman</h1> 
		</header> 
		<a class="subscribe-link" href="<?php echo base_url()."pengumuman/feed"; ?>"><img src="<?php echo base_url();?>/media/images/rss.png" /></a>
	<article> 
		<?php 
		$no = 1;
	
		foreach($daftarpengumuman->result_array() as $pengumuman){ 		
		$judul= url_title($pengumuman['judul']);
		?>
    <p><a href='<?php echo base_url()."pengumuman/detail/".$pengumuman['id_pengumuman']."-".$judul;?>'><?php echo $pengumuman['judul'];?></a></p>
    <?php 
		$no++;
		}
	?>
 	</article> 
	</section>

        <section id="notice" class="kotak_pengumuman">
            <header> 
		<h1>Agenda</h1> 
            </header> 
            <a class="subscribe-link" href="<?php echo base_url()."agenda/feed"; ?>"><img src="<?php echo base_url();?>/media/images/rss.png" /></a> 
            <article>
            
		<?php 
		$no = 1;
		foreach($daftaragenda->result_array() as $agenda){ 	
		$judul= url_title($agenda['judul']);		
		?>
			<p><a href='<?php echo base_url()."agenda/detail/".$agenda['id_agenda']."-".$judul;?>'><?php echo $agenda['judul'];?></a></p>
		<?php 
		$no++;
		}
                ?>
            </article>
        </section>
	
        <section id="abstrak" class="kotak_pengumuman"> 
		<header> 
			<h1>Abstrak</h1> 
		</header> 
		<a class="subscribe-link" href="<?php echo base_url()."abstrak/feed"; ?>"><img src="<?php echo base_url();?>/media/images/rss.png" /></a>
		<ol>
		<?php 
		foreach($daftarabstrak->result_array() as $abstrak){ 
		$judul=url_title($abstrak['judul']);
		?>	
		  <li><a href='<?php echo base_url()."abstrak/detail/".$abstrak['id_abstrak']."-".$judul;?>'><?php echo $abstrak['judul'];?></a></li> 
		<?php } ?>
		</ol>
	</section> 
        