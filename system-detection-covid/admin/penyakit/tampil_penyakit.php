<?php
$data_penyakit = $penyakit->tampil_penyakit(); 
?>


<section class="content-header">
	<h1>
		Data Penyakit
		<small> </small>
	</h1>
</section>
<section class="inner">
	<div class="form-body wow fadeIn animated">
		<div class="box">
			<div class="add-table">

				<a type="button" class="btn btn-primary btn-flat" href="index.php?halaman=tambah_penyakit">
					<i class="fa fa-plus-square"></i> Tambah penyakit</a> 
				</div>
				<div class="panel-body">
					<div class="inner">
						


						<table class="table table-bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Penyakit</th>
									<th>Opsi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data_penyakit as $key => $value) : ?>
									<tr>
										<td><?php echo $key+1 ?></td>
										<td><?php echo $value['nama_penyakit']; ?></td>
										<td>
											<a href="index.php?halaman=detail_penyakit&id_penyakit=<?php echo $value ['id_penyakit']; ?>" class="btn btn-info">detail</a>
											<a href="index.php?halaman=ubah_penyakit&id_penyakit=<?php echo $value['id_penyakit']; ?>" class="btn btn-warning">Ubah</a>
											<a href="index.php?halaman=hapus_penyakit&id_penyakit=<?php  echo $value['id_penyakit'] ?>" class="btn btn-danger" onclick="return confirm('hapus data ?')" >Hapus</a>
										</td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
						
					</div>
				</div>
			</div>
		</div>
	</section>
