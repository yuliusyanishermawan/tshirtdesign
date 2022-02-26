<?php
include('../includes/config.php');

$status = $_POST['status'];
$no_invoice = $_POST['no_invoice'];

$sqlorder   = "UPDATE tbl_order SET status='$status' WHERE no_invoice='$no_invoice'";
$queryorder   = mysqli_query($koneksidb, $sqlorder);

if ($queryorder) {
	if ($status == "Menunggu Dikerjakan") {
		$sqlselect = "SELECT * FROM tbl_desain_produk_user INNER JOIN tbl_produk ON tbl_desain_produk_user.id_produk=tbl_produk.id_produk WHERE tbl_desain_produk_user.no_invoice='$no_invoice'";
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
					alert('Berhasil Update Status Dan Update Stok.'); 
					   document.location = '../konfirmasidata';
				</script>";
			} else {
				echo "<script type='text/javascript'>
					alert('Terjadi kesalahan, silahkan coba lagi!.');
					 document.location = '../konfirmasidata'; 
				</script>";
			}
		}
	} else {
		echo "<script type='text/javascript'>
			alert('Berhasil Update Status.'); 
			   document.location = '../konfirmasidata';
		</script>";
	}
} else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			 document.location = '../konfirmasidata';
		</script>";
}
