<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {
  $sess = $_SESSION['alogin'];
  $title = "Data Produk";
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
                <ul class="pagination pagination-sm float-right">
                  <li class="page-item"><a class="page-link" href="produkstoktambah"><i class="fas fa-plus"></i> Tambah Stok</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Jenis Kaos</th>
                    <th>Warna Kaos</th>
                    <th>Harga Produk</th>
                    <th>Total Stok</th>
                    <th>Diubah</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $nomor = 0;
                  $sqltblproduk = "SELECT * FROM tbl_produk";
                  $querytblproduk = @mysqli_query($koneksidb, $sqltblproduk);
                  while ($result = @mysqli_fetch_array($querytblproduk)) {
                    $nomor++;
                  ?>
                    <?php
                    $totalstok = $result['stok_s'] + $result['stok_m'] + $result['stok_l'] + $result['stok_xl'];
                    ?>
                    <tr>
                      <td><?php echo htmlentities($nomor); ?></td>
                      <td><a href="produkdetail?id=<?php echo $result['id_produk']; ?>" class="link-primary"><?php echo htmlentities($result['nama_produk']); ?></a></td>
                      <td><?php echo htmlentities($result['jenis_kaos']); ?></td>
                      <td><?php echo htmlentities($result['warna_kaos']); ?></td>
                      <td><?php echo htmlentities($result['harga_produk']); ?></td>
                      <td><?php echo $totalstok; ?></td>
                      <td><?php echo date('d F Y', strtotime($result['lastupdate'])); ?></td>
                      <td class="text-center">
                        <a class="btn btn-info btn-sm" href="produkubah?id=<?php echo $result['id_produk']; ?>"><i class="fas fa-pencil-alt"></i>Edit</a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
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