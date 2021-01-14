<!DOCTYPE html>
<html>
<head>
  <title>Sistem Pakar Metode CF (Certainty Factor)</title>
</head>

<body>
 <strong> Sistem Pakar Metode CF (Certainty Factor) Keluarga Miskin </strong><br />
 <br />
 <?php
 error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
 if (!isset($_POST['button']))
 {
  ?>
  <?php
  $q = mysql_query("select * from gejala ORDER BY id_gejala");
  while ($r = mysql_fetch_array($q)) 
  { 
    ?>        
    <tr>
      <td width="600"> 
        <input id="gejala<?php echo $r['id_gejala']; ?>" name="gejala<?php echo $r['id_gejala']; ?>" type="checkbox" value="true">
        <?php echo $r['nama_gejala']; ?><br/>                
      </td>
    </tr>
    <?php } ?>  
    <tr>
      <td><input class="btn btn-primary" type="submit" name="button" value="Proses"></td>
    </tr>
  
<?php

}
else
{  
  $perintah = "SELECT * from gejala";
  $minta =mysql_query($perintah);
  $sql = '';
  $i = 0;
          //mengecek semua chekbox gejala
  while($hs=mysql_fetch_array($minta))
  {
            //jika gejala dipilih
             //menyusun daftar gejala misal '1','2','3' dst utk dipakai di query
    if ($_POST['gejala'.$hs['id_gejala']] == 'true')
    {
      if ($sql == '')
      {
        $sql = "'$hs[id_gejala]'";
      }
      else
      {
        $sql = $sql.",'$hs[id_gejala]'";
      }
    }
    $i++;
  }
  echo $sql.'<br/>';
  empty($daftar_penyakit);
  empty($daftar_cf);
  if ($sql != '')
  {
            //mencari id_penyakit di tabel pengetahuan yang gejalanya dipilih
    $perintah = "SELECT id_penyakit FROM pengetahuan WHERE id_gejala IN ($sql) GROUP BY id_penyakit ORDER BY id_penyakit";
              //echo "<br/>".$perintah."<br/>";
    $minta =mysql_query($perintah);
    $id_penyakit_terbesar = '';
    $nama_penyakit_terbesar = '';
    $c = 0;
    while($hs=mysql_fetch_array($minta))
    {
      //memproses id penyakit satu persatu
      $id_penyakit = $hs['id_penyakit'];
      $qry = mysql_query("SELECT * FROM penyakit WHERE id_penyakit = '$id_penyakit'");
      $dt = mysql_fetch_array($qry);
      $nama_penyakit = $dt['penyakit'];
      $daftar_penyakit[$c] = $hs['id_penyakit'];
      echo "<br/>Proses penyakit ".$daftar_penyakit[$c].".".$nama_penyakit."<br/>==============<br/>";
                //mencari gejala yang mempunyai id penyakit tersebut, agar bisa menghitung CF dari MB dan MD nya
      $p = "SELECT id_penyakit, MB, MD, id_gejala FROM pengetahuan WHERE id_gejala IN ($sql) AND id_penyakit = '$id_penyakit'";
              //echo $p.'<br/>';
      $m =mysql_query($p);
              //mencari jumlah gejala yang ditemukan
      $jml = mysql_num_rows($m);
                 //jika gejalanya 1 langsung ketemu CF nya
      echo "jml gejala = ".$jml."<br/>";
      if ($jml == 1)
      {
        $h=mysql_fetch_array($m);
        $MB = $h['MB'];
        $MD = $h['MD'];
        $cf = $MB - $MD;
        $daftar_cf[$c] = $cf;
                //cek apakah penyakit ini adalah penyakit dgn CF terbesar ?
        if (($id_penyakit_terbesar == '') || ($cf_terbesar < $cf))
        {
          $cf_terbesar = $cf;
          $id_penyakit_terbesar = $id_penyakit;
          $nama_penyakit_terbesar = $nama_penyakit;
        }
        echo "<br/>proses 1<br/>------------------------<br/>";
        echo "MB = ".$MB."<br/>";
        echo "MD = ".$MD."<br/>";
        echo "cf = MB - MD = ".$MB." - ".$MD." = ".$cf."<br/><br/><br/>";
      }
                //jika gejala lebih dari satu harus diproses semua gejala
      else if ($jml > 1)
      {
        $i = 1;
                 //proses gejala satu persatu
        while($h=mysql_fetch_array($m))
        {
          echo "<br/>proses ".$i."<br/>------------------------------------<br/>";
                   //pada gejala yang pertama masukkan MB dan MD menjadi MBlama dan MDlama
          if ($i == 1)
          {
            $MBlama = $h['MB'];
            $MDlama = $h['MD'];
            echo "MBlama = ".$MBlama."<br/>";
            echo "MDlama = ".$MDlama."<br/>";
          }
                      //pada gejala yang nomor dua masukkan MB dan MD menjadi MBbaru dan MB baru kemudian hitung MBsementara dan MDsementara
          else if ($i == 2)
          {
            $MBbaru = $h['MB'];
            $MDbaru = $h['MD'];
            echo "MBbaru = ".$MBbaru."<br/>";
            echo "MDbaru = ".$MDbaru."<br/>";
            $MBsementara = $MBlama + ($MBbaru * (1 - $MBlama));
            $MDsementara = $MDlama + ($MDbaru * (1 - $MDlama));
            echo "MBsementara = MBlama + (MBbaru * (1 - MBlama)) = $MBlama + ($MBbaru * (1 - $MBlama)) = ".$MBsementara."<br/>";
            echo "MDsementara = MDlama + (MDbaru * (1 - MDlama)) = $MDlama + ($MDbaru * (1 - $MDlama)) = ".$MDsementara."<br/>";
                      //jika jumlah gejala cuma dua maka CF ketemu
            if ($jml == 2)
            {
              $MB = $MBsementara;
              $MD = $MDsementara;
              $cf = $MB - $MD;
              echo "MB = MBsementara = ".$MB."<br/>";
              echo "MD = MDsementara = ".$MD."<br/>";
              echo "cf = MB - MD = ".$MB." - ".$MD." = ".$cf."<br/><br/><br/>";
              $daftar_cf[$c] = $cf;
                      //cek apakah penyakit ini adalah penyakit dgn CF terbesar ?
              if (($id_penyakit_terbesar == '') || ($cf_terbesar < $cf))
              {
                $cf_terbesar = $cf;
                $id_penyakit_terbesar = $id_penyakit;
                $nama_penyakit_terbesar = $nama_penyakit;
              }
            }
          }
                    //pada gejala yang ke 3 dst proses MBsementara dan MDsementara menjadi MBlama dan MDlama
                  //MB dan MD menjadi MBbaru dan MDbaru
                    //hitung MBsementara dan MD sementara yg sekarang
          else if ($i >= 3)
          {
            $MBlama = $MBsementara;
            $MDlama = $MDsementara;
            echo "MBlama = MBsementara = ".$MBlama."<br/>";
            echo "MDlama = MDsementara = ".$MDlama."<br/>";
            $MBbaru = $h['MB'];
            $MDbaru = $h['MD'];
            echo "MBbaru = ".$MBbaru."<br/>";
            echo "MDbaru = ".$MDbaru."<br/>";
            $MBsementara = $MBlama + ($MBbaru * (1 - $MBlama));
            $MDsementara = $MDlama + ($MDbaru * (1 - $MDlama));
            echo "MBsementara = MBlama + (MBbaru * (1 - MBlama)) = $MBlama + ($MBbaru * (1 - $MBlama)) = ".$MBsementara."<br/>";
            echo "MDsementara = MDlama + (MDbaru * (1 - MDlama)) = $MDlama + ($MDbaru * (1 - $MDlama)) = ".$MDsementara."<br/>";
                      //jika ini adalah gejala terakhir berarti CF ketemu
            if ($jml == $i)
            {
              $MB = $MBsementara;
              $MD = $MDsementara;
              $cf = $MB - $MD;
              echo "MB = MBsementara = ".$MB."<br/>";
              echo "MD = MDsementara = ".$MD."<br/>";
              echo "cf = MB - MD = ".$MB." - ".$MD." = ".$cf."<br/><br/><br/>";
              $daftar_cf[$c] = $cf;
                       //cek apakah penyakit ini adalah penyakit dgn CF terbesar ?
              if (($id_penyakit_terbesar == '') || ($cf_terbesar < $cf))
              {
                $cf_terbesar = $cf;
                $id_penyakit_terbesar = $id_penyakit;
                $nama_penyakit_terbesar = $nama_penyakit;
              }
            }
          }
          $i++;
        }
      }
      $c++;
    }
  }

          //urutkan daftar gejala berdasarkan besar CF
  for ($i = 0; $i < count($daftar_penyakit); $i++)
  {
    for ($j = $i + 1; $j < count($daftar_penyakit); $j++)
    {
      if ($daftar_cf[$j] > $daftar_cf[$i])
      {
        $t = $daftar_cf[$i];
        $daftar_cf[$i] = $daftar_cf[$j];
        $daftar_cf[$j] = $t;

        $t = $daftar_penyakit[$i];
        $daftar_penyakit[$i] = $daftar_penyakit[$j];
        $daftar_penyakit[$j] = $t;
      }
    }
  }
  echo "penyakit terbesar = ".$id_penyakit_terbesar.".".$nama_penyakit_terbesar."<br/>";

          //for ($i = 0; $i < count($daftar_penyakit); $i++)
          //{
          //  echo $daftar_penyakit[$i]."=".$daftar_cf[$i]."<br/>";
            //}
 

  ?>

  
</body>
</html>