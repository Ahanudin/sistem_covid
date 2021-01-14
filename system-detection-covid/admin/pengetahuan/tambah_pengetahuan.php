<section class="content-header">
	<h1>
		Tambah Pengetahuan 
		<small> </small>
	</h1>
</section>

<?php $data_penyakit= $penyakit->tampil_penyakit() ?>


<?php $data_gejala= $gejala->tampil_gejala() ?>

<?php 





?>
<section class="inner">
	<div class="form-body wow fadeIn animated">
		<div class="box">
			<div class="panel-body">

				<form method="post">


					<div class="form-group">
						<label> Nama Penyakit </label>
						<select class="form-control" name="id_penyakit" required="">
							<option value=""> Pilih Penyakit </option>
							<?php foreach ($data_penyakit as $key => $value): ?>
								<option value="<?php echo $value['id_penyakit'] ?>" > <?php echo $value ['nama_penyakit'] ?></option>
							<?php endforeach ?>	

						</select>
					</div>
					<div class="form-group">
						<label> Gejala </label>
						<select class="form-control" name="id_gejala" required=""> 
							<option value=""> Pilih Gejala </option>
							<?php foreach ($data_gejala as $key => $value) : ?>
								<option value="<?php echo $value ['id_gejala'] ?>">  <?php echo $value ['nama_gejala'] ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label>MB</label>
						<input type="" class="form-control " required="" name="MB" placeholder="0.1 - 1" >

					</div>
					<div class="form-group">
						<label>MD</label>
						<input type="" class="form-control" required="" name="MD" placeholder="0.1 - 1">
					</div>

					<button class="btn btn-primary" name="simpan"><i class="fa fa-save"></i> Simpan</button>
					<a href="index.php?halaman=tampil_pengetahuan" class="btn btn-danger btn-flat"><i class="fa fa-backward"></i> Kembali</a>

					<?php 
					if (isset($_POST['simpan'])) 
					{
	//cek pengetahuan apakah sudah ada atau belum
						$cek = $pengetahuan->cek_tambah_pengetahuan($_POST['id_penyakit'],$_POST['id_gejala']);

	//jika ada
						if ($cek=="ada") 
						{
							echo "<script>alert('data sudah ada')</script>";
						}

	//jika belum ada
						else
						{
							$pengetahuan->simpan_pengetahuan($_POST['id_penyakit'],$_POST['id_gejala'],$_POST['MB'],$_POST['MD']);
							echo "<script>alert('data tersimpan')</script>";
							echo "<script>location='index.php?halaman=tampil_pengetahuan'</script>";
						}

					} 
					?>


				</form>
			</div>
		</div>
	</div>
</section>