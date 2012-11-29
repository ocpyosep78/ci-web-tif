<div id="main"> 
<h2>Tambah Jurnal</h2>
<div class="box">
<span style="color:red;"><?php echo validation_errors(); ?></span>
<?php echo form_open_multipart('webmaster/tambahjurnal');?>
<table width="100%"> 
<tr>
	<td>NIM</td>
	<td><input type="text" name="nim" placeholder="Isikan NIM" size="15" /></td>
</tr>
<tr>
	<td>Nama Mahasiswa</td>
	<td><input type="text" name="nama" placeholder="Isikan Nama Mahasiswa" size="60" /></td>
</tr>
<tr>
	<td>Dosen Pembimbing</td>
	<td><select name="dosen">
		<option>Pilih Dosen Pembimbing</option>
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
	<td><input type="text" name="tgl_munaqosah" class="tcal"  title="Isikan Tanggal Tahun-bulan-hari" placeholder="Tanggal Munaqosah" size="20" /></td>
</tr>
<tr>
	<td>Judul Skripsi</td>
	<td><input type="text" name="judul" placeholder="Isikan Judul Skripsi" size="100" /></td>
</tr>
<tr>
<td colspan="2">Isi Absrtak<br/>
<textarea name="isiabstrak" ></textarea> </td>
</tr>
<tr height="30px">
<td><input type="submit" value="Simpan Abstrak" name="simpan" /></td>
</tr>
</table>
</form>
</div>	
</div>