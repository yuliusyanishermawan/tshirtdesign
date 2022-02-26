<?php
$user = $_SESSION['user'];
$sql = "SELECT *,COUNT(nama_order) AS jumlahorder from tbl_desain_produk_user INNER JOIN tbl_user ON tbl_desain_produk_user.id_user=tbl_user.id_user WHERE tbl_user.email='$user'  AND tbl_desain_produk_user.no_invoice='NULL'";
$query = mysqli_query($koneksidb, $sql);
$result = mysqli_fetch_array($query);
?>
<?php
$sqli = "SELECT * from tbl_user WHERE email='$user'";
$queryy = mysqli_query($koneksidb, $sqli);
$resultt = mysqli_fetch_array($queryy);
?>
<li><a href="keranjang">Keranjang <sup class="badge badge-pil">(<?php echo htmlentities($result['jumlahorder']); ?>)</sup></a></li>
<li class="drop-down"><a href=""><?php echo htmlentities($resultt['nama_lengkap']); ?></a>
    <ul>
        <li><a href="profileuser.php">Profile User</a></li>
        <li><a href="riwayatpesanan.php">Riwayat Pesanan</a></li>
        <li><a href="ubahpassword.php">Update Password</a></li>
        <li><a href="action/logout.php">Log Out</a></li>
    </ul>
</li>
</ul>
</nav>