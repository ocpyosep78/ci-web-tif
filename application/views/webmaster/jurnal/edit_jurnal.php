<div id="main"> 
<h2>Edit Jurnal</h2>
<div class="box">
<?php
	foreach($edit->result_array() as $jurnal)
	{
		$id = $jurnal["id_abstrak"];
		$nim = $jurnal["nim"];
		$nama = $jurnal["nama_mhs"];
		$dosen = $jurnal['id_pembimbing'];
		$namadosen = $jurnal['nama'];
		$judul = $jurnal["judul"];
		$tgl = $jurnal["tgl_munaqosah"];
		$isi = $jurnal["abstrak"];
	}
?>
<span style="color:red;"><?php echo validation_errors(); ?></span>
<?php echo form_open_multipart('webmaster/editjurnal');?>
<table width="100%"> 
<tr>
	<td>NIM</td><input type="hidden" value="<?php echo $id; ?>" name="id" />
	<td><input type="text" name="nim" placeholder="Isikan NIM" value="<?php echo $nim; ?>" size="15" /></td>
</tr>
<tr>
	<td>Nama Mahasiswa</td>
	<td><input type="text" name="nama" placeholder="Isikan Nama Mahasiswa" value="<?php echo $nama; ?>" size="60" /></td>
</tr>
<tr>
	<td>Dosen Pembimbing</td>
	<td><select name="dosen">
		<option value="<?php echo $dosen; ?>"><?php echo $namadosen; ?></option>
		<?php
		foreach($datadosen->result_array() as $dosen)
		{
			$id = $dosen["id_dosen"];
			$nama = $dosen["nama"];	
			echo "<option name=dosen value=$id>$nama</option>";
		}
		?>
		</select>
	</td>
</tr>
<tr>
<tr>
	<td>Tanggal Munaqosah</td>
	<td><input type="text" name="tgl_munaqosah" class="tcal"  title="Isikan Tanggal Tahun-bulan-hari" placeholder="Isikan Tanggal Munaqosah" value="<?php echo $tgl; ?>" size="20" /></td>
</tr>
<tr>
	<td>Judul Skripsi</td>
	<td><input type="text" name="judul" placeholder="Isikan Judul Skripsi" value="<?php echo $judul; ?>" size="100" /></td>
</tr>
<tr>
<td colspan="2">Isi Absrtak<br/>
<textarea name="isiabstrak" ><?php echo $isi; ?></textarea> </td>
</tr>
<tr height="30px">
<td><input type="submit" value="Simpan Abstrak" name="simpan" /></td>
</tr>
</table>
</form>
</div>	
</div>