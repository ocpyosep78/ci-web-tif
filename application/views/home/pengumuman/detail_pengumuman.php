<br/>
<section id="news" class="detail kotak_berita"> 

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
		foreach($pengumuman->result_array() as $pengumuman){ 
		$judul=url_title($pengumuman['judul']);
		?>
	
		<header> 
			<h1><a href='<?php echo base_url()."pengumuman/detail/".$pengumuman['id_pengumuman']."-".$judul;?>'><?php echo $pengumuman['judul']; ?></a></h1> 
		</header>
		<div id="listberita">
		<?php echo "<i>".news_date($pengumuman['tanggal']." ")."</i><br/>";
					echo html_entity_decode($pengumuman['isi']);?>
					<b>(<?php echo $pengumuman['sumber']?>)</b>
		<?php 
		} ?>
		</div>	
	<br />
</section> 