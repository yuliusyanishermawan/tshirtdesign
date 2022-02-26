<?php
include('../includes/config.php');
$id_gambar_referensi        = $_POST['id'];
$nama_gambar  = $_POST['nama_gambar'];
$lastupdate = date('y-m-d');
$sql   = "UPDATE tbl_gambar_referensi SET nama_gambar='$nama_gambar', lastupdate='$lastupdate' WHERE id_gambar_referensi='$id_gambar_referensi'";
$query   = mysqli_query($koneksidb, $sql);
if ($query) {
	echo "<script type='text/javascript'>
			alert('Berhasil Update Gambar Referensi.'); 
			document.location = '../gambarreferensidata.php'; 
		</script>";
} else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
            document.location = '../gambarreferensidata.php'; 
		</script>";
}
