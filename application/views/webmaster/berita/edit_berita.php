<div id="main"> 
<h2>Edit Berita</h2>
<div class="box">
<?php
	foreach($edit->result_array() as $artikel)
	{
		$id = $artikel["id_artikel"];
		$judul = $artikel["judul"];
		$isi = $artikel["isi"];
		$gambar = $artikel['gambar'];
		$deskripsi = $artikel['deskripsi_gambar'];
		$sumber = $artikel['sumber'];
		$tipe = $artikel['tipe'];
	}
?>
<span style="color:red;"><?php echo validation_errors(); ?></span>
<?php echo form_open_multipart('webmaster/editartikel');?>
<table width="100%"> 
<tr>
	<td>Judul Berita<br/>
	<input type="text" name="judul" value="<?php echo $judul; ?>" size="133" />
	<input type="hidden" value="<?php echo $tipe; ?>" name="tipe" />
	<input type="hidden" value="<?php echo $id; ?>" name="id" /></td>
</tr>
<tr>
<td>Isi Berita<br/>
<textarea name="isiberita" ><?php echo $isi; ?></textarea> </td>
</tr>
<tr>
<td>Upload Gambar<br/>
<input type="file" name="userfile"  size="40"/> *Jika Gambar tidak diganti kosongkan saja</td>
</tr>
<tr>
<td>Deskripsi Gambar<br/>
<input type="text" name="deskripsi" value="<?php echo $deskripsi; ?>" size="133"/></td>
</tr>
<tr>
<td>Sumber<br/>
<input type="text" name="sumber" value="<?php echo $sumber; ?>" size="30"/></td>
</tr>
<tr height="30px">
<td><input type="submit" value="Simpan Berita" name="simpan" /></td>
</tr>
</table>
</form>
</div>	
</div>