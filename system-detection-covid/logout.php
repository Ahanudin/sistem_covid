<?php 
include 'config/konek_database.php';

session_destroy();
echo "<script>alert('anda berhasil keluar')</script>";
echo "<script>location='login.php'</script>";

 ?>