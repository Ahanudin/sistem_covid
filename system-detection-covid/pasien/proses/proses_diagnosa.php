

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

	<div class="col-md-6 col-sm-6 col-xs-6">
		<td align="center" valign="top" bgcolor="#FFFFFF"><br />
			<div class="hasil-perhitungan">
				<div class="panel-heading text-center ">
					<div class="panel panel-primary">
						<br>
						<h4>Penyakit <?php echo $ambil_penyakit['nama_penyakit'] ?></h4>
						===============================

						<div class='row'>
							<?php foreach ($value as $id_gejala => $nilai_cf_gejala): ?>
							<div class='col-md-6 col-sm-6 col-xs-6'>
								
								<?php $ambil_gejala = $gejala->detail_gejala($id_gejala) ?>
								<?php $ambil_pengetahuan = $pengetahuan->ambil_pengetahuan_gejala_penyakit($id_gejala, $id_penyakit) ?>

								<br>

								Gejala <?php echo $ambil_gejala['nama_gejala'] ?>
								<br>
								-----------
								<br>
								MB = <?php echo $ambil_pengetahuan['MB'] ?>
								<br>
								MD = <?php echo $ambil_pengetahuan['MD'] ?>
								<br>

								<br>

								MB - MD
								<br>
								-------------
								<br>
								CF = <?php echo $ambil_pengetahuan['MB'] ?> - <?php echo $ambil_pengetahuan['MD'] ?>

								= <?php echo $ambil_pengetahuan['MB'] - $ambil_pengetahuan['MD'] ?>




							</div>
						<?php endforeach ?>

					</div>
					<div class="row">
						<div class="col-md-12">
							<?php if ($data['jumlah_gejala_penyakit'][$id_penyakit] == 1): ?>
							<p>
								<b>
									Karena jumlah gejala hanya 1, maka nilai CF Penyakit = <?php echo $data['cf_tiap_penyakit'][$id_penyakit] ?>
								</b>
							</p>
						<?php else: ?>
						<br>
						------------------------------------
						<p>Gejala lebih dari 1</p>
						<?php foreach ($data['cf_kombinasi'][$id_penyakit] as $jumlah_kombinasi => $hasil_kombinasi): ?>
						<li>
							CF Kombinasi <?php echo $jumlah_kombinasi ?>
							<br>
							CFsementara = CfBaru+Cflama*1(1-CfBaru)
							<br>
							CFsementara = <?php echo $data['tampil_rumus'][$id_penyakit][$jumlah_kombinasi] ?>
							<br>
							CF = <?php echo $hasil_kombinasi ?>
						</li>
						-------------------------------------
					<?php endforeach ?>
					<p><b>Hasil CF Penyakit nya adalah <?php $hasil_cf = end($data['cf_kombinasi'][$id_penyakit]); end($data['cf_kombinasi'][$id_penyakit]) ; echo round($hasil_cf, 3)  ?></b></p>
				<?php endif ?>
			</div>
		</div>
	</div>
</div>
</div>
</td>
</div>
<?php endforeach ?>

<div class="inner" style="margin-bottom: 46px; font-family: sans-serif; font-size: 15px;">
	<form name="form1" method="post" action=""><br>
		<div class="nilai-cf">

			<?php
			
			$id_pasien =	$_SESSION['pasien']['id_pasien'];
			$detail = $pasien->detail_pasien($id_pasien);
			?>

			<table class="table" width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#BFD0EA">
				<tr>
					<td width="22%" valign="top">Nik</td>
					<td width="2%"> : </td>
					<td> <strong><?php echo $detail['nik'] ?> </strong></td>
				</tr>
				<tr>
					<td width="22%" valign="top">Nama</td>
					<td width="2%"> : </td>
					<td> <strong><?php echo $detail['nama_pasien'] ?></strong></td>
				</tr>
				<tr>
					<td width="22%" valign="top">Gejala yg dipilih</td>
					<td width="2%"> : </td>
					<td> <strong><ol>
						<?php foreach ($gejala_dipilih as $key => $id_gejala_dipilih): ?>
						<?php  $data_gejala_dipilih = $gejala->detail_gejala($id_gejala_dipilih) ?>
						<li><?php echo $data_gejala_dipilih['nama_gejala'] ?></li>

					<?php endforeach ?>
				</ol></strong></td>	
			</tr>
			<tr>
				<td width="22%" valign="top">Daftar Penyakit</td>
				<td width="2%"> : </td>
				<td> <strong>
					<ol>
						<?php foreach ($data['cf_tiap_penyakit'] as $id_penyakit => $cf_penyakit): ?>
						<?php $data_penyakit = $penyakit->detail_penyakit($id_penyakit) ?>
						<li><?php echo $data_penyakit['nama_penyakit'] ?>, CF = <?php echo round($cf_penyakit, 3) ?></li>
					<?php endforeach ?>
				</ol></strong></td>		
			</tr>
			<tr>
				<?php $key_max = array_search(max($data['cf_tiap_penyakit']), $data['cf_tiap_penyakit']) ?>
				<?php $kemungkinan_penyakit = $penyakit->detail_penyakit($key_max) ?>


				<td width="22%" valign="top">Kemungkinan Terbesar Terkena Penyakit</td>
				<td width="2%"> : </td>
				<td> <strong><?php echo $kemungkinan_penyakit['nama_penyakit'] ?> </strong>
				</td>			

			</tr>
			<tr>
				<td width="22%" valign="top">dengan tingkat kepercayaan</td>
				<td width="2%"> : </td>
				<td> <strong> <?php echo round($data['nilai_cf'], 3) ?> </strong></td>
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
</form>	
</div>




<?php } ?>


<script src="../dist/js/jquery.min.js"></script>
<script type="text/javascript"></script>