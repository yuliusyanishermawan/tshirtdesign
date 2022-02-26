<?php
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $sql = "SELECT * FROM tbl_admin WHERE email='$email' AND password='$password'";
  $query = mysqli_query($koneksidb, $sql);
  $results = mysqli_fetch_array($query);
  if (mysqli_num_rows($query) > 0) {
    $_SESSION['alogin'] = $_POST['email'];
    echo "<script type='text/javascript'> document.location = 'dashboard'; </script>";
  } else {
    echo "<script>alert('Email atau Password Salah');</script>";
  }
}

