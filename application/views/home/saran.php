<br/>
<section id="news" class="detail kotak_berita"> 
		<header> 
			<h1>Kirim Saran</h1> 
		</header>
		<div id="listdosen">
<br/><span style="color:red;"><?php echo validation_errors(); ?></span>
<?php echo form_open('saran/kirim_saran');?>
<p>	<table width="100%" height="250px">
		<tr>
			<td>Nama</td>
			<td><input id="name" name="nama" size="40" placeholder="Nama Anda" type="text" />
			<span id="nameInfo"></span></td>
		</tr>
		<tr>
			<td>E-mail</td>
			<td><input id="email" name="email" size="40" placeholder="Alamat Email Anda" type="text" /><span id="emailInfo"></span></td>
				
		</tr>
		<tr>
			<td>Subjek</td>
			<td><input id="subject" name="subjek" size="40" placeholder="Subjek" type="text" />
				<span id="subjectInfo"></span></td>
		</tr>
		<tr>
			<td>Pesan</td>
			<td><textarea id="message" name="pesan" cols="40" placeholder="Isi Saran / Pesan" rows="8"></textarea>
			</td>
		</tr>
		<tr>
			<td><input type="hidden" name="unik_code" value="<?php echo $this->session->userdata('unik_code');?>" /></td>
			<td><input id="send" name="send" type="submit" value="Kirim" /></td>
		</tr>
	</table>
</form>
</p>
		<?php echo $msg ?>
</p>
</div>
    </section> 