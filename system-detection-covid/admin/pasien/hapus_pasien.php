<?php 

//mengambil id pasien yang akan di hapus
$id_pasien = $_GET['id_pasien'];

//objek pasien menjalankan fungsi hapus pasien berdasarkan id pasien yang akan dihapus
$pasien->hapus_pasien($id_pasien);

//tampilkan pesan 
echo "<script>alert('data pasien terhapus')</script>";

//redirect ke tampil pasien
echo"<script>location='index.php?halaman=pasien' </script>";






 ?>