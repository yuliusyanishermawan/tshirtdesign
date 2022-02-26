<?php
session_start();
error_reporting(0);
include('../includes/config.php');
$passwordlama = $_POST['passwordlama'];
$passwordbaru = $_POST['passwordbaru'];
$passwordbaruconfirm = $_POST['passwordbaruconfirm'];
$email = $_SESSION['alogin'];

if ($passwordbaru != $passwordbaruconfirm) {
    echo "<script type='text/javascript'>
			alert('Password Baru Tidak Sama.'); 
			document.location = '../ubahpassword.php'; 
		</script>";
} else {
    $mdpasswordlama = md5($_POST['passwordlama']);

    $sqlcek     = "SELECT * FROM tbl_admin WHERE email='$email' AND password='$mdpasswordlama'";
    $querycek = mysqli_query($koneksidb, $sqlcek);
    if (mysqli_num_rows($querycek) > 0) {
        $lastupdate = date('y-m-d');
        $mdpasswordbaruconfirm = md5($_POST['passwordbaruconfirm']);
        $sql     = "UPDATE tbl_admin SET password='$mdpasswordbaruconfirm', lastupdate='$lastupdate'";
        $query     = mysqli_query($koneksidb, $sql);
        if ($query) {
            echo "<script type='text/javascript'>
                  alert('Berhasil mengubah password.'); 
                  document.location = '../ubahpassword.php'; 
              </script>";
        } else {
            echo "<script type='text/javascript'>
                  alert('Terjadi kesalahan, silahkan coba lagi!.'); 
            document.location = '../ubahpassword.php';
              </script>";
        }
    } else {
        echo "<script type='text/javascript'>
        alert('Password Salah!.'); 
        document.location = '../ubahpassword.php'; 
    </script>";
    }
}
