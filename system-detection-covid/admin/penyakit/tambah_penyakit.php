<section class="content-header">
	<h1>
	Tambah Data 
		<small> | Data Penyakit  </small>
	</h1>
</section>
<section class="inner">
	<div class="form-body">
		<div class="box">
			
				<div class="panel-body">


					<form method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>Nama Penyakit</label>
							<input type="" name="nama_penyakit" class="form-control" required="">
						</div>
						<div class="form-group">
							<label>Deskripsi</label>
							<textarea class="form-control"  name="deskripsi_penyakit" required="" ></textarea>

						</div>
						<div class="form-group">
							<label>Pencegahan</label>
							<textarea class="form-control"  name="pencegahan_penyakit" required="" ></textarea>

						</div>
						<div class="form-group">
							<label>Nama Obat</label>
							<textarea class="form-control"  name="nama_obat" required="" ></textarea>

						</div>
						<div class="form-group">
							<label>foto</label>
							<input type="file" name="foto_penyakit" class="form-control" required="">
						</div>
						<button class="btn btn-primary" name="simpan">simpan</button>
					</form>
				</div>
			</div>
		</div>
	</section>

	<?php 
	if (isset($_POST['simpan'])) 
	{
		$penyakit->simpan_penyakit($_POST['nama_penyakit'],$_POST['deskripsi_penyakit'],$_POST['pencegahan_penyakit'],$_POST['nama_obat'],$_FILES['foto_penyakit']);

		echo "<script>alert('penyakit tersimpan')</script>";
		echo "<script>location='index.php?halaman=tampil_penyakit'</script>";
	}
	?>