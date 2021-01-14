<section class="inner">
	<div class="form-body wow fadeIn animated">
	<div class="box">
	<div class="add-table">
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
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>