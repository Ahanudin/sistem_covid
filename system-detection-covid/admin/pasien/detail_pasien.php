<!DOCTYPE html>
<html>
<head>
	<title>detail</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
</head>
<body>

<?php 
//mengambil id pasien dari url
$id_pasien = $_GET['id_pasien'];
$datapasien = $pasien->detail_pasien($id_pasien);
 ?>
 
 
<div class="inner">
	<div class="panel panel-primary">
 	<div class="panel-heading text-center">
 		<h2>Detail Pasien</h2>
 	</div>
 	<div class="panel-body">
 	
 	<div class="col-md-6">
 		<table class="table table-striped">
 			<tr>
 				<th>Nik</th>
 				<th><?php echo $datapasien['nik']; ?></th>
 			</tr>
 			<tr>
 				<th>Nama Pasien</th>
 				<th><?php echo $datapasien['nama_pasien']; ?></th>
 			</tr>
 			<tr>
 				<th>Umur</th>
 				<th><?php echo $datapasien['umur_pasien']; ?></th>
 			</tr>
 			<tr>
 				<th>Email</th>
 				<th><?php echo $datapasien ['email_pasien']; ?></th>
 			</tr>
 			<tr>
 				<th>Alamat</th>
 				<th><?php echo $datapasien['alamat_pasien']; ?></th>
 			</tr>
 		</table>
 	</div>
 		
 	</div>
 </div>
<a href="index.php?halaman=pasien" class="btn btn-danger">Kembali</a>
</div>
 </body>
</html>