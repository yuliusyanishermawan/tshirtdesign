<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    $nama_produk = $_POST['nama_produk'];
    $harga_produk = $_POST['harga_produk'];
    $update = date('Y-m-d');
    $sql     = "UPDATE tbl_produk SET harga_produk='$harga_produk', lastupdate='$update' WHERE nama_produk='$nama_produk'";
    $query     = mysqli_query($koneksidb, $sql);
    if ($query) {
        echo "<script type='text/javascript'>
              alert('Berhasil ubah data.'); 
              document.location = '../produkdata'; 
          </script>";
    } else {
        echo "<script type='text/javascript'>
              alert('Terjadi kesalahan, silahkan coba lagi!.'); 
        document.location = '../produkdata';
          </script>";
    }
}
