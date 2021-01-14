<!DOCTYPE html>
<html>
<head>
	<title>obat</title>
</head>
<body>

<div class="container">
	
	<?php 

	$data_obat = $obat->tampil_obat();

	 ?>

	 

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Obat</th>
			<th>Opsi</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data_obat as $key => $value) : ?>
		<tr>
			<td><?php echo $key+1 ?></td>
			<td><?php echo $value['nama_obat'] ?></td>
			<td><a href="index.php?halaman=ubah_obat&id_obat=<?php echo $value['id_obat'] ?>" class="btn btn-warning">Ubah</a>
			<a href="index.php?halaman=hapus_obat&id_obat=<?php echo $value['id_obat'] ?>" class="btn btn-danger" onclick="return confirm('hapus data ?')" >Hapus</a></td>
		</tr>
	<?php endforeach  ?>
	</tbody>
</table>
<a href="index.php?halaman=tambah_obat" class="btn btn-primary">tambah obat</a>
</div>
</body>
</html>