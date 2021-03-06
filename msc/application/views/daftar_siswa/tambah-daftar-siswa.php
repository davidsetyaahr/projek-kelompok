<form action="<?php echo base_url()."daftar_siswa/insert_daftar" ?>" method="post">
	<div class="row">
		<div class="col-lg-6">
			<label>Kode Siswa</label>
			<input type="text" class="form-control" name="kode_siswa" readonly value="<?= $siswa?>">
		</div>
		<div class="col-lg-6">
			<label>Nama Siswa</label>
			<input type="text" class="form-control" name="nama_siswa" value="">
		</div>
		<div class="col-lg-6">
			<br>
			<label>Tanggal Lahir</label>
			<input type="date" class="form-control" name="tgl_lahir" value="">
		</div>
		<div class="col-lg-6">
			<br>
			<label>Jenis Kelamin</label>
			<select name="jk" class="form-control">
			<option value="">---Pilih Jenis Kelamin---</option>
				<option>Laki Laki</option>
				<option>Perempuan</option>
			</select>
		</div>
		<div class="col-lg-6">
			<br>
			<label>Alamat</label>
			<textarea type="number" class="form-control" name="alamat" ></textarea>
		</div>
		<div class="col-lg-6">
			<br>
			<label>No Telepon Siswa</label>
			<input type="number" class="form-control" name="no_hpsiswa" value="">
		</div>
		<div class="col-lg-6">
			<br>
			<label>Kelas</label>
			<select name="kelas" class="form-control">
			<option value="">---Pilih Kelas---</option>
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
			<option>6</option>
			<option>7</option>
			<option>8</option>
			<option>9</option>
			<option>10</option>
			<option>11</option>
			<option>12</option>
			</select>
		</div>
		<div class="col-lg-6">
			<br>
			<label>Cicilan</label>
			<input type="number" class="form-control" name="cicilan" value="0">
		</div>
		<div class="col-lg-6">
			<br>
			<label>Grup</label>
			<select name="kode_group" class="form-control">
			<option value="">---Pilih Group---</option>
			<?php 
				foreach ($group as $g) {
					echo "<option value='".$g['kode_group']."'>$g[nama_group]</option>";
				}
			?>
			</select>
		</div>
		<div class="col-lg-6">
			<br>
			<label>Nama Orang Tua</label>
			<input type="text" class="form-control" name="nama_ortu" value="">
		</div>
		<div class="col-lg-6">
			<br>
			<label>No Telepon Wali</label>
			<input type="number" class="form-control" name="no_hp" value="">
		</div>
		<div class="col-lg-6">
			<br>
			<label>Tanggal Pendafatran</label>
			<input type="date" class="form-control" name="tgl_daftar" value="">
		</div>
		<div class="col-lg-6">
			<br>
			<label>Biaya Pendafatran</label>
			<input type="number" class="form-control" name="nominal_pendaftaran" readonly value="<?= $biaya[0]["pendaftaran"]?>">
		</div>
		<div class="col-lg-6">
			<br>
			<br>
			<?php $this->load->view("common/btn") ?>
		</div>
	</div>
</form>
