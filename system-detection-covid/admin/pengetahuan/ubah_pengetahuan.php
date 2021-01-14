
<?php 
$id_pengetahuan = $_GET['id_pengetahuan'];
$detail_pengetahuan = $pengetahuan->detail_pengetahuan($id_pengetahuan);
?>

<?php $data_penyakit= $penyakit->tampil_penyakit() ?>
<?php $data_gejala= $gejala->tampil_gejala() ?>

<section class="inner">
	<div class="form-body wow fadeIn animated">
		<div class="box">
			<div class="panel-body">
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label> Nama Penyakit </label>
						<select class="form-control" name="id_penyakit" required="">
							<option value=""> Pilih Penyakit </option>
							<?php foreach ($data_penyakit as $key => $value): ?>
								<option value="<?php echo $value['id_penyakit'] ?>" <?php if ($value['id_penyakit']==$detail_pengetahuan['id_penyakit']) {echo "selected" ;} ?> > <?php echo $value ['nama_penyakit'] ?></option>
							<?php endforeach ?>	

						</select>
					</div>
					<div class="form-group">
						<label> Gejala </label>
						<select class="form-control" name="id_gejala" required="" value="<?php echo $data_pengetahuan['MB']?>" > 
							<option value=""> Pilih Gejala </option>
							<?php foreach ($data_gejala as $key => $value) : ?>
								<option value="<?php echo $value ['id_gejala'] ?>" <?php if ($value['id_gejala']==$detail_pengetahuan['id_gejala']) {echo "selected";} ?>>  <?php echo $value ['nama_gejala'] ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label> MB </label>
						<input type="" class="form-control" name="MB" value="<?php echo $detail_pengetahuan['MB']?>">
					</div>
					<div class="form-group">
						<label> MD </label>
						<input type="" class="form-control" name="MD" value="<?php echo $detail_pengetahuan['MD']?>">
					</div>


					
						<button type="submit" name="ubah" class="btn btn-primary btn-flat "> <i class="fa fa-save"></i> Ubah</button>
						<a href="index.php?halaman=tampil_pengetahuan" class="btn btn-danger btn-flat"><i class="fa fa-backward"></i> Kembali</a>
					
				</div>

				</form>
			</div>
		</div>
	</div>
</section>
<?php if (isset($_POST['ubah'])) 
{	
	$cek = $pengetahuan->cek_ubah_pengetahuan($_POST['id_penyakit'],$_POST['id_gejala'],$id_pengetahuan);

	if ($cek=="ada")
	{
		echo "<script>alert('pengetahuan sudah ada')</script>";
	}

	else
	{
		$pengetahuan->ubah_pengetahuan($_POST['id_penyakit'],$_POST['id_gejala'],$_POST['MB'],$_POST['MD'],$id_pengetahuan);

		echo "<script>alert('data  tersimpan')</script>";
		echo "<script>location='index.php?halaman=tampil_pengetahuan'</script>";

	}
	
	
}

?>