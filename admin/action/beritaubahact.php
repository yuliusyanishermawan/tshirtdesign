<?php
include('../includes/config.php');
$id_berita    = $_POST['id_berita'];
$nama_berita  = $_POST['nama_berita'];
$isi_text  = $_POST['isi_text'];
$update = date('y-m-d');
$sql   = "UPDATE tbl_berita SET isi_text='$isi_text', nama_berita='$nama_berita', lastupdate='$update' WHERE id_berita='$id_berita'";
$query   = mysqli_query($koneksidb, $sql);
if ($query) {
	echo "<script type='text/javascript'>
			alert('Berhasil Update Berita.'); 
			document.location = '../beritadata.php'; 
		</script>";
} else {
	echo "<script type='text/javascript'>
			alert('Berhasil Update Berita.'); 
			document.location = '../beritadata.php'; 
		</script>";
}
