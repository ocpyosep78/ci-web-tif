<div id="main"> 
<h2>Tambah Agenda</h2>
<div class="box">
<span style="color:red;"><?php echo validation_errors(); ?></span>
<?php echo form_open('webmaster/tambahagenda');?>
    <table width="100%">
      <tr>
		 <td>Acara</td>
         <td><input type="text" name="judulacara" size="90"></td>
      </tr>
      <tr>
		 <td>Tempat</td>
         <td><input type="text" name="tempat" size="90"></td>
      </tr>
      <tr>
		 <td>Tanggal</td>
         <td><input type="text" name="tgl_mulai" class="tcal" title="yyyy-mm-dd"  id="tgl_mulai">
			 s/d <input type="text" name="tgl_selesai" class="tcal" title="yyyy-mm-dd"  id="tgl_selesai">
		</td>
      </tr>
      <tr>
		 <td>Jam</td>
         <td><input type="text" name="jam_mulai" size="10">
			- <input type="text" name="jam_selesai" size="10"> *)Format "hh:mm" contoh: 16:15
		</td>
      </tr>
      <tr>
		 <td>Sumber</b></td>
         <td><input name="sumber" type="text" size="50"></td>
      </tr>
      <tr colspan="2"><td>Topik</td></tr>
      <tr>
           <td colspan="2"><textarea name="isiagenda" ></textarea></td>
      </tr>
      <tr>      
            <td><input type="submit" value="Simpan Agenda"></td>
      </tr>
 </table>
</form>
</div>	
</div>