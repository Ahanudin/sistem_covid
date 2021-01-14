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
				
					<div class="panel-body">
						<?php 
						$data_gejala = $gejala->tampil_gejala();
						?>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Gejala</th>
								
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data_gejala as $key => $value) :?>
									<tr>
										<td><?php echo $key+1 ?></td>
										<td><?php echo $value ['nama_gejala']; ?></td>
										
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