
<div id="main"> 
<h2>Edit Dokumen</h2>
<div class="box">
<?php
	foreach($edit->result_array() as $dokumen)
	{
		$id = $dokumen["id_dokumen"];
		$judul = $dokumen["judul"];
		$file = $dokumen['url_file'];
	}
?>
<span style="color:red;"><?php echo validation_errors(); ?> </span>
<?php echo form_open_multipart('webmaster/editdokumen');?>
<table width="100%"> 
<tr>
	<td>Judul Dokumen<br/>
	<input type="text" name="judul" value="<?php echo $judul; ?>" size="133" />
	<input type="hidden" value="<?php echo $id; ?>" name="id" /></td>
</tr>
<tr>
<td>Upload Gambar<br/>
<input type="file" name="userfile" /> *Jika File tidak diganti kosongkan saja</td>
</tr>
<tr height="30px">
<td><input type="submit" value="Update Dokumen" name="simpan" /></td>
</tr>
</table>
</form>
</div>	
</div>