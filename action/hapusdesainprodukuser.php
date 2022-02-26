<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['user']) == 0) {
      header('location:../login.php');
} else {
      include('../includes/config.php');

      $id_desain_produk_user = $_GET['id'];
      $sql = "DELETE FROM tbl_desain_produk_user WHERE id_desain_produk_user='$id_desain_produk_user'";
      $query = mysqli_query($koneksidb, $sql);
      if ($query) {
            echo "<script type='text/javascript'>
          alert('Berhasil meghapus.'); 
          document.location = '../keranjang'; 
      </script>";
      } else {
            echo "<script type='text/javascript'>
          alert('Terjadi kesalahan, silahkan coba lagi!.'); 
    document.location = '../keranjang';
      </script>";
      }
}
