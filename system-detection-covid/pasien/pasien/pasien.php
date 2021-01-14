
 <!DOCTYPE html>
<html>
<head>
	<title> Pasien</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
</head>
<body>

<section class="content-header">
 	<h1>
 		Data Pasien
 		<small> </small>
 	</h1>
 </section>
 <section class="inner">
<div class="form-body wow fadeIn animated">
<div class="box">
<div class="add-table">

               <a type="button" class="btn btn-primary btn-flat" href="index.php?halaman=tambah_pasien">
                <i class="fa fa-plus-square"></i> Tambah pasien</a> 
              </div>
 	<div class="panel-body">


<?php 
// objek pasien menjalankan fungsi tampil_pasien
$data_pasien = $pasien->tampil_pasien();
 ?>



	<table class="table table-bordered">
	<thead>
		<tr>
			<th>No </th>
			
			<th>Nama</th>
			
			
			<th>Alamat</th>
			<th>Opsi</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($data_pasien as $key => $value) :?>
		<tr>
			<td><?php echo $key+1 ?></td>
		
			<td><?php echo $value['nama_pasien'] ?></td>
			
			
			<td><?php echo $value['alamat_pasien'] ?></td>

			<td>
			
			<a href="index.php?halaman=detail_pasien&id_pasien=<?php echo $value['id_pasien']; ?>" class="btn btn-primary">Detail</a>	
			<a href="index.php?halaman=ubah_pasien&id_pasien=<?php echo $value['id_pasien']; ?>" class="btn btn-warning">Ubah</a>
			<a href="index.php?halaman=hapus_pasien&id_pasien=<?php echo $value['id_pasien']; ?>" class="btn btn-danger" onclick="return confirm('hapus data ?')" >Hapus</a>
			</td>
			
		</tr>
		<?php endforeach ?>
	</tbody>
</table>
	
</div>
</div>

</div>

 </section>

</body>
</html>