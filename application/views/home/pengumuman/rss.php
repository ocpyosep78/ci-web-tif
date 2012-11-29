<?php  echo '<?xml version="1.0" encoding="' . $encoding . '"?>'; ?> 
<rss version="2.0">    
    <channel>  
        <title><?php echo $feed_name; ?></title>
        <link><?php echo $feed_url; ?> </link>
        <description><?php echo $page_description; ?></description>  
 
        <?php foreach($posts->result_array() as $pengumuman):
	$judul=url_title($pengumuman['judul']);
	$isi = substr($pengumuman['isi'],0,200);
	?>
        <item>
            <title><?php echo $pengumuman['judul']; ?></title>
            <link><?php echo site_url("pengumuman/detail/".$pengumuman['id_pengumuman']."-".$judul);?> </link>
            <pubDate><?php echo $pengumuman['tanggal']; ?></pubDate>
            <description><![CDATA[ <?php echo $isi;?> ]]></description>  
        </item>  
        <?php endforeach; ?>
    </channel>
</rss>
