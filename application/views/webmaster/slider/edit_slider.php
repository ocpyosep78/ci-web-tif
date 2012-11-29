
<div id="main"> 
<h2>Edit slider</h2>
<div class="box">
<?php
	foreach($edit->result_array() as $slider)
	{
		$id = $slider["id_slider"];
		$judul = $slider["judul"];
		$file = $slider['gambar'];
		$deskripsi = $slider['deskripsi'];
		$url = $slider['url'];
		$status = $slider['status'];
		if($status==1){
			$stat1="checked";
			$stat2="";
		} else {
			$stat2="checked";
			$stat1="";
		}
	}
?>
<span style="color:red;"><?php echo validation_errors(); ?> </span>
<?php echo form_open_multipart('webmaster/editslider');?>
<table width="100%"> 
<tr>
	<td>Judul<br/>
	<input type="text" name="judul" placeholder="Judul slider" size="100"  value="<?php echo $judul;?>" class="{required:true}"/>
	<input type="hidden" name="id" placeholder="Judul slider" size="100"  value="<?php echo $id;?>"/></td>
</tr>
<tr>
	<td>Deskripsi<br/>
	<input type="text" name="deskripsi" placeholder="Deskripsi gambar" value="<?php echo $deskripsi;?>" size="100" class="{required:true}"/></td>
</tr>
<tr>
<td>Photo<br/>
<input type="file" name="userfile" size="40"/></td>
</tr>
<tr>
	<td>Url / Link<br/>
	<input type="text" name="url" value="<?php echo $url;?>" placeholder="" size="100" class="{required:true}"/></td>
</tr>
<tr>
	<td>Status<br/>
	<input type="radio" name="status" value="1" <?php echo $stat1;?>/>Aktif <input type="radio" name="status" value="0" <?php echo $stat2;?>/>Tidak Aktif</td>
</tr>
<tr height="30px">
<td><input type="submit" value="Upload slide" name="simpan" /></td>
</tr>
</table>
</form></div>	
</div>