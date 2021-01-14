<?php include 'config/konek_database.php' ?>


<!DOCTYPE html>
<html>
<head>
	
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="assets/flex/flexslider.css">

	<style type="text/css">

		@media(min-width: 768px)
		{
			.panel
			{
				height: 500px;
				margin-left: 10px;


			}
			.form-group
			{
				margin-bottom: 50px;
				margin-top: 0px;
				margin-right: 250px;
			}
			.lupa
			{
				line-height: 80px;
				color: red;
				margin-right: 250px;
			}

			.container
			{
				margin-left: 40px;
			}

			.text-center
			{
				min-height: 100px;
			}

			.judul
			{

			}
		}

		.content-header>h1 
		{
			color: black;
			margin: 0px;
			font-size: 34px;
			margin-left: 22px; 
		}

		.font>h1
		{
			font-size: 25px;
			
		}

			body {

				background-color: white ;
			/*width: 100%;
			background-size: cover;
			background-position: center;*/
			margin-top: 50px;
			
		}

	</style>
</head>

		<div class="text-center">
			<section class="content-header">
				<h1 class="judul text-center">Lupa Password </h1>
			</section>
		</div>
	


<body>


	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-6">

				<div class="login">
					<div class="panel-body">
					<div class=" font">
						<h1>Masukkan Nik Anda </h1>
					</div>
						<form method="post">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i></span>
									<input type="text" class="form-control" placeholder="nik" aria-desribedby="basic-addon1" name="nik" required="">
								</div>
							</div>
						
							<button class="btn btn-primary" name="cek">Submit</button>
							<a href="login.php" class="btn btn-danger btn-flat"><i class="fa fa-backward"></i> Kembali</a>
							
							


						</form>
						<?php 
						if (isset($_POST['cek'])) 
						{
							$cek  =  $pasien->validasi_nik($_POST['nik']);
							if ($cek=="sukses") 
							{
								$nik = $_POST['nik'];
								//echo "<script>alert('login sukses')</script>";
								echo "<meta http-equiv='refresh' content='1;url=password_baru.php?nik=$nik'>";


							}
							else
							{
								echo "<script> alert (' NIK tidak ditemukan'); </script>" ;
								echo "<meta http-equiv='refresh' content='1;url=pasien/index.php'>";
							}
						
						}
						?>
							</div>


					</div>

				</div>
				<div class="col-md-5 col-sm-5 col-xs-5">
					<div class="flexslider">
						<ul class="slides center">
							<li>
								<img src="assets/img/penyakit/gigi3.png" />
							</li>
							<li>
								<img src="assets/img/penyakit/cabut-gigi.gif" />
							</li>
							<li>
								<img src="assets/img/penyakit/yuhuu.gif" />
							</li>
							<li>
								<img src="assets/img/penyakit/sp1.jpeg" />
							</li>

						</ul>
					</div>
				</div>
			
		</div>
	</div>

	<script type="text/javascript" src="assets/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="assets/flex/jquery.flexslider-min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.flexslider').flexslider({
				animation: "slide"
			});
		});
	</script>
</body>
</html>