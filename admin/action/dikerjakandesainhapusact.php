
<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    include('../includes/config.php');
    $id_desain_produk_user = $_GET['id'];
    $sqli = "SELECT * FROM tbl_desain_produk_user WHERE id_desain_produk_user='$id_desain_produk_user'";
    $queryi = mysqli_query($koneksidb, $sqli);
    $resulti = mysqli_fetch_array($queryi);
    $id_user = $resulti["id_user"];
    $sql = "DELETE FROM tbl_desain_produk_user WHERE id_desain_produk_user='$id_desain_produk_user'";
    $query = mysqli_query($koneksidb, $sql);
    if ($query) {
        echo "<script type='text/javascript'>
          alert('Berhasil menghapus.'); 
          document.location = '../dikerjakandatauserdetail?id=$id_user'; 
      </script>";
    } else {
        echo "<script type='text/javascript'>
          alert('Terjadi kesalahan, silahkan coba lagi!.'); 
    document.location = '../dikerjakandatauserdetail?id=$id_user';
      </script>";
    }
}
