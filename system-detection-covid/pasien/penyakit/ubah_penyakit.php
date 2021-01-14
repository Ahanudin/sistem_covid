<section class="content-header">
	<h1>
		Ubah 
		<small> |  Data Penyakit </small>
	</h1>
</section>
<section class="inner">
	<div class="form-body wow fadeIn animated">
		<div class="box">
			
				<div class="panel-body">
					<?php 
					$id_penyakit = $_GET['id_penyakit'];
					$data_penyakit = $penyakit->detail_penyakit($id_penyakit);
					?>



					<form method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label> Nama Penyakit</label>
							<input type="" class="form-control" name="nama_penyakit" value="<?php echo $data_penyakit['nama_penyakit'] ?>">
						</div>
						<div class="form-group">
							<label> Deskripsi Penyakit</label>
							<input type="" class="form-control" name="deskripsi_penyakit" value="<?php echo $data_penyakit['deskripsi_penyakit'] ?>">
						</div>
						<div class="form-group">
							<label> Pencegahan Penyakit </label>
							<input type="" class="form-control" name="pencegahan_penyakit" value="<?php echo $data_penyakit['pencegahan_penyakit']?>">
						</div>
						<div class="form-group">
							<label>Foto</label>
							<img src="../assets/img/penyakit/<?php echo $data_penyakit['foto_penyakit'];  ?>" width="120 px">
							<input type="file" class="form-control" name="foto_penyakit">
						</div>


						<button class="btn btn-primary" name="simpan">Simpan</button>

					</form>
				</div>
			</div>
		</div>
	</section>
	<?php if (isset($_POST['simpan'])) 
	{
		$penyakit->ubah_penyakit($_POST['nama_penyakit'],$_POST['deskripsi_penyakit'],$_POST['pencegahan_penyakit'],$_FILES['foto_penyakit'],$id_penyakit);

	//echo "<script>alert('data pasien tersimpan')</script>";
		echo "<script>location='index.php?halaman=tampil_penyakit'</script>";
	}

	?>