<?php 


//mengambil id pasien yang akan di hapus

$id_penyakit = $_GET['id_penyakit'];

$penyakit->hapus_penyakit($id_penyakit);

echo"<script>alert('data terhapus')</script>";
echo "<script>location='index.php?halaman=tampil_penyakit'</script>";
 ?>