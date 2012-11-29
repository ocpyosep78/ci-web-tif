<div id="main"> 
<h2>Tambah slider</h2>
<div class="box">
<span style="color:red;"><?php echo validation_errors(); ?></span>
<?php echo form_open_multipart('webmaster/tambahslider');?>
<table width="100%"> 
<tr>
	<td>Judul<br/>
	<input type="text" name="judul" placeholder="Judul slider" size="100" class="{required:true}"/></td>
</tr>
<tr>
	<td>Deskripsi<br/>
	<input type="text" name="deskripsi" placeholder="Deskripsi gambar" size="100" class="{required:true}"/></td>
</tr>
<tr>
<td>Photo<br/>
<input type="file" name="userfile" size="40"/></td>
</tr>
<tr>
	<td>Url / Link<br/>
	<input type="text" name="url" placeholder="" size="100" class="{required:true}"/></td>
</tr>
<tr>
	<td>Status<br/>
	<input type="radio" name="status" value="1"/>Aktif <input type="radio" name="status" value="0"/>Tidak Aktif</td>
</tr>
<tr height="30px">
<td><input type="submit" value="Upload slide" name="simpan" /></td>
</tr>
</table>
</form>
</div>	
</div>