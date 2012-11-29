<?php  echo '<?xml version="1.0" encoding="' . $encoding . '"?>'; ?> 
<rss version="2.0">    
    <channel>  
        <title><?php echo $feed_name; ?></title>
        <link><?php echo $feed_url; ?> </link>
        <description><?php echo $page_description; ?></description>  
 
        <?php foreach($posts->result_array() as $abstrak):
	$judul=url_title($abstrak['judul']);
	$isi = substr($abstrak['abstrak'],0,200);
	?>
        <item>
            <title><?php echo $abstrak['judul']; ?></title>
            <link><?php echo site_url("abstrak/detail/".$abstrak['id_abstrak']."-".$judul);?> </link>
            <pubDate><?php echo $abstrak['tgl_munaqosah']; ?></pubDate>
            <description><![CDATA[ <?php echo $isi;?> ]]></description>  
        </item>  
        <?php endforeach; ?>
    </channel>
</rss>
