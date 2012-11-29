<div id="main"> 
<h2>Edit Pengumuman</h2>
<div class="box">
<?php
	foreach($edit->result_array() as $pengumuman)
	{
		$id = $pengumuman["id_pengumuman"];
		$judul = $pengumuman["judul"];
		$isi = $pengumuman["isi"];
		$sumber = $pengumuman['sumber'];
	}
?>
<span style="color:red;"><?php echo validation_errors(); ?></span>
<?php echo form_open('webmaster/editpengumuman');?>
<table width="100%"> 
<tr>
	<td>Judul Pengumuman<br/>
	<input type="text" name="judul" value="<?php echo $judul; ?>" size="133" />
	<input type="hidden" name="id" value="<?php echo $id; ?>"/></td>
</tr>
<tr>
<td>Isi Pengumuman<br/>
<textarea name="isipengumuman" ><?php echo $isi; ?></textarea> </td>
</tr>
<td>Sumber<br/>
<input type="text" name="sumber" value="<?php echo $sumber; ?>" size="30"/></td>
</tr>
<tr height="30px">
<td><input type="submit" value="Simpan Pengumuman" name="simpan" /></td>
</tr>
</table>
</form>
</div>	
</div>