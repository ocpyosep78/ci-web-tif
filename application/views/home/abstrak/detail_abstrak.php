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
			$tgl=$hari[$h].", ".$tanggal." ".$array_bulan1[$bulan]." ".$tahun;
			return $tgl;
		}
		
		foreach($dataabstrak->result_array() as $abstrak){ 
		$judul=url_title($abstrak['judul']);
		$tgl=news_date($abstrak['tgl_munaqosah']." ");
		?>
                <nav id="lokasi">
                    <a href="<?php echo base_url(); ?>">Home</a> | <a href="<?php echo base_url()."abstrak/"?>">Daftar Abstrak</a> | <a href="<?php echo base_url()."abstrak/detail/".$abstrak['id_abstrak']."-".$judul;?>"><?php echo $abstrak['judul']; ?></a>
                </nav>
		<header> 
			<h1><a href='<?php echo base_url()."abstrak/detail/".$abstrak['id_abstrak']."-".$judul;?>'><?php echo $abstrak['judul']; ?></a></h1>
		</header>
		<!--<div class="table_abstrak">-->
                <table class="abstrak">
                    <tr>
                        <td>NIM</td>
                        <td>: <?php echo $abstrak['nim']; ?></td>
                    </tr>
                    <tr>
			<td>Nama</td>
			<td>: <?php echo $abstrak['nama_mhs']; ?></td>
                    </tr>
                    <tr>
			<td>Pembimbing</td>
                        <td>: <?php echo $abstrak['nama']; ?></td>
                    </tr>
                    <tr>
			<td>Tanggal Munaqosah</td>
			<td>: <?php echo $tgl; ?></td>
                    </tr>
                    <tr>
			<td>Judul</td>
			<td>: <?php echo $abstrak['judul']; ?></td>
                    </tr>
                    <tr>
			<td>Abstrak</td>
			<td>: <?php echo $abstrak['abstrak']; ?></td>
                    </tr>
                    <?php } ?>
		</table>
	<br />
        <p><a href="<?php echo base_url().'abstrak'?>">Kembali</a>
	</p>
        </section>