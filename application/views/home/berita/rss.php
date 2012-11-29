<?php  echo '<?xml version="1.0" encoding="' . $encoding . '"?>'; ?> 
<rss version="2.0">    
    <channel>  
        <title><?php echo $feed_name; ?></title>
        <link><?php echo $feed_url; ?> </link>
        <description><?php echo $page_description; ?></description>  
 
        <?php foreach($posts->result_array() as $artikel):
	$judul=url_title($artikel['judul']);
	$isi = substr($artikel['isi'],0,200);
	?>
        <item>
            <title><?php echo $artikel['judul']; ?></title>
            <link><?php echo site_url("berita/detail/".$artikel['id_artikel']."-".$judul);?> </link>
            <pubDate><?php echo $artikel['tanggal']; ?></pubDate>
            <description><![CDATA[ <?php echo $isi;?> ]]></description>  
        </item>  
        <?php endforeach; ?>
    </channel>
</rss>
