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
			$tgl=$tanggal." ".$array_bulan1[$bulan]." ".$tahun;
			return $tgl;
		}
		
		foreach($agenda->result_array() as $agenda){ 
		$judul=url_title($agenda['judul']);
		$topik= html_entity_decode($agenda['topik']);
		$tgl1=news_date($agenda['tgl_mulai']." ".$judul);
		$tgl2=news_date($agenda['tgl_selesai']." ".$judul);
		
		?>
	
		<header> 
			<h1><a href='<?php echo base_url()."agenda/detail/".$agenda['id_agenda']."-".$judul;?>'><?php echo $agenda['judul']; ?></a></h1> 
		</header>
		<table class="agenda">
				<tr>
					<td>Tanggal </td>
					<td>: <?php echo $tgl1." s/d ".$tgl2; ?></td>
				</tr>
				<tr>
					<td>Waktu </td>
					<td>: <?php echo $agenda['jam_mulai']." - ".$agenda['jam_selesai']; ?></td>
				</tr>
				<tr>
					<td>Tempat</td>
					<td>: <?php echo $agenda['tempat']; ?></td>
				</tr>
				<tr>
					<td>Topik</td>
					<td>: <?php $agenda['topik']; ?></td>
				</tr>
				<tr>
					<td>Sumber</td>
					<td>: <?php $agenda['sumber']; ?></td>
				</tr>
				</table>
		<?php } ?>
	<br />
</section> 