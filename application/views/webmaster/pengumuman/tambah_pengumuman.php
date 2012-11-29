<div id="main"> 
<h2>Tambah Pengumuman</h2>
<div class="box">
<span style="color:red;"><?php echo validation_errors(); ?></span>
<?php echo form_open('webmaster/tambahpengumuman');?>
<table width="100%"> 
<tr>
	<td>Judul Pengumuman<br/>
	<input type="text" name="judul" placeholder="Judul Pengumuman" size="133" /></td>
</tr>
<tr>
<td>Isi Pengumuman<br/>
<textarea name="isipengumuman" > </textarea> </td>
</tr>
<tr>
<td>Sumber<br/>
<input type="text" name="sumber" size="30"/></td>
</tr>
<tr height="30px">
<td><input type="submit" value="Simpan Pengumuman" name="simpan" /></td>
</tr>
</table>
</form>
</div>	
</div>