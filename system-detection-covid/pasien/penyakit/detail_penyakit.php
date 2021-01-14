<!DOCTYPE html>
<html>
<head>
	<title>detail</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
</head>
<body>

<?php 
$id_penyakit = $_GET['id_penyakit'];
$data_penyakit = $penyakit->detail_penyakit($id_penyakit);

 ?>


 <div class="inner">
 <div class="panel panel-primary">
 <div class="panel-heading text-center">
 <h2>detail penyakit</h2>
 </div>

 <div class="panel-body">
 	<div class="col-md-6">
 		<img src="../assets/img/penyakit/<?php echo $data_penyakit ['foto_penyakit'] ?>" class="img-responsive" width="250">
 	</div>

 	<div class="col-md-6">
 	<table class="table table-striped">
 		<tr>
 			<th>nama penyakit</th>
 			<th><?php echo $data_penyakit['nama_penyakit']; ?></th>
 		</tr>
 		<tr>
 			<th>deskripsi penyakit</th>
 			<th><?php echo $data_penyakit['deskripsi_penyakit']; ?></th>
 		</tr>
 		<tr>
 			<th>pencegahan penyakit</th>
 			<th><?php echo $data_penyakit['pencegahan_penyakit']; ?></th>
 		</tr>
 	</table>
 	</div>
 </div>
 </div>
 	<a href="index.php?halaman=tampil_penyakit" class="btn btn-danger">Kembali</a>

 </div>
</body>
</html>