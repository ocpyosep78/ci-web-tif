<div id="main"> 
<h2>Tambah Dosen</h2>
<div class="box">
<span style="color:red;"><?php echo validation_errors(); ?></span>
<?php echo form_open_multipart('webmaster/tambahdosen');?>
<table width="80%"> 
<tr>
	<td>NIP</td>
	<td><input type="text" name="nip" placeholder="Nip dosen" size="60"/></td>
</tr>
<tr>
	<td>Nama</td>
	<td><input type="text" name="nama" placeholder="Nama dosen" size="60"/></td>
</tr>
<tr>
	<td>Pendidikan</td>
	<td><input type="text" name="pendidikan" placeholder="Pendidikan dosen" size="60"/></td>
</tr>
<tr>
	<td>Minat</td>
	<td><input type="text" name="minat" placeholder="Minat dosen" size="60" /></td>
</tr>
<tr>
	<td>Alamat</td>
	<td><input type="text" name="alamat" placeholder="Alamat dosen" size="60" /></td>
</tr>
<tr>
	<td>Email</td>
	<td><input type="text" name="email" placeholder="Email dosen" size="60"/></td>
</tr>
<tr>
	<td>Website</td>
	<td><input type="text" name="website" placeholder="Website dosen" size="60"/></td>
</tr>
<tr height="60px">
<td><input type="submit" value="Simpan Data Dosen" name="simpan" /></td>
</tr>
</table>
</form>
</div>	
</div>