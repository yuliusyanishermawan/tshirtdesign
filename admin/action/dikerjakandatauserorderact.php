<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {
  include('../includes/config.php');
  if (empty($_POST["provinsi"])) {
    $provinsi = "Pickup";
    $distrik = "Pickup";
    $kodepos = "Pickup";
    $nama_ekspedisi = "Pickup";
    $estimasi = "Pickup";
    $paket = "Pickup";
    $NULL = "Pickup";
  } else {
    $provinsi = $_POST['provinsi'];
    $distrik = $_POST['distrik'];
    $kodepos = $_POST['kodepos'];
    $nama_ekspedisi = $_POST['nama_ekspedisi'];
    $estimasi = $_POST['estimasi'];
    $paket = $_POST['paket'];
    $NULL = "NULL";
  }

  $kode_order = $_POST['kode_order'];
  $id_user = $_POST['id_user'];
  $ongkir = $_POST['ongkir'];
  $alamat = $_POST['alamat'];
  $total_berat = $_POST['total_berat'];
  $totalhargaaa = $_POST['totalhargaaa'];
  $status = "Menunggu Dikerjakan";
  $create = date('y-m-d');
  $sqlinsert     = "INSERT INTO tbl_order  VALUES ('$kode_order','$id_user','$create','$alamat','$status','$NULL','$provinsi','$distrik','$kodepos','$nama_ekspedisi','$paket','$estimasi','$total_berat','$ongkir','$totalhargaaa','Offline')";
  $queryinsert     = mysqli_query($koneksidb, $sqlinsert);
  if ($queryinsert) {
    $array = $_POST['id_desain_produk_user'];
    $arrayharga = $_POST['harga'];
    $jumlaharray = count($array);
    for ($i = 0; $i < $jumlaharray; $i++) {
      $sqlupdate = "UPDATE tbl_desain_produk_user  SET no_invoice='$kode_order' WHERE id_desain_produk_user=$array[$i]";
      $queryupdate     = mysqli_query($koneksidb, $sqlupdate);
      if ($queryupdate) {

        $sqlselect = "SELECT * FROM tbl_desain_produk_user INNER JOIN tbl_produk ON tbl_desain_produk_user.id_produk=tbl_produk.id_produk WHERE tbl_desain_produk_user.no_invoice='$kode_order'";
        $queryselect = @mysqli_query($koneksidb, $sqlselect);
        while ($resultselect = @mysqli_fetch_array($queryselect)) {

          $id_produk = $resultselect['id_produk'];
          $ukuran_s = $resultselect['stok_s'] - $resultselect['ukuran_s'];
          $ukuran_m = $resultselect['stok_m'] - $resultselect['ukuran_m'];
          $ukuran_l = $resultselect['stok_l'] - $resultselect['ukuran_l'];
          $ukuran_xl = $resultselect['stok_xl'] - $resultselect['ukuran_xl'];

          $sqlupdate   = "UPDATE tbl_produk SET stok_s='$ukuran_s',stok_m='$ukuran_m',stok_l='$ukuran_l',stok_xl='$ukuran_xl' WHERE id_produk='$id_produk'";
          $queryupdate   = mysqli_query($koneksidb, $sqlupdate);
          if ($queryupdate) {
            echo "<script type='text/javascript'>
					alert('Berhasil tambah order'); 
					   document.location = 'cetakinvoice?id=$kode_order';
				</script>";
          } else {
            echo "<script type='text/javascript'>
					alert('Terjadi kesalahan, silahkan coba lagi!.');
					 document.location = '../dikerjakandatauser?id=$id_user'; 
				</script>";
          }
        }
        echo "<script type='text/javascript'>
                alert('Berhasil tambah order.'); 
                document.location = 'cetakinvoice?id=$kode_order'; 
            </script>";
      } else {
        echo "<script type='text/javascript'>
          alert('Terjadi kesalahan, silahkan coba lagi!.'); 
          document.location = '../dikerjakandatauser?id=$id_user'; 
      </script>";
      }
    }
  } else {
    echo "<script type='text/javascript'>
          alert('Terjadi kesalahan, silahkan coba lagi!.'); 
    document.location = '../dikerjakandatauserdetail?id=$id_user'; 
      </script>";
  }
}
