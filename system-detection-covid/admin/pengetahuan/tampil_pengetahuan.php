<section class="content-header">
	<h1>
		Data Pengetahuan 
		<small> </small>
	</h1>
</section>

<section class="inner">
	<div class="form-body wow fadeIn animated">
		<div class="box">
			<div class="add-table">
				<a href="index.php?halaman=tambah_pengetahuan" class="btn btn-primary">tambah pengetahuan</a>
			</div>
			<div class="panel-body">
				<?php 
				$data_pengetahuan= $pengetahuan->tampil_pengetahuan();
				?>
				<table class="table table-bordered" id="thetable">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Penyakit</th>
							<th>Gejala</th>
							<th>MB</th>
							<th>MD</th>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($data_pengetahuan as $key => $value) :?>
							<tr>
								<td><?php echo $key+1 ?></td>
								<td><?php echo $value ['nama_penyakit'] ?></td>
								<td><?php echo $value ['nama_gejala'] ?></td>
								<td><?php echo $value ['MB'] ?></td>
								<td><?php echo $value ['MD'] ?></td>
								
								<td>	
									<a href="index.php?halaman=ubah_pengetahuan&id_pengetahuan=<?php echo $value['id_pengetahuan']; ?>" class="btn btn-warning">Ubah</a>
									<a href="index.php?halaman=hapus_pengetahuan&id_pengetahuan=<?php echo $value['id_pengetahuan']; ?>" class="btn btn-danger" onclick="return confirm('hapus data ?')" >Hapus</a>

								</td>
								
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>







