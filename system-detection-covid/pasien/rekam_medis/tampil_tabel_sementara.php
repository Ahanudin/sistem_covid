<?php $id_pasien = $_SESSION['pasien']['id_pasien']; ?>
<!DOCTYPE html>
<html>
<head>
	<title>detail</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
</head>
<body>

	<?php 
	//$id_rekam_medis = $_GET['id_rekam_medis'];
	$data_rekam_medis = $rekam_medis->detail_rekam_medis($_GET['id_rekam_medis']);
	$gejala_dipilih = $rekam_medis->ambil_gejala_dipilih($_GET['id_rekam_medis']);

	?>

	

	<div class="inner">
		<div class="panel panel-primary">
			<div class="panel-heading text-center">
				<h2>Laporan Rekam Medis</h2>
			</div>


			<div class="panel-body">

		
				<div class="col-md-6 col-sm-6 col-xs-6">
					<table class="table table-striped">
						<tr>
							<th>Nik</th>
							<th><?php echo $data_rekam_medis['nik']; ?></th>
						</tr>
						<tr>
							<th>Nama Pasien</th>
							<th><?php echo $data_rekam_medis['nama_pasien']; ?></th>
						</tr>
						<tr>
							<th>Umur</th>
							<th><?php echo $data_rekam_medis['umur_pasien']; ?></th>
						</tr>
						<tr>
							<th>Alamat</th>
							<th><?php echo $data_rekam_medis['alamat_pasien']; ?></th>
						</tr>
					</table>
				</div>

				<div class="col-md-6 col-sm-6 col-xs-6">



					<table class="table table-striped">
						<tr>
							<th>Gejala Dipilih</th>
							<th>
								<ul>
									<?php foreach ($gejala_dipilih as $key => $value): ?>
										<li><?php echo $value['nama_gejala'] ?></li>
									<?php endforeach ?>	
								</ul>
							</th>
						</tr>
						<tr>
							<th>Nilai CF</th>
							<th><?php echo $data_rekam_medis['cf_penyakit']; ?></th>
						</tr>
						<tr>
							<th>Kemungkinan Terbesar Terkena Penyakit</th>
							<th><?php echo $data_rekam_medis['nama_penyakit']; ?></th>
						</tr>
						<tr>
							<th>Pencegahan</th>
							<th><?php echo $data_rekam_medis['pencegahan_penyakit']; ?></th>
						</tr>
						<tr>
							<th>Nama obat</th>
							<th><?php echo $data_rekam_medis['nama_obat']; ?></th>
						</tr>
						<tr>
							<th>Dikeluarkan</th>
							<th><?php echo $data_rekam_medis['tgl_rekam_medis']; ?></th>
						</tr>
					</table>
				</div>
			</div>
		</div>
		
<button onClick="window.print();" class="btn btn-success btn-flat hidden-print"></i> Cetak Laporan </button>  
	</div>
</body>
</html>