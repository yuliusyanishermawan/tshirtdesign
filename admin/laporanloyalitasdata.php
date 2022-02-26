<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {
  $sess = $_SESSION['alogin'];
  $title = "Laporan Loyalitas";
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
              <h3 class="card-title"><?= $title ?></h3>
              <div class="card-tools">
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Total Order</th>
                    <th>Persentase</th>
                    </th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  $nomor = 0;
                  $sqltblcount = "SELECT id_user,COUNT(*) AS jumlahorder FROM tbl_order GROUP BY id_user ORDER BY jumlahorder DESC";
                  $querytblcount = @mysqli_query($koneksidb, $sqltblcount);
                  while ($resultcount = @mysqli_fetch_array($querytblcount)) {

                    $nomor++;
                    $id_user = $resultcount['id_user'];
                    $sqluser = "SELECT * FROM tbl_user WHERE id_user=$id_user";
                    $queryuser = mysqli_query($koneksidb, $sqluser);
                    $resultuser = mysqli_fetch_array($queryuser);

                    $sqlcountt = "SELECT *,COUNT(no_invoice) AS jumlahorderr FROM tbl_order";
                    $querycountt = mysqli_query($koneksidb, $sqlcountt);
                    $resultcountt = mysqli_fetch_array($querycountt);
                    $presentase = (($resultcount['jumlahorder'] * 10) / ($resultcountt['jumlahorderr']) * 10);
                  ?>
                    <tr>
                      <td><?php echo $nomor; ?></td>
                      <td><?php echo htmlentities($resultuser['nama_lengkap']); ?></td>
                      <td><?php echo htmlentities($resultcount['jumlahorder']); ?> kali</td>
                      <td><?php echo $presentase; ?>%</td>

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
<?php
  include('includes/footer.php');
}
?>