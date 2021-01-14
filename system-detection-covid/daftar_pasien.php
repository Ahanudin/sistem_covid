<?php include 'config/konek_database.php' ?>
<style type="text/css">


	@media(min-width: 768px)
	{
		.login
		{
			margin-top: 150px;
		}
	}

	body {
		background-image: url("assets/img/penyakit/kesehatan-gigi.png");
		width: 100
		background-size: cover;
		background-position: center;
		margin-top: 150px;


	}
</style>
<head>
	<title>daftar</title>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Administrator</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="dist/css/admin.css">
</head>



<!-- Main content -->
<br>
<br>
<br>
<br>
<section class="container"> 
	<div class="form-body">
		<h1 class="text-center">
			Daftar Pengunjung
			<small> | Isi Data </small>
		</h1>
		<br>
		<section class="inner">
			<div class="form-body">
				<form class="form-horizontal" method="POST" enctype='multipart/form-data'>
					<div class="form-group">
						<label class="col-md-2 control-label">NIK</label>
						<div class="col-sm-5">
							<input type="number" name="nik" class="form-control" maxlength="50" placeholder="Input no.kk" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Nama </label>
						<div class="col-sm-5">
							<input type="" class="form-control" name="nama_pasien" required="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Umur</label>
						<div class="col-sm-5">
							<input type="" class="form-control" name="umur_pasien" required="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Email</label>
						<div class="col-sm-5">
							<input type="" class="form-control" name="email_pasien" required="">
						</div>
					</div>   
					<div class="form-group">
						<label class="col-md-2 control-label">Alamat</label>
						<div class="col-sm-5">
							<textarea class="form-control"  name="alamat_pasien" required=""></textarea>
						</div>
					</div>  
					<div class="form-group">
						<label class="col-md-2 control-label">Password</label>
						<div class="col-sm-5">
							<input type="password" class="form-control" name="password_pasien" required="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Konfirmasi Password</label>
						<div class="col-sm-5">
							<input type="password" class="form-control" name="konfirmasi" required="">
						</div>
					</div> 

				</form>
			</div>	
			<div class="col-sm-5">
			<a href="login.php" class="btn btn-danger btn-flat"><i class="fa fa-backward"></i> Kembali</a>
			<button type="submit" name="simpan" class="btn btn-default btn-flat "> <i class="fa fa-save"></i> Simpan</button>
		</div>	
		</section>


	</div> 
</section>

			<?php 


				if (isset($_POST['simpan']))
				{
					$cekdata = $pasien->validasi_nik($_POST['nik']);
					if ($cekdata=="sukses")
					{
						echo "<script>alert('nik sudah ada, silahkan langsung login')</script>";
						echo"<script>location= 'login.php'</script>";	
					}
					else
					{
						if ($_POST['password_pasien']!==$_POST['konfirmasi']) 
						{
							echo "<script>alert('konfirmasi password tidak cocok')</script>";
							
						} 
						else 
						{
							$pasien->simpan_pasien($_POST['nik'],$_POST['nama_pasien'],$_POST['umur_pasien'],$_POST['email_pasien'],$_POST['alamat_pasien'],sha1($_POST['password_pasien']));

							echo "<script>alert('data pasien berhasil disimpan, silahkan login')</script>";


							echo"<script>location= 'login.php'</script>";
						}

					}
					

				}

			?>





