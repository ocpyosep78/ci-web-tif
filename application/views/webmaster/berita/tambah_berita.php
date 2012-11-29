<div id="main"> 
<h2>Tambah Berita</h2>
<div class="box">
<span style="color:red;"><?php echo validation_errors(); ?></span>
<?php echo form_open_multipart('webmaster/tambahberita');?>
<table width="100%"> 
<tr>
	<td>Judul Berita<br/>
	<input type="text" name="judul" placeholder="Judul Berita" size="133" />
	<input type="hidden" value="berita" name="tipe" /></td>
</tr>
<tr>
<td>Isi Berita<br/>
<textarea name="isiberita" > </textarea> </td>
</tr>
<tr>
<td>Upload Gambar<br/>
<input type="file" name="userfile" /></td>
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
<td><input type="submit" value="Simpan Berita" name="simpan" /></td>
</tr>
</table>
</form>
</div>	
</div>