<section class="content-header">
	<h1>
		Data Pasien
		<small> | Isi Data </small>
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
						<label class="col-md-2 control-label">NIK</label>
						<div class="col-sm-3">
							<input type="number" name="nik" class="form-control" maxlength="50" placeholder="Input no.kk" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Nama </label>
						<div class="col-sm-3">
							<input type="" class="form-control" name="nama_pasien" required="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Umur</label>
						<div class="col-sm-3">
							<input type="number" class="form-control" name="umur_pasien" required="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Email</label>
						<div class="col-sm-3">
							<input type="" class="form-control" name="email_pasien" required="">
						</div>
					</div>  
					<div class="form-group">
						<label class="col-md-2 control-label">Alamat</label>
						<div class="col-sm-3">
							<textarea class="form-control"  name="alamat_pasien" required=""></textarea>                      </div>
						</div>  
						<div class="form-group">
						<label class="col-md-2 control-label">Password</label>
							<div class="col-sm-3">
								<textarea class="form-control"  name="password_pasien" required=""></textarea>                      </div>
							</div> 


						</div><!-- /.box-body -->
						<div class="col-sm-offset-2 col-sm-3">
							<button type="submit" name="simpan" class="btn btn-default btn-flat "> <i class="fa fa-save"></i> Simpan</button>
							<a href="index.php?halaman=pasien" class="btn btn-danger btn-flat"><i class="fa fa-backward"></i> Kembali</a>
						</div><!-- /.box-footer -->
					</form>
				</div> <!-- row -->
			</div>
		</section>

		<?php 


		if (isset($_POST['simpan']))
		{
	//objek pasien menjalankan fungsi simpan_pasien berdasar data yg diinputkan
			$pasien->simpan_pasien($_POST['nik'],$_POST['nama_pasien'],$_POST['umur_pasien'],$_POST['email_pasien'],$_POST['alamat_pasien'],$_POST['password_pasien']);

		//echo "<script>alert('data pasien berhasil disimpan')</script>";


		//echo"<script>location= 'index.php?halaman=pasien'</script>";

		}
		?>





