<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
$id_pengetahuan= $_GET['id_pengetahuan'];
$data_pengetahuan = $pengetahuan->detail_pengetahuan($id_pengetahuan);

 ?>




 <div class="container">
 <div class="">
 <div class="panel-heading text-center">
 <h2>detail pengetahuan</h2>
 </div>

 <div class="panel-body">
 	<div class="col-md-6">
 	<table class="table table-striped">
 	<?php foreach ($data_pengetahuan as $key => $value) :?>
 		<tr>
 			<th>Nama Penyakit </th>
 			<th><?php echo $value ['nama_penyakit'] ?></th>
 		</tr>
 		<tr>
 			<th>Nama Gejala</th>
 			<th><?php echo $value ['nama_gejala'] ?></th>
 		</tr>
 		<tr>
 			<th>MB</th>
 			<th><?php echo $value['MB']; ?></th>
 		</tr>
 		<tr>
 			<th>MD</th>
 			<th><?php echo $value['MD'] ?></th>
 		</tr>
 	</table>
 	
	<?php endforeach ?>
 	</div>
 </div>
 </div>
 	<a href="index.php?halaman=tampil_pengetahuan" class="btn btn-danger">Kembali</a>

 </div>
</body>
</html>