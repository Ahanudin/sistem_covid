<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>nama obat</label>
		<input type="" name="nama_obat" class="form-control" required="">
	</div>
	<button class="btn btn-primary" name="simpan">simpan</button>
</form>
<?php 
if (isset($_POST['simpan'])) 
{
	$obat->simpan_obat($_POST['nama_obat']);

	echo "<script>alert('obat tersimpan')</script>";
	echo "<script>location='index.php?halaman=tampil_obat'</script>";
}
 ?>