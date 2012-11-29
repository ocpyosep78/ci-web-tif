<br/>
<section id="news" class="detail kotak_berita" > 
		<?php 
		function news_date($tgl){
			list($tanggal,$jam)=explode(" ",$tgl);
			$h=date('N',strtotime($tanggal));
			$jam=substr($jam,0,5);
			$hari = array("1"=>"Senin", "2"=>"Selasa", "3"=>"Rabu", "4"=>"Kamis", "5"=>"Jumat", "6"=>"Sabtu","7"=>"Minggu");
			$array_bulan1 = array("01"=>"Januari", "02"=>"Februari", "03"=>"Maret", "04"=>"April", "05"=>"Mei", "06"=>"Juni", "07"=>"Juli",
						"08"=>"Agustus", "09"=>"September", "10"=>"Oktober", "11"=>"November","12"=>"Desember");

			list($tahun,$bulan,$tanggal)=explode("-",$tanggal);
			$tgl=$hari[$h].", ".$tanggal." ".$array_bulan1[$bulan]." ".$tahun." ".$jam." WIB";
			return $tgl;
		}
		
		$no = 1;
		foreach($berita->result_array() as $berita){ 
		$judul=url_title($berita['judul']);
		?>
		<header> 
			<h1><a href='<?php echo base_url()."berita/detail/".$berita['id_artikel']."-".$judul;?>'><?php echo $berita['judul']; ?></a></h1> 
		</header>
		<article>

		<?php echo "<i>".news_date($berita['tanggal']." ".$berita['jam'])."</i>";
		if($berita['gambar'] != null){
			echo "<br/><br/><center><div class='news_image'><img src='".base_url()."media/berita/$berita[gambar]' width=90% height=400px/><br/>
			<span style='font-size:10px;'>$berita[deskripsi_gambar]</span></div></center><br/>";
		}
		?>
		<p><?php echo html_entity_decode($berita['isi'])?><br/><br/>
		<b>(<?php echo $berita['sumber']?>)</b>
		</p>
		<?php 
		} ?>
	<!-- AddThis Button BEGIN -->
	<div class="addthis_toolbox addthis_default_style ">
	<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
	<a class="addthis_button_tweet"></a>
	<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
	<a class="addthis_counter addthis_pill_style"></a>
	</div>
	<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4f93a8805c4c6c65"></script>
	<!-- AddThis Button END -->
		</article>
	<br />
</section> 