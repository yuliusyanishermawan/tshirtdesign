<?php
include('../includes/config.php');

$status = $_POST['status'];
$no_invoice = $_POST['no_invoice'];

$sql   = "UPDATE tbl_order SET status='$status' WHERE no_invoice='$no_invoice'";
$query   = mysqli_query($koneksidb, $sql);
if ($query) {
	echo "<script type='text/javascript'>
			alert('Berhasil Update Status.'); 
			document.location = '../dikerjakandata.php'; 
		</script>";
} else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
      document.location = '../dikerjakandata.php'; 
		</script>";
}
