
<?php 
$id_pasien = $_GET['id_pasien'];
$data_pasien = $pasien->detail_pasien($id_pasien);
?>


<section class="content-header">
	<h1>
		Data Pasien
		<small> | Ubah Data Anda </small>
	</h1>
</section>

<section class="inner">
	<div class="form-body">
		<div class="row">
			<form class="form-horizontal" method="POST" enctype='multipart/form-data'>
				<div class="box-body">

					<div class="form-group">
						<label class="col-md-2 control-label">NIK</label>
						<div class="col-sm-3">
							<input type="" class="form-control" name="nik" value="<?php echo $data_pasien['nik'] ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Nama Pasien </label>
						<div class="col-sm-3">
							<input type="" class="form-control" name="nama_pasien" value="<?php echo $data_pasien['nama_pasien']; ?>">	
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Umur Pasien</label>
						<div class="col-sm-3">
							<input type="" class="form-control" name="umur_pasien" value="<?php echo $data_pasien['umur_pasien']; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Email Pasien</label>
						<div class="col-sm-3">
							<input type="" class="form-control" name="email_pasien" value="<?php echo $data_pasien['email_pasien']; ?>">
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-2 control-label">Alamat Pasien</label>
						<div class="col-sm-3">
							<input type="" class="form-control" name="alamat_pasien" value="php <?php echo $data_pasien['alamat_pasien'] ?>">
						</div>
					</div>
					<div class="col-sm-offset-2 col-sm-3">
						<button type="submit" name="simpan" class="btn btn-default btn-flat "> <i class="fa fa-save"></i> Simpan</button>
						<a href="index.php?halaman=pasien" class="btn btn-danger btn-flat"><i class="fa fa-backward"></i> Kembali</a>
					</div><!-- /.box-footer -->

				</div>
			</form>
		</div>
	</div>
</section>
<?php if (isset($_POST['simpan'])) 
{
	$pasien->ubah_pasien($_POST['nik'],$_POST['nama_pasien'],$_POST['umur_pasien'],$_POST['email_pasien'],$_POST['alamat_pasien'],$id_pasien);

	//echo "<script>alert('data pasien tersimpan')</script>";
	echo "<script>location='index.php?halaman=pasien'</script>";
}

?>