<?php
error_reporting(0);
include('../includes/config.php');
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];
$nama_lengkap = $_POST['nama_lengkap'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$nomor = $_POST['nomor'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$create = date('y-m-d');

if ($password != $confirmpassword) {
    echo "<script type='text/javascript'>
			alert('Password Tidak Sama.'); 
			document.location = '../register'; 
		</script>";
} else {

    $sqlcek     = "SELECT * FROM tbl_user WHERE email='$email'";
    $querycek = mysqli_query($koneksidb, $sqlcek);
    if (mysqli_num_rows($querycek) > 0) {
        echo "<script type='text/javascript'>
        alert('Email Sudah Terdaftar, Silahkan Gunakan Email Lain.'); 
        document.location = '../register'; 
    </script>";
    } else {
        $mdpassword = md5($_POST['password']);
        $sql     = "INSERT INTO tbl_user VALUES ('','$email','$mdpassword','$nama_lengkap','$nomor','$jenis_kelamin','$alamat','$create')";
        $query     = mysqli_query($koneksidb, $sql);
        if ($query) {
            echo "<script type='text/javascript'>
                  alert('Berhasil mendaftar.'); 
                  document.location = '../login'; 
              </script>";
        } else {
            echo "<script type='text/javascript'>
                  alert('Terjadi kesalahan, silahkan coba lagi!.'); 
            document.location = '../register';
              </script>";
        }
    }
}
