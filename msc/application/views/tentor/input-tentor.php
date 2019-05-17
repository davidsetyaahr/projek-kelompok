<form action="<?php echo base_url()."tentor/insert_tentor" ?>" method="post">
	<div class="row">
		<div class="col-lg-6">
			<label>Kode Tentor</label>
			<input type="text" class="form-control" name="kode_tentor" readonly value="<?php echo $kode?>">
		</div>
		<div class="col-lg-6">
			<label>Nama Tentor</label>
			<input type="text" class="form-control" name="nama_tentor" value="">
		</div>
		<div class="col-lg-6">
			<label>Pendidikan Terakhir</label>
			<input type="text" class="form-control" name="pendidikan_terakhir" value="">
		</div>
		<div class="col-lg-6">
			<label>No. Hp</label>
			<input type="number" class="form-control" name="no_hp" value="">
		</div>
		<div class="col-lg-6">
			<label>Jenis Kelamin</label>
			<select name="jk" class="form-control">
			<option value="">---Pilih Jenis Kelamin---</option>
				<option>Laki Laki</option>
				<option>Perempuan</option>
			</select>
		</div>
		<div class="col-lg-6">
			<label>Alamat</label>
			<textarea type="number" class="form-control" name="alamat" ></textarea>
		</div>
		<div class="col-lg-6">
			<label>Gaji</label>
			<input type="number" class="form-control" name="gaji" value="">
		</div>
		<div class="col-lg-6">
			<label>Mata Pelajaran</label><br>
			<div class="form-control" style="overflow: auto;">
			<?php foreach($data as $d){?>
				<input id="<?= $d["id_mapel"]?>" type="checkbox" class="" name="id_mapel[]" value="<?php echo $d["id_mapel"]?>"><label for="<?= $d["id_mapel"]?>">&nbsp<?php echo $d["mata_pelajaran"]?>&nbsp &nbsp</label>
			<?php }?>
			</div>
		</div>
		<div class="col-lg-6">
			<br>
			<?php $this->load->view("common/btn") ?>
		</div>
	</div>
</form>