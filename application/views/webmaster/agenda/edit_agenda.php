<div id="main"> 
<h2>Edit Agenda</h2>
<div class="box">
<?php
	foreach($edit->result_array() as $agenda)
	{
		$id = $agenda["id_agenda"];
		$judul = $agenda["judul"];
		$tempat = $agenda["tempat"];
		$tgl_mulai = $agenda["tgl_mulai"];
		$tgl_selesai = $agenda['tgl_selesai'];
		$jam_mulai = $agenda['jam_mulai'];
		$jam_selesai = $agenda['jam_selesai'];
		$topik = $agenda['topik'];
		$sumber = $agenda['sumber'];
	}
?>
<span style="color:red;"><?php echo validation_errors(); ?></span>
<?php echo form_open('webmaster/editagenda');?>
    <table width="100%">
      <tr>
		 <td>Acara</td>
         <td><input type="text" name="judulacara" value="<?php echo $judul; ?>" size="90"></td>
		 	<input type="hidden" value="<?php echo $id; ?>" name="id" />
      </tr>
      <tr>
		 <td>Tempat</td>
         <td><input type="text" name="tempat" value="<?php echo $tempat; ?>" size="90"></td>
      </tr>
      <tr>
		 <td>Tanggal</td>
         <td><input type="text" name="tgl_mulai" value="<?php echo $tgl_mulai; ?>" class="tcal" title="yyyy-mm-dd" id="tgl_mulai">
			 s/d <input type="text" name="tgl_selesai" value="<?php echo $tgl_selesai; ?>" class="tcal" title="yyyy-mm-dd" id="tgl_selesai">
		</td>
      </tr>
      <tr>
		 <td>Jam</td>
         <td><input type="text" name="jam_mulai" value="<?php echo $jam_mulai; ?>" size="10">
			- <input type="text" name="jam_selesai" value="<?php echo $jam_selesai; ?>" size="10"> *)Format "hh:mm" contoh: 16:15
		</td>
      </tr>
      <tr>
		 <td>Sumber</b></td>
         <td><input name="sumber" type="text" value="<?php echo $sumber; ?>" size="50"></td>
      </tr>
      <tr colspan="2"><td>Topik</td></tr>
      <tr>
           <td colspan="2"><textarea name="isiagenda" ><?php echo $topik; ?></textarea></td>
      </tr>
      <tr>      
            <td><input type="submit" value="Simpan Agenda"></td>
      </tr>
 </table>
</form>
</div>	
</div>