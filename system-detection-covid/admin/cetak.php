 <?php 

 include "../config/konek_database.php"; 



   // Set Tanggal Indonesia
 date_default_timezone_set('Asia/Jakarta');
 $wkt = date("Y-m-d"); ?>

 <html>
 <head>
  <title>Laporan Hasil CF :: <?php echo "$idprint" ?></title>

  <style type="text/css" media="screen">
    td,th{
      color: #1B1B1B;
    }
    th{
      text-align: center;
    }
    td{
      font-size: 14px;
    }
    .one{
      width: 1px;
    }
    .ket_ok{
      color: #36AF1A;
    }
    .ket_no{
      color: #FE3131;
    }
    .ket_sub{
      color: #3B60FF;
    }
    .table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
      padding: 2px;
      line-height: 1.428571429;
      vertical-align: top;
      border-top: 1px solid #ddd;
    }
    .table>thead>tr>.thn, .table>tbody>tr>.thn, .table>tfoot>tr>.thn, .table>thead>tr>.tdn, .table>tbody>tr>.tdn, .table>tfoot>tr>.tdn {
      padding: 2px;
      line-height: 0.628571;
      border-top: 1px solid #ddd;
      font-size: 10px;
    }
  </style>
</head>
<body onload="window.print();">
  <p style="font-size:10px" align="right"><?php echo "Dicetak tanggal : ".date('Y-m-d H:i:s',strtotime('now')); ?></p>
  <table style="width:100%;">
    <tr>
      <!-- <th align='right'><img src="../logo-pwj.png"></th> -->
      <th align='center'>

      <h4 style="margin-bottom: -10px;">SISTEM DETEKSI GEJALA COVID 19   <br/>
        METODE CERTAINTY FACTOR  <br/>
        <br/>

      </h4>
    </th>

      <!-- <th align='left'><img src="../logo-smk7.png"></th> -->
    </tr>
  </table>
  <hr style="margin-top:4px;">

  <div align="center">
 <h4 style="text-decoration: underline;">Hasil Keputusan</h4>
 </div>
 <table style="width:100%">
  <!-- <caption align='center'>DATA PENDAFTAR</caption> -->
</table>
<br/>

<?php 
$id_rekam_medis =  $_GET['id_rekam_medis'];
$data_rekam_medis = $rekam_medis->detail_rekam_medis($id_rekam_medis);
$gejala_dipilih = $rekam_medis->ambil_gejala_dipilih($id_rekam_medis);
?> 

</table>
<br/>


<?php 
$id_rekam_medis = $_GET['id_rekam_medis'];
$data_rekam_medis = $rekam_medis->detail_rekam_medis($id_rekam_medis);
$gejala_dipilih = $rekam_medis->ambil_gejala_dipilih($id_rekam_medis);

?>

<table style="width:100%">
 
 <tr>
  <td><br/><b style="text-decoration: underline;">Data Pasien</b></td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td width="25%;"></td>
  <td width="2%;">  </td>
  <td><?php echo ""; ?></td>
</tr>
<tr>
  <td width="25%;">Nik</td>
  <td width="2%;"> : </td>
  <td><?php echo $data_rekam_medis['nik'] ?></td>
</tr>
<tr>
  <td width="25%;">Nama </td>
  <td width="2%;"> : </td>
  <td><?php echo strtoupper($data_rekam_medis['nama_pasien']); ?></td>
</tr>
<tr>
  <td width="25%;">Alamat</td>
  <td width="2%;"> : </td>
  <td><?php echo $data_rekam_medis['alamat_pasien']; ?></td>
</tr>


<tr>
  <td><br/><b style="text-decoration: underline;">Keputusan</b></td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td width="25%;" valign="top">Gejala di pilih</td>
  <td width="2%;" valign="top"> : </td>
  <td >
    <ol style="margin-left:-30px;">
      <?php foreach ($gejala_dipilih as $key => $value): ?>
        
        <li><?php echo strtoupper($value['nama_gejala']) ?></li>
      <?php endforeach ?>
    </ol>
  </td>
</tr>

<tr>
  <td width="25%;">CF (Certainty Factor)</td>
  <td width="2%;"> : </td>
  <td><?php echo $data_rekam_medis['cf_penyakit'] ?></td>
</tr>
<tr>
  <td width="25%;">Kemungkinan Terbesar Terkena Penyakit</td>
  <td width="2%;"> : </td>
  <td><?php echo strtoupper($data_rekam_medis['nama_penyakit']); ?></td>
</tr>


<tr>
  <td><br/><b style="text-decoration: underline;">Dikeluarkan</b></td>
  <td></td>
  <td></td>
</tr>

<tr>
  <td width="25%;">Tanggal </td>
  <td width="2%;"> : </td>
  <td><?php echo $wkt ?></td>
</tr>

</table>



