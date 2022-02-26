<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include('../assets/vendor/PHPMailer/src/Exception.php');
include('../assets/vendor/PHPMailer/src/PHPMailer.php');
include('../assets/vendor/PHPMailer/src/SMTP.php');


include('../includes/config.php');
$karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
$shuffle  = substr(str_shuffle($karakter), 0, 15);
$email = $_POST['email'];
$sql = "UPDATE tbl_user SET token='$shuffle' WHERE email='$email'";
$query   = mysqli_query($koneksidb, $sql);
if ($query) {
    $emailpengirim = 'dope.wild.sablons@gmail.com';
    $namapengirim = 'Dope Wild Sablons';
    $emailpenerima = $_POST['email'];
    $subjek = 'Token Lupa Password Untuk Login Website';
    $pesan = 'Token untuk ubah password anda adalah sebagai berikut ' . $shuffle . '. Link memasukkan token silahkan klik di halaman https://dopewildsablons.rf.gd/dopewild/masuktoken/';

    $mail = new PHPMailer;
    $mail->isSMTP();

 	$mail->SMTPDebug = 2;
 	$mail->Debugoutput = 'html';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = 'emailanda';
    $mail->Password = 'passwordanda';
    // $mail->SMTPDebug = 2;

    $mail->setFrom($emailpengirim, $namapengirim);
    $mail->addAddress($emailpenerima, $namapengirim);
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subjek;
    $mail->Body    = $pesan;

    $send = $mail->send();

    if ($send) {
        echo "<script>alert('Silahkan Cek Email Anda Dan Masukkan Token Anda');</script>";
        echo "<script type='text/javascript'> document.location = '../masuktoken.php'; </script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan, Harap Coba Lagi');</script>";
        echo "<script type='text/javascript'> document.location = '../lupapassword.php'; </script>";
    }
    echo "<script>alert('Terjadi Kesalahan, Harap Coba Lagi');</script>";
    echo "<script type='text/javascript'> document.location = '../lupapassword.php'; </script>";
} else {
    echo "<script>alert('Terjadi Kesalahan, Harap Coba Lagi');</script>";
    echo "<script type='text/javascript'> document.location = '../lupapassword.php'; </script>";
}
