
<?php 
$id_gejala = $_GET['id_gejala'];
$data_gejala = $gejala->detail_gejala($id_gejala);
?>

<section class="content-header">
	<h1>
		Edit 
		<small> | Data Gejala  </small>
	</h1>
</section>

<!-- Main content -->
<section class="inner">
	<!-- Your Page Content Here -->
	<div class="form-body">
		<div class="row">
			<form class="form-horizontal" method="POST" enctype='multipart/form-data'>
				<div class="box-body">

					<div class="form-group">
						<label class="col-md-2 control-label">Nama Gejala</label>
						<div class="col-sm-3">
							<input type="" class="form-control" name="nama_gejala" value="<?php echo $data_gejala['nama_gejala'] ?>">
						</div>
					</div>
					<div class="col-sm-offset-2 col-sm-3">
						<button type="submit" name="simpan" class="btn btn-default btn-flat "> <i class="fa fa-save"></i> Simpan</button>
						<a href="index.php?halaman=tampil_gejala" class="btn btn-danger btn-flat"><i class="fa fa-backward"></i> Kembali</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
<?php if (isset($_POST['simpan'])) 
{
	$gejala->ubah_gejala($_POST['nama_gejala'],$id_gejala);

	//echo "<script>alert('data pasien tersimpan')</script>";
	echo "<script>location='index.php?halaman=tampil_gejala'</script>";
}

?>