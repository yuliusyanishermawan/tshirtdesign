<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {
  $id_user = $_POST['id_user'];
  $nama_desain = $_POST['nama_desain'];
  $ukuran_s = $_POST['ukuran_s'];
  $ukuran_m = $_POST['ukuran_m'];
  $ukuran_l = $_POST['ukuran_l'];
  $ukuran_xl = $_POST['ukuran_xl'];
  $totalharga = $_POST['totalharga'];
  $id_desain_produk_user = $_POST['id_desain_produk_user'];
  $sql   = "UPDATE tbl_desain_produk_user SET nama_order='$nama_desain', ukuran_s='$ukuran_s', ukuran_m='$ukuran_m', ukuran_l='$ukuran_l', ukuran_xl='$ukuran_xl', total_harga_desain_produk_user='$totalharga' WHERE id_desain_produk_user='$id_desain_produk_user'";
  $query     = mysqli_query($koneksidb, $sql);
  if ($query) {
    echo "<script type='text/javascript'>
    		alert('Berhasil Ubah data.'); 
    		document.location = '../dikerjakandatauserdetail?id=$id_user'; 
    	</script>";
  } else {
    echo "<script type='text/javascript'>
    		alert('Terjadi kesalahan, silahkan coba lagi!.'); 
    		document.location = '../dikerjakandatauserdetail?id=$id_user'; 
    	</script>";
  }
}
