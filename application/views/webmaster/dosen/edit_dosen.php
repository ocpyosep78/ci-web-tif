
<div id="main"> 
<h2>Edit Dosen</h2>
<div class="box">
<?php
	foreach($edit->result_array() as $dosen)
	{
		$id = $dosen["id_dosen"];
		$nip = $dosen["nip"];
		$nama = $dosen["nama"];
		$pendidikan = $dosen["pendidikan"];
		$minat = $dosen["minat"];
		$alamat = $dosen["alamat"];
		$email = $dosen["email"];
		$website = $dosen["website"];
	}
?>
<span style="color:red;"><?php echo validation_errors(); ?></span>
<?php echo form_open_multipart('webmaster/editdosen');?>
<table width="80%"> 
<tr>
	<td>NIP</td>
	<td>
	<input type="text" name="nip" value="<?php echo $nip;?>" size="60"/>
	<input type="hidden" name="id" value="<?php echo $id;?>" size="60"/></td>
</tr>
<tr>
	<td>Nama</td>
	<td><input type="text" name="nama" value="<?php echo $nama;?>" size="60"/></td>
</tr>
<tr>
	<td>Pendidikan</td>
	<td><input type="text" name="pendidikan" value="<?php echo $pendidikan;?>"  size="60"/></td>
</tr>
<tr>
	<td>Minat</td>
	<td><input type="text" name="minat" value="<?php echo $minat;?>" size="60" /></td>
</tr>
<tr>
	<td>Alamat</td>
	<td><input type="text" name="alamat" value="<?php echo $alamat;?>" size="60" /></td>
</tr>
<tr>
	<td>Email</td>
	<td><input type="text" name="email" value="<?php echo $email;?>" size="60"/></td>
</tr>
<tr>
	<td>Website</td>
	<td><input type="text" name="website" value="<?php echo $website;?>" size="60"/></td>
</tr>
<tr height="60px">
<td><input type="submit" value="Update Data Dosen" name="simpan" /></td>
</tr>
</table>
</form>
</div>	
</div>