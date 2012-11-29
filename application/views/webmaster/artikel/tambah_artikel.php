<div id="main"> 
<h2>Tambah Artikel</h2>
<div class="box">
<span style="color:red;"><?php echo validation_errors(); ?></span>
<?php echo form_open_multipart('webmaster/tambahartikel');?>
<table width="100%"> 
<tr>
	<td>Judul Artikel<br/>
	<input type="text" name="judul" placeholder="Judul Artikel" size="133" />
	<input type="hidden" value="artikel" name="tipe" /></td>
</tr>
<tr>
<td>Isi Artikel<br/>
<textarea name="isiartikel" > </textarea> </td>
</tr>
<tr>
<td>Upload Gambar<br/>
<input type="file" name="userfile" size="40"/></td>
</tr>
<tr>
<td>Deskripsi Gambar<br/>
<input type="text" name="deskripsi" size="133"/></td>
</tr>
<tr>
<td>Sumber<br/>
<input type="text" name="sumber" size="30"/></td>
</tr>
<tr height="30px">
<td><input type="submit" value="Simpan Artikel" name="simpan" /></td>
</tr>
</table>
</form>
</div>	
</div>