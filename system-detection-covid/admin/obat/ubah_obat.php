
<?php 
$id_obat = $_GET['id_obat'];
$data_obat = $obat->detail_obat($id_obat);
 ?>

 

<form method="post" enctype="multipart/form-data">
<div class="form-group">
<label> Nama obat</label>
<input type="" class="form-control" name="nama_obat" value="<?php echo $data_obat['nama_obat'] ?>">
</div>

<button class="btn btn-primary" name="simpan">Simpan</button>
	
</form>
<?php if (isset($_POST['simpan'])) 
{
	$obat->ubah_obat($_POST['nama_obat'],$id_obat);

	//echo "<script>alert('data pasien tersimpan')</script>";
	echo "<script>location='index.php?halaman=tampil_obat'</script>";
}

 ?>