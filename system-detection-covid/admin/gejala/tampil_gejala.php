<!DOCTYPE html>
<html>
<head>
	<title>gejala</title>
</head>
<body>
	<section class="content-header">
		<h1>
			Data Gejala 
			<small> </small>
		</h1>
	</section>
	<section class="inner">
		<div class="form-body wow fadeIn animated">
			<div class="box">
				<div class="add-table">

					<a type="button" class="btn btn-primary btn-flat" href="index.php?halaman=tambah_gejala">
						<i class="fa fa-plus-square"></i> Tambah Gejala</a> 
					</div>
					<div class="panel-body">
						<?php 
						$data_gejala = $gejala->tampil_gejala();
						?>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Gejala</th>
									<th>Opsi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data_gejala as $key => $value) :?>
									<tr>
										<td><?php echo $key+1 ?></td>
										<td><?php echo $value ['nama_gejala']; ?></td>
										<td><a href="index.php?halaman=ubah_gejala&id_gejala=<?php echo $value['id_gejala'] ?>" class="btn btn-warning">Ubah</a>
											<a href="index.php?halaman=hapus_gejala&id_gejala=<?php echo $value['id_gejala'] ?>" class="btn btn-danger" onclick="return confirm('hapus data ?')" >Hapus</a></td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
							
						</div>
					</div>
				</div>
			</div>

		</section>
	</body>
	</html>