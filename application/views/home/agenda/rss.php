<?php  echo '<?xml version="1.0" encoding="' . $encoding . '"?>'; ?> 
<rss version="2.0">    
    <channel>  
        <title><?php echo $feed_name; ?></title>
        <link><?php echo $feed_url; ?> </link>
        <description><?php echo $page_description; ?></description>  
 
        <?php foreach($posts->result_array() as $agenda):
	$judul=url_title($agenda['judul']);
	$isi = substr($agenda['topik'],0,100);
	?>
        <item>
            <title><?php echo $agenda['judul']; ?></title>
            <link><?php echo site_url("agenda/detail/".$agenda['id_agenda']."-".$judul);?></link>
            <pubDate><?php echo $agenda['tgl_posting']; ?></pubDate>
            <description><![CDATA[ <?php echo $agenda['topik'];?> ]]></description>  
        </item>  
        <?php endforeach; ?>
    </channel>
</rss>
