<?php
include('../includes/config.php');

$resi_pengiriman = $_POST['resi_pengiriman'];
$no_invoice = $_POST['no_invoice'];

$sql   = "UPDATE tbl_order SET resi_pengiriman='$resi_pengiriman', status='Pesanan Selesai' WHERE no_invoice='$no_invoice'";
$query   = mysqli_query($koneksidb, $sql);
if ($query) {
	echo "<script type='text/javascript'>
			alert('Berhasil Update Resi Pengiriman.'); 
			document.location = '../selesaidata.php'; 
		</script>";
} else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
      document.location = '../selesaidata.php'; 
		</script>";
}
