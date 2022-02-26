<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    $nama_produk = $_POST['nama_produk'];
    $b_s = $_POST['b_s'];
    $b_m = $_POST['b_m'];
    $b_l = $_POST['b_l'];
    $b_xl = $_POST['b_xl'];
    $a_s = $_POST['a_s'];
    $a_m = $_POST['a_m'];
    $a_l = $_POST['a_l'];
    $a_xl = $_POST['a_xl'];
    $j_s = $b_s + $a_s;
    $j_m = $b_m + $a_m;
    $j_l = $b_l + $a_l;
    $j_xl = $b_xl + $a_xl;
    $update = date('y-m-d');
    $sql     = "UPDATE tbl_produk SET stok_s='$j_s', stok_m='$j_m', stok_l='$j_l', stok_xl='$j_xl', lastupdate='$update' WHERE nama_produk='$nama_produk'";
    $query     = mysqli_query($koneksidb, $sql);
    if ($query) {
        echo "<script type='text/javascript'>
    		alert('Stok Berhasil Ditambah.'); 
    		document.location = '../produkdata'; 
    	</script>";
    } else {
        echo "<script type='text/javascript'>
    		alert('Terjadi kesalahan, silahkan coba lagi!.'); 
    		document.location = '../produkdata'; 
    	</script>";
    }
}
