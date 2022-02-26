<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_GET['id'])) {
        $id    = $_GET['id'];
        $sql    = "DELETE FROM tbl_faq WHERE id_faq='$id'";
        $query    = mysqli_query($koneksidb, $sql);
        echo "<script type='text/javascript'>
			alert('Data berhasil dihapus.'); 
			document.location = '../faqdata.php'; 
		</script>";
    } else {
        echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = '../faqdata.php'; 
		</script>";
    }
}
