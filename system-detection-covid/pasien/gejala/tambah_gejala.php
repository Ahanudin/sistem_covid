<section class="content-header">
	<h1>
		Tambah Data
		<small> | Gejala </small>
	</h1>
</section>
<section class="inner">
	<!-- Your Page Content Here -->
	<div class="form-body">
		<div class="row">
			<form class="form-horizontal" method="POST" enctype='multipart/form-data'>
				<div class="box-body">

					<div class="form-group">
						<label class="col-md-2 control-label">Nama Gejala</label>
						<div class="col-sm-3">
							<input type="" name="nama_gejala" class="form-control" required="">
						</div>
					</div>

					<div class="col-sm-offset-2 col-sm-3">
						<button type="submit" name="simpan" class="btn btn-default btn-flat "> <i class="fa fa-save"></i> Simpan</button>
						<a href="index.php?halaman=tampil_gejala" class="btn btn-danger btn-flat"><i class="fa fa-backward"></i> Kembali</a>
					</div><!-- /.box-footer -->
				</form>
			</div>
		</div>
	</section>
	<?php 

	if (isset($_POST['simpan']))
	{
		$gejala->simpan_gejala($_POST['nama_gejala']);

		echo"<script>alert('gejala tersimpan')</script>";
		echo "<script>location='index.php?halaman=tampil_gejala'</script>";
	}




	?>