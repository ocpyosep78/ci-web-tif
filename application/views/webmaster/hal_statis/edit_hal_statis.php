<div id="main"> 
<h2>Edit Halaman Statis</h2>
<div class="box">
<?php
	foreach($edit->result_array() as $halstatis)
	{
		$id = $halstatis["id_datastatis"];
		$judul = $halstatis["judul"];
		$isi = $halstatis["isi"];
	}
?>
<span style="color:red;"><?php echo validation_errors(); ?></span>
<?php echo form_open('webmaster/edithalstatis');?>
<table width="100%"> 
<tr>
	<td>Judul<br/>
	<input type="text" name="judul" value="<?php echo $judul; ?>" size="133" />
	<input type="hidden" name="id" value="<?php echo $id; ?>"/></td>
</tr>
<tr>
<td>Isi<br/>
<textarea name="isihalstatis" ><?php echo $isi; ?></textarea> </td>
</tr>
<tr height="30px">
<td><input type="submit" value="Simpan" name="simpan" /></td>
</tr>
</table>
</form>
</div>	
</div>