
<div id="main"> 
<h2>Ganti Password</h2>
<div class="box">
<span style="color:red;"><?php echo validation_errors(); ?></span>
<?php echo form_open('webmaster/gantipassword');?>
<table width="60%" height="150px"> 
<tr>
<td>Password Lama</td>
<td><input type="password" name="passwordlama" placeholder="Password Lama" size="30"/></td>
</tr>
<tr>
<td>Password Baru</td>
<td><input type="password" name="password1" placeholder="Password Baru" size="30"/></td>
</tr>
<tr>
<td>Konfirmasi Password Baru</td>
<td><input type="password" name="password2"  placeholder="Konfirmasi Password Baru" size="30"/></td>
</tr>
<tr height="40px">
<td>
</td>
<td><input type="submit" value="Ganti Password" name="simpan" /></td>
</tr>
</table>
</form>
<br/><h1 style="color:red;"><?php echo $pesan; ?></h1>
</div>	
</div>