<div id="main"> 
<h2>Tambah Dokumen</h2>
<div class="box">
<span style="color:red;"><?php echo validation_errors(); ?></span>
<?php echo form_open_multipart('webmaster/tambahdokumen');?>
<table width="100%"> 
<tr>
	<td>Judul Dokumen<br/>
	<input type="text" name="judul" placeholder="Judul Dokumen" size="100" class="{required:true}"/></td>
</tr>
<tr>
<td>Upload Dokumen<br/>
<input type="file" name="userfile" size="40"/></td>
</tr>
<tr height="30px">
<td><input type="submit" value="Upload Dokumen" name="simpan" /></td>
</tr>
</table>
</form>
</div>	
</div>