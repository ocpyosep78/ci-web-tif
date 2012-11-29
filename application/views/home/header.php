<html>
<head>
<meta http-equiv="Content-Language" content="Indonesia" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta name="author" content=" udinjust4u (udinjust4u@yahoo.com)" />
<meta name="keyword" content="Prodi, tif, teknik, informatika, uin, sunan, kalijaga, yogyakarta" />
<script type="text/javascript" src="<?php echo base_url();?>/media/css_home/js/jquery.min.js"></script> 
<link href="<?php echo base_url();?>/media/js/jpopup/jpopup.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>/media/js/jquery.js"></script>  
<script type="text/javascript" src="<?php echo base_url();?>/media/js/jpopup/jquery.popup.js"></script>       
		
<link type="image/x-icon" href="<?php echo base_url();?>/media/images/uin_icon.png" rel="shortcut icon" />
<link href="<?php echo base_url();?>/media/css2/layout.css" rel="stylesheet" type="text/css" /> 
<link href="<?php echo base_url();?>/media/css2/style.css" rel="stylesheet" type="text/css" /> 
<link href="<?php echo base_url();?>/media/css2/nivo-slider.css" rel="stylesheet" type="text/css" /> 
<link href="<?php echo base_url();?>/media/images/nivo/default.css" rel="stylesheet" type="text/css" /> 
	
<!-- start - tambahan menu-->
<script src="<?php echo base_url();?>/media/css2/menu/script.js"></script> 
<link href="<?php echo base_url();?>/media/css2/menu/style.css" rel="stylesheet" /> 
<!-- end - tambahan menu-->


<title><?php echo $judul;?> - Teknik Informatika UIN Sunan Kalijaga</title>
</head>
<body> 
<div class="container"> 
	<header> 
		<!-- Bar with logo and quick navigation --> 
		<div class="tophead">  
		</div> 
		
		<nav class="menuhead"> 
			<ul id="menu" class="menu">
				<li><a href="<?php echo base_url(); ?>" ><span>Home</span></a></li>
				<li><a href="#" ><span>Profil</span></a>
				<ul>
					<?php 
						foreach($daftarmenu->result_array() as $menu){ 		
						$judul=url_title($menu['judul']);
					?> 	
						<li><a href='<?php echo base_url()."profil/detail/".$menu['id_datastatis']."-".$judul;?>'><?php echo $menu['judul'];?></a></li> 
					<?php 
					}
					?>
				</ul>
				</li>
				<li><a href="<?php echo base_url(); ?>dosen" ><span>Dosen</span></a></li>
				<li><a href="<?php echo base_url(); ?>dokumen" ><span>Dokumen Akademik</span></a></li>
				<li><a href="<?php echo base_url(); ?>abstrak" ><span>Abstrak</span></a></li> 	
				<li><a href="<?php echo base_url(); ?>saran" ><span>Saran</span></a></li> 	
			</ul>
		</nav>
		
		<script type="text/javascript"> 
	var menu=new menu.dd("menu");
	menu.init("menu","menuhover");
</script>       

			</header> 