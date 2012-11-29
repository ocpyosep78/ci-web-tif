<div id="main"> 
<h2>Tambah Users</h2>
<div class="box">
<span style="color:red;"><?php echo validation_errors(); ?></span>
<?php echo form_open('webmaster/tambahuser');?>
<table width="70%" height="200px"> 
<tr>
	<td>Nama Lengkap</td>
	<td><input type="text" name="nama" placeholder="Nama Lengkap" size="40" /></td>
</tr>
<tr>
	<td>Username</td>
	<td><input type="text" name="username" placeholder="username" size="40" /></td>
</tr>
<tr>
	<td>Email</td>
	<td><input type="text" name="email" placeholder="Alamat Email" size="40" /></td>
</tr>
<tr>
	<td>No HP</td>
	<td><input type="text" name="nohp" placeholder="Nomor Hp / Telp" size="40" /></td>
</tr>
<tr>
	<td>Password</td>
	<td><input type="password" name="password" size="40" /></td>
</tr>
<tr height="40px">
<td><input type="hidden" name="status" value="1" /></td>
	<td><input type="submit" value="Tambah User" name="simpan" /></td>
</tr>
</table>
</form>
</div>	
</div>