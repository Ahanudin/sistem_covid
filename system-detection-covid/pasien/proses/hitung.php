<?php $data_gejala = $gejala->tampil_gejala() ?>
<div class="hitung">
	<form method="post">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Gejala</th>
					<th>Pilih</th>
				</tr>
			</thead>
			<tbody>

				<?php foreach ($data_gejala as $key => $value): ?>

					<tr>
						<td><?php echo $key+1 ?></td>
						<td><?php echo $value['nama_gejala'] ?></td>
						<td>
							<input type="checkbox"  name="id_gejala[]" value="<?php echo $value['id_gejala'] ?>">
						</td>
					</tr>
				<?php endforeach ?> 



			</tbody>
		</table>

		<button class="btn btn-primary" name="proses">Proses</button>
	</form>
</div>

<!-- <?php 
if (isset($_POST['proses']))
{
	$data = $perhitungan->hitung($_POST['id_gejala']);
} 
?>
-->





<?php
if (isset($_POST['proses'])) 
{
	?>	
	<div id="hasil" >

<!-- 	<pre>
			<?php print_r($data) ?>
		</pre>
	-->

	<?php $gejala_dipilih = $_POST['id_gejala'] ?>
	

	<h3>Bedasarkan gejala yg dipilih, maka perhitungannya adalah sbb:</h3>
	<?php foreach ($data['hitung'] as $id_penyakit => $value): ?>
		<?php $ambil_penyakit = $penyakit->detail_penyakit($id_penyakit) ?>
		<div class="hasil-perhitungan">
			<h4>Penyakit <?php echo $ambil_penyakit['nama_penyakit'] ?></h4>

			<ul>
				<?php foreach ($value as $id_gejala => $nilai_cf_gejala): ?>
					<?php $ambil_gejala = $gejala->detail_gejala($id_gejala) ?>
					<?php $ambil_pengetahuan = $pengetahuan->ambil_pengetahuan_gejala_penyakit($id_gejala, $id_penyakit) ?>
					<li>
						Gejala <?php echo $ambil_gejala['nama_gejala'] ?>
						<br>
						CF = MB - MD
						<br>
						CF = <?php echo $ambil_pengetahuan['MB'] ?> - <?php echo $ambil_pengetahuan['MD'] ?>
						<br>
						CF = <?php echo $ambil_pengetahuan['MB'] - $ambil_pengetahuan['MD'] ?>
					</li>
				<?php endforeach ?>

				<?php if ($data['jumlah_gejala_penyakit'][$id_penyakit] == 1): ?>
					<p>
						<b>
							Karena jumlah gejala hanya 1, maka nilai CF Penyakit = <?php echo $data['cf_tiap_penyakit'][$id_penyakit] ?>
						</b>
					</p>
				<?php else: ?>
					<p><b>Karena gejala lebih dari 1, maka hitung dulu CF Kombinasi</b></p>
					<?php foreach ($data['cf_kombinasi'][$id_penyakit] as $jumlah_kombinasi => $hasil_kombinasi): ?>
						<li>
							CF Kombinasi <?php echo $jumlah_kombinasi ?>
							<br>
							CF = <?php echo $data['tampil_rumus'][$id_penyakit][$jumlah_kombinasi] ?>
							<br>
							CF = <?php echo $hasil_kombinasi ?>
						</li>
					<?php endforeach ?>
					<p><b>Sehingga, hasil CF Penyakit nya adalah <?php echo end($data['cf_kombinasi'][$id_penyakit]) ?></b></p>
				<?php endif ?>
			</ul>
		</div>
	<?php endforeach ?>

	<div class="nilai-cf">
		<?php $id_pasien = $_GET['id_pasien'] ?>
		<?php $detail = $pasien->detail_pasien($id_pasien); ?>
		<table class="table">
			<tr>
				<th>NIK</th>
				<th><?php echo $detail['nik'] ?></th>
			</tr>
			<tr>
				<th>Nama</th>
				<th><?php echo $detail['nama_pasien'] ?></th>

			</tr>
			<tr>
				<th>Gejala yg dipilih</th>
				<th>
					<ol>
						<?php foreach ($gejala_dipilih as $key => $id_gejala_dipilih): ?>
							<?php  $data_gejala_dipilih = $gejala->detail_gejala($id_gejala_dipilih) ?>
							<li><?php echo $data_gejala_dipilih['nama_gejala'] ?></li>

						<?php endforeach ?>
					</ol>
				</th>
			</tr>
			<tr>
				<th>Daftar Penyakit</th>
				<th>
					<ol>
						<?php foreach ($data['cf_tiap_penyakit'] as $id_penyakit => $cf_penyakit): ?>
							<?php $data_penyakit = $penyakit->detail_penyakit($id_penyakit) ?>
							<li><?php echo $data_penyakit['nama_penyakit'] ?>, CF = <?php echo $cf_penyakit ?></li>
						<?php endforeach ?>
					</ol>
				</th>
			</tr>
			<tr>

				<?php $key_max = array_search(max($data['cf_tiap_penyakit']), $data['cf_tiap_penyakit']) ?>
				<?php $kemungkinan_penyakit = $penyakit->detail_penyakit($key_max) ?>

				<th>
					<div class="well">
						Kemungkinan Terbesar Terkena Penyakit <?php echo $kemungkinan_penyakit['nama_penyakit'] ?> dengan tingkat kepercayaan <?php echo $data['nilai_cf'] ?>
					</div>
				</th>



			</tr>
		</table>	

		

		<?php 
$id_rekam_medis = $rekam_medis->simpan_diagnosa($id_pasien, $kemungkinan_penyakit['id_penyakit'], $data['nilai_cf']);

foreach ($gejala_dipilih as $key => $value) 
{
	$rekam_medis->simpan_gejala_dipilih($value, $id_rekam_medis);
		
}

foreach ($data['cf_tiap_penyakit'] as $key_id_penyakit => $value_cf_penyakit) 
{
	$rekam_medis->simpan_penyakit_rekam_medis($key_id_penyakit, $value_cf_penyakit, $id_rekam_medis);
}


		 ?>


		
	</div>
				<a href="index.php?halaman=proses_diagnosa" class="btn btn-danger btn-lg">Kembali</a>

</div> <!--end div hasil-->





<?php } ?>


<script src="../dist/js/jquery.min.js"></script>
<script type="text/javascript"></script>