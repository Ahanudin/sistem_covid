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

				</div>
				<div class="panel-body">
					<div class="inner">
						<?php
						$data_penyakit = $penyakit->tampil_penyakit(); 
						?>



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
