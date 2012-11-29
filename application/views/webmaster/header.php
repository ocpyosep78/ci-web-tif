<html>
<head>
<meta http-equiv="Content-Language" content="Indonesia" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta name="author" content=" udinjust4u (udinjust4u@yahoo.com)" />
<meta name="keyword" content="Prodi, tif, teknik, informatika, uin, sunan, kalijaga, yogyakarta" />
<link href="<?php echo base_url();?>/media/style.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="<?php echo base_url();?>/media/csstambahan.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="<?php echo base_url();?>/media/tcal.css" rel="stylesheet" type="text/css" media="screen"/>
<script type="text/javascript" src="<?php echo base_url();?>/media/script.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/media/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>/media/js/tcal.js" type="text/javascript" ></script>
<?php echo $scriptmce; ?>
<link href="<?php echo base_url();?>/media/kendo.common.min.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="<?php echo base_url();?>/media/kendo.default.min.css" rel="stylesheet" type="text/css" media="screen"/>

<title><?php echo $judul;?> - Teknik Informatika UIN Sunan Kalijaga</title>
</head>
<body>
<div id="wrap">
	<div id="header"></div>
	<!-- content-wrap starts here -->
	<div id="content-wrap">  
		<!-- Main Navigation Menu -->
		<div id="status">
			<span style="float:left;"><b><a href="<?php echo base_url();?>" title="Menu Liat Situs" >Lihat Situs</a></b></span>
			<b><?php echo $nama."</b>"; $status=1?" (Administrator)":" (Petugas)"; echo $status;?> - <b><?php echo anchor('webmaster/logout','Logout','Klik disini untuk logout');?> </b>
		</div>