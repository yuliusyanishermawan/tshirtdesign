<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['user']) == 0) {
	header('location:login.php');
} else {

	include('../includes/config.php');
	$ukuran_s = $_POST['ukuran_s'];
	$ukuran_m = $_POST['ukuran_m'];
	$ukuran_l = $_POST['ukuran_l'];
	$ukuran_xl = $_POST['ukuran_xl'];
	$totalharga = $_POST['totalharga'];
	$id_desain_produk_user = $_POST['id_desain_produk_user'];
	$sql   = "UPDATE tbl_desain_produk_user SET ukuran_s='$ukuran_s', ukuran_m='$ukuran_m', ukuran_l='$ukuran_l', ukuran_xl='$ukuran_xl', total_harga_desain_produk_user='$totalharga' WHERE id_desain_produk_user='$id_desain_produk_user'";
	$query   = mysqli_query($koneksidb, $sql);

	if ($query) {
		echo "<script type='text/javascript'>
			alert('Berhasil Update Ukuran.'); 
			document.location = '../keranjang.php'; 
		</script>";
	} else {
		echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
      document.location = '../keranjang.php'; 
		</script>";
	}
}
