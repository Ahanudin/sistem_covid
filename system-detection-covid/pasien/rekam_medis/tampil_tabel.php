<section class="content-header">
	<h1>
	Data Rekam Medis Pasien
		<small> </small>
	</h1>
</section>
<section class="inner">
	<div class="form-body wow fadeIn animated">
		<div class="box">
			
				<div class="panel-body">
					<div class="inner">
						<?php
						$id_pasien= $_SESSION['pasien']['id_pasien'];
						$data_rekam_medis = $rekam_medis->tampil_rekam_medis_pasien($id_pasien); 
						?>



						<table class="table table-bordered">
							<thead>
								<tr>
								<th>Tanggal Rekam Medis</th>
									<th>Nik</th>
									<th>Nama</th>
									<th>Nama Penyakit</th>
									<th>Hasil Cf</th>
									<th>Opsi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data_rekam_medis as $key => $value) : ?>
									<tr>
										<td><?php echo $value['tgl_rekam_medis'] ?></td>
										<td><?php echo $value['nik']; ?></td>
										<td><?php echo $value['nama_pasien']; ?></td>
										<td><?php echo $value['nama_penyakit']; ?></td>
										<td><?php echo $value['cf_penyakit']; ?></td>
										<td>
											<a href="index.php?halaman=tampil_rekam_medis&id_rekam_medis=<?php echo $value['id_rekam_medis'] ?>" class="btn btn-info">detail</a>
											<a href="cetak.php" class="btn btn-primary">Print</a>
											
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
