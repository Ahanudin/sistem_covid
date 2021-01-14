<?php include '../config/konek_database.php' ?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Administrator</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../dist/css/admin.css">

<style type="text/css">

		
		@media(min-width: 768px)
		{
			.login
			{
				margin-top: 150px;
			}
		}

		body {
			background-image: url("../assets/img/penyakit/GIGI2.jpg");
			background-size: cover;
			background-position: center;

			
		}
	</style>
</head>
<body>

<section class="inner">
	<div class="form-body ">
		<div class="box">	
			<div class="panel-body">
				<div class="panel panel-info">
					<div class="panel-heading"><h4> Ganti Password </h4></div>	
					<div class="panel-body">
						<form method="POST" enctype="multipart/form-data"
						class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-2"> Username </label>
							<div class="col-sm-4">

								<input type="number" name="nik" class="form-control" required="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2"> Password Lama </label>
							<div class="col-sm-4">

								<input type="password" name="password_lama" class="form-control" required="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2"> Password Baru </label>
							<div class="col-sm-4">

								<input type="password" name="password_baru" class="form-control" required="">
							</div>
						</div>
						<button name="simpan" class="btn btn-primary">Simpan</button>
						<a href="index.php" class="btn btn-danger btn-flat"><i class="fa fa-backward">  Kembali</i></a>
					</form>
					<br>
				</div>
			</div>
		</div>
	</div>
</section>
</body>
</html>

<?php
if (isset($_POST['simpan']))
{
	$detail = $pasien->detail_pasien($_SESSION['login']['id_pasien']);
	$password_lama_db = $detail['password_pasien'];
	$password_lama_inputan = sha1($_POST['password_lama']);

	$password_baru = sha1($_POST['password_baru']);
	if ($password_lama_db == $password_lama_inputan) 
	{
		$pasien->ubah_password($password_baru,$detail['id_pasien']);
		echo "<div class='alert alert-info'>Password Berhasil Diubah</div>";
		echo "<meta http-equiv = 'refresh' content='1;url=index.php'>";
	}
	else
	{
		echo "<div class='alert alert-info'>Password Lama Salah</div>";
		echo "<meta http-equiv = 'refresh' content='1;url=pengaturan_akun.php'>";

	}
}
?>

