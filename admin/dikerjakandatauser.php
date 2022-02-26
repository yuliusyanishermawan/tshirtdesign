<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {
  $title = "Dikerjakan";
  include('includes/header.php');
  include('includes/sidebar.php');
  include('includes/config.php');
?>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data User Pembelian Offline</h3>
              <div class="card-tools">
                <ul class="pagination pagination-sm float-right">
                  <li class="page-item"><a class="page-link" href="dikerjakandatausertambah"><i class="fas fa-plus"></i> Tambah Pemesanan Offline</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama User</th>
                    <th>Nomor Telfon</th>
                    <th>Alamat</th>
                    <th>Dibuat</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $nomor = 0;
                  $sql = "SELECT * FROM tbl_user WHERE email='-'";
                  $query = @mysqli_query($koneksidb, $sql);
                  while ($result = @mysqli_fetch_array($query)) {
                    $id_user = $result['id_user'];
                    $email = $result['email'];
                    $nomor++;
                  ?>
                    <tr>
                      <td><?php echo htmlentities($nomor); ?></td>
                      <td style="text-transform: uppercase;"><a href="userdetail?id=<?php echo $result['id_user']; ?>" class="link-primary"><?php echo htmlentities($result['nama_lengkap']); ?></td>
                      <td><?php echo htmlentities($result['nomor']); ?></td>
                      <td><?php echo htmlentities($result['alamat']); ?></td>
                      <td><?php echo date('d F Y', strtotime($result['create'])); ?></td>
                      <td class="text-center">
                        <a class="btn btn-info btn-sm" href="dikerjakandatauserdetail?id=<?php echo $result['id_user']; ?>"><i class="fas fa-pencil-alt"></i>Edit</a>

                        <?php
                        $sqli = "SELECT COUNT(tbl_desain_produk_user.id_desain_produk_user) AS hitung FROM tbl_user INNER JOIN tbl_desain_produk_user ON tbl_user.id_user=tbl_desain_produk_user.id_user WHERE tbl_user.email='-' AND tbl_desain_produk_user.no_invoice='NULL'";
                        $queryi = mysqli_query($koneksidb, $sqli);
                        $resulti = mysqli_fetch_array($queryi);
                        $hitung = $resulti['hitung'];
                        if ($hitung > 0) {
                          echo "<a class='btn btn-primary btn-sm' href='dikerjakandatauserorder?id=$id_user'><i class='fas fa-pencil-alt'></i>Buat Pesanan</a>";
                        };
                        ?>
                      </td>
                    </tr>
                  <?php } ?>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
<?php
  include('includes/footer.php');
}
?>