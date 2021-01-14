<?php 

//mengambil id obat yang akan di hapus
$id_obat = $_GET['id_obat'];

//objek obat menjalankan fungsi hapus obat berdasarkan id obat yang akan dihapus
$obat->hapus_obat($id_obat);

//tampilkan pesan 
echo "<script>alert('data obat terhapus')</script>";

//redirect ke tampil obat
echo"<script>location='index.php?halaman=tampil_obat' </script>";






 ?>